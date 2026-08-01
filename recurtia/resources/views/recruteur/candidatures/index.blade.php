@extends('recruteur.layout')

@section('title', 'Candidatures reçues')
@section('topbar_title', 'Candidatures reçues')

@section('content')

<div class="card">

    <h2>Candidatures reçues</h2>

    <form method="GET" action="{{ route('recruteur.candidatures.index') }}" class="filters">

        <select name="offre_id" onchange="this.form.submit()">
            <option value="">Toutes les offres</option>
            @foreach($offres as $o)
                <option value="{{ $o->id }}" {{ request('offre_id') == $o->id ? 'selected' : '' }}>
                    {{ $o->titre }}
                </option>
            @endforeach
        </select>

        <select name="statut" onchange="this.form.submit()">
            <option value="">Tous les statuts</option>
            <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
            <option value="entretien" {{ request('statut') == 'entretien' ? 'selected' : '' }}>Entretien</option>
            <option value="acceptee" {{ request('statut') == 'acceptee' ? 'selected' : '' }}>Acceptée</option>
            <option value="refusee" {{ request('statut') == 'refusee' ? 'selected' : '' }}>Refusée</option>
        </select>

        @if(request('offre_id') || request('statut'))
            <a href="{{ route('recruteur.candidatures.index') }}" class="btn btn-outline btn-sm">Réinitialiser</a>
        @endif

    </form>

    @forelse($candidatures as $c)

        @php
            $badgeClass = [
                'en_attente' => 'badge-attente',
                'entretien' => 'badge-entretien',
                'acceptee' => 'badge-acceptee',
                'refusee' => 'badge-refusee',
            ][$c->statut] ?? 'badge-attente';
        @endphp

        <div class="item-row">

            <div>
                <h3>{{ $c->user->name }}</h3>
                <div class="meta">
                    Offre : {{ $c->offre->titre ?? 'Offre supprimée' }}
                    · reçue le {{ $c->created_at->format('d/m/Y') }}
                    @if($c->user->candidat?->telephone)
                        · {{ $c->user->candidat->telephone }}
                    @endif
                </div>
            </div>

            <div class="item-actions">
                <span class="badge {{ $badgeClass }}">{{ str_replace('_',' ',$c->statut) }}</span>
                <a class="btn btn-outline btn-sm" href="{{ route('recruteur.candidatures.show', $c) }}">Voir le dossier</a>
            </div>

        </div>

    @empty

        <div class="empty-state">
            Aucune candidature ne correspond à ces critères.
        </div>

    @endforelse

    <div style="margin-top:25px;">
        {{ $candidatures->links() }}
    </div>

</div>

@endsection
