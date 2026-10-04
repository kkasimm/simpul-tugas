<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper text-center">
        <div>
            <div class="display-1 fw-bold text-primary">403</div>
            <p class="fs-5 mb-1">Akses ditolak</p>
            <p class="text-muted mb-4">Kamu tidak punya izin untuk membuka halaman ini.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
