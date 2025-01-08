<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name', __('Name')) !!}</b>
    <p>{{ $admin->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    <b>{!! Form::label('email', __('Email')) !!}</b>
    <p>{{ $admin->email }}</p>
</div>
<div class="form-group">
    <b>{!! Form::label('roles', __('Roles')) !!}</b>
    @foreach ($admin->roles as $role)
    <span class="badge badge-info mr-1">
        {{ $role->name }}
    </span>
    @endforeach
</div>

<div class="form-group">
    <b>{!! Form::label('phone', __('Phone')) !!}</b>
    <p>{{ $admin->phone }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('address', __('Address')) !!}</b>
    <p>{{ $admin->address }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('gender', __('Gender')) !!}</b>
    <p>{{ $admin->gender }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('occupation', __('Occupation')) !!}</b>
    <p>{{ $admin->occupation }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', __('Created At')) !!}</b>
    <p>{{ $admin->created_at->toFormattedDateString() }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
    <p>{{ $admin->updated_at->toFormattedDateString() }}</p>
</div>
