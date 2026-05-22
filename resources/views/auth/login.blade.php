<x-guest-layout>
    <div class="text-center mb-4">
        <h2 class="fw-bold">Admin Login</h2>
        <p class="text-muted">Job Application Management System</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input id="email"
                   class="form-control"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input id="password"
                   class="form-control"
                   type="password"
                   name="password"
                   required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-check-label">
                <input type="checkbox" name="remember" class="form-check-input">
                Remember me
            </label>

            <a href="{{ route('password.request') }}" class="small">
                Forgot password?
            </a>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Log in
        </button>
    </form>
</x-guest-layout>
