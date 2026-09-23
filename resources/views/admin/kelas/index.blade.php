@extends('layouts.app')
@section('title', 'Kelola Kelas')
@section('content')
    <h1>Kelola Kelas</h1>
    <a href="{{ route('admin.kelas.create') }}">+ Tambah Kelas</a>
    <table border="1" cellpadding="6">
        <tr><th>Nama Kelas</th><th>Aksi</th></tr>
        @forelse ($kelas as $k)
            <tr>
                <td>{{ $k->nama_kelas }}</td>
                <td>
                    <a href="{{ route('admin.kelas.edit', $k) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}" style="display:inline" onsubmit="return confirm('Hapus kelas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="2">Belum ada kelas.</td></tr>
        @endforelse
    </table>
@endsection
