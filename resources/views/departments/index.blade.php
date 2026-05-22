@extends('layouts.admin')

@section('title', 'Departments')

@section('content')

<div class="table-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Department Management</h4>

        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            Add Department
        </a>
    </div>

    <table class="table table-hover align-middle">

        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th width="220">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}"
                           class="btn btn-sm btn-dark">
                            Edit
                        </a>

                        <form action="{{ route('departments.destroy', $department->id) }}"
                              method="POST"
                              class="delete-form"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        No departments found.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection
