<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class UserDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.users.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('status', function ($dataTable) {
                $active = '<div class="mb-2 mr-2 badge badge-success">'.__('Active').'</div>';
                $deactive = '<div class="mb-2 mr-2 badge badge-danger">'.__('Deactive').'</div>';
                return $dataTable->status == 1 ? $active : $deactive;
            })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img src='" . asset('images/avatar-' . $dataTable->image) . "'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['action', 'image', 'status']);
    }

    public function query(User $model)
    {
        return $model->newQuery()->role('user');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign('User','user-delete'));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            // 'Sl',
            ['data'=>'name','title'=>__('Name')],
            ['data'=>'email','title'=>__('Email')],
            ['data'=>'phone','title'=>__('Phone')],
            ['data'=>'address','title'=>__('Address')],
            ['data'=>'age','title'=>__('Age')],
            ['data'=>'gender','title'=>__('Gender')],
            ['data'=>'occupation','title'=>__('Occupation')],
            ['data'=>'status','title'=>__('Status')],
            // 'image'
        ];
    }

    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
