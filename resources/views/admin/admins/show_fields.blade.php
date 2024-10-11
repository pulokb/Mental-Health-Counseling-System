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
