<?php

namespace App\DataTables\User;

use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;
use App\Enum\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserTechnologyDataTable extends DataTable
{
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
                $editBtn = "<a href='" . route('user.userTechnologies.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('user.userTechnologies.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->filterColumn('technology.name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })

            ->rawColumns(['technology.image', 'technology.name', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserTechnologies $model): QueryBuilder
    {
        return $model->newQuery()->with('technology')->where('user_id', Auth::user()->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('usertechnologies-table')
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
        return 'Technology_' . date('YmdHis');
    }
}
