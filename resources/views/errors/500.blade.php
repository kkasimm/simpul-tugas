<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 - Terjadi Kesalahan</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper text-center">
        <div>
            <div class="display-1 fw-bold text-primary">500</div>
            <p class="fs-5 mb-1">Terjadi kesalahan pada server</p>
            <p class="text-muted mb-4">Coba lagi beberapa saat lagi. Kalau terus terjadi, hubungi Admin.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
