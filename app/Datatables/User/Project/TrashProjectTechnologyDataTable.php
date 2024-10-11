<?php

namespace App\DataTables\User\Project;

use App\Domains\Project\Models\Project;
use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;
use App\Enum\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TrashProjectTechnologyDataTable extends DataTable
{
    private Project $project;
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('technology.image', function ($query) {
                return '<img src="' . $query->technology->image . '" style="width: 40px; height: 40px;" alt="icon">';
            })
            ->addColumn('technology.name', function ($query) {
                return '<h6 class="">' . $query->technology->name . '</h6>';
            })
            ->addColumn('action', function ($query) {
                $form = "<form action='" . route('user.project-technologies.restore', [$this->project, $query->id]) . "' method='POST' enctype='multipart/form-data' style='display:inline-block'>";
                $form .= csrf_field();
                $form .= method_field('PUT');

                $form .= "<button type='submit' class='btn btn-primary'><i class='far fa-circle'></i></button>";
                $form .= "</form>";

                $form .= "<form action='" . route('user.project-technologies.delete', [$this->project, $query->id]) . "' method='POST' enctype='multipart/form-data' class='delete-item' style='display:inline-block'>";
                $form .= csrf_field();
                $form .= method_field('DELETE');
                $form .= "<button type='submit' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i></button>";
                $form .= "</form>";

                return $form;
            })
            ->filterColumn('technology.name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })

            ->rawColumns(['technology.image', 'technology.name', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProjectTechnologies $model): QueryBuilder
    {
        return $model->newQuery()->with('technology')->where('project_id', $this->project->id)->onlyTrashed();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('trash-project-technologies-table')
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
            Column::make('technology.image')
                ->title('Icon'),
            Column::make('technology.name')
                ->title('Technology'),
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
        return 'Technology_' . date('YmdHis');
    }
}
