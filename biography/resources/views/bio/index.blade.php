@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">English Name</th>
      <th scope="col">Name</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($bios as $bio)
    <tr>
      <th scope="row">{{ $bio->id }}</th>
      <td>{{ $bio->english_name }}</td>
      <td><a href="/bio/{{ $bio->id }}/edit">{{ $bio->name }}</a></td>
      <td>{{ $bio->job_title }}</td>
      <td><a class="btn btn-success" href="/portfolio/create?bio_id={{ $bio->id }}">add port</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection