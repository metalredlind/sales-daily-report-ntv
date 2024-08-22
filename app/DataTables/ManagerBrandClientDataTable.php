<?php

namespace App\DataTables;

use App\Models\BrandClient;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManagerBrandClientDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query) {
                return $this->actionButtons($query);
            })
            ->addColumn('proyeksi_revenue', function($query) {
                return 'Rp ' . number_format($query->proyeksi_revenue, 0, ".", ".");
            })
            ->addColumn('realisasi_revenue', function($query) {
                return 'Rp ' . number_format($query->realisasi_revenue, 0, ".", ".");
            })
            ->addColumn('tanggal_dibuat', function($query) {
                return date('d F Y', strtotime($query->created_at));
            })
            // You can also format 'pic_ntv' if necessary
            ->addColumn('pic_ntv', function($query) {
                return $query->user->name ?? 'N/A';  // Assuming 'name' is the field for user's name
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BrandClient $model): QueryBuilder
    {
        $userTeam = auth()->user()->team;

        $query = $model->newQuery()->with('user')->where('user_team', $userTeam);

        if (request()->has('start_date') && request()->has('end_date')) {
            $startDate = request('start_date') . ' 00:00:00';
            $endDate = request('end_date') . ' 23:59:59';
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('managerbrandclient-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('manager.brand-client.data'))
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [            
            Column::make('id'),
            Column::make('pic_ntv'),
            Column::make('jenis_industri'),
            Column::make('nama_brand'),
            Column::make('proyeksi_revenue'),
            Column::make('realisasi_revenue'),
            Column::make('tanggal_dibuat'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ManagerBrandClient_' . date('YmdHis');
    }

    protected function actionButtons($query): string
    {
        $editBtn = "<a href='".route('sales.brand-client.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
        $deleteBtn = "<a href='".route('sales.brand-client.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
        $detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
        
        return $editBtn . $deleteBtn . $detailBtn;
    }
}
