<?php

namespace App\DataTables\Admin\Skill;

use App\Domains\Skill\Models\Skill;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TrashSkillDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user.name', function ($query) {
                return '<h6 class="">' . $query->user->name . '</h6>';
            })
            ->addColumn('action', function ($query) {
                $form = "<form action='" . route('admin.skills.restore', $query->id) . "' method='POST' enctype='multipart/form-data' style='display:inline-block'>";
                $form .= csrf_field();
                $form .= method_field('PUT');

                $form .= "<button type='submit' class='btn btn-primary'><i class='far fa-circle'></i></button>";
                $form .= "</form>";

                $form .= "<form action='" . route('admin.skills.delete', $query->id) . "' method='POST' enctype='multipart/form-data' class='delete-item' style='display:inline-block'>";
                $form .= csrf_field();
                $form .= method_field('DELETE');
                $form .= "<button type='submit' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i></button>";
                $form .= "</form>";

                return $form;
            })
            ->filterColumn('user.name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })
            ->filterColumn('user.name', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->rawColumns(['user.name', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Skill $model): QueryBuilder
    {
        return $model->newQuery()->with('user')->with('role_software')->onlyTrashed();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('trash-skill-table')
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
            Column::make('id')->width(200),
            Column::make('user.name')->width(100),
            Column::make('role_software.name')->width(200)
                ->title('Role Software'),
            Column::make('description'),
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
        return 'Skill_' . date('YmdHis');
    }
}
