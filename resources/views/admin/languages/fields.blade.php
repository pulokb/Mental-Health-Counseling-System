<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('Code')) !!}
    {!! Form::text('code', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>



<div class="form-group">
    <div class="custom-control custom-switch">
        <input name="status" value="1"
        @if (isset($language) && $language->status == 1)
            checked
        @endif
        type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">{{ __('Status') }}</label>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.languages.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __('Cancel') }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
