@extends('layouts.app')
@section('title', 'Tambah Penugasan')
@section('content')
    <h1>Tambah Penugasan Mengajar</h1>
    <form method="POST" action="{{ route('admin.penugasan.store') }}">
        @csrf
        <label>Guru</label>
        <select name="guru_id">
            <option value="">-- Pilih Guru --</option>
            @foreach ($guruList as $g)
                <option value="{{ $g->id }}" @selected(old('guru_id') == $g->id)>{{ $g->name }}</option>
            @endforeach
        </select>
        <br>
        <label>Mapel</label>
        <select name="mapel_id">
            <option value="">-- Pilih Mapel --</option>
            @foreach ($mapelList as $m)
                <option value="{{ $m->id }}" @selected(old('mapel_id') == $m->id)>{{ $m->nama_mapel }}</option>
            @endforeach
        </select>
        <br>
        <label>Kelas</label>
        <select name="kelas_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelasList as $k)
                <option value="{{ $k->id }}" @selected(old('kelas_id') == $k->id)>{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
