<!DOCTYPE html>

<html lang="fr">

<head>

<meta charset="UTF-8">

<title>{{ $offre->titre }}</title>


<style>


body{

font-family:Arial;

background:#f5f7fb;

padding:40px;

}


.card{

background:white;

padding:30px;

border-radius:20px;

max-width:700px;

margin:auto;

box-shadow:0 10px 30px #0002;

}


input,textarea{

width:100%;

padding:12px;

margin:10px 0;

border-radius:10px;

border:1px solid #ddd;

}


button{

background:#1D9E75;

color:white;

border:0;

padding:15px 25px;

border-radius:20px;

cursor:pointer;

}


a{

text-decoration:none;

color:#1D9E75;

}



</style>


</head>



<body>



<div class="card">


<a href="{{route('dashboard')}}">
← Retour
</a>



<h1>

{{$offre->titre}}

</h1>



<h3>

{{$offre->entreprise}}

</h3>



<p>

{{$offre->localisation}}

</p>



<p>

{{$offre->description}}

</p>

<hr>



<h2>
Postuler
</h2>


@if(session('success'))
<p style="background:#e6f7f1;color:#087857;padding:12px 18px;border-radius:12px;margin-bottom:15px;">
{{ session('success') }}
</p>
@endif

@if($errors->any())
<div style="background:#ffe5e5;color:#c0392b;padding:12px 18px;border-radius:12px;margin-bottom:15px;">
<strong>Votre candidature n'a pas pu etre envoyee :</strong>
<ul style="margin:8px 0 0 20px;">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif





<form action="{{route('candidatures.store',$offre->id)}}"
method="POST"
enctype="multipart/form-data">


@csrf



<label>
Votre CV
</label>


<input type="file"
name="cv">

@error('cv')
<div style="color:#c0392b;font-size:13px;margin-top:5px;">{{ $message }}</div>
@enderror





<label>
Lettre de motivation
</label>


<textarea
name="lettre_motivation"
rows="6">{{ old('lettre_motivation') }}</textarea>

@error('lettre_motivation')
<div style="color:#c0392b;font-size:13px;margin-top:5px;">{{ $message }}</div>
@enderror




<button>

Envoyer ma candidature

</button>



</form>



</div>



</body>

</html>