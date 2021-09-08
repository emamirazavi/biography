@extends('layouts.app')

@section('content')

<h3 class="mb-2">
  Primitive Info
</h3>

<div class="card col-12">
<div class="card-body">
   <div><span class="font-weight-bold">Name:</span>  {{ $bio->name }}</div>
   <div><span class="font-weight-bold">Email:</span>  {{ $bio->email_address }}</div>
   <div><span class="font-weight-bold">Job Title:</span>  {{ $bio->job_title }}</div>
   <div><span class="font-weight-bold">Address:</span>  {{ $bio->location }}</div>
   <div><span class="font-weight-bold">About:</span>  {{ $bio->about }}</div>
</div>
</div>

<h3 class="mt-4 mb-2">
  Portfolios <a class="btn btn-info btn-sm" href="/portfolio/create?bio_id={{ $bio->id }}">+</a>
</h3>
<div class="card-deck">
  @foreach($bio->portfolio as $port)
  <div class="card">
    <img class="card-img-top" src="/storage/app/{{ $port->img }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $port->title }}</h5>
      <p class="card-text">
        {{$port->description}}
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated {{ $port->updated_at->ago() }}</small>
      <a href="/portfolio/{{$port->id}}/edit" class="btn btn-primary float-right">Edit</a>
    </div>
  </div>
  @endforeach
</div>

<h3 class="mt-4 mb-2">
  <div>
  Skills <a class="btn btn-info btn-sm" href="/skill/create?bio_id={{ $bio->id }}">+</a>
  </div>
</h3>
<?php 
// var_dump($bio->skill);
?>
@if($bio->skill->count())
<div class="card col-12">
<div class="card-body">
@foreach($bio->skill as $model)
<h5 class="d-inline-flex"><span class="badge badge-pill badge-light">{{ $model->title }}</span></h5>
@endforeach
</div></div>
@endif

@endsection