<div class="list-group list-group-flush pt-2">
    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door me-2"></i>Dashboard
    </a>
    <a href="{{ route('admin.siswa.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i>Kelola Siswa
    </a>
    <a href="{{ route('admin.guru.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>Kelola Guru
    </a>
    <a href="{{ route('admin.mapel.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}">
        <i class="bi bi-book me-2"></i>Kelola Mata Pelajaran
    </a>
    <a href="{{ route('admin.kelas.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">
        <i class="bi bi-door-open me-2"></i>Kelola Kelas
    </a>
    <a href="{{ route('admin.penugasan.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.penugasan.*') ? 'active' : '' }}">
        <i class="bi bi-link-45deg me-2"></i>Penugasan Mengajar
    </a>
    <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>Profil
    </a>
</div>
