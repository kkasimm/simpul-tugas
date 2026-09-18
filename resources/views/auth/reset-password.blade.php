<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - SimpulTugas</title>
</head>
<body>
    <h1>Reset Password</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" value="{{ old('email', $email) }}">
        <input type="password" name="password" placeholder="Password Baru">
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password">
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
