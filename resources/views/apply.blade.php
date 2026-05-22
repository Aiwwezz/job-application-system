<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Application Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fb, #eef1f7);
            font-family: Arial, sans-serif;
        }

        .apply-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        .apply-card {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 16px 45px rgba(0,0,0,0.08);
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px;
        }

        .btn {
            border-radius: 12px;
            padding: 12px 22px;
            font-weight: 500;
        }

        .header-badge {
            display: inline-block;
            background: #e91e63;
            color: white;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 14px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

<div class="apply-wrapper">

    <div class="apply-card">

        <span class="header-badge">
            Job Recruitment
        </span>

        <h1 class="mb-2">Job Application Form</h1>

        <p class="text-muted mb-4">
            Please complete the form below and upload your documents as PDF files.
        </p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('apply.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>

                    <input type="text"
                           name="fullname"
                           class="form-control"
                           value="{{ old('fullname') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>

                    <input type="number"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>

                    <select name="department_id"
                            class="form-select"
                            required>

                        <option value="">Select Department</option>

                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="4">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Resume</label>

                <input type="file"
                       name="resume"
                       class="form-control"
                       accept=".pdf">

                <small class="text-muted">
                    Allowed: PDF only (Max: 5MB)
                </small>
            </div>

            <div class="mb-4">
                <label class="form-label">Transcript</label>

                <input type="file"
                       name="transcript"
                       class="form-control"
                       accept=".pdf">

                <small class="text-muted">
                    Allowed: PDF only (Max: 5MB)
                </small>
            </div>

            <button type="submit" class="btn btn-primary">
                Submit Application
            </button>

        </form>

    </div>

</div>

</body>
</html>
