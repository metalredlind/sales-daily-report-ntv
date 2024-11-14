<?php

namespace App\DataTables;

use App\Models\BrandClient;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BrandClientDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.brand-client.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.brand-client.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
                //$detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
                return $editBtn.$deleteBtn;
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

    public function query(BrandClient $model): QueryBuilder
    {
        $query = $model->newQuery();

        if (request()->has('start_date') && request()->has('end_date')) {
            $startDate = request('start_date') . ' 00:00:00';
            $endDate = request('end_date') . ' 23:59:59';
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brandclient-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('admin.brand-client.data'))
                    ->orderBy(0)
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

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('pic_ntv'),
            Column::make('user_team')->title('Tim'),
            Column::make('jenis_industri'),
            Column::make('nama_brand'),
            Column::make('proyeksi_revenue'),
            Column::make('realisasi_revenue'),
            Column::make('tanggal_dibuat'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'BrandClient_' . date('YmdHis');
    }
}
