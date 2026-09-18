<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SimpulTugas')</title>
</head>
<body>
    <header>
        <strong>SimpulTugas</strong>
        <span>
            {{ auth()->user()->name }}
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </span>
    </header>

    <div style="display:flex">
        <nav>
            @include('partials.sidebar-' . auth()->user()->role)
        </nav>

        <main>
            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
