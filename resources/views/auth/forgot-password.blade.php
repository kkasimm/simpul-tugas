<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper">
        <div class="card auth-card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 text-center fw-bold mb-1">SimpulTugas</h1>
                <p class="text-center text-muted mb-4">Lupa Password</p>

                @if (session('status'))
                    <p class="text-center fw-semibold mb-2">Verifikasi Melalui Email</p>
                    <p class="text-center text-muted small">
                        Kami telah mengirimkan email berisi tautan untuk mengatur ulang password Anda.
                        <br><br>
                        Silakan cek email dan klik tautan tersebut untuk melanjutkan.
                    </p>
                @else
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">Konfirmasi</button>
                    </form>
                @endif

                <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">Kembali</a>
            </div>
        </div>
    </div>
    @include('partials.scripts')
</body>
</html>
