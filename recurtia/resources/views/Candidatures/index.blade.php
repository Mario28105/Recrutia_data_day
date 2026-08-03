<!DOCTYPE html>

<html lang="fr">

<head>

<meta charset="UTF-8">


<title>Mes candidatures</title>


<style>

body{

font-family:Arial;

background:#f5f7fb;

padding:40px;

}



.card{

background:white;

padding:25px;

border-radius:20px;

margin-bottom:20px;

box-shadow:0 5px 20px #0002;

}


.status{

background:#e6f7f1;

color:#087857;

padding:8px 15px;

border-radius:20px;

}


</style>

</head>



<body>



<a href="{{route('dashboard')}}">
← Retour dashboard
</a>



<h1>
Mes candidatures
</h1>


@if(session('success'))
<p style="background:#e6f7f1;color:#087857;padding:12px 18px;border-radius:12px;margin-bottom:20px;">
{{ session('success') }}
</p>
@endif


@forelse($candidatures as $candidature)



<div class="card">


<h2>

{{$candidature->offre->titre}}

</h2>



<p>

Entreprise :
{{$candidature->offre->entreprise}}

</p>



<p>

Envoyée le :

{{$candidature->created_at->format('d/m/Y')}}

</p>



<span class="status">

{{$candidature->statut}}

</span>



</div>



@empty


<p>
Aucune candidature pour le moment.
</p>


@endforelse



</body>

</html>