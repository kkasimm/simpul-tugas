@extends('layouts.app')
@section('title', 'Tugas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Tugas</h1>

    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead>
                <tr><th>Nama Tugas</th><th>Tanggal Pengumpulan</th><th>Nama File</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody>
                @forelse ($tugas as $t)
                    @php $p = $t->pengumpulan->first(); @endphp
                    <tr>
                        <td>{{ $t->judul }}</td>
                        <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                        <td>{{ $p && $p->file_tugas ? basename($p->file_tugas) : '—' }}</td>
                        <td>
                            <span class="badge bg-{{ ($p->status ?? 'belum') === 'dinilai' ? 'success' : (($p->status ?? 'belum') === 'terkirim' ? 'primary' : 'secondary') }}">{{ ucfirst($p->status ?? 'belum') }}</span>
                            @if ($p && $p->terlambat) <span class="badge bg-danger">Terlambat</span> @endif
                        </td>
                        <td><a href="{{ route('siswa.tugas.show', $t) }}" class="btn btn-sm btn-primary">{{ $p ? 'Ubah' : 'Upload' }}</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada tugas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
