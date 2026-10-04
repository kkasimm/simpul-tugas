<div class="list-group list-group-flush pt-2">
    <a href="{{ route('guru.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>
    <a href="{{ route('guru.tugas.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.tugas.index') || request()->routeIs('guru.tugas.edit') ? 'active' : '' }}">
        <i class="bi bi-clipboard-check me-2"></i>Kelola Tugas
    </a>
    <a href="{{ route('guru.tugas.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.tugas.pengumpulan') ? 'active' : '' }}">
        <i class="bi bi-star me-2"></i>Nilai Tugas
    </a>
    <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>Profil
    </a>
</div>
