<?php

namespace App\DataTables\User\Project;

use App\Domains\Project\Models\Project;
use App\Enum\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('cover_image', function ($query) {
                return '<img src="' . $query->cover_image . '" style="width: 120px; height: 80px; object-fit:cover" alt="icon">';
            })
            ->addColumn('name', function ($query) {
                return '<h6 class="">' . $query->name . '</h6>';
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
                $editBtn = "<a href='" . route('user.projects.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('user.projects.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreBtn =
                    '<div class="dropdown dropleft d-inline">
                        <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="' . route('user.projects.galleries.index', $query->id) . '"><i class="far fa-heart"></i> Image Gallery</a>
                        <a class="dropdown-item has-icon" href="' . route('user.projects.features.index', $query->id) . '"><i class="far fa-file"></i> Feature</a>
                        <a class="dropdown-item has-icon" href="' . route('user.projects.projectTechnologies.index', $query->id) . '"><i class="far fa-file"></i> Technology</a>
                        <a class="dropdown-item has-icon" href="' . route('user.projects.links.index', $query->id) . '"><i class="far fa-file"></i> Link</a>
                        </div>
                    </div>';
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })

            ->rawColumns(['cover_image', 'name', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Project $model): QueryBuilder
    {
        return $model->newQuery()->with('category')->where('user_id', Auth::id());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('project-table')
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
            Column::make('cover_image'),
            Column::make('name'),
            Column::make('category.name')
                ->title('Category'),
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
        return 'Project_' . date('YmdHis');
    }
}
