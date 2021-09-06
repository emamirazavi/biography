@extends('layouts.app')

@section('content')

<h3 class="mb-2">
  Portfolios
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

<h3 class="mt-2 mb-2">
  <div>
  Skills
  </div>
</h3>

<div class="card">
<div class="card-body">
@foreach($bio->skill as $model)
<span class="badge badge-pill badge-light">{{ $model->title }}</span>
@endforeach
</div></div>

@endsection