<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Créer un compte - Recurtia</title>


<style>


*{
    box-sizing:border-box;
}


body{

    margin:0;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:Arial, sans-serif;

    background:#f2f5f9;

}



/* CARTE */

.register-card{

    width:430px;

    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:0 10px 30px rgba(0,0,0,0.08);

}



/* LOGO */

.logo{

    text-align:center;

    font-size:35px;

    font-weight:bold;

    color:#0F1117;

}


.logo span{

    color:#1D9E75;

}



.subtitle{

    text-align:center;

    color:#777;

    margin-bottom:30px;

}



/* TITRE */


h2{

    text-align:center;

    margin-bottom:30px;

}



/* ERREURS */


.error{

    background:#ffe5e5;

    color:red;

    padding:10px;

    border-radius:10px;

    margin-bottom:15px;

}



/* LABEL */


label{

    display:block;

    margin-bottom:7px;

    font-weight:bold;

}



/* INPUT */


input{


    width:100%;

    padding:14px;

    margin-bottom:18px;

    border-radius:12px;

    border:1px solid #ddd;

    font-size:15px;

}



input:focus{

    outline:none;

    border-color:#1D9E75;

}



/* CHOIX DU ROLE */

.role-choice{

    display:flex;

    gap:12px;

    margin-bottom:18px;

}

.role-option{

    flex:1;

    text-align:center;

    padding:14px 10px;

    border:2px solid #ddd;

    border-radius:12px;

    cursor:pointer;

    font-weight:bold;

    color:#555;

}

.role-option input{

    display:none;

}

.role-option.selected{

    border-color:#1D9E75;

    background:#e6f7f1;

    color:#0F6E56;

}

#entreprise-field{

    display:none;

}

/* BOUTON CREER */


button{


    width:100%;

    padding:15px;

    background:#1D9E75;

    color:white;

    border:none;

    border-radius:12px;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

}



button:hover{

    background:#0F6E56;

}



/* LIEN CONNEXION */


.login-link{

    text-align:center;

    margin-top:20px;

}



.login-link a{

    color:#1D9E75;

    font-weight:bold;

    text-decoration:none;

}



/* BOUTON ACCUEIL */


.home-btn{


    display:block;

    text-align:center;

    margin-top:15px;

    padding:13px;

    border-radius:12px;

    border:2px solid #1D9E75;

    color:#1D9E75;

    text-decoration:none;

    font-weight:bold;

}



.home-btn:hover{


    background:#1D9E75;

    color:white;

}



</style>


</head>


<body>



<div class="register-card">



<div class="logo">

Recurtia<span>.</span>

</div>



<p class="subtitle">

Créez votre espace candidat ou recruteur

</p>




<h2>

Créer un compte

</h2>





@if($errors->any())

<div class="error">

<ul>

@foreach($errors->all() as $error)

<li>

{{ $error }}

</li>

@endforeach

</ul>

</div>

@endif






<form method="POST" action="{{ route('register') }}" id="register-form">

@csrf

<label>
Je suis...
</label>

<div class="role-choice">

    <label class="role-option {{ old('role','candidat') == 'candidat' ? 'selected' : '' }}" data-role="candidat">
        <input type="radio" name="role" value="candidat" {{ old('role','candidat') == 'candidat' ? 'checked' : '' }}>
        🎓 Candidat
    </label>

    <label class="role-option {{ old('role') == 'recruteur' ? 'selected' : '' }}" data-role="recruteur">
        <input type="radio" name="role" value="recruteur" {{ old('role') == 'recruteur' ? 'checked' : '' }}>
        🏢 Recruteur
    </label>

</div>



<label>

Nom complet

</label>


<input

type="text"

name="name"

value="{{ old('name') }}"

placeholder="Votre nom"

required>






<label>

Email

</label>


<input

type="email"

name="email"

value="{{ old('email') }}"

placeholder="exemple@gmail.com"

required>






<div id="entreprise-field">

<label>

Nom de l'entreprise

</label>


<input

type="text"

name="entreprise"

value="{{ old('entreprise') }}"

placeholder="Nom de votre entreprise">

</div>


<label>

Mot de passe

</label>


<input

type="password"

name="password"

placeholder="********"

required>







<label>

Confirmation du mot de passe

</label>


<input

type="password"

name="password_confirmation"

placeholder="********"

required>






<button type="submit">

Créer mon compte

</button>



</form>





<div class="login-link">


<p>

Vous avez déjà un compte ?

</p>



<a href="{{ route('login') }}">

Se connecter

</a>



</div>





<a href="{{ route('home') }}" class="home-btn">

← Retour à l'accueil

</a>





</div>




<script>

function updateRoleUI() {

    const selected = document.querySelector('input[name="role"]:checked').value;

    document.querySelectorAll('.role-option').forEach(function (el) {
        el.classList.toggle('selected', el.dataset.role === selected);
    });

    document.getElementById('entreprise-field').style.display =
        selected === 'recruteur' ? 'block' : 'none';

}

document.querySelectorAll('input[name="role"]').forEach(function (radio) {
    radio.addEventListener('change', updateRoleUI);
});

updateRoleUI();

</script>

</body>


</html>