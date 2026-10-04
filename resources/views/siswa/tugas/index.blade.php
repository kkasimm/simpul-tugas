@extends('layouts.app')

@section('title', 'Tugas')

@section('content')
    <h1>Tugas</h1>

    <table>
        <tr>
            <th>Nama Tugas</th>
            <th>Tanggal Pengumpulan</th>
            <th>Nama File</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse ($tugas as $t)
            @php $p = $t->pengumpulan->first(); @endphp
            <tr>
                <td>{{ $t->judul }}</td>
                <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                <td>{{ $p && $p->file_tugas ? basename($p->file_tugas) : '—' }}</td>
                <td>
                    <span class="badge badge-{{ $p->status ?? 'belum' }}">{{ ucfirst($p->status ?? 'belum') }}</span>
                    @if ($p && $p->terlambat) <span class="badge badge-terlambat">Terlambat</span> @endif
                </td>
                <td><a href="{{ route('siswa.tugas.show', $t) }}" class="btn btn-small">{{ $p ? 'Ubah' : 'Upload' }}</a></td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada tugas.</td></tr>
        @endforelse
    </table>
@endsection
