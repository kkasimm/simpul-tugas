@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Siswa</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-journal-plus"></i></div>
                <div><div class="label">Tugas Baru</div><div class="value">{{ $stats['tugas_baru'] ?? 0 }}</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-send-check"></i></div>
                <div><div class="label">Terkirim</div><div class="value">{{ $stats['terkirim'] ?? 0 }}</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-alarm"></i></div>
                <div><div class="label">Terlambat</div><div class="value">{{ $stats['terlambat'] ?? 0 }}</div></div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-4">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Status Tugas</p>
                <canvas id="chartStatusSiswa" height="200"></canvas>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Tugas Terbaru</p>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead><tr><th>Nama Tugas</th><th>Tenggat</th><th>Status</th></tr></thead>
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    new Chart(document.getElementById('chartStatusSiswa'), {
        type: 'doughnut',
        data: {
            labels: ['Belum', 'Terkirim', 'Dinilai'],
            datasets: [{
                data: [{{ $statusChart['belum'] }}, {{ $statusChart['terkirim'] }}, {{ $statusChart['dinilai'] }}],
                backgroundColor: ['#c9ced3', '#2fa6a5', '#28a745'],
            }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endpush
