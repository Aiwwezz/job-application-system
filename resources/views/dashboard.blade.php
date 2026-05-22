@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="card card-custom p-4">

            <div class="icon-box bg-dark-card">
                <i class="bi bi-people-fill"></i>
            </div>

            <div class="mt-4">
                <p class="text-muted mb-1">
                    Total Applicants
                </p>

                <h2>
                    {{ $totalApplicants }}
                </h2>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">

            <div class="icon-box bg-pink">
                <i class="bi bi-building"></i>
            </div>

            <div class="mt-4">
                <p class="text-muted mb-1">
                    Departments
                </p>

                <h2>
                    {{ $totalDepartments }}
                </h2>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">

            <div class="icon-box bg-green">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <div class="mt-4">
                <p class="text-muted mb-1">
                    Accepted
                </p>

                <h2>
                    {{ $acceptedApplicants }}
                </h2>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">

            <div class="icon-box bg-blue">
                <i class="bi bi-x-circle-fill"></i>
            </div>

            <div class="mt-4">
                <p class="text-muted mb-1">
                    Rejected
                </p>

                <h2>
                    {{ $rejectedApplicants }}
                </h2>
            </div>

        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">

        <div class="table-card">

            <h5 class="mb-4">
                Applicant Status
            </h5>

            <table class="table">

                <tr>
                    <td>Pending</td>
                    <td>{{ $pendingApplicants }}</td>
                </tr>

                <tr>
                    <td>Reviewed</td>
                    <td>{{ $reviewedApplicants }}</td>
                </tr>

                <tr>
                    <td>Accepted</td>
                    <td>{{ $acceptedApplicants }}</td>
                </tr>

                <tr>
                    <td>Rejected</td>
                    <td>{{ $rejectedApplicants }}</td>
                </tr>

            </table>

        </div>

    </div>

    <div class="col-md-6">

        <div class="table-card">

            <h5 class="mb-4">
                Quick Actions
            </h5>

            <a href="/departments" class="btn btn-dark">
                Manage Departments
            </a>

            <a href="/admin/applicants" class="btn btn-primary">
                View Applicants
            </a>

            <a href="/apply"
               target="_blank"
               class="btn btn-success">
                Open Apply Form
            </a>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-12">

        <div class="table-card">

            <h5 class="mb-4">
                Recent Applicants
            </h5>

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Applied Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentApplicants as $applicant)
                        <tr>
                            <td>{{ $applicant->fullname }}</td>
                            <td>{{ $applicant->department->name }}</td>
                            <td>
                                @if($applicant->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($applicant->status == 'reviewed')
                                    <span class="badge bg-info text-dark">Reviewed</span>
                                @elseif($applicant->status == 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif($applicant->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $applicant->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No recent applicants.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
