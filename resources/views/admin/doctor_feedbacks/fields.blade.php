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

<div class="form-group">
    {!! Form::label('address', __('Location')) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'disabled']) !!}
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


<div class="form-group">
    {!! Form::label('depression', __('1. Depression (Feelings of persistent sadness and lack of interest in daily activities)')) !!}
    {!! Form::textarea('depression', null, ['class' => 'form-control', 'placeholder' => ' Details', 'disabled']) !!}
</div>


<div class="form-group">
    {!! Form::label('anxiety', __('2. Anxiety (Excessive worry, fear, and tension that interferes with daily functioning)')) !!}
    {!! Form::textarea('anxiety', null, ['class' => 'form-control', 'placeholder' => ' Details', 'disabled']) !!}
</div>


<div class="form-group">
    {!! Form::label('irritability', __('3. Irritability (Being easily frustrated or angered, often leading to conflict in relationships)')) !!}
    {!! Form::textarea('irritability', null, ['class' => 'form-control', 'placeholder' => ' Details', 'disabled']) !!}
</div>


<div class="form-group">
    {!! Form::label('emotional', __('4. Emotional Dysregulation (Difficulty controlling emotional responses, leading to extreme reactions)')) !!}
    {!! Form::textarea('emotional', null, ['class' => 'form-control', 'placeholder' => ' Details', 'disabled']) !!}
</div>


<div class="form-group">
    {!! Form::label('social', __('5. Social Withdrawal (Avoiding social interactions and isolating oneself from friends and family)')) !!}
    {!! Form::textarea('social', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('fatigue', __('6. Fatigue (Persistent tiredness that is not relieved by rest or sleep)')) !!}
    {!! Form::textarea('fatigue', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('concentrating', __('7. Difficulty Concentrating (Trouble focusing on tasks or maintaining attention)')) !!}
    {!! Form::textarea('concentrating', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('sleep', __('8. Sleep Disturbances (Experiencing insomnia or excessive sleep)')) !!}
    {!! Form::textarea('sleep', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('esteem', __('9. Low Self-Esteem (Persistent negative thoughts about oneself and feelings of inadequacy)')) !!}
    {!! Form::textarea('esteem', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('panic', __('10. Panic Attacks (Sudden episodes of intense fear, accompanied by physical symptoms like rapid heartbeat)')) !!}
    {!! Form::textarea('panic', null, ['class' => 'form-control', 'placeholder' => ' Information', 'disabled']) !!}
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
