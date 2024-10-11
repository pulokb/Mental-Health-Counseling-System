<?php

namespace App\DataTables;

use App\Helpers\AdminHelper;

use App\Models\ContactFeedback;
use App\Models\FrontendPage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Str;

class FrontendPageDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('action', function ($dataTable) {
                if (auth()->user()->can('Page-update')) {

                    return '<a class="btn btn-sm btn-primary" href="' . route('admin.frontendCMS.pageEdit', $dataTable->id) . '" >'.__('Edit').'</a>';
                } else {
                    return __('No action permit');
                }
            })
            ->addColumn('Sl', '')
            ->addColumn('name', function ($dataTable) {
                return  $dataTable->name; // ucfirst(str_replace('_', ' ', $dataTable->name));
            })
            ->addColumn('content', function ($dataTable) {
                return Str::limit($dataTable->content, 50);
            })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img src='".asset('images/'.$dataTable->image)."'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['content', 'action', 'image', 'file']);
    }

    public function query(FrontendPage $model)
    {
        return $model->newQuery();
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
            ['data'=>'name','title'=>__('Name')],
            ['data'=>'content','title'=>__('Content')],
        ];
    }

    protected function filename()
    {
        return 'contacts_datatable_' . time();
    }
}
