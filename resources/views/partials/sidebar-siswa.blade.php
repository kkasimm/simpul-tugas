<ul>
    <li><a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">Dashboard</a></li>
    <li><a href="{{ route('siswa.tugas.index') }}" class="{{ request()->routeIs('siswa.tugas.*') ? 'active' : '' }}">Tugas</a></li>
    <li><a href="{{ route('profile.show') }}" class="{{ request()->routeIs('profile.show') || request()->routeIs('password.edit') ? 'active' : '' }}">Profil</a></li>
</ul>
