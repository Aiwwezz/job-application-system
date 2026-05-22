<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fb, #eef1f7);
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1f1f2e, #12121a);
            position: fixed;
            left: 0;
            top: 0;
            padding: 24px 16px;
            color: white;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 32px;
            color: white;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cfd3dc;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #e91e63;
            color: white;
        }

        .main-content {
            margin-left: 260px;
            padding: 28px;
        }

        .topbar {
            background: white;
            border-radius: 18px;
            padding: 18px 24px;
            margin-bottom: 28px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: white;
        }

        .icon-box {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-top: -36px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .bg-pink {
            background: #e91e63;
        }

        .bg-green {
            background: #4caf50;
        }

        .bg-blue {
            background: #2196f3;
        }

        .bg-dark-card {
            background: #212529;
        }

        .table-card,
        .form-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        .btn {
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 500;
        }

        .btn-sm {
            padding: 6px 12px;
            border-radius: 10px;
        }

        .table {
            border-radius: 16px;
            overflow: hidden;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .alert {
            border-radius: 14px;
        }

        body.dark-mode {
            background: linear-gradient(135deg, #101014, #181824);
            color: #f1f1f1;
        }

        body.dark-mode .topbar,
        body.dark-mode .table-card,
        body.dark-mode .form-card,
        body.dark-mode .card-custom {
            background: #1f1f2e;
            color: #f1f1f1;
        }

        body.dark-mode .table {
            color: #f1f1f1;
        }

        body.dark-mode .table-light {
            --bs-table-bg: #2a2a3a;
            --bs-table-color: #ffffff;
        }

        body.dark-mode .text-muted {
            color: #b8b8c7 !important;
        }

        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background: #2a2a3a;
            color: white;
            border-color: #44445a;
        }

        body.dark-mode .table,
        body.dark-mode .table tbody,
        body.dark-mode .table tr,
        body.dark-mode .table td,
        body.dark-mode .table th {
            background-color: #1f1f2e !important;
            color: #f1f1f1 !important;
            border-color: #33334a !important;
        }

        body.dark-mode .table-light th {
            background-color: #2a2a3a !important;
            color: #ffffff !important;
        }

        body.dark-mode .badge.bg-warning {
            color: #111 !important;
        }

        body.dark-mode .page-link {
            background-color: #1f1f2e;
            color: #ffffff;
            border-color: #33334a;
        }

        body.dark-mode .page-item.active .page-link {
            background-color: #e91e63;
            border-color: #e91e63;
        }
    </style>
</head>
<body>

<div class="sidebar">

    <div class="brand">
        <i class="bi bi-briefcase-fill"></i>
        Job Recruit
    </div>

    <a href="/dashboard"
       class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="/departments"
       class="{{ request()->is('departments*') ? 'active' : '' }}">
        <i class="bi bi-building"></i>
        Departments
    </a>

    <a href="/admin/applicants"
       class="{{ request()->is('admin/applicants*') ? 'active' : '' }}">
        <i class="bi bi-people-fill"></i>
        Applicants
    </a>

    <a href="/apply" target="_blank">
        <i class="bi bi-file-earmark-text"></i>
        Apply Form
    </a>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf

        <button type="submit" class="btn btn-danger w-100">
            Logout
        </button>
    </form>

</div>

<div class="main-content">

    <div class="topbar">

        <div>
            <small class="text-muted">
                Pages / @yield('title')
            </small>

            <h5 class="mb-0">
                @yield('title')
            </h5>
        </div>

    <div class="d-flex align-items-center gap-3">

        <button type="button"
                id="darkModeToggle"
                class="btn btn-sm btn-outline-dark">
            <i class="bi bi-moon-fill"></i>
        </button>

        <span class="text-muted">
            {{ Auth::user()->name ?? 'Admin' }}
        </span>

    </div>

    </div>

    @yield('content')

</div>

<script>
    const darkModeToggle = document.getElementById('darkModeToggle');

    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
    }

    darkModeToggle.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.setItem('darkMode', 'disabled');
        }
    });

    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'This data will be deleted permanently.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

</body>
</html>
