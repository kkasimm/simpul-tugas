<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper">
        <div class="card auth-card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 text-center fw-bold mb-1">SimpulTugas</h1>
                <p class="text-center text-muted mb-4">Login</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
                </form>

                <a href="{{ route('password.request') }}" class="btn btn-outline-secondary w-100">Lupa Password</a>
            </div>
        </div>
    </div>
    @include('partials.scripts')
</body>
</html>
