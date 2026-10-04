@extends('layouts.app')
@section('title', 'Nilai Tugas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Nilai Tugas &mdash; {{ $tugas->judul }}</h1>

    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead>
                <tr><th>Nama Siswa</th><th>Lihat Tugas</th><th>Status</th><th>Penilaian</th></tr>
            </thead>
            <tbody>
                @foreach ($pengumpulan as $p)
                    <tr>
                        <td>{{ $p->siswa->name }}</td>
                        <td>
                            @if ($p->file_tugas)
                                <a href="{{ \Storage::url($p->file_tugas) }}" target="_blank"><i class="bi bi-file-earmark-text"></i> {{ basename($p->file_tugas) }}</a>
                            @else
                                &mdash;
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $p->status === 'dinilai' ? 'success' : 'primary' }}">{{ ucfirst($p->status) }}</span>
                            @if ($p->terlambat) <span class="badge bg-danger">Terlambat</span> @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('guru.pengumpulan.update', $p) }}" class="d-flex gap-2 align-items-center">
                                @csrf @method('PUT')
                                <input type="number" name="nilai" value="{{ $p->nilai }}" min="0" max="100" class="form-control form-control-sm" style="width:80px" placeholder="Nilai">
                                <input type="text" name="komentar" value="{{ $p->komentar }}" class="form-control form-control-sm" placeholder="Tambahkan Komentar">
                                <button type="submit" class="btn btn-sm btn-primary text-nowrap">Save</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach ($siswaBelum as $s)
                    <tr class="table-light">
                        <td>{{ $s->name }}</td>
                        <td colspan="3" class="text-muted">Belum mengumpulkan</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('guru.tugas.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection
