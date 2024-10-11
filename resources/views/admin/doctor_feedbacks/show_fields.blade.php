<!-- User Name Field -->
<div class="form-group">
    <b>{!! Form::label('user_name',  __('User Name')) !!}</b>
    <p>{{ $doctorFeedback->user_name }}</p> <!-- Assuming there is a relationship to the User model -->
</div>

<!-- Age Field -->
<div class="form-group">
    <b>{!! Form::label('age',  __('Age')) !!}</b>
    <p>{{ $doctorFeedback->age }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    <b>{!! Form::label('gender',  __('Gender')) !!}</b>
    <p>{{ $doctorFeedback->gender }}</p>
</div>

<!-- Occupation Field -->
<div class="form-group">
    <b>{!! Form::label('occupation',  __('Occupation')) !!}</b>
    <p>{{ $doctorFeedback->occupation }}</p>
</div>

<!-- Overall Result Field -->
<div class="form-group">
    <b>{!! Form::label('overall_result',  __('Overall Result')) !!}</b>
    <p>{{ $doctorFeedback->overall_result }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('status',  __('Overall Result')) !!}</b>
    <p>{{ $doctorFeedback->status }}</p>
</div>

<!-- Educational Field -->
<div class="form-group">
    <b>{!! Form::label('educational',  __('Educational')) !!}</b>
    <p>{{ $doctorFeedback->educational }}</p>
</div>

<!-- Family Field -->
<div class="form-group">
    <b>{!! Form::label('family',  __('Family')) !!}</b>
    <p>{{ $doctorFeedback->family }}</p>
</div>

<!-- Relationship Field -->
<div class="form-group">
    <b>{!! Form::label('relationship',  __('Relationship')) !!}</b>
    <p>{{ $doctorFeedback->relationship }}</p>
</div>

<!-- Job Field -->
<div class="form-group">
    <b>{!! Form::label('job',  __('Job')) !!}</b>
    <p>{{ $doctorFeedback->job }}</p>
</div>

<!-- General Field -->
<div class="form-group">
    <b>{!! Form::label('general',  __('General')) !!}</b>
    <p>{{ $doctorFeedback->general }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    <b>{!! Form::label('message',  __('Message')) !!}</b>
    <p>{{ $doctorFeedback->message }}</p>
</div>

<!-- Symptoms Field -->
<div class="form-group">
    <b>{!! Form::label('symptoms',  __('Symptoms')) !!}</b>
    <p>{{ $doctorFeedback->symptoms }}</p>
</div>

<!-- Suggestions Field -->
<div class="form-group">
    <b>{!! Form::label('suggestions',  __('Suggestions')) !!}</b>
    <p>{{ $doctorFeedback->suggestions }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    <b>{!! Form::label('note',  __('Note')) !!}</b>
    <p>{{ $doctorFeedback->note }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $doctorFeedback->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $doctorFeedback->updated_at }}</p>
</div>
