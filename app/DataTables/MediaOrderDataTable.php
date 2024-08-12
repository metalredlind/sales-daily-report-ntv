<?php

namespace App\DataTables;

use App\Models\MediaOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MediaOrderDataTable extends DataTable
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
            $editBtn = "<a href='".route('admin.media-order.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='".route('admin.media-order.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
            $detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
            return $editBtn.$deleteBtn.$detailBtn;
        })
        ->addColumn('nominal_paket', function($query){
            return 'Rp ' . number_format($query->nominal_paket, 0, ".", ".");;
        })
        ->addColumn('tanggal_dibuat', function($query){
            return date('d F Y', strtotime($query->created_at));
        })
        ->rawColumns(['action', 'nominal_paket'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MediaOrder $model): QueryBuilder
    {
        $query = $model->newQuery();

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
                    ->setTableId('mediaorder-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('admin.media-order.data'))
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
            Column::make('klien'),
            Column::make('nomor_paket'),
            Column::make('tanggal_paket'),
            Column::make('nominal_paket'),
            Column::make('jenis_paket'),
            Column::make('tanggal_dibuat'),  // Add created_at column
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
        return 'MediaOrder_' . date('YmdHis');
    }
}
