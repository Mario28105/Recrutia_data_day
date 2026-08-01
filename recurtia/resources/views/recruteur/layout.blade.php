<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recrutia - @yield('title', 'Espace Recruteur')</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
    background:#f4f7fb;
    color:#111827;
}

/* SIDEBAR */

.db-sidebar{
    position:fixed;
    top:0;
    left:0;
    width:270px;
    height:100vh;
    background:#0F1117;
    color:white;
    overflow-y:auto;
}

.db-sidebar-inner{
    padding:25px;
}

.db-logo{
    color:white;
    text-decoration:none;
    font-size:28px;
    font-weight:bold;
}

.db-logo span{
    color:#1D9E75;
}

/* USER */

.db-user-card{
    margin-top:35px;
    padding:20px;
    background:#1b202b;
    border-radius:20px;
    display:flex;
    gap:15px;
    align-items:center;
}

.db-user-avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    background:#1D9E75;
    display:flex;
    justify-content:center;
    align-items:center;
    font-weight:bold;
}

.db-user-name{
    display:block;
    font-weight:bold;
}

.db-user-role{
    color:#aaa;
    font-size:13px;
}

/* MENU */

.db-nav{
    margin-top:40px;
}

.db-nav-link{
    display:flex;
    align-items:center;
    gap:12px;
    padding:14px;
    margin-top:10px;
    color:#ddd;
    text-decoration:none;
    border-radius:12px;
}

.db-nav-link:hover,
.db-nav-link.active{
    background:#1D9E75;
    color:white;
}

button.db-nav-link{
    width:100%;
    border:none;
    background:none;
    cursor:pointer;
    text-align:left;
    font-size:15px;
    font-family:inherit;
}

/* MAIN */

.db-main{
    margin-left:270px;
}

.db-topbar{
    height:75px;
    background:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 40px;
    box-shadow:0 3px 10px #0001;
}

.db-mode{
    margin-left:20px;
    background:#e6f7f1;
    color:#087857;
    padding:8px 20px;
    border-radius:20px;
}

/* CONTENT */

.db-content{
    padding:40px;
}

/* ALERTES */

.alert{
    padding:16px 20px;
    border-radius:15px;
    margin-bottom:25px;
    font-weight:bold;
}

.alert-success{
    background:#e6f7f1;
    color:#087857;
}

.alert-error{
    background:#ffe5e5;
    color:#c0392b;
}

/* WELCOME */

.welcome{
    background:linear-gradient(135deg,#0F1117,#263040);
    color:white;
    padding:35px;
    border-radius:25px;
}

.welcome h1{
    font-size:28px;
    margin-bottom:10px;
}

/* STAT CARDS */

.stats-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-top:30px;
}

.stat-card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px #0001;
}

.stat-card .value{
    font-size:32px;
    font-weight:bold;
    color:#0F1117;
}

.stat-card .label{
    color:#777;
    margin-top:5px;
}

/* CARD GENERIQUE */

.card{
    margin-top:30px;
    background:white;
    padding:30px;
    border-radius:25px;
    box-shadow:0 10px 25px #0001;
}

.card h2{
    margin-bottom:20px;
}

/* OFFER / ITEM ROW */

.item-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    background:#fafafa;
    border-radius:15px;
    margin-top:15px;
    border:1px solid #eee;
    flex-wrap:wrap;
    gap:15px;
}

.item-row h3{
    margin-bottom:6px;
}

.item-row .meta{
    color:#666;
    font-size:14px;
}

.item-actions{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

/* BOUTONS */

.btn{
    background:#1D9E75;
    color:white;
    padding:10px 20px;
    border-radius:20px;
    text-decoration:none;
    border:none;
    cursor:pointer;
    font-size:14px;
    display:inline-block;
}

.btn:hover{
    background:#0F6E56;
}

.btn-outline{
    background:none;
    color:#1D9E75;
    border:2px solid #1D9E75;
}

.btn-outline:hover{
    background:#1D9E75;
    color:white;
}

.btn-danger{
    background:#e74c3c;
}

.btn-danger:hover{
    background:#c0392b;
}

.btn-sm{
    padding:8px 14px;
    font-size:13px;
}

/* BADGES STATUT */

.badge{
    background:#e6f7f1;
    color:#087857;
    padding:8px 15px;
    border-radius:20px;
    font-weight:bold;
    font-size:13px;
    white-space:nowrap;
}

.badge-attente{
    background:#fff4dd;
    color:#a86a00;
}

.badge-entretien{
    background:#e6f0ff;
    color:#1d4ed8;
}

.badge-acceptee{
    background:#e6f7f1;
    color:#087857;
}

.badge-refusee{
    background:#ffe5e5;
    color:#c0392b;
}

/* FORM */

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:7px;
    font-weight:bold;
}

.form-group input,
.form-group textarea,
.form-group select{
    width:100%;
    padding:14px;
    border-radius:12px;
    border:1px solid #ddd;
    font-size:15px;
    font-family:inherit;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus{
    outline:none;
    border-color:#1D9E75;
}

.form-error{
    color:#c0392b;
    font-size:13px;
    margin-top:5px;
}

.empty-state{
    text-align:center;
    padding:40px;
    color:#888;
}

.filters{
    display:flex;
    gap:15px;
    margin-bottom:10px;
    flex-wrap:wrap;
}

.filters select{
    padding:10px 15px;
    border-radius:12px;
    border:1px solid #ddd;
}

@media (max-width:900px){
    .stats-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

</style>

@stack('styles')

</head>


<body>


<!-- SIDEBAR -->

<div class="db-sidebar">

<div class="db-sidebar-inner">

<a href="{{ route('recruteur.dashboard') }}" class="db-logo">
Recrutia<span>.</span>
</a>

<div class="db-user-card">

<div class="db-user-avatar">
{{ strtoupper(substr(Auth::user()->name,0,2)) }}
</div>

<div>
<span class="db-user-name">{{ Auth::user()->name }}</span>
<span class="db-user-role">Recruteur</span>
</div>

</div>

<nav class="db-nav">

<a href="{{ route('recruteur.dashboard') }}"
   class="db-nav-link {{ request()->routeIs('recruteur.dashboard') ? 'active' : '' }}">
    <i class="material-icons">dashboard</i>
    Dashboard
</a>

<a href="{{ route('recruteur.offres.index') }}"
   class="db-nav-link {{ request()->routeIs('recruteur.offres.*') ? 'active' : '' }}">
    <i class="material-icons">work</i>
    Mes offres
</a>

<a href="{{ route('recruteur.candidatures.index') }}"
   class="db-nav-link {{ request()->routeIs('recruteur.candidatures.*') ? 'active' : '' }}">
    <i class="material-icons">people</i>
    Candidatures reçues
</a>

<a href="{{ route('recruteur.profil.edit') }}"
   class="db-nav-link {{ request()->routeIs('recruteur.profil.*') ? 'active' : '' }}">
    <i class="material-icons">business</i>
    Profil entreprise
</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="db-nav-link">
        <i class="material-icons">logout</i>
        Déconnexion
    </button>
</form>

</nav>

</div>

</div>


<!-- CONTENU -->

<div class="db-main">

<div class="db-topbar">

    <b>@yield('topbar_title', 'Mon espace recruteur')</b>

    <span class="db-mode">Recruteur</span>

</div>


<div class="db-content">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @yield('content')

</div>

</div>


@stack('scripts')

</body>

</html>
