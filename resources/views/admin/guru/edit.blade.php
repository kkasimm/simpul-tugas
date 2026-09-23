@extends('layouts.app')
@section('title', 'Edit Guru')
@section('content')
    <h1>Edit Guru</h1>
    <form method="POST" action="{{ route('admin.guru.update', $guru) }}">
        @csrf @method('PUT')
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name', $guru->name) }}">
        <br>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $guru->email) }}">
        <br>
        <label>Password Baru (opsional, kosongkan kalau tidak ganti)</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
