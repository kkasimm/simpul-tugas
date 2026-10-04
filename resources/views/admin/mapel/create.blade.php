@extends('layouts.app')
@section('title', 'Tambah Mapel')
@section('content')
    <h1>Tambah Mapel</h1>
    <div class="card" style="max-width:420px">
        <form method="POST" action="{{ route('admin.mapel.store') }}">
            @csrf
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}">
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
