@extends('layouts.admin')
@section('title','Manage Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary">Manage Blog </h5><br>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th> SL. </th>
                                <th> Title </th>
                                <th> Details </th>
                                <th> Tags </th>
                                <th> Posted By </th>
                                <th> Image </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@include('includes.datatable_js')
@include('includes.ajax_setup')
@include('includes.ajax_delete',['url'=>'blogs'])
<script>
    $(document).ready(function () {
        var dataTable = $('#data-table').DataTable({
            "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
            "pageLength": 20,
           "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.blogs.index') }}',
            columns: [
               {data: 'Sl', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'details', name: 'details'},
            {data: 'tags', name: 'tags'},
            {data: 'posted_by', name: 'posted_by'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action',orderable: false, searchable: false},
            ],
            order: [0,'desc']
        });
    });
</script>
@endsection