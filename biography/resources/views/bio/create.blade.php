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

{{ Form::model($bio, ['route' => $route, 'files' => true, 'class' => $class, 'novalidate'=>true]) }}
{{ $bio->id ? method_field('PUT') : '' }}
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('english_name', 'English Name', ['class' => 'form-label']) }}
        {{ Form::text('english_name', null, ['class'=>'form-control '.($errors->has('english_name')?'is-invalid':'')]) }}
        <small class="form-text text-muted">
            Your bio name with english letters and numbers (a-z and 0-9).
            <br />
            Minimum length is 5 characters.
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
        {{ Form::label('email_address', 'Email Address', ['class' => 'form-label']) }}
        {{ Form::text('email_address', null, ['class'=>'form-control '.($errors->has('email_address')?'is-invalid':'')]) }}
        <small class="form-text text-muted">
            This will be used to send to you, your viewers' comment
        </small>
        @error('email_address')
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
<div class="form-row">
    <div class="col-12 mb-3">        
        {{ Form::label('avatar', 'Avatar', ['class' => '']) }}

        <div>
        <img src="/storage/app/{{ $bio->avatar }}" class="rounded img-fluid" alt="" 
        style="max-width:200px; max-height: auto;">
        </div>

        {{ Form::file('avatar', ['class'=>'form-control-file '.($errors->has('avatar')?'is-invalid':'')]) }}
        @error('avatar')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('location', 'Koji?!', ['class' => 'form-label']) }}
        {{ Form::text('location', null, ['class'=>'form-control '.($errors->has('location')?'is-invalid':'')]) }}
        <small class="form-text text-muted">
            It means "To Kojai?" ya'ni To koja zendegi mikoni.
            <br />
            Ey Baba, Addresset ro benevis. Ezzat ziad...
        </small>
        @error('location')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('about', 'About', ['class' => 'form-label']) }}
        {{ Form::text('about', null, ['class'=>'form-control '.($errors->has('about')?'is-invalid':'')]) }}
        <small class="form-text text-muted">
            Write about yourself!
        </small>
        @error('about')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

{{ Form::submit($bio->id?'Edit':'Add', ['class'=>'btn btn-primary']); }}
{{ Form::close() }}
@endsection