@extends('layouts.admin')
@section('title','Manage Users')
@section('content')
@include('includes.datatable_css')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> Users</div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{ route('admin.users.create') }}" class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-plus-circle fa-w-20"></i>
                    </span>
                    Create New User
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            {{-- <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h5 class="card-title text-primary">Manage Users </h5><br>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-hover table-striped" class="display"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th> SL. </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> About </th>
                                <th> Phone </th>
                                <th> Address </th>
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
@include('includes.ajax_delete',['url'=>'users'])
<script>
    $(document).ready(function () {
        var dataTable = $('#data-table').DataTable({
            "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
            "pageLength": 20,
            'dom' : 'Bfrtip',
            'buttons' : ['copy', 'csv', 'excel', 'print', 'reset'],
        //    "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.users.index') }}',
            columns: [
               {data: 'Sl', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'about', name: 'about'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action',orderable: false, searchable: false},
            ],
            order: [0,'desc']
        });
    });
</script>
@endsection