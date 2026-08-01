<!DOCTYPE html>
<html lang="fr">

<head>

<title>Postuler</title>

<style>

body{

font-family:Arial;
background:#f4f7fb;

}


.container{

width:600px;
margin:50px auto;
background:white;
padding:30px;
border-radius:20px;

}


input,textarea{

width:100%;
padding:12px;
margin:10px 0;

border:1px solid #ddd;
border-radius:10px;

}


button{

background:#1D9E75;
color:white;
border:none;
padding:12px 25px;
border-radius:10px;
cursor:pointer;

}

</style>

</head>


<body>


<div class="container">


<h1>
Postuler à :
{{ $offre->titre }}
</h1>


<p>
{{ $offre->entreprise }}
</p>



<form method="POST"
action="{{ route('candidatures.store',$offre->id) }}"
enctype="multipart/form-data">


@csrf



<label>
Votre CV (PDF)
</label>


<input 
type="file"
name="cv"
accept=".pdf"
required
>



<label>
Lettre de motivation
</label>


<textarea
name="lettre_motivation"
rows="8"
required
></textarea>



<button>
Envoyer ma candidature
</button>



</form>


</div>


</body>

</html>