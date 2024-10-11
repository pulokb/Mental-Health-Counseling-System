<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\LoginActivity;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class UserLoginActivityDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addIndexColumn()
            ->addColumn('Sl', '')
            ->addColumn('', '')
            ->addColumn('user', function ($dataTable) {
                return $dataTable->user->name;
            })
            ->addColumn('last_login', function ($dataTable) {
                $dateTime = date('d/M/Y h:i a', strtotime($dataTable->updated_at));
                $difference = $dataTable->updated_at->diffForHumans();
                return $dateTime . " (" . $difference . ")";
            })
            ->addColumn('action', function ($dataTable) {
                return view('admin.activity_logs.datatables_actions', compact('dataTable'));
            })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img src='" . asset('images/avatar-' . $dataTable->image) . "'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['action', 'image', 'status']);
    }

    public function query(LoginActivity $model)
    {
        // return $model->newQuery()->role('user')->latest();
        $userIds = User::role('user')->pluck('id');
        return $model->newQuery()->whereIn('user_id', $userIds)->with('user');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("LoginActivity", "log-activity-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'user','title'=>__('User')],
            ['data'=>'user_agent','title'=>__('User agent')],
            ['data'=>'ip_address','title'=>__('Ip address')],
            ['data'=>'last_login','title'=>__('Last login')]
            // 'image'
        ];
    }

    protected function filename()
    {
        return 'user_login_activity_datatable_' . time();
    }
}
