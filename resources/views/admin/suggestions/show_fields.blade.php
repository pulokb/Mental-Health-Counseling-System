
<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $suggestions->title }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{{ $suggestions->details }}</p>
</div>


<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image',  __('Image')) !!}</b>
    <p>{{ $suggestions->image }}</p>
</div>


<!-- Note Field -->
<div class="form-group">
    <b>{!! Form::label('note',  __('Note')) !!}</b>
    <p>{{ $suggestions->note }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $suggestions->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $suggestions->updated_at }}</p>
</div>


