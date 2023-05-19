<?php

namespace App\DataTables\Clerk;

use App\Constants\Role;
use App\Models\Research;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClerkResearchDataTable extends DataTable
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
            ->addColumn('adviser', function ($query) {
                return $query->adviser->first_name . ' ' . $query->adviser->middle_name[0] . ' ' . $query->adviser->last_name;
            })
            ->addColumn('facultyInCharge', function ($query) {
                return $query->facultyInCharge->first_name . ' ' . $query->facultyInCharge->middle_name[0] . ' ' . $query->facultyInCharge->last_name;
            })
            ->addColumn('action', function ($query) {
                $view = "<a href='" . "'  data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='View Details' class='btn btn-sm btn-primary text-light me-2'><i class='bx bx-show'></i></a>";
                if ($query->confirmed_by_id) {
                    $status = "<a href='" . route('clerk.manage-research.update', $query->id) . "'  data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Confirmed' class='btn btn-sm btn-success text-light me-2 show-undo-confirmation'><i class='ri-check-line'></i></a>";
                } else {
                    $status = "<a href='" . route('clerk.manage-research.update', $query->id) . "' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Not confirmed. Click to confirm' class='btn btn-sm btn-danger show-confirmation text-light me-2'  ><i class='ri-close-line' data-confirm-delete='true'></i></a>";
                };
                return $status . $view;
            })->filterColumn('authors', function ($query, $keyword) {
                $query->whereHas('authors', function ($q) use ($keyword) {
                    $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('adviser', function ($query, $keyword) {
                $query->whereHas('adviser', function ($q) use ($keyword) {
                    $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('facultyInCharge', function ($query, $keyword) {
                $query->whereHas('facultyInCharge', function ($q) use ($keyword) {
                    $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->orderColumn('action', '-confirmed_by_id $1')
            ->addIndexColumn()
            ->rawColumns(['action', 'authors'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Research $model): QueryBuilder
    {
        return $model
            ->with(['authors', 'adviser', 'facultyInCharge'])
            ->whereHas('authors.program.college', function ($query) {
                $query->where('id', Auth::user()->college_id);
            })
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
                    [1,'asc'],
                    [2,'desc']
                ]
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
            Column::make('title','Title')
                ->searchable()
                ->orderable(true)
                ->addClass(''),
            Column::make('year','Year')
                ->addClass(''),
            Column::make(['title' => 'Authors', 'data' => 'authors'])
                ->addClass('')
                ->orderable(false),
            Column::make(['title' => 'Adviser', 'data' => 'adviser'])
                ->addClass('')
                ->orderable(false),
            Column::make(['title' => 'Faculty In Charge', 'data' => 'facultyInCharge'])
                ->addClass('')
                ->orderable(false),
            Column::make('created_at','Created At')
                ->addClass('')
                ->orderable(true),
            Column::computed('action', 'Action')
                ->addClass('text-center')
                ->orderable(),
            /*       Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'), */
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
