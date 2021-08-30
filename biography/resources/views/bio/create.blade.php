@extends('layouts.app')

@section('content')
<!-- {{ Form::open(array('url' => 'foo/bar')) }}
    
{{ Form::close() }} -->
<?php
$class = 'needs-validation';
if ($errors->any()) {
    // $class .= ' was-validated';
}
$route = ['bio.store'];
if ($bio->id) {
    $route = ['bio.update', $bio->id];
}
?>

{{ Form::model($bio, ['route' => $route, 'class' => $class, 'novalidate'=>true]) }}
{{ $bio->id ? method_field('PUT') : '' }}
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('english_name', 'English Name', ['class' => 'form-label']) }}
        {{ Form::text('english_name', null, ['class'=>'form-control '.($errors->has('english_name')?'is-invalid':'')]) }}
        <small class="form-text text-muted">
            Your bio name with english letters and numbers (a-z and 0-9).
            <br />
            Minimum length is 10 characters.

        </small>
        @error('english_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class'=>'form-control '.($errors->has('name')?'is-invalid':'')]) }}
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('job_title', 'Job Title', ['class' => 'form-label']) }}
        {{ Form::text('job_title', null, ['class'=>'form-control '.($errors->has('job_title')?'is-invalid':'')]) }}
        @error('job_title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
{{ Form::submit('Add/Edit', ['class'=>'btn btn-primary']); }}
{{ Form::close() }}
@endsection