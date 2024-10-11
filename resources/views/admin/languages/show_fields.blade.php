<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name', __('Name')) !!}</b>
    <p>{{ $language->name }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    <b>{!! Form::label('code', __('Code')) !!}</b>
    <p>{{ $language->code }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status', __('Status')) !!}</b>


    @if ($language->status)
    <div class="mb-2 mr-2 badge badge-success">{{ __('Active') }}</div>
    @else
    <div class="mb-2 mr-2 badge badge-danger">{{ __('Deactive') }}</div>
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', __('Created At')) !!}</b>
    <p>{{ $language->created_at->toFormattedDateString() }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
    <p>{{ $language->updated_at->toFormattedDateString() }}</p>
</div>

