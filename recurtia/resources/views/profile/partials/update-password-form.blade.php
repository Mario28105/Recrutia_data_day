<form method="post" action="{{ route('password.update') }}">

@csrf
@method('put')


<label>
Mot de passe actuel
</label>

<input 
type="password"
name="current_password"
>



<label>
Nouveau mot de passe
</label>

<input 
type="password"
name="password"
>



<label>
Confirmer le nouveau mot de passe
</label>

<input 
type="password"
name="password_confirmation"
>



<button type="submit">
Changer le mot de passe
</button>


</form>