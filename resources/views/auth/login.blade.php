<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SimpulTugas</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-page">
        <div class="auth-card">
            <h1>SimpulTugas</h1>
            <p class="subtitle">Login</p>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password">

                <button type="submit" class="btn">Login</button>
            </form>

            <a href="{{ route('password.request') }}" class="btn btn-secondary">Lupa Password</a>
        </div>
    </div>
</body>
</html>
