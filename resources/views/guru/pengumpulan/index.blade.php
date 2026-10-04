@extends('layouts.app')

@section('title', 'Nilai Tugas')

@section('content')
    <h1>Nilai Tugas &mdash; {{ $tugas->judul }}</h1>

    <table>
        <tr>
            <th>Nama Siswa</th>
            <th>Lihat Tugas</th>
            <th>Status</th>
            <th>Nilai</th>
            <th>Komentar Guru</th>
            <th>Save</th>
        </tr>
        @foreach ($pengumpulan as $p)
            <tr>
                <td>{{ $p->siswa->name }}</td>
                <td>
                    @if ($p->file_tugas)
                        <a href="{{ \Storage::url($p->file_tugas) }}" target="_blank">{{ basename($p->file_tugas) }}</a>
                    @else
                        &mdash;
                    @endif
                </td>
                <td>
                    <span class="badge badge-{{ $p->status }}">{{ ucfirst($p->status) }}</span>
                    @if ($p->terlambat) <span class="badge badge-terlambat">Terlambat</span> @endif
                </td>
                <td colspan="3">
                    <form method="POST" action="{{ route('guru.pengumpulan.update', $p) }}" style="display:flex;gap:10px;align-items:center">
                        @csrf
                        @method('PUT')
                        <input type="number" name="nilai" value="{{ $p->nilai }}" min="0" max="100" style="width:70px;margin:0" placeholder="Nilai">
                        <input type="text" name="komentar" value="{{ $p->komentar }}" placeholder="Tambahkan Komentar" style="margin:0">
                        <button type="submit" class="btn btn-small">Save</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @foreach ($siswaBelum as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td colspan="5">Belum mengumpulkan</td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('guru.tugas.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
@endsection
