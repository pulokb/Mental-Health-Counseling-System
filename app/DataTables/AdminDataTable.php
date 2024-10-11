<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class AdminDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.admins.datatables_actions')
            ->addIndexColumn()
            ->addColumn('Sl', '')
            ->addColumn('', '')
            ->addColumn('role', function ($dataTable) {
                $roles = "";
                foreach ($dataTable->roles as $role) {
                    $roles .= "<span class='badge badge-info mr-1'>" . $role->name . " </span>";
                }
                return $roles;
            })
            // ->addColumn('details',function($dataTable){
            //     return Str::limit($dataTable->details,50);
            // })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img src='".asset('images/'.$dataTable->image)."'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['role', 'action', 'image', 'file']);
    }

    public function query(User $model)
    {
        $role = Role::whereNotIn('name', ['user', 'super-admin'])->pluck('name');
        return $model->newQuery()->role($role)->with('roles');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title'=>__('Action')])
            ->parameters(AdminHelper::datatableDesign("User","admin-delete","admin.admins.deleteBySelection"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'name','title'=>__('Name')],
            ['data'=>'email','title'=>__('Email')],
            ['data'=>'role','title'=>__('Role')]
        ];
    }

    protected function filename()
    {
        return 'admins_datatable_' . time();
    }
}
