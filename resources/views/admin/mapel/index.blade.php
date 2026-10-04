@extends('layouts.app')
@section('title', 'Kelola Mata Pelajaran')
@section('content')
    <div class="page-header">
        <h1>Kelola Mata Pelajaran</h1>
        <a href="{{ route('admin.mapel.create') }}" class="btn">Tambah Mapel</a>
    </div>
    <table>
        <tr><th>Nama Mapel</th><th>Edit</th><th>Delete</th></tr>
        @forelse ($mapel as $m)
            <tr>
                <td>{{ $m->nama_mapel }}</td>
                <td><a href="{{ route('admin.mapel.edit', $m) }}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('admin.mapel.destroy', $m) }}" onsubmit="return confirm('Hapus mapel ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#b33;cursor:pointer;padding:0;font-size:14px">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada mapel.</td></tr>
        @endforelse
    </table>
    <p><a href="{{ route('admin.penugasan.index') }}">Kelola Penugasan Mengajar (Guru - Mapel - Kelas) &raquo;</a></p>
@endsection
