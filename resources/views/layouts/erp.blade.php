<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ERP') — NexusERP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @livewireStyles
    <style>
/* ===== TOKENS ===== */
:root {
    --bg-base:    #07091A;
    --bg-surface: #0D1226;
    --bg-card:    #111830;
    --bg-raised:  #16203C;
    --bg-hover:   #1B2847;
    --accent:     #3D7FFF;
    --accent-dim: rgba(61,127,255,.14);
    --accent-glow:rgba(61,127,255,.35);
    --emerald:    #00C07A;
    --emerald-dim:rgba(0,192,122,.13);
    --amber:      #F5A623;
    --amber-dim:  rgba(245,166,35,.13);
    --danger:     #FF3D5A;
    --danger-dim: rgba(255,61,90,.13);
    --purple:     #A855F7;
    --purple-dim: rgba(168,85,247,.13);
    --cyan:       #06B6D4;
    --cyan-dim:   rgba(6,182,212,.13);
    --bd:         #1C2840;
    --bd-light:   #253350;
    --t1: #E2E8F4;
    --t2: #8899BB;
    --t3: #4A5A7A;
    --sans: 'Plus Jakarta Sans', sans-serif;
    --mono: 'JetBrains Mono', monospace;
    --r:  8px;
    --rl: 14px;
}

/* ===== RESET ===== */
*, *::before, *::after { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
    font-family: var(--sans);
    background: var(--bg-base);
    color: var(--t1);
    min-height: 100vh;
    font-size: 14px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    margin: 0;
}
::-webkit-scrollbar { width: 5px; height: 5px; }
::-webkit-scrollbar-track { background: var(--bg-surface); }
::-webkit-scrollbar-thumb { background: var(--bd-light); border-radius: 3px; }

