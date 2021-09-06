@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($models as $model)
    <tr>
      <th scope="row">{{ $model->id }}</th>
      <td>{{ $model->title }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection