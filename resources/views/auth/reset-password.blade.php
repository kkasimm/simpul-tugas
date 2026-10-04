<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper">
        <div class="card auth-card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 text-center fw-bold mb-1">SimpulTugas</h1>
                <p class="text-center text-muted mb-2">Lupa Password</p>
                <p class="text-center fw-semibold mb-2">Verifikasi Berhasil!</p>
                <p class="text-center text-muted small mb-3">Silakan buat password baru untuk akun Anda agar dapat kembali mengakses SimpulTugas.</p>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ old('email', $email) }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan kembali password baru">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-2">Konfirmasi</button>
                </form>

                <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">Kembali</a>
            </div>
        </div>
    </div>
    @include('partials.scripts')
</body>
</html>
