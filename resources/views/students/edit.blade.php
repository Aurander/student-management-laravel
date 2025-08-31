@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<h4 class="mb-3">Edit Student #{{ $student->id }}</h4>
<form method="POST" action="{{ route('students.update',$student) }}">
@csrf @method('PUT')
<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control" value="{{ old('name',$student->name) }}" required>
@error('name')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" value="{{ old('email',$student->email) }}" required>
@error('email')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" value="{{ old('phone',$student->phone) }}">
@error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
<label class="form-label">Department</label>
<input type="text" name="department" class="form-control" value="{{ old('department',$student->department) }}">
@error('department')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<button class="btn btn-primary">Update</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</div>
</div>
</div>
</div>
@endsection