@extends('layouts.app')
@section('title', 'Penugasan Mengajar')
@section('content')
    <h1>Penugasan Mengajar (Guru - Mapel - Kelas)</h1>
    <a href="{{ route('admin.penugasan.create') }}">+ Tambah Penugasan</a>
    <table border="1" cellpadding="6">
        <tr><th>Guru</th><th>Mapel</th><th>Kelas</th><th>Aksi</th></tr>
        @forelse ($penugasan as $p)
            <tr>
                <td>{{ $p->guru->name }}</td>
                <td>{{ $p->mapel->nama_mapel }}</td>
                <td>{{ $p->kelas->nama_kelas }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.penugasan.destroy', $p) }}" style="display:inline" onsubmit="return confirm('Hapus penugasan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada penugasan.</td></tr>
        @endforelse
    </table>
@endsection
