@extends('layouts.admin')
@section('title'){{ __('Page') }} @endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="{{$icon??'pe-7s-album'}} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Page') }}</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
            <form id="settingsForm" method="POST" action="{{ route('admin.frontendCMS.pageUpdate',$frontendPage->id) }}" enctype="multipart/form-data">
                @csrf
            <div class="main-card mb-3 card">
                <div class="card-header"> <span class="text-primary"> "{{str_replace('_',' ',$frontendPage->name)}}" {{ __('Page Content') }} </span> </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$frontendPage->content}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>{{ __('Update') }}</span>
                </button>
            </div>
        </form>
        </div>
</div>

@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endsection

