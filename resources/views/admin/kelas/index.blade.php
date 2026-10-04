@extends('layouts.app')
@section('title', 'Kelola Kelas')
@section('content')
    <div class="page-header">
        <h1>Kelola Kelas</h1>
        <a href="{{ route('admin.kelas.create') }}" class="btn">Tambah Kelas</a>
    </div>
    <table>
        <tr><th>Nama Kelas</th><th>Edit</th><th>Delete</th></tr>
        @forelse ($kelas as $k)
            <tr>
                <td>{{ $k->nama_kelas }}</td>
                <td><a href="{{ route('admin.kelas.edit', $k) }}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}" onsubmit="return confirm('Hapus kelas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="link danger" style="background:none;border:none;color:#b33;cursor:pointer;padding:0;font-size:14px">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada kelas.</td></tr>
        @endforelse
    </table>
@endsection
