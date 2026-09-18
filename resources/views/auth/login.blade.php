<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SimpulTugas</title>
</head>
<body>
    <h1>SimpulTugas</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>
        <label>Password</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Masuk</button>
    </form>

    <a href="{{ route('password.request') }}">Lupa Password?</a>
</body>
</html>
