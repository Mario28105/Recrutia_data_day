<form method="post" action="{{ route('profile.destroy') }}">

@csrf
@method('delete')


<p>
Supprimer définitivement votre compte.
</p>


<button type="submit">
Supprimer mon compte
</button>


</form>