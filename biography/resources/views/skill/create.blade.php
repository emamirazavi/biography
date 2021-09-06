@extends('layouts.app')

@section('content')

<?php
$class = 'needs-validation';
$route = ['skill.store', ['bio_id'=>app('request')->input('bio_id')]];
if ($model->id) {
    $route = ['skill.update', $model->id];
}
?>

{{ Form::model($model, ['route' => $route, 'files' => true, 'class' => $class, 'novalidate'=>true]) }}
{{ $model->id ? method_field('PUT') : '' }}
<div class="form-row">
    <div class="col-12 mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class'=>'form-control '.($errors->has('title')?'is-invalid':'')]) }}
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

{{ Form::submit($model->id?'Edit':'Add', ['class'=>'btn btn-primary']); }}
{{ Form::close() }}
@endsection