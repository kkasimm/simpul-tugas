<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>419 - Sesi Berakhir</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper text-center">
        <div>
            <div class="display-1 fw-bold text-primary">419</div>
            <p class="fs-5 mb-1">Sesi kamu sudah berakhir</p>
            <p class="text-muted mb-4">Halaman terlalu lama dibuka tanpa aktivitas. Silakan login ulang.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login Ulang</a>
        </div>
    </div>
</body>
</html>
