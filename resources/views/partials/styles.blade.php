<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    :root {
        --bs-primary: #31aaa9;
        --bs-primary-rgb: 49, 170, 169;
        --bs-link-color: #31aaa9;
        --bs-link-hover-color: #278685;
    }

    body {
        background: #f2f2f2;
        animation: fadeIn .3s ease;
    }

    .btn-primary {
        --bs-btn-bg: #31aaa9;
        --bs-btn-border-color: #278685;
        --bs-btn-hover-bg: #278685;
        --bs-btn-hover-border-color: #1f6b6a;
        --bs-btn-active-bg: #1f6b6a;
        --bs-btn-active-border-color: #1f6b6a;
    }

    .bg-primary { background-color: #31aaa9 !important; }
    .text-primary { color: #31aaa9 !important; }

    .navbar-brand { font-weight: 700; }

    .sidebar { min-height: calc(100vh - 56px); background: #fff; border-right: 1px solid #e5e5e5; }

    .sidebar .list-group-item {
        border: none;
        border-radius: 0;
        border-left: 4px solid transparent;
        transition: background-color .15s ease, color .15s ease, border-color .15s ease;
    }

    .sidebar .list-group-item.active {
        background-color: #e9f6f6;
        color: #278685;
        font-weight: 600;
        border-left-color: #31aaa9;
    }

    .sidebar .list-group-item:not(.active):hover {
        background-color: #f7f7f7;
    }

    table thead th {
        background-color: #31aaa9;
        color: #fff;
        border-color: #278685;
    }

    .card, .table, .auth-card {
        animation: fadeInUp .35s ease-out;
    }

    .btn { transition: transform .12s ease, box-shadow .12s ease; }
    .btn:hover { transform: translateY(-1px); box-shadow: 0 4px 10px rgba(0,0,0,.12); }

    table tbody tr { transition: background-color .15s ease; }

    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-card { max-width: 400px; width: 100%; }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
