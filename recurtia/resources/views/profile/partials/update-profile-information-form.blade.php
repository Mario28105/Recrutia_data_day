<form method="post" action="{{ route('profile.update') }}">

@csrf
@method('patch')


<label>
Nom complet
</label>

<input 
type="text"
name="name"
value="{{ old('name', Auth::user()->name) }}"
>



<label>
Email
</label>


<input 
type="email"
name="email"
value="{{ old('email', Auth::user()->email) }}"
>


<button type="submit">
Enregistrer les modifications
</button>


</form>