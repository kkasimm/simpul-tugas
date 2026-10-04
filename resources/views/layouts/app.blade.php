<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SimpulTugas')</title>
    @include('partials.styles')
</head>
<body>
    <nav class="navbar navbar-dark bg-primary px-3">
        <span class="navbar-brand mb-0">SimpulTugas</span>
        <div class="d-flex align-items-center gap-3 text-white">
            <span>{{ auth()->user()->name }} &mdash; {{ ucfirst(auth()->user()->role) }}</span>
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="d-flex">
        <nav class="sidebar" style="width:230px">
            @include('partials.sidebar-' . auth()->user()->role)
        </nav>

        <main class="flex-fill p-4">
            @yield('content')
        </main>
    </div>

    @include('partials.scripts')
</body>
</html>
