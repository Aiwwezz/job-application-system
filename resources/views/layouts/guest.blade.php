<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(135deg, #101014, #1f1f2e); min-height: 100vh;">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div class="card border-0 shadow-lg"
         style="width: 430px; border-radius: 24px;">

        <div class="card-body p-5">

            <div class="text-center mb-4">
                <div style="font-size: 42px;">💼</div>
                <h4 class="fw-bold mt-2">Job Recruit</h4>
            </div>

            {{ $slot }}

            <div class="text-center mt-4">
                <a href="/apply" class="text-decoration-none">
                    Apply for a job
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>
