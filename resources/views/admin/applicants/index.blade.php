@extends('layouts.admin')

@section('title', 'Applicants')

@section('content')

<div class="table-card">

    <form method="GET" action="{{ route('admin.applicants.index') }}" class="row g-2 mb-4">

        <div class="col-md-4">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search name, email, phone"
                   value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="department_id" class="form-select">
                <option value="">All Departments</option>

                @foreach($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ request('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-5">
            <button type="submit" class="btn btn-primary">
                Filter
            </button>

            <a href="{{ route('admin.applicants.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Resume</th>
                    <th>Transcript</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->fullname }}</td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->phone }}</td>
                        <td>{{ $applicant->department->name }}</td>

                        <td>
                            @if($applicant->resume)
                                <a href="{{ asset('uploads/' . $applicant->resume) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                    Resume
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if($applicant->transcript)
                                <a href="{{ asset('uploads/' . $applicant->transcript) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-success">
                                    Transcript
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('admin.applicants.status', $applicant->id) }}"
                                  method="POST">
                                @csrf

                                <select name="status"
                                        class="form-select form-select-sm"
                                        onchange="this.form.submit()">

                                    <option value="pending" {{ $applicant->status == 'pending' ? 'selected' : '' }}>
                                        pending
                                    </option>

                                    <option value="reviewed" {{ $applicant->status == 'reviewed' ? 'selected' : '' }}>
                                        reviewed
                                    </option>

                                    <option value="accepted" {{ $applicant->status == 'accepted' ? 'selected' : '' }}>
                                        accepted
                                    </option>

                                    <option value="rejected" {{ $applicant->status == 'rejected' ? 'selected' : '' }}>
                                        rejected
                                    </option>

                                </select>
                            </form>

                            <div class="mt-2">
                                @if($applicant->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($applicant->status == 'reviewed')
                                    <span class="badge bg-info text-dark">Reviewed</span>
                                @elseif($applicant->status == 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif($applicant->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('admin.applicants.show', $applicant->id) }}"
                               class="btn btn-sm btn-dark">
                                View
                            </a>

                            <a href="{{ route('admin.applicants.print', $applicant->id) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary">
                                Print
                            </a>

                            <form action="{{ route('admin.applicants.destroy', $applicant->id) }}"
                                    method="POST"
                                    class="delete-form"
                                    style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            No applicants found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        {{ $applicants->links() }}
    </div>

</div>

@endsection
