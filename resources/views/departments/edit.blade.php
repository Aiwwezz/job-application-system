@extends('layouts.admin')

@section('title', 'Edit Department')

@section('content')

<div class="form-card">

    <h3 class="mb-4">Edit Department</h3>

    <form action="{{ route('departments.update', $department->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Department Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $department->name }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Department
        </button>

        <a href="{{ route('departments.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection
