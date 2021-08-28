@extends('layouts.app')

@section('content')
<!-- {{ Form::open(array('url' => 'foo/bar')) }}
    
{{ Form::close() }} -->
<?php
$class = 'needs-validation';
if ($errors->any()) {
    $class .= ' was-validated';
}
?>

{{ Form::model($bio, ['route' => ['bio.store'], 'class' => $class, 'novalidate'=>true]) }}
<div>
    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['formnovalidate'=>'formnovalidate', 'class'=>'form-control '.($errors->has('name')?'is-invalid':'')]) }}
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
{{ Form::submit('Click Me!'); }}
{{ Form::close() }}
@endsection