@extends('layouts.app')

@section('content')
<a class="btn btn-secondary mb-2" href="/bio/">Bios</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Bio</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($ports as $port)
    <tr>
      <th scope="row">{{ $port->id }}</th>
      <td>{{ $port->title }}</td>
      <td>{{ $port->img }}</td>
      <td>{{ $port->bio->name }}</td>
      <td>{{ $port->description }}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-secondary" href="/portfolio/{{ $port->id }}/edit">Edit</a>
        <button class="btn btn-danger" onclick="delete_model({{ $port->id }});">Delete</button>
</div>
<form method="POST" action="{{ route('portfolio.destroy', $port->id) }}" id="delete-{{ $port->id }}">
@method('DELETE')
@csrf
</form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="application/javascript">
function delete_model(model_id)
{
  if (confirm('Are you sure you want to delete?')) {
    $('#delete-' + model_id).submit();
  }
}
</script>
@endsection