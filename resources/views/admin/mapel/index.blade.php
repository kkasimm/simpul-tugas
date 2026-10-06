@extends('layouts.app')
@section('title', 'Kelola Mata Pelajaran')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 fw-bold mb-0">Kelola Mata Pelajaran</h1>
        <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Mapel</a>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control js-table-search" data-target="#tabelMapel" placeholder="Cari nama mapel...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-white align-middle" id="tabelMapel">
            <thead><tr><th>Nama Mapel</th><th style="width:160px">Aksi</th></tr></thead>
            <tbody>
                @forelse ($mapel as $m)
                    <tr>
                        <td>{{ $m->nama_mapel }}</td>
                        <td>
                            <a href="{{ route('admin.mapel.edit', $m) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.mapel.destroy', $m) }}" class="d-inline js-confirm-delete" data-message="Mapel '{{ $m->nama_mapel }}' akan dihapus permanen.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center text-muted">Belum ada mapel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.penugasan.index') }}"><i class="bi bi-link-45deg"></i> Kelola Penugasan Mengajar (Guru - Mapel - Kelas)</a>
@endsection
