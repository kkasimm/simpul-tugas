<div class="list-group list-group-flush pt-2">
    <a href="{{ route('siswa.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>
    <a href="{{ route('siswa.tugas.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('siswa.tugas.*') ? 'active' : '' }}">
        <i class="bi bi-journal-text me-2"></i>Tugas
    </a>
    <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>Profil
    </a>
</div>
