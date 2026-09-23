@extends('layouts.app')
@section('title', 'Kelola Guru')
@section('content')
    <h1>Kelola Guru</h1>
    <a href="{{ route('admin.guru.create') }}">+ Tambah Guru</a>
    <table border="1" cellpadding="6">
        <tr><th>Nama</th><th>Email</th><th>Aksi</th></tr>
        @forelse ($guru as $g)
            <tr>
                <td>{{ $g->name }}</td>
                <td>{{ $g->email }}</td>
                <td>
                    <a href="{{ route('admin.guru.edit', $g) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.guru.destroy', $g) }}" style="display:inline" onsubmit="return confirm('Hapus guru ini?')">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada guru.</td></tr>
        @endforelse
    </table>
@endsection
