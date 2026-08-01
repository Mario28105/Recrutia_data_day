<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $offre->titre }} - Recrutia</title>


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



.navbar{

    height:75px;

    background:white;

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 50px;

    box-shadow:0 3px 10px #0001;

}



.logo{

    font-size:28px;

    font-weight:bold;

    color:#111;

    text-decoration:none;

}


.logo span{

    color:#1D9E75;

}



.nav-btn{

    background:#1D9E75;

    color:white;

    padding:12px 25px;

    border-radius:25px;

    text-decoration:none;

}





.container{

    max-width:900px;

    margin:50px auto;

}



.card{

    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:0 10px 30px #0002;

}




h1{

    font-size:35px;

    margin-bottom:15px;

}



.company{

    color:#1D9E75;

    font-size:20px;

    margin-bottom:25px;

}



.info{

    display:flex;

    gap:20px;

    margin-bottom:30px;

}



.info span{

    background:#eef5f3;

    padding:10px 20px;

    border-radius:20px;

}




.description{

    line-height:1.7;

    color:#555;

}



h2{

    margin-top:30px;

    margin-bottom:20px;

}




input,textarea{

    width:100%;

    padding:15px;

    border-radius:12px;

    border:1px solid #ddd;

    margin-bottom:20px;

}



textarea{

    height:150px;

}



label{

    font-weight:bold;

    display:block;

    margin-bottom:8px;

}




.btn{


    background:#1D9E75;

    color:white;

    border:none;

    padding:15px 35px;

    border-radius:30px;

    cursor:pointer;

    font-size:16px;

}



.back{

    display:inline-block;

    margin-top:20px;

    color:#555;

    text-decoration:none;

}



</style>


</head>



<body>



<nav class="navbar">


<a href="{{ route('dashboard') }}" class="logo">

Recrutia<span>.</span>

</a>


<a href="{{ route('dashboard') }}" class="nav-btn">

Dashboard

</a>


</nav>







<div class="container">



<div class="card">



<h1>

{{ $offre->titre }}

</h1>



<div class="company">

{{ $offre->entreprise }}

</div>




<div class="info">


<span>
📍 {{ $offre->localisation }}
</span>


<span>
💼 Emploi
</span>


</div>





<h2>

Description

</h2>



<p class="description">

{{ $offre->description }}

</p>







<h2>

Postuler à cette offre

</h2>




<form action="{{ route('candidatures.store',$offre->id) }}"
method="POST"
enctype="multipart/form-data">


@csrf




<label>

Votre CV (PDF)

</label>


<input type="file"
name="cv"
accept=".pdf"
required>





<label>

Lettre de motivation

</label>



<textarea 
name="lettre_motivation"
placeholder="Écrivez votre lettre de motivation..."
required></textarea>





<button class="btn">

Envoyer ma candidature

</button>



</form>







<a href="{{ route('dashboard') }}" class="back">

← Retour aux offres

</a>



</div>



</div>




</body>

</html>