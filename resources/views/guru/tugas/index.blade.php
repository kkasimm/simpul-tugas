@extends('layouts.app')

@section('title', 'Kelola Tugas')

@section('content')
    <div class="page-header">
        <h1>Kelola Tugas</h1>
    </div>

    <div class="card">
        <p style="font-weight:700;margin-top:0">Buat Tugas Baru</p>
        <form method="POST" action="{{ route('guru.tugas.store') }}">
            @csrf
            <label>Judul Tugas</label>
            <input type="text" name="judul" placeholder="Masukkan Judul Tugas" value="{{ old('judul') }}">

            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>

            <div class="form-row">
                <div>
                    <label>Kelas &amp; Mata Pelajaran</label>
                    <select name="penugasan_id">
                        <option value="">-- Pilih Kelas &amp; Mapel --</option>
                        @foreach ($penugasanList as $p)
                            <option value="{{ $p->id }}" @selected(old('penugasan_id') == $p->id)>{{ $p->kelas->nama_kelas }} &ndash; {{ $p->mapel->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Tanggal Pengumpulan</label>
                    <input type="datetime-local" name="tenggat_waktu" value="{{ old('tenggat_waktu') }}">
                </div>
                <div>
                    <label>Status</label>
                    <select name="status">
                        <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                        <option value="aktif" @selected(old('status', 'aktif') == 'aktif')>Aktif</option>
                        <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                    </select>
                </div>
            </div>

            @if ($penugasanList->isEmpty())
                <p style="color:#a11">Kamu belum ditugaskan mengajar di kelas manapun. Hubungi Admin.</p>
            @endif

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>

    <p style="font-weight:700;margin-bottom:10px">Tugas</p>
    <table>
        <tr>
            <th>Nama Tugas</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Tanggal Pengumpulan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @forelse ($tugas as $t)
            <tr>
                <td>{{ $t->judul }}</td>
                <td>{{ $t->kelas->nama_kelas }}</td>
                <td>{{ $t->mapel->nama_mapel ?? '-' }}</td>
                <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                <td><span class="badge badge-{{ $t->status }}">{{ ucfirst($t->status) }}</span></td>
                <td class="row-actions">
                    <a href="{{ route('guru.tugas.pengumpulan', $t) }}">Nilai</a>
                    <a href="{{ route('guru.tugas.edit', $t) }}">Edit</a>
                    <form method="POST" action="{{ route('guru.tugas.destroy', $t) }}" onsubmit="return confirm('Hapus tugas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="link danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Belum ada tugas.</td></tr>
        @endforelse
    </table>
@endsection
