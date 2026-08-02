<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recrutia - Mes Matchs</title>

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

.sidebar{
    position:fixed;
    width:260px;
    height:100vh;
    background:#111827;
    color:white;
    padding:25px;
}

.logo{
    font-size:25px;
    font-weight:bold;
    color:white;
    text-decoration:none;
}

.logo span{
    color:#1D9E75;
}

.user-card{
    margin-top:35px;
    background:#1f2937;
    padding:15px;
    border-radius:15px;
    display:flex;
    align-items:center;
    gap:15px;
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#1D9E75;
    display:flex;
    justify-content:center;
    align-items:center;
    font-weight:bold;
}

.user-name{
    font-weight:bold;
}

.role{
    font-size:13px;
    color:#aaa;
}

.menu{
    margin-top:35px;
}

.menu-title{
    color:#777;
    font-size:12px;
    margin:20px 0 10px;
}

.menu a,
.logout-btn{
    display:flex;
    align-items:center;
    gap:12px;
    width:100%;
    padding:12px;
    color:#ddd;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:8px;
}

.menu a:hover,
.menu a.active,
.logout-btn:hover{
    background:#1D9E75;
    color:white;
}

.logout-btn{
    background:none;
    border:none;
    cursor:pointer;
    font-size:15px;
    font-family:inherit;
    text-align:left;
}

.main{
    margin-left:260px;
}

.topbar{
    height:70px;
    background:white;
    display:flex;
    align-items:center;
    padding:0 35px;
    box-shadow:0 2px 8px #ddd;
}

.badge-top{
    margin-left:20px;
    background:#e6f7f1;
    color:#0F6E56;
    padding:6px 15px;
    border-radius:20px;
}

.content{
    padding:35px;
}

.notice{
    background:#fff4dd;
    color:#a86a00;
    padding:18px 22px;
    border-radius:15px;
    margin-bottom:25px;
}

.notice a{
    color:#a86a00;
    font-weight:bold;
}

.match-card{
    background:white;
    padding:22px 25px;
    border-radius:18px;
    margin-bottom:18px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
}

.match-card h3{
    margin-bottom:6px;
}

.match-card .meta{
    color:#666;
    font-size:14px;
}

.match-tags{
    margin-top:10px;
    display:flex;
    gap:6px;
    flex-wrap:wrap;
}

.match-tag{
    background:#e6f7f1;
    color:#087857;
    font-size:12px;
    padding:4px 10px;
    border-radius:12px;
}

.score-wrap{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:8px;
}

.score-circle{
    width:70px;
    height:70px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    font-size:16px;
    color:white;
}

.score-high{
    background:#1D9E75;
}

.score-mid{
    background:#e0a63a;
}

.score-low{
    background:#c0392b;
}

.score-none{
    background:#cbd5e1;
    color:#475569;
}

.btn{
    background:#1D9E75;
    color:white;
    padding:10px 20px;
    border-radius:20px;
    text-decoration:none;
    font-size:14px;
    white-space:nowrap;
}

.btn:hover{
    background:#0F6E56;
}

.empty-state{
    text-align:center;
    padding:50px;
    color:#888;
    background:white;
    border-radius:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<a href="{{ route('dashboard') }}" class="logo">
Recrutia<span>.</span>
</a>

<div class="user-card">

<div class="avatar">
{{ strtoupper(substr(Auth::user()->name,0,2)) }}
</div>

<div>
<div class="user-name">{{ Auth::user()->name }}</div>
<div class="role">Candidat</div>
</div>

</div>

<div class="menu">

<div class="menu-title">ESPACE PERSONNEL</div>

<a href="{{ route('dashboard') }}">
<span class="material-icons">dashboard</span>
Dashboard
</a>

<a href="{{ route('matchs.index') }}" class="active">
<span class="material-icons">star</span>
Mes Matchs
</a>

<a href="{{ route('candidatures.index') }}">
<span class="material-icons">work</span>
Mes candidatures
</a>

<div class="menu-title">COMPTE</div>

<a href="{{ route('candidat.profil.edit') }}">
<span class="material-icons">badge</span>
Profil candidat
</a>

<a href="{{ route('profile.edit') }}">
<span class="material-icons">account_circle</span>
Mon Profil
</a>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="logout-btn">
<span class="material-icons">logout</span>
Déconnexion
</button>
</form>

</div>

</div>

<div class="main">

<div class="topbar">
<strong>Mes Matchs</strong>
<span class="badge-top">Candidat</span>
</div>

<div class="content">

@unless($profilComplet)
<div class="notice">
Votre score de correspondance sera plus précis une fois votre profil complété.
<a href="{{ route('candidat.profil.edit') }}">Ajouter mes compétences →</a>
</div>
@endunless

@forelse($offres as $offre)

    @php
        if ($offre->score === null) {
            $scoreClass = 'score-none';
            $scoreLabel = '—';
        } elseif ($offre->score >= 60) {
            $scoreClass = 'score-high';
            $scoreLabel = $offre->score.'%';
        } elseif ($offre->score >= 30) {
            $scoreClass = 'score-mid';
            $scoreLabel = $offre->score.'%';
        } else {
            $scoreClass = 'score-low';
            $scoreLabel = $offre->score.'%';
        }
    @endphp

    <div class="match-card">

        <div>
            <h3>{{ $offre->titre }}</h3>
            <div class="meta">{{ $offre->entreprise }} — {{ $offre->localisation }}</div>

            @if($offre->mots_correspondants && $offre->mots_correspondants->count())
                <div class="match-tags">
                    @foreach($offre->mots_correspondants as $mot)
                        <span class="match-tag">{{ $mot }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="score-wrap">
            <div class="score-circle {{ $scoreClass }}">{{ $scoreLabel }}</div>
            <a class="btn" href="{{ route('offres.show', $offre->id) }}">Voir l'offre</a>
        </div>

    </div>

@empty

    <div class="empty-state">
        Aucune offre disponible pour le moment.
    </div>

@endforelse

</div>

</div>

</body>

</html>
