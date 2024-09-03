<?php

namespace App\DataTables;

use App\Models\ManagerProposalSurat;
use App\Models\ProposalSurat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManagerProposalSuratDataTable extends DataTable
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
                $editBtn = "<a href='".route('manager.proposal-surat.edit', $query->id)."' class='btn btn-info'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('manager.proposal-surat.destroy', $query->id)."' class='btn btn-danger ml-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
                //$detailBtn = "<a href='#' class='btn btn-dark ml-1' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa fa-eye'></i></a>";
                return $editBtn.$deleteBtn;
            })
            ->addColumn('status_follow_up', function($query){
                $belumDikirim = "<i class='badge badge-danger'>Belum Dikirim</i>";
                $sudahDikirim = "<i class='badge badge-success'>Sudah Dikirim</i>";
                if($query->status_follow_up == 1){
                    return $sudahDikirim;
                } else {
                    return $belumDikirim;
                };
            })
            ->addColumn('tanggal_dibuat', function($query){
                return date('d F Y', strtotime($query->created_at));
            })->addColumn('user_name', function($query){
                return $query->userName->name ?? 'N/A';
            })
            ->rawColumns(['action','status_follow_up'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProposalSurat $model): QueryBuilder
    {
        // Get the currently authenticated user's team
        $userTeam = auth()->user()->team;

        $query = $model->newQuery()->where('user_team', $userTeam);

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
                    ->setTableId('managerproposalsurat-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('manager.proposal-surat.data'))
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
            Column::make('user_name')->title('Tim yang Bertugas'),
            Column::make('no_surat'),
            Column::make('tujuan_surat'),
            Column::make('perihal'),
            Column::make('status_follow_up'),
            Column::make('tanggal_dibuat'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ManagerProposalSurat_' . date('YmdHis');
    }
}
