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
<div class="form-group">
    <b>{!! Form::label('address',  __('Address')) !!}</b>
    <p>{{ $doctorFeedback->address }}</p>
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

<div class="form-group">
    <b>{!! Form::label('depression',  __('Depression')) !!}</b>
    <p>{{ $doctorFeedback->depression }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('anxiety',  __('Anxiety')) !!}</b>
    <p>{{ $doctorFeedback->anxiety }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('irritability',  __('Irritability')) !!}</b>
    <p>{{ $doctorFeedback->irritability }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('emotional',  __('Emotional')) !!}</b>
    <p>{{ $doctorFeedback->emotional }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('social',  __('Social')) !!}</b>
    <p>{{ $doctorFeedback->social }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('fatigue',  __('Fatigue')) !!}</b>
    <p>{{ $doctorFeedback->fatigue }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('concentrating',  __('Concentrating')) !!}</b>
    <p>{{ $doctorFeedback->concentrating }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('sleep',  __('Sleep')) !!}</b>
    <p>{{ $doctorFeedback->sleep }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('esteem',  __('Esteem')) !!}</b>
    <p>{{ $doctorFeedback->esteem }}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('panic',  __('Panic')) !!}</b>
    <p>{{ $doctorFeedback->panic }}</p>
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
