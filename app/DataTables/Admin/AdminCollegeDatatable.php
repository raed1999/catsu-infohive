<?php

namespace App\DataTables\Admin;

use App\Models\College;
use App\Models\Program;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminCollegeDatatable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {

                $editButton = "<a href='" . route('admin.manage-college.edit', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Edit' class='btn btn-sm btn-warning text-light'><i class='bi bi-pencil'></i></a>";

                return   $editButton;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(College $model): QueryBuilder
    {
        return $model->where('acroname', '<>', 'ITS')
            ->select('colleges.*');

    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('programs-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            /*   ->dom('Bfrtip') */
            ->orderBy(1)
            ->responsive(true)
            ->addTableClass('compact no-wrap')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                /*  Button::make('reset'), */
                /*  Button::make('reload') */
            ])->parameters([
                'order' => [
                    [1, 'asc'],
                    [2, 'desc']
                ],
                'stateSave' => 'true'
            ])->ajax([
                'ajax' => route('admin.manage-college.index')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make(['title' => 'No', 'data' => 'DT_RowIndex'])
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center'),
            Column::make(['title' => 'Code', 'data' => 'acroname']),
            Column::make(['title' => 'College', 'data' => 'name']),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'InfoHive_Programs_Information' . date('YmdHis');
    }
}
