<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\ContactFeedback;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class ContactDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.contact_feedbacks.datatables_actions')
            ->addIndexColumn()
            ->addColumn('Sl', '')
            ->addColumn('', '')
            ->addColumn('message', function ($dataTable) {
                return Str::limit($dataTable->message, 50);
            });
        // ->addColumn('image', function ($dataTable) {
        //     return "<img src='".asset('images/'.$dataTable->image)."'/>";
        // })
        // ->addColumn('file',function($dataTable){
        //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
        // })
        // ->rawColumns(['details', 'action', 'image', 'file']);
    }

    public function query(ContactFeedback $model)
    {
        return $model->newQuery()->whereNotNull('phone');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("ContactFeedback", "contact-feedback-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            ['data'=>'name','title'=>__('Name')],
            ['data'=>'email','title'=>__('Email')],
            ['data'=>'phone','title'=>__('Phone')],
            ['data'=>'message','title'=>__('Message')],
        ];
    }

    protected function filename()
    {
        return 'contacts_datatable_' . time();
    }
}
