<?php

namespace App\DataTables\Admin\User;

use App\Domains\User\Models\User;
use App\Enum\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('avatar', function ($query) {
                return '<img src="' . ($query->profile->avatar ? $query->profile->avatar : asset('images/avatar_default.jpg')) . '" style="width: 40px; height: 40px; border-radius:20px" alt="icon">';
            })
            ->addColumn('name', function ($query) {
                return '<h6 class="">' . $query->name . '</h6>';
            })
            ->addColumn('profile.role_software.name', function ($query) {
                return optional($query->profile->role_software)->name ?? 'No Role';
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
                $editBtn = "<a href='" . route('admin.users.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                return $editBtn;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            })

            ->rawColumns(['avatar', 'name', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with('profile', function ($query) {
            $query->with('role_software');
        })->where('role', '===', 'user');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
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
            Column::make('avatar'),
            Column::make('name'),
            Column::make('email'),
            Column::make('profile.role_software.name')
                ->title('Role Software'),
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
        return 'User_' . date('YmdHis');
    }
}
