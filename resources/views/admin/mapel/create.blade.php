@extends('layouts.app')
@section('title', 'Tambah Mapel')
@section('content')
    <h1>Tambah Mapel</h1>
    <form method="POST" action="{{ route('admin.mapel.store') }}">
        @csrf
        <label>Nama Mapel</label>
        <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}">
        <button type="submit">Simpan</button>
    </form>
@endsection
