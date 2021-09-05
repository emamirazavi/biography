@extends('layouts.app')

@section('content')
<!-- {{ Form::open(array('url' => 'foo/bar')) }}
    
{{ Form::close() }} -->
<?php

use Illuminate\Support\Facades\Request;

$class = 'needs-validation';
if ($errors->any()) {
    // $class .= ' was-validated';
}
$route = ['portfolio.store', ['bio_id'=>app('request')->input('bio_id')]];
if ($port->id) {
    $route = ['portfolio.update', $port->id];
}
?>

{{ Form::model($port, ['route' => $route, 'files' => true, 'class' => $class, 'novalidate'=>true]) }}
{{ $port->id ? method_field('PUT') : '' }}
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class'=>'form-control '.($errors->has('title')?'is-invalid':'')]) }}
        <!-- <small class="form-text text-muted">
            Your bio name with english letters and numbers (a-z and 0-9).
            <br />
            Minimum length is 5 characters.
        </small> -->
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class'=>'form-control '.($errors->has('description')?'is-invalid':'')]) }}
        <!-- <small class="form-text text-muted">
            Your bio name with english letters and numbers (a-z and 0-9).
            <br />
            Minimum length is 5 characters.
        </small> -->
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-12 mb-3">        
        {{ Form::label('img', 'Image', ['class' => '']) }}

        <div>
        <img src="/storage/app/{{ $port->img }}" class="rounded img-fluid" alt="" 
        style="max-width:200px; max-height: auto;">
        </div>

        {{ Form::file('img', ['class'=>'form-control-file '.($errors->has('img')?'is-invalid':'')]) }}
        @error('img')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

{{ Form::submit($port->id?'Edit':'Add', ['class'=>'btn btn-primary']); }}
{{ Form::close() }}
@endsection