@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')
    <h1>Tambah Guru</h1>
    <form method="POST" action="{{ route('admin.guru.store') }}">
        @csrf
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>
        <label>Password</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
