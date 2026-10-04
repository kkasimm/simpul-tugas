@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Tambah Kelas</h1>
    <div class="card shadow-sm" style="max-width:420px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.kelas.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
