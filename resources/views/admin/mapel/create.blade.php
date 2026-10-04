@extends('layouts.app')
@section('title', 'Tambah Mapel')
@section('content')
    <h1 class="h4 fw-bold mb-3">Tambah Mapel</h1>
    <div class="card shadow-sm" style="max-width:420px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.mapel.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="form-control" value="{{ old('nama_mapel') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
