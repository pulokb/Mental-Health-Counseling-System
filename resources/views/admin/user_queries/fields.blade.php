@php
    use App\Models\User;
    use App\Models\UserQuery;
    $users=User::get()->pluck("name","id");
    $queries=UserQuery::get()->pluck("note","id");

@endphp

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id',  __('User Id')) !!}
    {!! Form::select('user_id',$users, null, ['class' => 'form-control','required']) !!}
</div>


<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age',  __('Age')) !!}
    {!! Form::number('age', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('Gender')) !!}
    {!! Form::text('gender', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Physical Rating Field -->
<div class="form-group">
    {!! Form::label('physical_rating', __('Physical Rating')) !!}
    {!! Form::text('physical_rating', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Mental Rating Field -->
<div class="form-group">
    {!! Form::label('mental_rating', __('Mental Rating')) !!}
    {!! Form::text('mental_rating', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Dailylife Problems Field -->
<div class="form-group">
    {!! Form::label('dailylife_problems', __('Dailylife Problems')) !!}
    {!! Form::text('dailylife_problems', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Affected Ability Field -->
<div class="form-group">
    {!! Form::label('affected_ability', __('Affected Ability')) !!}
    {!! Form::text('affected_ability', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Low Down Field -->
<div class="form-group">
    {!! Form::label('low_down', __('Low Down')) !!}
    {!! Form::text('low_down', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Affected Relationship Field -->
<div class="form-group">
    {!! Form::label('affected_relationship', __('Affected Relationship')) !!}
    {!! Form::text('affected_relationship', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Experience Field -->
<div class="form-group">
    {!! Form::label('experience', __('Experience')) !!}
    {!! Form::text('experience', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', __('Note')) !!}
    {!! Form::text('note', null, ['class' => 'form-control','required']) !!}
</div>


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.userQueries.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
