@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h3 class="m-0">Students</h3>
<a class="btn btn-success" href="{{ route('students.create') }}">Add Student</a>
</div>


<div class="card shadow-sm">
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover table-striped align-middle mb-0">
<thead class="table-light">
<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
@forelse($students as $s)
<tr>
<td>{{ $s->id }}</td>
<td>{{ $s->name }}</td>
<td>{{ $s->email }}</td>
<td>{{ $s->phone ?? '-' }}</td>
<td>{{ $s->department ?? '-' }}</td>
<td class="text-end">
<a class="btn btn-sm btn-outline-primary" href="{{ route('students.edit',$s) }}">Edit</a>
<form class="d-inline" method="POST" action="{{ route('students.destroy',$s) }}" onsubmit="return confirm('Delete this student?')">
@csrf @method('DELETE')
<button class="btn btn-sm btn-outline-danger">Delete</button>
</form>
</td>
</tr>
@empty
<tr><td colspan="6" class="text-center text-muted p-4">No students yet</td></tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
@endsection