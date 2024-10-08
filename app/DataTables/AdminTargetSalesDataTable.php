<?php

namespace App\DataTables;

use App\Models\TargetSales;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminTargetSalesDataTable extends DataTable
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
                // $editBtn = "<a href='".route('sales.target-sales.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.target-sales.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $deleteBtn;
            })
            ->addColumn('target', function($query){
                return 'Rp ' . number_format($query->target, 0, ".", ".");
            })
            ->addColumn('realisasi', function($query){
                return 'Rp ' . number_format($query->realisasi, 0, ".", ".");
            })
            ->addColumn('selisih_varian', function($query){
                return 'Rp ' . number_format($query->selisih_varian, 0, ".", ".");
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TargetSales $model): QueryBuilder
    {
        $user = auth()->user();

        // Get the selected month and year from the request
        $selectedMonth = request()->get('month');
        $selectedYear = request()->get('year');

        return $model->newQuery()
            ->select(
                'target_sales.id',
                'users.team as tim',
                'users.name as nama',
                'users.title as jabatan',
                DB::raw('COALESCE(target_sales.target_sales, 0) as target'),
                DB::raw('COALESCE(SUM(brand_clients.realisasi_revenue), 0) as realisasi'),
                //DB::raw('COALESCE(target_sales.target_sales, 0) - COALESCE(SUM(brand_clients.realisasi_revenue), 0) as selisih_varian')
                DB::raw('COALESCE(SUM(brand_clients.realisasi_revenue), 0) - COALESCE(target_sales.target_sales, 0) as selisih_varian')
            )
            ->rightJoin('users', 'target_sales.user_sales_id', '=', 'users.id')
            ->leftJoin('brand_clients', function($join) use ($selectedMonth, $selectedYear) {
                $join->on('brand_clients.pic_ntv_id', '=', 'users.id')
                    ->whereYear('brand_clients.created_at', $selectedYear)
                    ->whereMonth('brand_clients.created_at', $selectedMonth);
            })
            ->where('target_sales.year', $selectedYear)
            ->where('target_sales.month', $selectedMonth)
            ->groupBy('target_sales.id', 'users.team', 'users.name', 'users.title', 'target_sales.target_sales');
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('admintargetsales-table')
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
            Column::make('id')->title('ID'),
            Column::make('tim')->title('Team'),
            Column::make('nama')->title('Nama'),
            Column::make('jabatan')->title('Jabatan'),
            Column::make('realisasi')->title('Realisasi'),
            Column::make('target')->title('Target'),
            Column::make('selisih_varian')->title('Selisih/Varian'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AdminTargetSales_' . date('YmdHis');
    }
}
