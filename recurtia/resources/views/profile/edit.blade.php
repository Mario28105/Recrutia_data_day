<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mon Profil - Recurtia</title>


<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f7fb;
    color:#111827;
}


.container{

    max-width:900px;
    margin:40px auto;

}



.card{

    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    margin-bottom:25px;

}



h1{

    font-size:30px;
    margin-bottom:10px;

}



.subtitle{

    color:#666;
    margin-bottom:30px;

}



.section-title{

    font-size:20px;
    font-weight:bold;
    margin-bottom:20px;

}



input{

    width:100%;
    padding:12px;

    border:1px solid #ddd;

    border-radius:10px;

    margin-bottom:15px;

}



button{

    background:#1D9E75;

    color:white;

    border:none;

    padding:12px 20px;

    border-radius:10px;

    cursor:pointer;

}



button:hover{

    background:#0F6E56;

}


</style>

</head>


<body>

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">

    <h1>
        Mon Profil
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


<div class="container">



<h1>
Mon Profil 👤
</h1>


<p class="subtitle">
Gérez vos informations personnelles et votre compte candidat.
</p>




<div class="card">


<div class="section-title">

Informations personnelles

</div>


@include('profile.partials.update-profile-information-form')


</div>





<div class="card">


<div class="section-title">

Modifier le mot de passe

</div>


@include('profile.partials.update-password-form')


</div>





<div class="card">


<div class="section-title">

Supprimer mon compte

</div>


@include('profile.partials.delete-user-form')


</div>




</div>


</body>

</html>