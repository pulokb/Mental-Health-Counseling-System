<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title', __('Title')) !!}</b>
    <p>{{ $notification->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    <b>{!! Form::label('description', __('Description')) !!}</b>
    <p>{{ $notification->description }}</p>
</div>

<!-- Link Field -->
<div class="form-group">
    <b>{!! Form::label('link', __('Link')) !!}</b>
    <p>{{ $notification->link }}</p>
</div>

<!-- Read Status Field -->
<div class="form-group">
    <b>{!! Form::label('read_status', __('Read Status')) !!}</b>
    <p>{{ $notification->read_status }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    <b>{!! Form::label('user_id', __('User Id')) !!}</b>
    <p>{{ $notification->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', __('Created At')) !!}</b>
    <p>{{ $notification->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
    <p>{{ $notification->updated_at }}</p>
</div>

