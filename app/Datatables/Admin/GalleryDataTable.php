<?php

namespace App\DataTables\Admin;

use App\Domains\Project\Models\Project;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Enum\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class GalleryDataTable extends DataTable
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
            ->addColumn('project.name', function ($query) {
                return '<h6 class="">' . $query->project->name . '</h6>';
            })
            ->addColumn('image', function ($query) {
                return "<img width='200px' src='" . asset($query->image) . "' ></img>";
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
                $deleteBtn = "<a href='" . route('admin.galleries.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $deleteBtn;
            })
            ->rawColumns(['project.name', 'image', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProjectGallery $model): QueryBuilder
    {
        return $model->newQuery()->with('project');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('gallery-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
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
            Column::make('project.name')
                ->title('Project'),
            Column::make('image'),
            Column::make('status'),
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
        return 'ProductImageGallery_' . date('YmdHis');
    }
}
