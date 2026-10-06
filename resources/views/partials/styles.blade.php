<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    :root {
        --bs-primary: #2fa6a5;
        --bs-primary-rgb: 47, 166, 165;
        --bs-link-color: #2fa6a5;
        --bs-link-hover-color: #1f7e7d;
        --brand: #2fa6a5;
        --brand-dark: #228584;
        --brand-soft: #e7f6f5;
    }

    * { font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif; }

    body {
        background: #f4f6f7;
        color: #1f2430;
        animation: fadeIn .3s ease;
    }

    h1, h2, h3, .fw-bold { letter-spacing: -0.01em; }

    .btn-primary {
        --bs-btn-bg: var(--brand);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand-dark);
        --bs-btn-hover-border-color: var(--brand-dark);
        --bs-btn-active-bg: var(--brand-dark);
        --bs-btn-active-border-color: var(--brand-dark);
    }

    .bg-primary { background-color: var(--brand) !important; }
    .text-primary { color: var(--brand) !important; }

    .btn { border-radius: 8px; font-weight: 600; transition: filter .12s ease; }
    .btn:hover { filter: brightness(0.96); }
    .btn-sm { border-radius: 6px; }

    .navbar { background-color: var(--brand) !important; box-shadow: 0 1px 6px rgba(0,0,0,.08); }
    .navbar-brand { font-weight: 800; letter-spacing: -0.02em; }

    .sidebar {
        min-height: calc(100vh - 56px);
        background: #fff;
        border-right: 1px solid #ebeef0;
        padding-top: .5rem;
    }

    .sidebar .list-group-item {
        border: none;
        border-radius: 8px;
        margin: 2px 10px;
        width: calc(100% - 20px);
        border-left: 3px solid transparent;
        transition: background-color .15s ease, color .15s ease;
        font-weight: 500;
        color: #4a5160;
    }

    .sidebar .list-group-item.active {
        background: var(--brand-soft);
        color: var(--brand-dark);
        font-weight: 700;
        border-left-color: var(--brand);
    }

    .sidebar .list-group-item:not(.active):hover {
        background-color: #f5f7f7;
    }

    .card {
        border: 1px solid #ebeef0;
        border-radius: 12px;
        box-shadow: 0 1px 6px rgba(20,30,40,.04);
        animation: fadeInUp .3s ease-out;
    }

    .stat-card {
        border-radius: 12px;
        border: 1px solid #ebeef0;
        box-shadow: 0 1px 6px rgba(20,30,40,.04);
    }
    .stat-card .icon-circle {
        width: 44px; height: 44px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        background: var(--brand-soft); color: var(--brand-dark); font-size: 19px;
    }
    .stat-card .value { font-size: 1.8rem; font-weight: 800; }
    .stat-card .label { color: #6b7280; font-size: .8rem; font-weight: 600; text-transform: uppercase; letter-spacing: .03em; }

    table { border-radius: 10px; overflow: hidden; animation: fadeInUp .3s ease-out; }
    table thead th {
        background-color: var(--brand);
        color: #fff; border-color: var(--brand-dark); font-weight: 600; font-size: .85rem;
    }
    table tbody tr { transition: background-color .15s ease; }
    table tbody tr:hover { background-color: #f6fbfb; }

    .badge { border-radius: 6px; font-weight: 600; padding: .4em .7em; }

    .auth-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #f4f6f7; }
    .auth-card { max-width: 400px; width: 100%; border-radius: 14px; }

    .avatar-circle {
        width: 56px; height: 56px; border-radius: 50%;
        background: var(--brand);
        color: #fff; display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: 1.3rem;
    }

    .list-activity { list-style: none; margin: 0; padding: 0; }
    .list-activity li { display: flex; gap: .75rem; padding: .6rem 0; border-bottom: 1px solid #f0f2f3; }
    .list-activity li:last-child { border-bottom: none; }
    .list-activity .dot {
        width: 34px; height: 34px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: var(--brand-soft); color: var(--brand-dark);
    }

    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>
