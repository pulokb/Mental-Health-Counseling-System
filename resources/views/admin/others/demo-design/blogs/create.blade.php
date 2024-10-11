@extends('layouts.admin')
@section('title','Create New Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary">Create New Blog </h5><br>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('admin.blogs.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title*</label>
                        <input value="{{old('title')}}" required name="title" type="text" class="form-control "
                            placeholder="Enter Title...">
                    </div>
                    <div class="form-group">
                        <label>Details*</label>
                        <textarea id="editor" rows="30" required name="details" class="form-control"
                            placeholder="Blog Details">{{old('details')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <input value="{{old('tags')}}" name="tags" type="text" class="form-control "
                            placeholder="Enter Tags...">
                    </div>
                    <div class="form-group">
                        <label>Posted By</label>
                        <input value="{{old('posted_by')}}" name="posted_by" type="text" class="form-control "
                            placeholder="Enter name by whom it will be posted...">
                    </div>

                    <div class="form-group">
                        <label>Image*</label>
                        <input required name="image" type="file" class="form-control ">
                    </div>
                    <div class="form-footer pt-4 pt-2 mt-4 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class=" mdi mdi-checkbox-marked-outline mr-1"></i> {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@include('includes.ckeditor')
