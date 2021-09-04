@extends('layouts.app')

@section('content')

<div class="card-deck">
    @foreach($bio->portfolio as $port):
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $port->title }}</h5>
      <p class="card-text">
          {{$port->description}}
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  @endforeach
</div>

@endsection