/* ===== TYPOGRAPHY ===== */
h1, h2, h3, h4, h5, h6 { font-weight: 700; color: var(--t1); letter-spacing: -0.02em; }
h1 { font-size: 1.55rem; }
h2 { font-size: 1.25rem; }
h5 { font-size: 1rem; }
p { color: var(--t2); margin-bottom: 0; }
a { color: var(--accent); text-decoration: none; }
a:hover { color: #6aa3ff; }

/* ===== NAVBAR ===== */
.erp-nav {
    background: var(--bg-surface);
    border-bottom: 1px solid var(--bd);
    padding: 0 1.25rem;
    height: 58px;
    display: flex;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 1px 20px rgba(0,0,0,.5);
    gap: 0;
}
.erp-nav__brand {
    display: flex;
    align-items: center;
    gap: 9px;
    font-weight: 900;
    font-size: 1rem;
    color: var(--t1) !important;
    letter-spacing: -0.04em;
    white-space: nowrap;
    text-decoration: none !important;
    flex-shrink: 0;
    margin-right: 1rem;
}
.erp-nav__brand-icon {
    width: 30px; height: 30px;
    background: var(--accent);
    border-radius: 7px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem; color: #fff;
    box-shadow: 0 4px 12px var(--accent-glow);
    flex-shrink: 0;
}
.erp-nav__links {
    display: flex; align-items: center; gap: 1px;
    overflow-x: auto; flex: 1;
    scrollbar-width: none;
}
.erp-nav__links::-webkit-scrollbar { display: none; }
.erp-nav__link {
    display: flex; align-items: center; gap: 5px;
    padding: 5px 11px; border-radius: 6px;
    color: var(--t3) !important; font-size: 0.78rem; font-weight: 600;
    white-space: nowrap; transition: background .12s, color .12s;
    text-decoration: none !important;
}
.erp-nav__link:hover { background: var(--bg-raised); color: var(--t2) !important; }
.erp-nav__link.active { background: var(--accent-dim); color: var(--accent) !important; }
.erp-nav__link i { font-size: 0.85rem; }
.erp-nav__sep {
    width: 1px; height: 20px;
    background: var(--bd); margin: 0 6px; flex-shrink: 0;
}
.erp-nav__right {
    display: flex; align-items: center; gap: 10px; flex-shrink: 0; margin-left: 1rem;
}
.erp-nav__user {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 600; color: var(--t2);
}
.erp-nav__avatar {
    width: 30px; height: 30px;
    background: var(--accent-dim);
    border: 1.5px solid var(--accent);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.72rem; color: var(--accent); font-weight: 800;
    flex-shrink: 0;
}

/* ===== PAGE ===== */
.erp-page {
    padding: 1.75rem 0 3rem;
    min-height: calc(100vh - 58px);
}
.erp-page-header {
    display: flex; align-items: flex-start; justify-content: space-between;
    margin-bottom: 1.5rem; gap: 1rem; flex-wrap: wrap;
}
.erp-breadcrumb {
    display: flex; align-items: center; gap: 5px;
    font-size: 0.73rem; color: var(--t3); margin-bottom: 3px;
}
.erp-breadcrumb a { color: var(--t3); }
.erp-breadcrumb a:hover { color: var(--accent); }
.erp-breadcrumb i { font-size: 0.6rem; }
.erp-page-title { font-size: 1.45rem; font-weight: 800; color: var(--t1); margin: 0; letter-spacing: -0.03em; }
.erp-page-subtitle { font-size: 0.8rem; color: var(--t3); margin-top: 1px; }

/* ===== CARDS ===== */
.erp-card {
    background: var(--bg-card);
    border: 1px solid var(--bd);
    border-radius: var(--rl);
    overflow: hidden;
}
.erp-card-header {
    padding: .875rem 1.25rem;
    border-bottom: 1px solid var(--bd);
    display: flex; align-items: center; justify-content: space-between; gap: 1rem;
}
.erp-card-title { font-size: 0.875rem; font-weight: 700; color: var(--t1); margin: 0; }
.erp-card-body { padding: 1.25rem; }

/* ===== TABLE ===== */
.erp-table-wrap {
    background: var(--bg-card);
    border: 1px solid var(--bd);
    border-radius: var(--rl);
    overflow: hidden;
}
.erp-table { width: 100%; border-collapse: collapse; font-size: 0.84rem; }
.erp-table thead tr {
    background: var(--bg-raised);
    border-bottom: 1px solid var(--bd-light);
}
.erp-table th {
    padding: 10px 16px;
    text-align: left; font-size: 0.69rem; font-weight: 700;
    color: var(--t3); letter-spacing: 0.07em; text-transform: uppercase;
    white-space: nowrap;
}
.erp-table td {
    padding: 11px 16px;
    border-bottom: 1px solid var(--bd);
    color: var(--t1); vertical-align: middle;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 220px;
}
.erp-table tbody tr:last-child td { border-bottom: none; }
.erp-table tbody tr { transition: background .1s; }
.erp-table tbody tr.clickable:hover { background: var(--bg-hover); cursor: pointer; }
.erp-table td.mono { font-family: var(--mono); font-size: 0.78rem; color: var(--t2); }
.erp-table td.no-clip { max-width: none; overflow: visible; white-space: normal; }
.erp-table td.actions { max-width: none; white-space: nowrap; overflow: visible; }
.erp-table-empty { text-align: center; padding: 3.5rem 1rem; color: var(--t3); }
.erp-table-empty i { display: block; font-size: 2rem; margin-bottom: .5rem; opacity: .4; }

/* ===== BUTTONS ===== */
.btn {
    display: inline-flex; align-items: center; gap: 6px;
    font-family: var(--sans); font-weight: 600; font-size: 0.8rem;
    padding: 7px 15px; border-radius: 7px; border: 1px solid transparent;
    cursor: pointer; transition: all .13s; line-height: 1.4;
    text-decoration: none; white-space: nowrap;
}
.btn-primary { background: var(--accent); border-color: var(--accent); color: #fff !important; }
.btn-primary:hover { background: #5a93ff; border-color: #5a93ff; color: #fff !important; box-shadow: 0 4px 16px var(--accent-glow); }
.btn-success { background: var(--emerald); border-color: var(--emerald); color: #fff !important; }
.btn-success:hover { background: #00d98a; border-color: #00d98a; color: #fff !important; box-shadow: 0 4px 16px rgba(0,192,122,.4); }
.btn-warning { background: var(--amber-dim); border-color: var(--amber); color: var(--amber) !important; }
.btn-warning:hover { background: var(--amber); color: #000 !important; }
.btn-danger { background: var(--danger-dim); border-color: var(--danger); color: var(--danger) !important; }
.btn-danger:hover { background: var(--danger); color: #fff !important; }
.btn-secondary { background: var(--bg-raised); border-color: var(--bd-light); color: var(--t2) !important; }
.btn-secondary:hover { background: var(--bg-hover); border-color: var(--bd-light); color: var(--t1) !important; }
.btn-outline-primary { background: transparent; border-color: var(--accent); color: var(--accent) !important; }
.btn-outline-primary:hover { background: var(--accent-dim); }
.btn-sm { font-size: 0.75rem; padding: 4px 10px; border-radius: 5px; gap: 4px; }
.btn-lg { font-size: 0.9rem; padding: 10px 22px; border-radius: 8px; }

/* ===== FORMS ===== */
.form-section { margin-bottom: 2rem; }
.form-label {
    font-size: 0.72rem; font-weight: 700; color: var(--t2);
    letter-spacing: 0.05em; text-transform: uppercase;
    margin-bottom: 5px; display: block;
}
.form-control, .form-select {
    background: var(--bg-surface) !important;
    border: 1px solid var(--bd-light) !important;
    border-radius: var(--r) !important;
    color: var(--t1) !important;
    font-size: 0.875rem; font-family: var(--sans);
    padding: 9px 12px; transition: border-color .15s, box-shadow .15s;
    width: 100%;
}
.form-control:focus, .form-select:focus {
    outline: none;
    border-color: var(--accent) !important;
    box-shadow: 0 0 0 3px var(--accent-dim) !important;
    background: var(--bg-raised) !important;
}
.form-control::placeholder { color: var(--t3); }
.form-control.is-invalid { border-color: var(--danger) !important; }
.invalid-feedback { color: var(--danger); font-size: 0.775rem; margin-top: 4px; display: block; }
.form-select option { background: var(--bg-card); color: var(--t1); }
.form-check-input { background-color: var(--bg-surface) !important; border-color: var(--bd-light) !important; }
.form-check-input:checked { background-color: var(--accent) !important; border-color: var(--accent) !important; }
.form-check-label { color: var(--t2); font-size: 0.85rem; }

/* ===== ALERTS ===== */
.alert {
    padding: 11px 15px; border-radius: var(--r); border: 1px solid;
    font-size: 0.84rem; font-weight: 500;
    display: flex; align-items: flex-start; gap: 9px;
    margin-bottom: 1.25rem;
}
.alert ul { margin: 4px 0 0 16px; padding: 0; }
.alert ul li { margin-bottom: 2px; }
.alert-success { background: var(--emerald-dim); border-color: rgba(0,192,122,.3); color: #3dd598; }
.alert-danger  { background: var(--danger-dim);  border-color: rgba(255,61,90,.3);  color: #ff7088; }
.alert-info    { background: var(--accent-dim);  border-color: rgba(61,127,255,.3); color: var(--accent); }
.alert-warning { background: var(--amber-dim);   border-color: rgba(245,166,35,.3); color: var(--amber); }
.btn-close { filter: invert(1); opacity: .4; flex-shrink: 0; margin-left: auto; }
.btn-close:hover { opacity: .8; }

/* ===== BADGES ===== */
.badge { font-size: 0.68rem; font-weight: 700; padding: 3px 8px; border-radius: 4px; letter-spacing: .03em; }
.bg-primary   { background: var(--accent) !important; color: #fff; }
.bg-success   { background: var(--emerald) !important; color: #fff; }
.bg-warning   { background: var(--amber) !important; color: #000; }
.bg-danger    { background: var(--danger) !important; color: #fff; }
.bg-info      { background: var(--cyan) !important; color: #fff; }
.bg-secondary { background: var(--bg-raised) !important; color: var(--t2); border: 1px solid var(--bd-light); }

/* ===== DETAIL ===== */
.erp-detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.25rem;
}
.erp-detail-label {
    font-size: 0.69rem; font-weight: 700; color: var(--t3);
    letter-spacing: .06em; text-transform: uppercase; margin-bottom: 2px;
}
.erp-detail-value { font-size: 0.9rem; color: var(--t1); font-weight: 500; }
.erp-detail-value.mono { font-family: var(--mono); font-size: 0.82rem; color: var(--t2); }

/* ===== MODULE CARDS (dashboard) ===== */
.erp-module {
    background: var(--bg-card); border: 1px solid var(--bd);
    border-radius: var(--rl); padding: 1.375rem;
    display: flex; flex-direction: column; gap: .875rem;
    text-decoration: none !important;
    transition: border-color .2s, transform .2s, box-shadow .2s;
    height: 100%;
}
.erp-module:hover {
    border-color: var(--accent);
    transform: translateY(-3px);
    box-shadow: 0 8px 32px rgba(0,0,0,.35);
}
.erp-module__icon {
    width: 46px; height: 46px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
}
.erp-module__icon.blue   { background: var(--accent-dim); color: var(--accent); }
.erp-module__icon.green  { background: var(--emerald-dim); color: var(--emerald); }
.erp-module__icon.amber  { background: var(--amber-dim); color: var(--amber); }
.erp-module__icon.red    { background: var(--danger-dim); color: var(--danger); }
.erp-module__icon.cyan   { background: var(--cyan-dim); color: var(--cyan); }
.erp-module__icon.purple { background: var(--purple-dim); color: var(--purple); }
.erp-module__title { font-size: .9rem; font-weight: 700; color: var(--t1); margin: 0; }
.erp-module__desc  { font-size: .78rem; color: var(--t3); margin: 0; line-height: 1.45; }
.erp-module__arrow { margin-top: auto; font-size: .75rem; color: var(--t3); transition: color .2s; }
.erp-module:hover .erp-module__arrow { color: var(--accent); }

/* ===== STAT CARDS ===== */
.erp-stat {
    background: var(--bg-card); border: 1px solid var(--bd);
    border-radius: var(--rl); padding: 1.25rem;
    display: flex; align-items: center; gap: 1rem;
}
.erp-stat__icon {
    width: 44px; height: 44px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; flex-shrink: 0;
}
.erp-stat__label { font-size: .7rem; font-weight: 700; color: var(--t3); letter-spacing: .05em; text-transform: uppercase; }
.erp-stat__value { font-size: 1.5rem; font-weight: 800; color: var(--t1); font-family: var(--mono); line-height: 1.2; }

/* ===== LIST GROUP ===== */
.list-group { border-radius: var(--r); overflow: hidden; }
.list-group-item {
    background: var(--bg-raised) !important;
    border: 1px solid var(--bd) !important;
    color: var(--t1) !important;
    font-size: .84rem; padding: 10px 14px;
    transition: background .12s;
}
.list-group-item:hover { background: var(--bg-hover) !important; }
.list-group-item + .list-group-item { border-top: none !important; }

/* ===== PRE/CODE ===== */
pre {
    background: #060810 !important; color: #7ee8a2 !important;
    border: 1px solid var(--bd) !important; border-radius: var(--r);
    padding: 12px !important; font-size: .73rem;
    font-family: var(--mono); overflow: auto; max-height: 200px;
    margin: 0;
}

/* ===== PAGINATION ===== */
.pagination { display: flex; gap: 4px; list-style: none; padding: 0; margin: 0; justify-content: center; }
.page-link {
    display: flex; align-items: center; justify-content: center;
    min-width: 32px; height: 32px; padding: 0 8px;
    border-radius: 6px; background: var(--bg-raised);
    border: 1px solid var(--bd); color: var(--t2) !important;
    font-size: .8rem; font-weight: 600; transition: all .13s; text-decoration: none;
}
.page-link:hover { background: var(--bg-hover); border-color: var(--bd-light); color: var(--t1) !important; }
.page-item.active .page-link { background: var(--accent); border-color: var(--accent); color: #fff !important; }
.page-item.disabled .page-link { opacity: .35; pointer-events: none; }

/* ===== SPINNER ===== */
.spinner-border { color: var(--accent) !important; }

/* ===== MODAL ===== */
.modal-content {
    background: var(--bg-card); border: 1px solid var(--bd-light);
    border-radius: var(--rl); color: var(--t1);
}
.modal-header { border-bottom: 1px solid var(--bd); padding: .875rem 1.25rem; }
.modal-title { font-weight: 700; font-size: .95rem; }
.modal-body { padding: 1.25rem; }
.modal-footer { border-top: 1px solid var(--bd); padding: .75rem 1.25rem; }

/* ===== FILTER BAR ===== */
.erp-filter {
    background: var(--bg-card); border: 1px solid var(--bd);
    border-radius: var(--rl); padding: 1rem 1.25rem; margin-bottom: 1.25rem;
}
.erp-filter__title {
    font-size: .7rem; font-weight: 700; color: var(--t3);
    letter-spacing: .05em; text-transform: uppercase; margin-bottom: .75rem;
}

/* ===== SECTION TOGGLE ===== */
.erp-toggle {
    width: 100%; background: var(--bg-raised); border: 1px solid var(--bd);
    border-radius: var(--r); color: var(--t2); font-size: .82rem; font-weight: 600;
    padding: 10px 16px; display: flex; align-items: center; justify-content: space-between;
    cursor: pointer; transition: background .12s, border-color .12s; font-family: var(--sans);
    margin-bottom: .75rem;
}
.erp-toggle:hover { background: var(--bg-hover); border-color: var(--bd-light); color: var(--t1); }

/* ===== COMING SOON ===== */
.coming-soon {
    min-height: calc(100vh - 58px);
    display: flex; align-items: center; justify-content: center;
    flex-direction: column; gap: .875rem; text-align: center; padding: 2rem;
}
.coming-soon__icon {
    width: 72px; height: 72px; background: var(--accent-dim);
    border: 1px solid rgba(61,127,255,.3); border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem; color: var(--accent); margin-bottom: .25rem;
}
.coming-soon h1 { font-size: 1.4rem; letter-spacing: -0.03em; margin: 0; }
.coming-soon p { font-size: .875rem; color: var(--t3); max-width: 360px; margin: 0; }

/* ===== FADE IN ===== */
@keyframes erp-fadeup {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
}
.erp-page { animation: erp-fadeup .28s ease both; }

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .erp-nav__link span { display: none; }
    .erp-nav__user span.d-lg { display: none; }
}
    </style>
    @stack('head')
</head>
<body>
    <livewire:navbar />
    <main class="erp-page">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
