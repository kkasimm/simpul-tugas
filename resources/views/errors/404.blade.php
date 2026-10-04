<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman Tidak Ditemukan</title>
    @include('partials.styles')
</head>
<body>
    <div class="auth-wrapper text-center">
        <div>
            <div class="display-1 fw-bold text-primary">404</div>
            <p class="fs-5 mb-1">Halaman tidak ditemukan</p>
            <p class="text-muted mb-4">URL yang kamu buka tidak ada di SimpulTugas.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
