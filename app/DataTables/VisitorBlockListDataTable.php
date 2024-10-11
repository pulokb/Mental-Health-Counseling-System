<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\LoginActivity;
use App\Models\User;
use App\Models\VisitorInfo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class VisitorBlockListDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addIndexColumn()
            ->addColumn('Sl', '')
            ->addColumn('', '')
            ->addColumn('last_visit', function ($dataTable) {
                $dateTime = date('d/M/Y h:i a', strtotime($dataTable->updated_at));
                $difference = $dataTable->updated_at->diffForHumans();
                return $dateTime . " (" . $difference . ")";
            })
            ->addColumn('action', function ($dataTable) {
                return view('admin.visitor_infos.visitor_blocklist_datatables_actions', compact('dataTable'));
            })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img src='" . asset('images/avatar-' . $dataTable->image) . "'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['action', 'image', 'status']);
    }

    public function query(VisitorInfo $model)
    {
        return $model->newQuery()->where('status', 0);
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("", ""));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'user_agent','title'=>__('User agent')],
            ['data'=>'ip_address','title'=>__('Ip address')],
            ['data'=>'count','title'=>__('Count')],
            ['data'=>'last_visit','title'=>__('Last visit')]
            // 'image'
        ];
    }

    protected function filename()
    {
        return 'visitor_datatable_' . time();
    }
}
