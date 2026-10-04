@extends('layouts.app')
@section('title', 'Kelola Guru')
@section('content')
    <div class="page-header">
        <h1>Kelola Guru</h1>
        <a href="{{ route('admin.guru.create') }}" class="btn">Tambah Guru</a>
    </div>
    <table>
        <tr><th>Nama</th><th>Mata Pelajaran</th><th>Email</th><th>Edit</th><th>Delete</th></tr>
        @forelse ($guru as $g)
            <tr>
                <td>{{ $g->name }}</td>
                <td>
                    @forelse ($g->penugasanMengajar as $p)
                        {{ $p->mapel->nama_mapel }}@if (!$loop->last), @endif
                    @empty
                        -
                    @endforelse
                </td>
                <td>{{ $g->email }}</td>
                <td><a href="{{ route('admin.guru.edit', $g) }}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('admin.guru.destroy', $g) }}" onsubmit="return confirm('Hapus guru ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#b33;cursor:pointer;padding:0;font-size:14px">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada guru.</td></tr>
        @endforelse
    </table>
@endsection
