<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('Email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('Phone Number')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('Address')) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', __('Age')) !!}
    {!! Form::number('age', null, ['class' => 'form-control', 'min' => 1, 'max' => 120]) !!}
</div>

<!-- Gender Field (Radio Buttons) -->
<div class="form-group">
    {!! Form::label('gender', __('Gender')) !!}
    <div class="form-check">
        {!! Form::radio('gender', 'male', true, ['class' => 'form-check-input']) !!}
        {!! Form::label('male', __('Male'), ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::radio('gender', 'female', false, ['class' => 'form-check-input']) !!}
        {!! Form::label('female', __('Female'), ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::radio('gender', 'other', false, ['class' => 'form-check-input']) !!}
        {!! Form::label('other', __('Other'), ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Occupation Field -->
<div class="form-group">
    {!! Form::label('occupation', __('Occupation')) !!}
    {!! Form::text('occupation', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Profile Image Field -->
<div class="form-group">
    {!! Form::label('image', __('Profile Image')) !!}
    {!! Form::file('image', ['class' => 'form-control-file']) !!}
</div>


<div class="form-group">
    {!! Form::label('role', __('Role')) !!}
    <select name="roles[]" id="" class="form-control select2" multiple required>
        @foreach ($roles as $role)
        <option
        @isset($admin)

        {{$admin->hasRole($role->name) == 1 ? 'selected':'' }}
        @endisset
            value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
</div>
<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('Password')) !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 191,'minlength' => 8]) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '. __("Submit"), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.admins.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __('Cancel') }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
@section('script')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection

