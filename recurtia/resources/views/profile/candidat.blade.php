<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recrutia - Mon profil</title>

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

.badge{
    margin-left:20px;
    background:#e6f7f1;
    color:#0F6E56;
    padding:6px 15px;
    border-radius:20px;
}

.content{
    padding:35px;
    max-width:650px;
}

.card{
    background:white;
    margin-top:0;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.card h2{
    margin-bottom:20px;
}

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

.btn{
    background:#1D9E75;
    color:white;
    padding:12px 25px;
    border-radius:20px;
    border:none;
    cursor:pointer;
    font-size:15px;
}

.btn:hover{
    background:#0F6E56;
}

.alert-success{
    background:#e6f7f1;
    color:#087857;
    padding:14px 18px;
    border-radius:12px;
    margin-bottom:20px;
    font-weight:bold;
}

.form-error{
    color:#c0392b;
    font-size:13px;
    margin-top:5px;
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
Tableau de bord
</a>

<a href="{{ route('candidatures.index') }}">
<span class="material-icons">work</span>
Candidatures
</a>

<div class="menu-title">COMPTE</div>

<a href="{{ route('candidat.profil.edit') }}" class="active">
<span class="material-icons">badge</span>
Profil candidat
</a>

<a href="{{ route('profile.edit') }}">
<span class="material-icons">account_circle</span>
Paramètres du compte
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
<strong>Mon profil candidat</strong>
<span class="badge">Candidat</span>
</div>

<div class="content">

<div class="card">

<h2>Compléter mon profil</h2>

<p style="color:#666; margin-bottom:20px;">
Ces informations sont visibles par les recruteurs lorsque vous postulez à une offre.
</p>

@if(session('success'))
<div class="alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('candidat.profil.update') }}">
@csrf
@method('PATCH')

<div class="form-group">
<label>Téléphone</label>
<input type="text" name="telephone" value="{{ old('telephone', $candidat->telephone ?? '') }}" placeholder="Ex: 034 00 000 00">
@error('telephone') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
<label>Niveau d'étude</label>
<input type="text" name="niveau_etude" value="{{ old('niveau_etude', $candidat->niveau_etude ?? '') }}" placeholder="Ex: Licence en informatique">
@error('niveau_etude') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
<label>Compétences</label>
<textarea name="competences" rows="5" placeholder="Ex: PHP, Laravel, JavaScript, gestion de projet...">{{ old('competences', $candidat->competences ?? '') }}</textarea>
@error('competences') <div class="form-error">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn">Enregistrer</button>

</form>

</div>

</div>

</div>

</body>

</html>
