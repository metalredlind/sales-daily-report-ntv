<?php

namespace App\DataTables;

use App\Models\DailyReport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesDailyReportDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('sales.daily-report.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('sales.daily-report.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
                $detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
                return $editBtn.$deleteBtn.$detailBtn;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DailyReport $model): QueryBuilder
    {
        // Get the currently authenticated user's team
        $userTeam = auth()->user()->team;

        $query = $model->newQuery()->where('user_team', $userTeam);

        if (request()->has('start_date') && request()->has('end_date')) {
            $startDate = request('start_date') . ' 00:00:00';
            $endDate = request('end_date') . ' 23:59:59';
            $query->whereBetween('waktu', [$startDate, $endDate]);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('salesdailyreport-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('sales.daily-report.data'))
                    //->dom('Bfrtip')
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
            Column::make('waktu'),
            Column::make('tim_bertugas')->title('Nama yang bertugas'),
            Column::make('nama_brand_klien'),
            Column::make('jenis_kegiatan'),
            Column::make('follow_up'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SalesDailyReport_' . date('YmdHis');
    }
}
