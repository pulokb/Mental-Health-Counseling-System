<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $symptoms->title }}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{{ $symptoms->details }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image',  __('Image')) !!}</b>
    @if ($symptoms->image)
        <img src="{{ asset('storage/' . $symptoms->image) }}" alt="{{ $symptoms->title }}" style="max-width: 100%; height: auto;">
    @else
        <p>{{ __('No Image Available') }}</p>
    @endif
</div>

<!-- Note Field -->
<div class="form-group">
    <b>{!! Form::label('note',  __('Note')) !!}</b>
    <p>{{ $symptoms->note }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $symptoms->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $symptoms->updated_at }}</p>
</div>
