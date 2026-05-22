@extends('layouts.admin')

@section('title', 'Add Department')

@section('content')

<div class="form-card">

    <h3 class="mb-4">Add Department</h3>

    <form action="{{ route('departments.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Department Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Enter department name"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Department
        </button>

        <a href="{{ route('departments.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection
