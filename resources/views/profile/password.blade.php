@extends('layouts.app')

@section('title', 'Ganti Password')

@section('content')
    <h1>Ganti Password</h1>

    <form method="POST" action="{{ route('password.change') }}">
        @csrf
        @method('PUT')
        <label>Password Lama</label>
        <input type="password" name="current_password">
        <br>
        <label>Password Baru</label>
        <input type="password" name="password">
        <br>
        <label>Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation">
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
