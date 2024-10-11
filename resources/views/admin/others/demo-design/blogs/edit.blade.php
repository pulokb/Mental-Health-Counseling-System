@extends('layouts.admin')
@section('title','Update Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary">Update Blog </h5><br>

            </div>
            <div class="card-body">
                <form data-parsley-validate enctype="multipart/form-data"
                    action="{{route('admin.blogs.update',$blog->id)}}" class="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Title</label>
                        <input autofocus value="{{$blog->title}}" required name="title"
                            type="text" class="form-control is-valid" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea rows="15" required id="details" name="details"
                            class="form-control" placeholder="Enter Email">{!!$blog->details!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <input value="{{$blog->tags}}" name="tags" type="text"
                            class="form-control is-valid" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Posted By</label>
                        <input autofocus value="{{$blog->posted_by}}" name="posted_by"
                            type="text" class="form-control is-valid" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <img src="{{asset('images/'.$blog->image)}}" alt=""> <br>
                        <input name="image" type="file" class="form-control is-valid">
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


@section('script')
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'details', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endsection
