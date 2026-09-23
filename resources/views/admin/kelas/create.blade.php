@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
    <h1>Tambah Kelas</h1>
    <form method="POST" action="{{ route('admin.kelas.store') }}">
        @csrf
        <label>Nama Kelas</label>
        <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}">
        <button type="submit">Simpan</button>
    </form>
@endsection
