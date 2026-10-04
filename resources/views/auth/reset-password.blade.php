<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-page">
        <div class="auth-card">
            <h1>SimpulTugas</h1>
            <p class="subtitle">Lupa Password</p>
            <p class="info-title">Verifikasi Berhasil!</p>
            <p class="info-text">Silakan buat password baru untuk akun Anda agar dapat kembali mengakses SimpulTugas.</p>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ old('email', $email) }}">

                <label>Password Baru</label>
                <input type="password" name="password" placeholder="Masukkan password baru">

                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Masukkan kembali password baru">

                <button type="submit" class="btn">Konfirmasi</button>
            </form>

            <a href="{{ route('login') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
