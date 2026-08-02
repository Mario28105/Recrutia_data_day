<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Connexion - Recurtia</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}


body{

    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:#f2f5f9;

}



.container{

    width:400px;

    background:white;

    padding:40px;

    border-radius:20px;

    box-shadow:0 10px 30px rgba(0,0,0,0.1);

}



.logo{

    text-align:center;

    font-size:32px;

    font-weight:bold;

    margin-bottom:30px;

    color:#0F1117;

}


.logo span{

    color:#1D9E75;

}



h2{

    text-align:center;

    margin-bottom:25px;

    color:#111827;

}



.form-group{

    margin-bottom:20px;

}



label{

    display:block;

    margin-bottom:8px;

    font-weight:bold;

}



input{

    width:100%;

    padding:13px;

    border-radius:10px;

    border:1px solid #ddd;

    outline:none;

    font-size:15px;

}



input:focus{

    border-color:#1D9E75;

}



button{

    width:100%;

    padding:14px;

    border:none;

    border-radius:10px;

    background:#1D9E75;

    color:white;

    font-size:16px;

    cursor:pointer;

    margin-top:10px;

}



button:hover{

    background:#0F6E56;

}



.links{

    text-align:center;

    margin-top:20px;

}



.links a{

    color:#1D9E75;

    text-decoration:none;

}



.home{

    display:block;

    text-align:center;

    margin-top:15px;

    color:#555;

}



.error{

    color:red;

    font-size:14px;

    margin-bottom:10px;

}


</style>


</head>


<body>


<div class="container">


<div class="logo">

Recurtia<span>.</span>

</div>



<h2>
Connexion
</h2>



@if($errors->any())

<div class="error">

{{ $errors->first() }}

</div>

@endif




<form method="POST" action="{{ route('login') }}">

@csrf



<div class="form-group">

<label>Email</label>

<input 
type="email"
name="email"
value="{{ old('email') }}"
placeholder="exemple@gmail.com"
required
>

</div>




<div class="form-group">

<label>Mot de passe</label>

<input 
type="password"
name="password"
placeholder="Votre mot de passe"
required
>

</div>





<button type="submit">

Se connecter

</button>



</form>





<div class="links">


<p>

Pas encore inscrit ?

<a href="{{ route('register') }}">

Créer un compte

</a>

</p>


<a class="home" href="/">

← Retour à l'accueil

</a>



</div>




</div>


</body>


</html>