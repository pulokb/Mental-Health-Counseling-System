@extends('layouts.admin')
@section('title','Create New Admin')
@section('content')
@include('includes.page_header',['title'=>'Create Admin','url'=>route('admin.admins.index'),'icon' =>
'pe-7s-user'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('admin.admins.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input value="{{old('name')}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="{{old('email')}}" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-footer pt-4 pt-2 mt-4 border-top">
                        <button type="submit" class="btn btn-primary">
                             <i class="fas fa-plus-circle"></i> Submit
                        </button>
                        <button type="submit" class="btn btn-danger">
                             <i class="fa fa-window-close" aria-hidden="true"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection