@extends('layouts.app')

@section('title', 'Nilai Tugas')

@section('content')
    <h1>Pengumpulan: {{ $tugas->judul }}</h1>

    <table border="1" cellpadding="6">
        <tr>
            <th>Siswa</th>
            <th>File</th>
            <th>Waktu Upload</th>
            <th>Status</th>
            <th>Penilaian</th>
        </tr>
        @foreach ($pengumpulan as $p)
            <tr>
                <td>{{ $p->siswa->name }}</td>
                <td><a href="{{ \Storage::url($p->file_tugas) }}" target="_blank">Lihat File</a></td>
                <td>
                    {{ $p->waktu_upload?->format('d M Y H:i') }}
                    @if ($p->terlambat) (terlambat) @endif
                </td>
                <td>{{ $p->status }}</td>
                <td>
                    <form method="POST" action="{{ route('guru.pengumpulan.update', $p) }}">
                        @csrf
                        @method('PUT')
                        <input type="number" name="nilai" value="{{ $p->nilai }}" min="0" max="100" style="width:60px" placeholder="Nilai">
                        <input type="text" name="komentar" value="{{ $p->komentar }}" placeholder="Komentar">
                        <button type="submit">Simpan</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @foreach ($siswaBelum as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td colspan="4">Belum mengumpulkan</td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('guru.tugas.index') }}">&laquo; Kembali</a>
@endsection
