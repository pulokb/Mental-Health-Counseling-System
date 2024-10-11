@push('css')
@include('includes.datatable_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-hover','id'=>'data-table']) !!}

@section('script')
@include('includes.datatable_js')

    {!! $dataTable->scripts() !!}
    
@include('includes.ajax_setup')
@include('includes.ajax_delete',['url'=>'contact-feedback-delete'])
@endsection