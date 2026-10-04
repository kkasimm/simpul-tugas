@extends('layouts.app')
@section('title', 'Penugasan Mengajar')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 fw-bold mb-0">Penugasan Mengajar</h1>
        <a href="{{ route('admin.penugasan.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Penugasan</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead><tr><th>Guru</th><th>Mata Pelajaran</th><th>Kelas</th><th style="width:100px">Aksi</th></tr></thead>
            <tbody>
                @forelse ($penugasan as $p)
                    <tr>
                        <td>{{ $p->guru->name }}</td>
                        <td>{{ $p->mapel->nama_mapel }}</td>
                        <td>{{ $p->kelas->nama_kelas }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.penugasan.destroy', $p) }}" class="d-inline js-confirm-delete" data-message="Penugasan ini akan dihapus.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada penugasan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
