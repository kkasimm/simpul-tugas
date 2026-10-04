@extends('layouts.app')
@section('title', 'Kelola Siswa')
@section('content')
    <div class="page-header">
        <h1>Kelola Siswa</h1>
        <a href="{{ route('admin.siswa.create') }}" class="btn">Tambah Siswa</a>
    </div>
    <table>
        <tr><th>Nama</th><th>Kelas</th><th>Email</th><th>Edit</th><th>Delete</th></tr>
        @forelse ($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $s->email }}</td>
                <td><a href="{{ route('admin.siswa.edit', $s) }}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('admin.siswa.destroy', $s) }}" onsubmit="return confirm('Hapus siswa ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#b33;cursor:pointer;padding:0;font-size:14px">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada siswa.</td></tr>
        @endforelse
    </table>
@endsection
