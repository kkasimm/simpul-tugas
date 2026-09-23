@extends('layouts.app')
@section('title', 'Edit Kelas')
@section('content')
    <h1>Edit Kelas</h1>
    <form method="POST" action="{{ route('admin.kelas.update', $kelas) }}">
        @csrf @method('PUT')
        <label>Nama Kelas</label>
        <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
        <button type="submit">Simpan</button>
    </form>
@endsection
