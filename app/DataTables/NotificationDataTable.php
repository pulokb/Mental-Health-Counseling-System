<?php

namespace App\DataTables;

use App\Models\Notification;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class NotificationDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', function ($dataTable) {
            return view('admin.notifications.datatables_actions', compact('dataTable'));
        })
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '');
        // ->addColumn('details',function($dataTable){
        //     return Str::limit($dataTable->details,50);
        // })
        // ->addColumn('image', function ($dataTable) {
        //     return "<img width='100px' height='80px' src='".asset('images/'.$dataTable->image)."'/>";
        // })
        // ->addColumn('file',function($dataTable){
        //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
        // })
        // ->rawColumns(['details', 'action', 'image', 'file']);
    }

    public function query(Notification $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Notification", "Notification-delete"));
    }

    protected function getColumns()
    {
        return [
            '', 'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'title','title'=>__('Title')],
            ['data'=>'description','title'=>__('Description')],
            // 'link',
            // 'read_status',
            // 'user_id'
        ];
    }

    protected function filename()
    {
        return 'notifications_datatable_' . time();
    }
}
