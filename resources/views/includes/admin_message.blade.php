<div class="row justify-content-center">
    <div class="col-md-10">
        @if(count($errors)>0)
        <br>
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$error}}
        </div>
        @endforeach
        @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        @if(session('success'))
        <br>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! session('success')!!}
        </div>
        @php
        Session::forget('success');
        @endphp
        @endif

        @if(session('error'))
        <br>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!!session('error')!!}
        </div>
        @php
        Session::forget('error');
        @endphp
        @endif

    </div>
</div>