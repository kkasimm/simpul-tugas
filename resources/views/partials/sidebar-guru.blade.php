<ul>
    <li><a href="{{ route('guru.dashboard') }}" class="{{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">Dashboard</a></li>
    <li><a href="{{ route('guru.tugas.index') }}" class="{{ request()->routeIs('guru.tugas.index') || request()->routeIs('guru.tugas.create') || request()->routeIs('guru.tugas.edit') ? 'active' : '' }}">Kelola Tugas</a></li>
    <li><a href="{{ route('guru.tugas.index') }}" class="{{ request()->routeIs('guru.tugas.pengumpulan') ? 'active' : '' }}">Nilai Tugas</a></li>
    <li><a href="{{ route('profile.show') }}" class="{{ request()->routeIs('profile.show') || request()->routeIs('password.edit') ? 'active' : '' }}">Profil</a></li>
</ul>
