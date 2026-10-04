<ul>
    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
    <li><a href="{{ route('admin.siswa.index') }}" class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">Kelola Siswa</a></li>
    <li><a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">Kelola Guru</a></li>
    <li><a href="{{ route('admin.mapel.index') }}" class="{{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}">Kelola Mata Pelajaran</a></li>
    <li><a href="{{ route('admin.kelas.index') }}" class="{{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">Kelola Kelas</a></li>
    <li><a href="{{ route('admin.penugasan.index') }}" class="{{ request()->routeIs('admin.penugasan.*') ? 'active' : '' }}">Penugasan Mengajar</a></li>
    <li><a href="{{ route('profile.show') }}" class="{{ request()->routeIs('profile.show') || request()->routeIs('password.edit') ? 'active' : '' }}">Profil</a></li>
</ul>
