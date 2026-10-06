<div class="list-group list-group-flush pt-2">
    <a href="{{ route('guru.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door me-2"></i>Dashboard
    </a>
    <a href="{{ route('guru.tugas.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.tugas.index') || request()->routeIs('guru.tugas.edit') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text me-2"></i>Kelola Tugas
    </a>
    <a href="{{ route('guru.nilai.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.nilai.*') || request()->routeIs('guru.tugas.pengumpulan') ? 'active' : '' }}">
        <i class="bi bi-check2-square me-2"></i>Nilai Tugas
    </a>
    <a href="{{ route('guru.kalender.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.kalender.*') ? 'active' : '' }}">
        <i class="bi bi-calendar3 me-2"></i>Kalender
    </a>
    <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>Profil
    </a>
</div>
