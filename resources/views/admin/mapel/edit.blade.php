@extends('layouts.app')
@section('title', 'Edit Mapel')
@section('content')
    <h1>Edit Mapel</h1>
    <div class="card" style="max-width:420px">
        <form method="POST" action="{{ route('admin.mapel.update', $mapel) }}">
            @csrf @method('PUT')
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
