@extends('layouts.app')
@section('title', 'Penugasan Mengajar')
@section('content')
    <div class="page-header">
        <h1>Penugasan Mengajar</h1>
        <a href="{{ route('admin.penugasan.create') }}" class="btn">Tambah Penugasan</a>
    </div>
    <table>
        <tr><th>Guru</th><th>Mata Pelajaran</th><th>Kelas</th><th>Delete</th></tr>
        @forelse ($penugasan as $p)
            <tr>
                <td>{{ $p->guru->name }}</td>
                <td>{{ $p->mapel->nama_mapel }}</td>
                <td>{{ $p->kelas->nama_kelas }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.penugasan.destroy', $p) }}" onsubmit="return confirm('Hapus penugasan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#b33;cursor:pointer;padding:0;font-size:14px">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada penugasan.</td></tr>
        @endforelse
    </table>
@endsection
