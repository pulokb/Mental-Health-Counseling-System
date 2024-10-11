<?php

namespace App\DataTables;

use App\Models\DoctorFeedback;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class DoctorFeedbackDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.doctor_feedbacks.datatables_actions')
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

    public function query(DoctorFeedback $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("DoctorFeedback","DoctorFeedback-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'user_name',         // New field
            'age',               // New field
            'gender',            // New field
            'occupation',        // New field
            'overall_result',    // New field
            'status',
            'educational',       // New field
            'family',            // New field
            'relationship',      // New field
            'job',               // New field
            'general',           // New field
            'message',           // New field (nullable)
            'symptoms',
            'suggestions',
            'note'
        ];
    }

    protected function filename()
    {
        return 'doctor_feedbacks_datatable_' . time();
    }
}
