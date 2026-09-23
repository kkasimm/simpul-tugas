@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
    <h1>Daftar Tugas</h1>

    <table border="1" cellpadding="6">
        <tr>
            <th>Judul</th>
            <th>Tenggat Waktu</th>
            <th>Status</th>
            <th>Nilai</th>
            <th></th>
        </tr>
        @forelse ($tugas as $t)
            @php $p = $t->pengumpulan->first(); @endphp
            <tr>
                <td>{{ $t->judul }}</td>
                <td>{{ $t->tenggat_waktu->format('d M Y H:i') }}</td>
                <td>
                    {{ $p->status ?? 'belum' }}
                    @if ($p && $p->terlambat) (terlambat) @endif
                </td>
                <td>{{ $p->nilai ?? '-' }}</td>
                <td><a href="{{ route('siswa.tugas.show', $t) }}">Lihat</a></td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada tugas.</td></tr>
        @endforelse
    </table>
@endsection
