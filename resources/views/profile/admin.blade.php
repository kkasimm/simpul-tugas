@extends('layouts.app')

@section('title', 'Profil Admin')

@section('content')
    <h1>Profil Admin</h1>

    <div class="card" style="max-width:480px">
        <p style="font-weight:700;margin-top:0">Informasi Admin</p>

        <div class="profile-field">
            <label>Nama</label>
            <div class="value">{{ $user->name }}</div>
        </div>
        <div class="profile-field">
            <label>Jenis Kelamin</label>
            <div class="value">{{ $user->jk === 'L' ? 'Laki-laki' : ($user->jk === 'P' ? 'Perempuan' : '-') }}</div>
        </div>
        <div class="profile-field">
            <label>Email</label>
            <div class="value">{{ $user->email }}</div>
        </div>
        <p class="profile-note">Data profil hanya dapat dilihat.</p>
    </div>

    <div class="card" style="max-width:480px">
        <p style="font-weight:700;margin-top:0">Ganti Password</p>
        <form method="POST" action="{{ route('password.change') }}">
            @csrf
            @method('PUT')
            <label>Password Lama</label>
            <input type="password" name="current_password">
            <label>Password Baru</label>
            <input type="password" name="password">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation">
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
