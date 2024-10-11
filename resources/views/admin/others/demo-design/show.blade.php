@extends('layouts.admin')
@section('title','View Admin')
@section('content')
@include('includes.page_header',['title'=>'View Admin','url'=>route('admin.admins.index'),'icon' =>
'pe-7s-user'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form id="add-account" class="form-group" action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input disabled value="{{$admin->name}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input disabled value="{{$admin->email}}" type="email" class="form-control" name="email">
                    </div>
                    <div class="form-footer pt-4 pt-2 mt-4 border-top">
                        <a href="{{route('admin.admins.index')}}" class="btn btn-info">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                            {{ __('Back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
