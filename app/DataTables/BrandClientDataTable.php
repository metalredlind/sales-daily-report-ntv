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

class BrandClientDataTable extends DataTable
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
                $editBtn = "<a href='#' class='btn btn-info'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='#' class='btn btn-danger ml-1'><i class='fas fa-trash-alt'></i></a>";
                $detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
                return $editBtn.$deleteBtn.$detailBtn;
            })
            ->addColumn('proyeksi_revenue', function($query){
                return 'Rp ' . number_format($query->proyeksi_revenue, 0, ".", ".");;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BrandClient $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brandclient-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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
        return 'BrandClient_' . date('YmdHis');
    }
}
