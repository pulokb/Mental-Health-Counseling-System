@extends('layouts.admin')
@section('title','Manage Admin')
@section('content')
@include('includes.page_header_index',['title'=>'Admin','url'=>route('admin.admins.create'),'icon' =>
'pe-7s-user'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-hover table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>

                                <td>
                                    <div class='btn-group'>
                                        <a class="btn btn-sm btn-primary" href="{{route('admin.admins.show',$admin->id)}}"> View</a>


                                        <a class="btn btn-sm btn-info" href="{{route('admin.admins.edit',$admin->id)}}">
                                                Edit</a>

                                        <a class="btn btn-danger btn-sm" href="#"
                                            onclick="if (confirm('{{ __('Are you sure to delete') }} ?')){document.getElementById('delete-form-{{$admin->id}}').submit();}else{event.preventDefault()}">
                                            Delete</a>
                                        <form id="delete-form-{{$admin->id}}"
                                            action="{{ route('admin.admins.destroy',$admin->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td>No Data Found</td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
