@extends('layouts.app')
@section('title', 'Tambah Penugasan')
@section('content')
    <h1 class="h4 fw-bold mb-3">Tambah Penugasan Mengajar</h1>
    <div class="card shadow-sm" style="max-width:420px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.penugasan.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Guru</label>
                    <select name="guru_id" class="form-select">
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($guruList as $g)
                            <option value="{{ $g->id }}" @selected(old('guru_id') == $g->id)>{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-select">
                        <option value="">-- Pilih Mapel --</option>
                        @foreach ($mapelList as $m)
                            <option value="{{ $m->id }}" @selected(old('mapel_id') == $m->id)>{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas_id" class="form-select">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelasList as $k)
                            <option value="{{ $k->id }}" @selected(old('kelas_id') == $k->id)>{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
