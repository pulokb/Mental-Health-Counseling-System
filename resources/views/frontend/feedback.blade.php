@extends('layouts.frontend')
@section('title','Feedback')
@section('content')
<br>
<div class="container">
    <div class="col-md-6">
        <h3>Feedback Us</h3><br>
        <form class="" data-parsley-validate method="POST" action="{{route('submit.feedback')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name*</label>
                @guest
                <input data-parsley-trigger="change" value="{{old('name')}}" required type="text" class="form-control"
                    id="exampleInputEmail1" name="name" aria-describedby="nameHelp" placeholder="Enter name">
                @else
                <input data-parsley-trigger="change" required type="text" class="form-control" id="exampleInputEmail1"
                    value="{{Auth::user()->name}}" name="name" aria-describedby="nameHelp" placeholder="Enter name">
                @endguest

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address*</label>
                @guest
                <input data-parsley-trigger="change" value="{{old('email')}}" required type="email" class="form-control"
                    id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                @else
                <input data-parsley-trigger="change" required type="email" class="form-control" id="exampleInputEmail1"
                    value="{{Auth::user()->email}}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                @endguest

            </div>
            <div class="form-group">
                Message<small>(optional)</small> <textarea name="message" class="form-control"
                    id="exampleFormControlTextarea1" rows="3">{{old('message')}}</textarea>
                   
            </div>
            <div class="form-group">
                Give Feedback* <br>
                <input required type="radio" name="feedback" value="5"> Very Good<br>
                <input required type="radio" name="feedback" value="4"> Good<br>
                <input required type="radio" name="feedback" value="3"> Ok<br>
                <input required type="radio" name="feedback" value="2"> Bad<br>
                <input required type="radio" name="feedback" value="1"> Very Bad<br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<br>
@endsection