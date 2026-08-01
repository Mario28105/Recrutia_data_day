<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Candidat - Recurtia</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}


body{

    font-family: Arial, sans-serif;
    background:#f4f7fb;
    color:#111827;

}



/* SIDEBAR */

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
    align-items:center;
    justify-content:center;

    font-weight:bold;

}



.user-name{

    font-weight:bold;
}



.role{

    font-size:13px;
    color:#aaa;

}



/* MENU */


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
.logout-btn:hover{

    background:#1D9E75;
    color:white;

}



.logout-btn{

    background:none;
    border:none;
    cursor:pointer;
    font-size:15px;

}





/* MAIN */


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

}





.welcome{


    background:#111827;

    color:white;

    padding:35px;

    border-radius:25px;

    display:flex;

    justify-content:space-between;

    align-items:center;

}



.welcome h1{

    font-size:28px;

}



.welcome p{

    margin-top:10px;
    color:#ddd;

}




.score{

    width:90px;
    height:90px;

    border-radius:50%;

    background:#1D9E75;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:22px;

    font-weight:bold;

}





.card{

    background:white;

    margin-top:30px;

    padding:25px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

}



.card h2{

    margin-bottom:20px;

}





.offer{


    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:18px;

    border:1px solid #eee;

    border-radius:15px;

    margin-bottom:15px;


}



.offer:hover{

    border-color:#1D9E75;

}



.company{

    color:#666;

    margin-top:5px;

}



.status{

    color:#1D9E75;

    font-weight:bold;

}



</style>

</head>



<body>

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">

    <h1>
        Mes candidatures
    </h1>


    <a href="{{ route('dashboard') }}" 
       style="
       background:#1D9E75;
       color:white;
       padding:10px 20px;
       border-radius:10px;
       text-decoration:none;
       font-weight:bold;
       ">

        🏠 Retour Dashboard

    </a>


</div>


<!-- SIDEBAR -->


<div class="sidebar">


<a href="{{route('dashboard')}}" class="logo">

Recurtia<span>.</span>

</a>



<div class="user-card">


<div class="avatar">

{{ strtoupper(substr(Auth::user()->name,0,2)) }}

</div>



<div>

<div class="user-name">

{{Auth::user()->name}}

</div>


<div class="role">

Candidat

</div>


</div>


</div>





<div class="menu">


<div class="menu-title">

ESPACE PERSONNEL

</div>



<a href="{{route('dashboard')}}">

<span class="material-icons">
dashboard
</span>

Tableau de bord

</a>




<a href="{{route('dashboard')}}">

<span class="material-icons">
star
</span>

Mes Matchs

</a>





<a href="{{route('candidatures.index')}}">

<span class="material-icons">
work
</span>

Candidatures

</a>






<div class="menu-title">

COMPTE

</div>




<a href="{{route('profile.edit')}}">

<span class="material-icons">
account_circle
</span>

Mon Profil

</a>





<form method="POST" action="{{route('logout')}}">

@csrf


<button class="logout-btn">

<span class="material-icons">
logout
</span>

Déconnexion


</button>


</form>




</div>


</div>







<!-- CONTENU -->


<div class="main">


<div class="topbar">


<strong>

Mon espace

</strong>


<span class="badge">

Candidat

</span>


</div>





<div class="content">



<div class="welcome">


<div>


<h1>

Content de vous revoir {{Auth::user()->name}} 👋

</h1>


<p>

Votre profil est complété à 85%.

</p>


</div>



<div class="score">

85%

</div>



</div>





<div class="card">


<h2>

Offres recommandées

</h2>




@forelse($offres as $offre)



<div class="offer">


<div>


<h3>

{{$offre->titre}}

</h3>



<div class="company">

{{$offre->entreprise}}

-

{{$offre->localisation}}

</div>



</div>



<div class="status">

Nouveau

</div>



</div>



@empty


<p>

Aucune offre disponible.

</p>



@endforelse



</div>




</div>



</div>




</body>

</html>