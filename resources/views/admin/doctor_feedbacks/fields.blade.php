@php
    use App\Models\User;
    use App\Models\UserQuery;
    $users = User::get()->pluck("name", "id");
    $queries = UserQuery::get()->pluck("note", "id");
@endphp

<!-- User Name Field (Disabled) -->
<div class="form-group">
    {!! Form::label('user_id', __('User Name')) !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Age Field (Disabled) -->
<div class="form-group">
    {!! Form::label('age', __('Age')) !!}
    {!! Form::number('age', null, ['class' => 'form-control', 'placeholder' => 'Enter Age', 'disabled']) !!}
</div>

<!-- Gender Field (Disabled) -->
<div class="form-group">
    {!! Form::label('gender', __('Gender')) !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Occupation Field (Disabled) -->
<div class="form-group">
    {!! Form::label('occupation', __('Occupation')) !!}
    {!! Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => 'Enter Occupation', 'disabled']) !!}
</div>

<!-- Overall Result Field (Disabled) -->
<div class="form-group">
    {!! Form::label('overall_result', __('Overall Result')) !!}
    {!! Form::text('overall_result', null, ['class' => 'form-control', 'placeholder' => 'Enter Overall Result', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', __('Status')) !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Enter Overall Result', 'disabled']) !!}
</div>

<!-- Educational Field (Disabled) -->
<div class="form-group">
    {!! Form::label('educational', __('Educational')) !!}
    {!! Form::textarea('educational', null, ['class' => 'form-control', 'placeholder' => 'Educational Details', 'disabled']) !!}
</div>

<!-- Family Field (Disabled) -->
<div class="form-group">
    {!! Form::label('family', __('Family')) !!}
    {!! Form::textarea('family', null, ['class' => 'form-control', 'placeholder' => 'Family Details', 'disabled']) !!}
</div>

<!-- Relationship Field (Disabled) -->
<div class="form-group">
    {!! Form::label('relationship', __('Relationship')) !!}
    {!! Form::textarea('relationship', null, ['class' => 'form-control', 'placeholder' => 'Relationship Details', 'disabled']) !!}
</div>

<!-- Job Field (Disabled) -->
<div class="form-group">
    {!! Form::label('job', __('Job')) !!}
    {!! Form::textarea('job', null, ['class' => 'form-control', 'placeholder' => 'Job Details', 'disabled']) !!}
</div>

<!-- General Field (Disabled) -->
<div class="form-group">
    {!! Form::label('general', __('General')) !!}
    {!! Form::textarea('general', null, ['class' => 'form-control', 'placeholder' => 'General Information', 'disabled']) !!}
</div>

<!-- Message Field (Disabled) -->
<div class="form-group">
    {!! Form::label('message', __('Message')) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'disabled']) !!}
</div>

<!-- Symptoms Field (Editable) -->
<div class="form-group">
    {!! Form::label('symptoms', __('Symptoms')) !!}
    {!! Form::textarea('symptoms', null, ['class' => 'form-control', 'required', 'placeholder' => 'Describe Symptoms']) !!}
</div>

<!-- Suggestions Field (Editable) -->
<div class="form-group">
    {!! Form::label('suggestions', __('Suggestions')) !!}
    {!! Form::textarea('suggestions', null, ['class' => 'form-control', 'required', 'placeholder' => 'Suggestions']) !!}
</div>

<!-- Note Field (Editable) -->
<div class="form-group">
    {!! Form::label('note', __('Note')) !!}
    {!! Form::text('note', null, ['class' => 'form-control', 'required', 'placeholder' => 'Additional Note']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.doctorFeedbacks.index') }}" class="btn btn-danger">
        <i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}
    </a>
</div>
