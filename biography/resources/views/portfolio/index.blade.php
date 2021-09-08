@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Bio</th>
      <th scope="col">Description</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($ports as $port)
  <?php 
      var_dump($port->bio);
      ?>
    <tr>
      <th scope="row">{{ $port->id }}</th>
      <td>{{ $port->title }}</td>
      <td>{{ $port->img }}</td>
      
      <td></td>
      <td>{{ $port->description }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection