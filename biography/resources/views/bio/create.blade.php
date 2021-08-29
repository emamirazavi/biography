@extends('layouts.app')

@section('content')
<!-- {{ Form::open(array('url' => 'foo/bar')) }}
    
{{ Form::close() }} -->
<?php
$class = 'needs-validation';
if ($errors->any()) {
    // $class .= ' was-validated';
}
?>

{{ Form::model($bio, ['route' => ['bio.store'], 'class' => $class, 'novalidate'=>true]) }}
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
{{ Form::submit('Add Bio', ['class'=>'btn btn-primary']); }}
{{ Form::close() }}
@endsection