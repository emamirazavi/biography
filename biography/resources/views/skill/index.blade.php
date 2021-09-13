@extends('layouts.app')

@section('content')
<a class="btn btn-secondary mb-2" href="/bio/">Bios</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($models as $model)
    <tr>
      <th scope="row">{{ $model->id }}</th>
      <td>{{ $model->title }}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-secondary" href="/skill/{{ $model->id }}/edit">Edit</a>
        <button class="btn btn-danger" onclick="delete_model({{ $model->id }});">Delete</button>
</div>
<form method="POST" action="{{ route('skill.destroy', $model->id) }}" id="delete-{{ $model->id }}">
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