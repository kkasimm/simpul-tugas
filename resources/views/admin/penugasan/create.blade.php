@extends('layouts.app')
@section('title', 'Tambah Penugasan')
@section('content')
    <h1>Tambah Penugasan Mengajar</h1>
    <div class="card" style="max-width:420px">
        <form method="POST" action="{{ route('admin.penugasan.store') }}">
            @csrf
            <label>Guru</label>
            <select name="guru_id">
                <option value="">-- Pilih Guru --</option>
                @foreach ($guruList as $g)
                    <option value="{{ $g->id }}" @selected(old('guru_id') == $g->id)>{{ $g->name }}</option>
                @endforeach
            </select>
            <label>Mata Pelajaran</label>
            <select name="mapel_id">
                <option value="">-- Pilih Mapel --</option>
                @foreach ($mapelList as $m)
                    <option value="{{ $m->id }}" @selected(old('mapel_id') == $m->id)>{{ $m->nama_mapel }}</option>
                @endforeach
            </select>
            <label>Kelas</label>
            <select name="kelas_id">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelasList as $k)
                    <option value="{{ $k->id }}" @selected(old('kelas_id') == $k->id)>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
