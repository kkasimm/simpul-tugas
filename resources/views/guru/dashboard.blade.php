@extends('layouts.app')
@section('title', 'Dashboard Guru')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Guru</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-clipboard-check"></i></div>
                <div><div class="label">Tugas Aktif</div><div class="value">{{ $tugasAktif }}</div></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-hourglass-split"></i></div>
                <div><div class="label">Tanpa Nilai</div><div class="value">{{ $tanpaNilai }}</div></div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-5">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Status Tugas</p>
                <canvas id="chartStatusTugas" height="180"></canvas>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Pengumpulan Terbaru</p>
                <ul class="list-activity">
                    @forelse ($aktivitas as $a)
                        <li>
                            <div class="dot"><i class="bi bi-upload"></i></div>
                            <div>
                                <div class="fw-semibold">{{ $a->siswa->name }}</div>
                                <div class="text-muted small">Mengumpulkan "{{ $a->tugas->judul }}" &middot; {{ $a->waktu_upload?->diffForHumans() }}</div>
                            </div>
                        </li>
                    @empty
                        <li class="text-muted">Belum ada pengumpulan.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <p class="fw-semibold mb-3">Kelas &amp; Mata Pelajaran yang Diajar</p>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead><tr><th>Kelas</th><th>Mata Pelajaran</th></tr></thead>
                <tbody>
                    @forelse ($penugasan as $p)
                        <tr><td>{{ $p->kelas->nama_kelas }}</td><td>{{ $p->mapel->nama_mapel }}</td></tr>
                    @empty
                        <tr><td colspan="2" class="text-center text-muted">Belum ada penugasan mengajar. Hubungi Admin.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    new Chart(document.getElementById('chartStatusTugas'), {
        type: 'doughnut',
        data: {
            labels: ['Draft', 'Aktif', 'Selesai'],
            datasets: [{
                data: [{{ $statusChart['draft'] }}, {{ $statusChart['aktif'] }}, {{ $statusChart['selesai'] }}],
                backgroundColor: ['#c9ced3', '#2fa6a5', '#28a745'],
            }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endpush
