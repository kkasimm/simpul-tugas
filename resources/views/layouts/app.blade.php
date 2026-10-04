<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SimpulTugas')</title>
    @include('partials.styles')
</head>
<body>
    <div class="navbar">
        <span class="brand">SimpulTugas</span>
        <span class="navbar-right">
            <span>{{ auth()->user()->name }} &mdash; {{ ucfirst(auth()->user()->role) }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </span>
    </div>

    <div class="layout">
        <nav class="sidebar">
            @include('partials.sidebar-' . auth()->user()->role)
        </nav>

        <main class="main-content">
            @if (session('status'))
                <div class="alert alert-status">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
