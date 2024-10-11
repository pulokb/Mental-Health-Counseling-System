@extends('layouts.admin')
@section('title','View Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary">View Blog </h5><br>
            
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="#" class="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Title</label>
                        <input disabled autofocus value="{{$blog->title}}" name="title" type="text"
                            class="form-control is-valid" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <p>{!!$blog->details!!}</p>
                        <div class="form-group">
                            <label>Tags</label>
                            <input disabled value="{{$blog->tags}}" name="tags" type="text"
                                class="form-control is-valid" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Posted By</label>
                            <input disabled autofocus value="{{$blog->posted_by}}" name="posted_by" type="text"
                                class="form-control is-valid" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Image</label><br>
                            <img src="{{asset('images/'.$blog->image)}}" alt=""> <br>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection