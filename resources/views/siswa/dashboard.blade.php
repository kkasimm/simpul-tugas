@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Siswa</h1>

    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Tugas Baru</div>
                <div class="fs-3 fw-bold">{{ $stats['tugas_baru'] ?? 0 }}</div>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Terkirim</div>
                <div class="fs-3 fw-bold">{{ $stats['terkirim'] ?? 0 }}</div>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Terlambat</div>
                <div class="fs-3 fw-bold">{{ $stats['terlambat'] ?? 0 }}</div>
            </div></div>
        </div>
    </div>

    <p class="fw-semibold">Tugas Terbaru</p>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
            <thead><tr><th>Nama Tugas</th><th>Tenggat Waktu</th><th>Status</th></tr></thead>
            <tbody>
                @forelse ($tugasTerbaru ?? [] as $t)
                    @php $p = $t->pengumpulan->first(); @endphp
                    <tr>
                        <td>{{ $t->judul }}</td>
                        <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                        <td><span class="badge bg-{{ ($p->status ?? 'belum') === 'dinilai' ? 'success' : (($p->status ?? 'belum') === 'terkirim' ? 'primary' : 'secondary') }}">{{ ucfirst($p->status ?? 'belum') }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-muted">Belum ada tugas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
