<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recrutia - Espace Candidat</title>

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

.welcome{
    background:linear-gradient(135deg,#0F1117,#263040);
    color:white;
    padding:35px;
    border-radius:25px;
}

.welcome h1{
    font-size:30px;
    margin-bottom:15px;
}

.card{
    margin-top:30px;
    background:white;
    padding:30px;
    border-radius:25px;
    box-shadow:0 10px 25px #0001;
}

.offer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    background:#fafafa;
    border-radius:15px;
    margin-top:15px;
    border:1px solid #eee;
    gap:20px;
}

.offer-info{
    display:flex;
    flex-direction:column;
    gap:6px;
}

.offer-info h3{
    margin:0;
}

.offer-info p{
    margin:0;
    color:#555;
}

.btn{
    background:#1D9E75;
    color:white;
    padding:10px 20px;
    border-radius:20px;
    text-decoration:none;
    display:inline-block;
    width:fit-content;
    margin-top:6px;
}

.badge{
    background:#e6f7f1;
    color:#087857;
    padding:8px 15px;
    border-radius:20px;
    font-weight:bold;
}

/* BOUTON HAMBURGER (mobile uniquement) */
.db-toggle-btn{
    display:none;
    background:none;
    border:none;
    cursor:pointer;
    padding:8px;
}

.db-toggle-btn i{
    font-size:28px;
    color:#111827;
}

/* OVERLAY (fond sombre derrière la sidebar ouverte) */
.db-overlay{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    z-index:998;
}

.db-overlay.active{
    display:block;
}

/* RESPONSIVE */
@media (max-width:900px){

    .db-sidebar{
        left:-270px;
        transition:left 0.3s ease;
        z-index:999;
    }

    .db-sidebar.active{
        left:0;
    }

    .db-main{
        margin-left:0;
    }

    .db-topbar{
        padding:0 20px;
    }

    .db-toggle-btn{
        display:block;
    }

    .db-content{
        padding:20px;
    }

    .welcome{
        padding:24px;
    }

    .welcome h1{
        font-size:22px;
    }

    .offer{
        flex-direction:column;
        align-items:flex-start;
    }

    .badge{
        align-self:flex-end;
    }
}

@media (max-width:480px){

    .db-content{
        padding:15px;
    }

    .card{
        padding:18px;
    }
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

<a href="{{ route('dashboard') }}" class="db-nav-link active">
<i class="material-icons">dashboard</i>
Dashboard
</a>

<a href="#" class="db-nav-link">
<i class="material-icons">star</i>
Mes Matchs
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
<button class="db-toggle-btn" id="dbToggleBtn">
<i class="material-icons">menu</i>
</button>
<b>Mon espace candidat</b>
<span class="db-mode">Candidat</span>
</div>

<div class="db-content">

<div class="welcome">
<h1>Bienvenue {{ Auth::user()->name }} 👋</h1>
<p>Découvrez les offres qui correspondent à votre profil.</p>
</div>

<div class="card">

<h2>Offres recommandées</h2>

@forelse($offres as $offre)

<div class="offer">

    <div class="offer-info">

        <h3>{{ $offre->titre }}</h3>

        <p>{{ $offre->entreprise }} - {{ $offre->localisation }}</p>

        <a class="btn" href="{{ route('offres.show',$offre->id) }}">
            Voir l'offre
        </a>

    </div>

    <span class="badge">Nouveau</span>

</div>

@empty

<p>Aucune offre disponible.</p>

@endforelse

</div>

</div>

</div>

<div class="db-overlay" id="dbOverlay"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.querySelector('.db-sidebar');
    var toggleBtn = document.getElementById('dbToggleBtn');
    var overlay = document.getElementById('dbOverlay');

    function closeSidebar() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    }

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.add('active');
        overlay.classList.add('active');
    });

    overlay.addEventListener('click', closeSidebar);
});
</script>

</body>

</html>