@extends('layouts.app')
@section('title', 'Kelola Siswa')
@section('content')
    <h1>Kelola Siswa</h1>
    <a href="{{ route('admin.siswa.create') }}">+ Tambah Siswa</a>
    <table border="1" cellpadding="6">
        <tr><th>Nama</th><th>Kelas</th><th>Jenis Kelamin</th><th>Email</th><th>Aksi</th></tr>
        @forelse ($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $s->jk }}</td>
                <td>{{ $s->email }}</td>
                <td>
                    <a href="{{ route('admin.siswa.edit', $s) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.siswa.destroy', $s) }}" style="display:inline" onsubmit="return confirm('Hapus siswa ini?')">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada siswa.</td></tr>
        @endforelse
    </table>
@endsection
