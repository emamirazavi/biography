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
      <td><a href="/bio/{{ $bio->id }}">{{ $bio->name }}</a></td>
      <td>{{ $bio->job_title }}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $bio->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $bio->id }}">
            <a class="dropdown-item" href="/portfolio/create?bio_id={{ $bio->id }}">Portfolio</a>
            <a class="dropdown-item" href="/portfolio/create?bio_id={{ $bio->id }}">Skill</a>
          </div>
        </div>
        <a class="btn btn-secondary" href="/bio/{{ $bio->id }}/edit">Edit</a>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection