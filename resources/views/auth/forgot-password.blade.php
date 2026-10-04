<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-page">
        <div class="auth-card">
            <h1>SimpulTugas</h1>
            <p class="subtitle">Lupa Password</p>

            @if (session('status'))
                <p class="info-title">Verifikasi Melalui Email</p>
                <p class="info-text">
                    Kami telah mengirimkan email berisi tautan untuk mengatur ulang password Anda.
                    <br><br>
                    Silakan cek email dan klik tautan tersebut untuk melanjutkan.
                </p>
            @else
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">
                    <button type="submit" class="btn">Konfirmasi</button>
                </form>
            @endif

            <a href="{{ route('login') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
