@extends('layouts.app')
@section('title', 'Kalender')
@section('content')
    <h1 class="h4 fw-bold mb-3">Kalender Tenggat Tugas</h1>
    <div class="card p-3">
        <div id="calendar"></div>
    </div>
    <p class="text-muted small mt-2">
        <span class="badge" style="background:#dc3545">&nbsp;</span> Belum
        &nbsp; <span class="badge" style="background:#2fa6a5">&nbsp;</span> Terkirim
        &nbsp; <span class="badge" style="background:#28a745">&nbsp;</span> Dinilai
        — klik tanggal untuk membuka tugas tersebut.
    </p>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',
            headerToolbar: { left: 'prev,next today', center: 'title', right: '' },
            events: @json($events),
        });
        calendar.render();
    });
</script>
@endpush
