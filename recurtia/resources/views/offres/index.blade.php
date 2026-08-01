<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recrutia - Toutes les offres</title>

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

.db-sidebar{
    position:fixed;
    top:0;
    left:0;
    width:270px;
    height:100vh;
    background:#0F1117;
    color:white;
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
.active{
    background:#1D9E75;
    color:white;
}

button.db-nav-link{
    width:100%;
    border:none;
    background:none;
    cursor:pointer;
    text-align:left;
}

.db-main{
    margin-left:270px;
}

.db-topbar{
    height:75px;
    background:white;
    display:flex;
    align-items:center;
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

.db-content{
    padding:40px;
}

.page-header{
    margin-bottom:24px;
}

.page-header h1{
    font-size:28px;
    margin-bottom:6px;
}

.page-header p{
    color:#666;
}

.filters{
    background:white;
    padding:20px;
    border-radius:20px;
    box-shadow:0 5px 20px #0001;
    margin-bottom:24px;
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}

.filters input,
.filters select{
    padding:12px 16px;
    border:1px solid #ddd;
    border-radius:12px;
    font-size:14px;
}

.filters input{
    flex:1;
    min-width:200px;
}

.filters button{
    background:#1D9E75;
    color:white;
    border:none;
    padding:12px 24px;
    border-radius:12px;
    cursor:pointer;
    font-weight:bold;
}

.filters button:hover{
    background:#0F6E56;
}

.offer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    background:white;
    border-radius:15px;
    margin-bottom:15px;
    box-shadow:0 5px 20px #0001;
    gap:20px;
    flex-wrap:wrap;
}

.offer-info h3{
    margin-bottom:6px;
}

.offer-info p{
    color:#666;
    font-size:14px;
}

.btn{
    background:#1D9E75;
    color:white;
    padding:10px 20px;
    border-radius:20px;
    text-decoration:none;
    white-space:nowrap;
}

.btn:hover{
    background:#0F6E56;
}

.empty-state{
    background:white;
    padding:50px;
    border-radius:20px;
    text-align:center;
    color:#666;
}

.pagination{
    margin-top:20px;
    display:flex;
    justify-content:center;
    gap:8px;
}

</style>

</head>

<body>

<div class="db-sidebar">

<div class="db-sidebar-inner">

<a href="{{ route('dashboard') }}" class="db-logo">
Recrutia<span>.</span>
</a>

<div class="db-user-card">

<div class="db-user-avatar">
{{ strtoupper(substr(Auth::user()->name,0,2)) }}
</div>

<div>
<span class="db-user-name">
{{ Auth::user()->name }}
</span>
<span class="db-user-role">
Candidat
</span>
</div>

</div>

<nav class="db-nav">

<a href="{{ route('dashboard') }}" class="db-nav-link">
<i class="material-icons">dashboard</i>
Dashboard
</a>

<a href="{{ route('offres.index') }}" class="db-nav-link active">
<i class="material-icons">search</i>
Toutes les offres
</a>

<a href="{{ route('candidatures.index') }}" class="db-nav-link">
<i class="material-icons">work</i>
Mes candidatures
</a>

<a href="{{ route('profile.edit') }}" class="db-nav-link">
<i class="material-icons">account_circle</i>
Mon Profil
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

<div class="db-main">

<div class="db-topbar">
<b>Mon espace candidat</b>
<span class="db-mode">Candidat</span>
</div>

<div class="db-content">

<div class="page-header">
<h1>Toutes les offres</h1>
<p>Parcourez toutes les offres disponibles et postulez en un clic.</p>
</div>

<form method="GET" action="{{ route('offres.index') }}" class="filters">

    <input
        type="text"
        name="recherche"
        placeholder="Rechercher un poste, une entreprise, une ville..."
        value="{{ request('recherche') }}">

    <select name="tri">
        <option value="">Trier par</option>
        <option value="recent" {{ request('tri') == 'recent' ? 'selected' : '' }}>Plus récent</option>
        <option value="ancien" {{ request('tri') == 'ancien' ? 'selected' : '' }}>Plus ancien</option>
        <option value="entreprise" {{ request('tri') == 'entreprise' ? 'selected' : '' }}>Entreprise (A-Z)</option>
    </select>

    <button type="submit">Filtrer</button>

</form>

@forelse($offres as $offre)

<div class="offer">

    <div class="offer-info">
        <h3>{{ $offre->titre }}</h3>
        <p>{{ $offre->entreprise }} - {{ $offre->localisation }}</p>
    </div>

    <a class="btn" href="{{ route('offres.show', $offre->id) }}">
        Voir l'offre
    </a>

</div>

@empty

<div class="empty-state">
    Aucune offre ne correspond à votre recherche.
</div>

@endforelse

<div class="pagination">
    {{ $offres->appends(request()->query())->links() }}
</div>

</div>

</div>

</body>

</html>