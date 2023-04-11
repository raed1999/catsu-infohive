<?php

namespace App\DataTables;

use App\Constants\Role;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClerksDataTable extends DataTable
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

                $viewButton = "<a href='" . route('dean.manage-clerk.show', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='View Details' class='btn btn-sm btn-primary text-light me-2'><i class='bx bx-show'></i></a>";
                $editButton = "<a href='" . route('dean.manage-clerk.edit', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit' class='btn btn-sm btn-warning text-light'><i class='bi bi-pencil'></i></a>";

                return  $viewButton . $editButton;
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
            ->where('usertype_id', Role::CLERK)
            ->where('college_id', session('user')->college_id)
            ->with(['college'])
            ->withTrashed()
            ->select('faculties.*');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('deans-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            /*   ->dom('Bfrtip') */
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                /*  Button::make('reset'), */
                /*  Button::make('reload') */
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
            Column::make('updated_at')
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
