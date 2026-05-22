@extends('layouts.admin')

@section('title', 'Applicant Detail')

@section('content')

<div class="row">

    <div class="col-lg-8">

        <div class="form-card">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">
                    {{ $applicant->fullname }}
                </h3>

                <span class="badge bg-primary">
                    {{ ucfirst($applicant->status) }}
                </span>
            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <small class="text-muted">Email</small>
                    <p class="fw-bold">{{ $applicant->email }}</p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Phone</small>
                    <p class="fw-bold">{{ $applicant->phone }}</p>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <small class="text-muted">Department</small>
                    <p class="fw-bold">{{ $applicant->department->name }}</p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Applied Date</small>
                    <p class="fw-bold">
                        {{ $applicant->created_at->format('d/m/Y') }}
                    </p>
                </div>

            </div>

            <div class="mb-3">
                <small class="text-muted">Address</small>
                <p class="fw-bold">
                    {{ $applicant->address }}
                </p>
            </div>

            <hr>

            <h5 class="mb-3">Documents</h5>

            @if($applicant->resume)
                <a href="{{ asset('uploads/' . $applicant->resume) }}"
                   target="_blank"
                   class="btn btn-outline-primary">
                    View Resume
                </a>
            @endif

            @if($applicant->transcript)
                <a href="{{ asset('uploads/' . $applicant->transcript) }}"
                   target="_blank"
                   class="btn btn-outline-success">
                    View Transcript
                </a>
            @endif

            <hr>

            <a href="{{ route('admin.applicants.print', $applicant->id) }}"
               target="_blank"
               class="btn btn-primary">
                Print Application
            </a>

            <a href="{{ route('admin.applicants.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

@endsection
