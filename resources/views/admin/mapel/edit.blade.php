@extends('layouts.app')
@section('title', 'Edit Mapel')
@section('content')
    <h1>Edit Mapel</h1>
    <form method="POST" action="{{ route('admin.mapel.update', $mapel) }}">
        @csrf @method('PUT')
        <label>Nama Mapel</label>
        <input type="text" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
        <button type="submit">Simpan</button>
    </form>
@endsection
