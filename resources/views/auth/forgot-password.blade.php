<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - SimpulTugas</title>
</head>
<body>
    <h1>Lupa Password</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>
</html>
