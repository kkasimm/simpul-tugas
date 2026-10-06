@extends('layouts.app')
@section('title', 'Kelola Siswa')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 fw-bold mb-0">Kelola Siswa</h1>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Siswa</a>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control js-table-search" data-target="#tabelSiswa" placeholder="Cari nama, kelas, atau email...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-white align-middle" id="tabelSiswa">
            <thead><tr><th>Nama</th><th>Kelas</th><th>Email</th><th style="width:160px">Aksi</th></tr></thead>
            <tbody>
                @forelse ($siswa as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $s->email }}</td>
                        <td>
                            <a href="{{ route('admin.siswa.edit', $s) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.siswa.destroy', $s) }}" class="d-inline js-confirm-delete" data-message="Siswa '{{ $s->name }}' akan dihapus permanen.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada siswa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
