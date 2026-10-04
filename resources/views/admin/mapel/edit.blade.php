@extends('layouts.app')
@section('title', 'Edit Mapel')
@section('content')
    <h1 class="h4 fw-bold mb-3">Edit Mapel</h1>
    <div class="card shadow-sm" style="max-width:420px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.mapel.update', $mapel) }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="form-control" value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
