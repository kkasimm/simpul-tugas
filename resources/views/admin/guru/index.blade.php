@extends('layouts.app')
@section('title', 'Kelola Guru')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 fw-bold mb-0">Kelola Guru</h1>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Guru</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead><tr><th>Nama</th><th>Mata Pelajaran</th><th>Email</th><th style="width:160px">Aksi</th></tr></thead>
            <tbody>
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
                        <td>
                            <a href="{{ route('admin.guru.edit', $g) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.guru.destroy', $g) }}" class="d-inline js-confirm-delete" data-message="Guru '{{ $g->name }}' akan dihapus permanen.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada guru.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
