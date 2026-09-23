@extends('layouts.app')

@section('title', 'Kelola Tugas')

@section('content')
    <h1>Kelola Tugas</h1>

    <a href="{{ route('guru.tugas.create') }}">+ Tambah Tugas</a>

    <table border="1" cellpadding="6">
        <tr>
            <th>Judul</th>
            <th>Kelas</th>
            <th>Tenggat Waktu</th>
            <th>Aksi</th>
        </tr>
        @forelse ($tugas as $t)
            <tr>
                <td>{{ $t->judul }}</td>
                <td>{{ $t->kelas->nama_kelas }}</td>
                <td>{{ $t->tenggat_waktu->format('d M Y H:i') }}</td>
                <td>
                    <a href="{{ route('guru.tugas.pengumpulan', $t) }}">Nilai</a>
                    <a href="{{ route('guru.tugas.edit', $t) }}">Edit</a>
                    <form method="POST" action="{{ route('guru.tugas.destroy', $t) }}" style="display:inline" onsubmit="return confirm('Hapus tugas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada tugas.</td></tr>
        @endforelse
    </table>
@endsection
