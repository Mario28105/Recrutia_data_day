@extends('recruteur.layout')

@section('title', 'Mes offres')
@section('topbar_title', 'Mes offres')

@section('content')

<div class="card">

    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Mes offres publiées</h2>
        <a class="btn" href="{{ route('recruteur.offres.create') }}">+ Publier une offre</a>
    </div>

    @forelse($offres as $offre)

        <div class="item-row">

            <div>
                <h3>{{ $offre->titre }}</h3>
                <div class="meta">
                    {{ $offre->entreprise }} — {{ $offre->localisation }}
                    · publiée le {{ $offre->created_at->format('d/m/Y') }}
                </div>
            </div>

            <div class="item-actions">
                <span class="badge">{{ $offre->candidatures_count }} candidature(s)</span>

                <a class="btn btn-outline btn-sm"
                   href="{{ route('recruteur.candidatures.index', ['offre_id' => $offre->id]) }}">
                    Candidatures
                </a>

                <a class="btn btn-outline btn-sm" href="{{ route('recruteur.offres.edit', $offre) }}">
                    Modifier
                </a>

                <form method="POST" action="{{ route('recruteur.offres.destroy', $offre) }}"
                      onsubmit="return confirm('Supprimer définitivement cette offre ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </div>

        </div>

    @empty

        <div class="empty-state">
            Vous n'avez publié aucune offre pour le moment.
            <br><br>
            <a class="btn" href="{{ route('recruteur.offres.create') }}">Publier votre première offre</a>
        </div>

    @endforelse

    <div style="margin-top:25px;">
        {{ $offres->links() }}
    </div>

</div>

@endsection
