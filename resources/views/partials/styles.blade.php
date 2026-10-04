<style>
    :root {
        --teal: #31aaa9;
        --teal-dark: #278685;
        --bg: #f2f2f2;
        --border: #222222;
        --border-light: #dddddd;
        --text: #1a1a1a;
        --text-muted: #555555;
        --sidebar-active-bg: #e5e5e5;
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        background: var(--bg);
        color: var(--text);
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
    }

    a { color: var(--teal); }

    h1 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 20px;
    }

    /* Navbar */
    .navbar {
        background: var(--teal);
        color: #fff;
        padding: 16px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar .brand {
        font-size: 18px;
        font-weight: 700;
    }

    .navbar .navbar-right {
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 14px;
    }

    .navbar .navbar-right form { display: inline; }

    .navbar a, .navbar button {
        color: #fff;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        padding: 0;
    }

    /* Layout */
    .layout { display: flex; align-items: flex-start; min-height: calc(100vh - 56px); }

    .sidebar {
        width: 220px;
        background: #fff;
        min-height: calc(100vh - 56px);
        flex-shrink: 0;
    }

    .sidebar ul { list-style: none; margin: 0; padding: 16px 0; }

    .sidebar li a {
        display: block;
        padding: 14px 24px;
        color: var(--text);
        text-decoration: none;
        border-left: 4px solid transparent;
    }

    .sidebar li a.active {
        background: var(--sidebar-active-bg);
        color: var(--teal);
        font-weight: 700;
        border-left-color: var(--teal);
    }

    .main-content { flex: 1; padding: 32px; }

    /* Cards */
    .card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 20px;
        margin-bottom: 24px;
    }

    .stat-cards { display: flex; gap: 16px; margin-bottom: 24px; flex-wrap: wrap; }

    .stat-card {
        flex: 1;
        min-width: 160px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 16px 20px;
    }

    .stat-card .label { font-size: 13px; color: var(--text-muted); }
    .stat-card .value { font-size: 26px; font-weight: 700; margin-top: 4px; }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border: 1px solid var(--border);
        margin-bottom: 20px;
    }

    table th {
        background: var(--teal);
        color: #fff;
        text-align: left;
        padding: 10px 14px;
        font-size: 13px;
    }

    table td {
        padding: 10px 14px;
        border-top: 1px solid var(--border-light);
        font-size: 14px;
    }

    table td form { display: inline; margin: 0; }
    table td .row-actions a, table td .row-actions button.link {
        margin-right: 10px;
        background: none;
        border: none;
        color: var(--teal);
        cursor: pointer;
        font-size: 14px;
        padding: 0;
        text-decoration: none;
    }
    table td .row-actions button.link.danger { color: #b33; }

    /* Forms */
    label { display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; }

    input[type=text], input[type=email], input[type=password], input[type=number],
    input[type=date], input[type=datetime-local], input[type=file], select, textarea {
        width: 100%;
        padding: 9px 10px;
        border: 1px solid #999;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 16px;
        font-family: inherit;
        background: #fff;
        color: var(--text);
    }

    textarea { min-height: 80px; resize: vertical; }

    .form-row { display: flex; gap: 16px; }
    .form-row > div { flex: 1; }

    /* Buttons */
    .btn, button[type=submit], input[type=submit] {
        display: inline-block;
        background: var(--teal);
        color: #fff;
        border: 1px solid var(--teal-dark);
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .btn-secondary {
        background: #e5e5e5;
        color: var(--text);
        border: 1px solid #bbb;
    }

    .btn-small {
        padding: 6px 12px;
        font-size: 13px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Badge */
    .badge {
        display: inline-block;
        padding: 3px 10px;
        border: 1px solid #999;
        border-radius: 4px;
        font-size: 12px;
    }
    .badge-aktif, .badge-active, .badge-terkirim { border-color: var(--teal); color: var(--teal-dark); }
    .badge-selesai, .badge-dinilai { border-color: #2a7; color: #2a7; }
    .badge-draft, .badge-belum { border-color: #999; color: #666; }
    .badge-terlambat { border-color: #b33; color: #b33; }

    /* Alerts */
    .alert {
        padding: 12px 16px;
        border-radius: 4px;
        margin-bottom: 16px;
        font-size: 14px;
    }
    .alert-status { background: #e6f5f4; border: 1px solid var(--teal); color: var(--teal-dark); }
    .alert-error { background: #fbeaea; border: 1px solid #c33; color: #a11; }
    .alert-error ul { margin: 0; padding-left: 18px; }

    /* Auth pages (login, lupa password, reset password) */
    .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg);
    }

    .auth-card {
        width: 380px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 28px 28px 24px;
    }

    .auth-card h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 2px;
    }

    .auth-card .subtitle {
        text-align: center;
        color: var(--text-muted);
        font-size: 14px;
        margin-bottom: 20px;
    }

    .auth-card .info-title {
        text-align: center;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .auth-card .info-text {
        text-align: center;
        color: var(--text-muted);
        font-size: 14px;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .auth-card .btn, .auth-card .btn-secondary {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .profile-field { margin-bottom: 16px; }
    .profile-field label { margin-bottom: 4px; }
    .profile-field .value {
        padding: 9px 10px;
        border: 1px solid #999;
        border-radius: 4px;
        background: #f7f7f7;
        color: var(--text);
    }
    .profile-note { font-size: 12px; color: var(--text-muted); margin-top: 4px; }
</style>
