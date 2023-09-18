<?php

namespace App\DataTables\Admin;

use App\Models\Research;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminResearchDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('title', function ($query) {
                return str()->limit($query->title, 30);
            })
            ->addColumn('authors', function ($query) {
                return view('livewire.research.authors', ['authors' => $query->authors]);
            })
            ->addColumn('college', function ($query) {
                return $query->authors->first(function ($author) {
                    return $author->program && $author->program->college;
                })->program->college->acroname ?? '';
            })
            ->addColumn('confirmedBy', function ($query) {

                if (!$query->confirmedBy) {
                    return "<span class='badge bg-warning rounded-pill text-dark'>Not confirmed</span>";
                }

                return "<span class='badge bg-success rounded-pill'>" . $query->confirmedBy->first_name . ' ' . $query->confirmedBy->last_name . "</span>";
            })
            ->addColumn('action', function ($query) {

                $view = "<a href='" . route('admin.manage-research.show', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='View Details' class='btn btn-sm btn-primary text-light me-2'><i class='bx bx-show'></i></a>";

                return  $view;
            })->filterColumn('authors', function ($query, $keyword) {
                $query->whereHas('authors', function ($q) use ($keyword) {
                    $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('college', function ($query, $keyword) {
                $query->whereHas('authors.program.college', function ($q) use ($keyword) {
                    $q->where('acroname', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('confirmedBy', function ($query, $keyword) {
                $query->whereHas('confirmedBy', function ($q) use ($keyword) {
                    $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->orderColumn('confirmedBy', '-confirmed_by_id $1')
            ->addIndexColumn()
            ->rawColumns(['action', 'authors', 'confirmedBy'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Research $model): QueryBuilder
    {
        return $model
            ->with(['authors', 'adviser', 'confirmedBy', 'facultyInCharge', 'authors.program.college'])
            ->select('research.*');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('research-table')
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
                'ajax' => route('admin.manage-research.index')
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
            Column::make('title', 'Title')
                ->searchable()
                ->orderable(true)
                ->addClass(''),
            Column::make('year', 'Year')
                ->addClass(''),
            Column::make(['title' => 'Authors', 'data' => 'authors'])
                ->addClass('')
                ->orderable(false),
            Column::make(['title' => 'College', 'data' => 'college'])
                ->addClass('')
                ->orderable(false),
            Column::make(['title' => 'Created At', 'data' => 'created_at'])
                ->addClass('')
                ->orderable(true),
            Column::make(['title' => 'Confirmed By', 'data' => 'confirmedBy'])
                ->addClass('text-center')
                ->orderable(true),
            Column::computed('action', 'Action')
                ->addClass('text-center')
                ->orderable(),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'InfoHive_Students_Information' . date('YmdHis');
    }
}
