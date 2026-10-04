@extends('layouts.app')
@section('title', 'Kelola Kelas')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 fw-bold mb-0">Kelola Kelas</h1>
        <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Kelas</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead><tr><th>Nama Kelas</th><th style="width:160px">Aksi</th></tr></thead>
            <tbody>
                @forelse ($kelas as $k)
                    <tr>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('admin.kelas.edit', $k) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}" class="d-inline js-confirm-delete" data-message="Kelas '{{ $k->nama_kelas }}' akan dihapus permanen.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center text-muted">Belum ada kelas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
