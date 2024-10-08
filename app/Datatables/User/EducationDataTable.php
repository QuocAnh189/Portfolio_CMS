<?php

namespace App\DataTables\User;

use App\Domains\Education\Models\Education;
use App\Enum\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EducationDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('logo', function ($query) {
                return '<img src="' . $query->logo . '" style="width: 40px; height: 40px;" alt="icon">';
            })
            ->addColumn('university_name', function ($query) {
                return '<h6 class="">' . $query->university_name . '</h6>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === Status::Active->value) {
                    $button =
                        '<label class="custom-switch mt-2">
                            <input type="checkbox" checked name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status" >
                            <span class="custom-switch-indicator"></span>
                        </label>';
                }
                if ($query->status === Status::Inactive->value) {
                    $button =
                        '<label class="custom-switch mt-2">
                            <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
                            <span class="custom-switch-indicator"></span>
                        </label>';
                }

                return $button;
            })
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('user.education.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('user.education.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })

            ->rawColumns(['logo', 'university_name', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Education $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', Auth::id());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('education-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(300),
            Column::make('logo'),
            Column::make('university_name'),
            Column::make('gpa'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Education_' . date('YmdHis');
    }
}
