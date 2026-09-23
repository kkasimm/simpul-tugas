@extends('layouts.app')
@section('title', 'Kelola Mapel')
@section('content')
    <h1>Kelola Mapel</h1>
    <a href="{{ route('admin.mapel.create') }}">+ Tambah Mapel</a>
    <table border="1" cellpadding="6">
        <tr><th>Nama Mapel</th><th>Aksi</th></tr>
        @forelse ($mapel as $m)
            <tr>
                <td>{{ $m->nama_mapel }}</td>
                <td>
                    <a href="{{ route('admin.mapel.edit', $m) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.mapel.destroy', $m) }}" style="display:inline" onsubmit="return confirm('Hapus mapel ini?')">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="2">Belum ada mapel.</td></tr>
        @endforelse
    </table>
    <p><a href="{{ route('admin.penugasan.index') }}">Kelola Penugasan Mengajar &raquo;</a></p>
@endsection
