@extends('layouts.app')
@section('title', 'Edit Guru')
@section('content')
    <h1>Edit Guru</h1>
    <div class="card" style="max-width:480px">
        <form method="POST" action="{{ route('admin.guru.update', $guru) }}">
            @csrf @method('PUT')
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $guru->name) }}">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $guru->email) }}">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password">
            <label>Jenis Kelamin</label>
            <select name="jk">
                <option value="L" @selected(old('jk', $guru->jk) == 'L')>Laki-laki</option>
                <option value="P" @selected(old('jk', $guru->jk) == 'P')>Perempuan</option>
            </select>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
