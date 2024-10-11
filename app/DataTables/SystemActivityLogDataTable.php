<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\LoginActivity;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;
use Spatie\Activitylog\Models\Activity;

class SystemActivityLogDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addIndexColumn()
            ->addColumn('Sl', '')
            ->addColumn('', '')
            ->addColumn('description', function ($dataTable) {
                return ucfirst($dataTable->description);
            })
            ->addColumn('subject', function ($dataTable) {
                return $dataTable->subject_type;
            })
            ->addColumn('subject_id', function ($dataTable) {
                return $dataTable->subject_id;
            })
            ->addColumn('causer', function ($dataTable) {
                return $dataTable->causer_type;
            })
            ->addColumn('causer_id', function ($dataTable) {
                return $dataTable->causer_id;
            })
            ->addColumn('time', function ($dataTable) {
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

    public function query(Activity $model)
    {
        // return Activity::all();
        return $model->newQuery();
        // $userIds = User::role('user')->pluck('id');
        // return $model->newQuery()->whereIn('user_id',$userIds)->with('user')->latest();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Activity", "log-activity-delete", "admin.systemActivityLog.deleteBySelection"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'description','title'=>__('Description')],
            ['data'=>'subject','title'=>__('Subject')],
            ['data'=>'subject_id','title'=>__('Subject Id')],
            ['data'=>'causer','title'=>__('Causer')],
            ['data'=>'causer_id','title'=>__('Causer Id')],
            ['data'=>'time','title'=>__('Time')]
            // 'image'
        ];
    }

    protected function filename()
    {
        return 'system_log_activity_datatable_' . time();
    }
}
