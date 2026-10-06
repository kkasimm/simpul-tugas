@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Admin</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-people"></i></div>
                <div><div class="label">Jumlah Siswa</div><div class="value">{{ $jumlahSiswa }}</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-person-badge"></i></div>
                <div><div class="label">Jumlah Guru</div><div class="value">{{ $jumlahGuru }}</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-white p-3 d-flex align-items-center gap-3">
                <div class="icon-circle"><i class="bi bi-book"></i></div>
                <div><div class="label">Jumlah Mapel</div><div class="value">{{ $jumlahMapel }}</div></div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-7">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Siswa per Kelas</p>
                @if ($siswaPerKelas->isEmpty())
                    <p class="text-muted">Belum ada data kelas.</p>
                @else
                    <canvas id="chartSiswaKelas" height="140"></canvas>
                @endif
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card p-3 h-100">
                <p class="fw-semibold mb-3">Aktivitas Terbaru</p>
                <ul class="list-activity">
                    @forelse ($aktivitas as $a)
                        <li>
                            <div class="dot"><i class="bi bi-person-plus"></i></div>
                            <div>
                                <div class="fw-semibold">{{ $a->name }}</div>
                                <div class="text-muted small">{{ $a->role === 'siswa' ? 'Siswa baru ditambahkan' : 'Guru baru ditambahkan' }} &middot; {{ $a->created_at->diffForHumans() }}</div>
                            </div>
                        </li>
                    @empty
                        <li class="text-muted">Belum ada aktivitas.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('chartSiswaKelas');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($siswaPerKelas->pluck('nama_kelas')),
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: @json($siswaPerKelas->pluck('siswa_count')),
                    backgroundColor: '#2fa6a5',
                    borderRadius: 8,
                    maxBarThickness: 40,
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    }
</script>
@endpush
