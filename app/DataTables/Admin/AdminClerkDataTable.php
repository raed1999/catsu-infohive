<?php

namespace App\DataTables\Admin;

use App\Constants\Role;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminClerkDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', function ($query) {
                if (!$query->deleted_at) {
                    $status = "<span class='badge bg-primary rounded-pill'>Enabled</span>";
                }

                if ($query->deleted_at) {
                    $status = "<span class='badge bg-danger rounded-pill'>Disabled</span>";
                }

                return  $status;
            })
            ->addColumn('action', function ($query) {

                $viewButton = "<a href='" . route('admin.manage-clerk.show', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='View Details' class='btn btn-sm btn-primary text-light me-2'><i class='bx bx-show'></i></a>";

                return  $viewButton;
            })
            ->orderColumn('status', '-deleted_at $1')
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Faculty $model): QueryBuilder
    {
        return $model
            ->with(['college'])
            ->where('usertype_id', Role::CLERK)
            ->where('college_id', '<>', Auth::user()->college_id)
            ->withTrashed()
            ->select('faculties.*');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('clerks-table')
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
                    [4, 'asc'],
                    [1, 'asc']
                ],
                'stateSave' => 'true'
            ])->ajax([
                'ajax' => route('admin.manage-clerk.index')
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
            Column::make('first_name'),
            Column::make('middle_name'),
            Column::make('last_name'),
            Column::make(['title' => 'College', 'data' => 'college.acroname'])
                ->addClass('text-center'),
            Column::make('created_at')
                ->addClass('text-center'),
            Column::make('status')
                ->searchable(false)
                ->addClass('text-center'),
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
        return 'InfoHive_Clerks_Information' . date('YmdHis');
    }
}
