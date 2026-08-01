@extends('recruteur.layout')

@section('title', 'Dashboard')
@section('topbar_title', 'Tableau de bord')

@section('content')

<div class="welcome">
    <h1>Bienvenue {{ Auth::user()->name }} 👋</h1>
    <p>Voici un aperçu de votre activité de recrutement.</p>
</div>

<div class="stats-grid">

    <div class="stat-card">
        <div class="value">{{ $stats['nb_offres'] }}</div>
        <div class="label">Offres publiées</div>
    </div>

    <div class="stat-card">
        <div class="value">{{ $stats['nb_candidatures'] }}</div>
        <div class="label">Candidatures reçues</div>
    </div>

    <div class="stat-card">
        <div class="value">{{ $stats['nb_en_attente'] }}</div>
        <div class="label">En attente</div>
    </div>

    <div class="stat-card">
        <div class="value">{{ $stats['nb_acceptees'] }}</div>
        <div class="label">Acceptées</div>
    </div>

</div>

<div class="card">

    <h2>Mes dernières offres</h2>

    @forelse($dernieresOffres as $offre)

        <div class="item-row">

            <div>
                <h3>{{ $offre->titre }}</h3>
                <div class="meta">{{ $offre->entreprise }} — {{ $offre->localisation }}</div>
            </div>

            <div class="item-actions">
                <a class="btn btn-outline btn-sm" href="{{ route('recruteur.offres.edit', $offre) }}">Modifier</a>
                <a class="btn btn-sm" href="{{ route('recruteur.candidatures.index', ['offre_id' => $offre->id]) }}">
                    Voir les candidatures
                </a>
            </div>

        </div>

    @empty

        <div class="empty-state">
            Vous n'avez publié aucune offre pour le moment.
            <br><br>
            <a class="btn" href="{{ route('recruteur.offres.create') }}">Publier une offre</a>
        </div>

    @endforelse

</div>

<div class="card">

    <h2>Dernières candidatures reçues</h2>

    @forelse($dernieresCandidatures as $c)

        <div class="item-row">

            <div>
                <h3>{{ $c->user->name }}</h3>
                <div class="meta">
                    A postulé pour : {{ $c->offre->titre ?? 'Offre supprimée' }}
                </div>
            </div>

            @php
                $badgeClass = [
                    'en_attente' => 'badge-attente',
                    'entretien' => 'badge-entretien',
                    'acceptee' => 'badge-acceptee',
                    'refusee' => 'badge-refusee',
                ][$c->statut] ?? 'badge-attente';
            @endphp

            <div class="item-actions">
                <span class="badge {{ $badgeClass }}">{{ str_replace('_',' ',$c->statut) }}</span>
                <a class="btn btn-outline btn-sm" href="{{ route('recruteur.candidatures.show', $c) }}">Voir</a>
            </div>

        </div>

    @empty

        <div class="empty-state">
            Aucune candidature reçue pour le moment.
        </div>

    @endforelse

</div>

@endsection
