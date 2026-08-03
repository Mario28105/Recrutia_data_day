@extends('recruteur.layout')

@section('title', 'Détail candidature')
@section('topbar_title', 'Détail de la candidature')

@section('content')

@php
    $badgeClass = [
        'en_attente' => 'badge-attente',
        'entretien' => 'badge-entretien',
        'acceptee' => 'badge-acceptee',
        'refusee' => 'badge-refusee',
    ][$candidature->statut] ?? 'badge-attente';
@endphp

<div class="card">

    <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:15px;">
        <div>
            <h2>{{ $candidature->user->name }}</h2>
            <div class="meta">{{ $candidature->user->email }}</div>
        </div>

        <span class="badge {{ $badgeClass }}">{{ str_replace('_',' ',$candidature->statut) }}</span>
    </div>

    <hr style="margin:25px 0; border:none; border-top:1px solid #eee;">

    <h3 style="margin-bottom:10px;">Offre concernée</h3>
    <p>
        <strong>{{ $candidature->offre->titre ?? 'Offre supprimée' }}</strong>
        — {{ $candidature->offre->localisation ?? '' }}
    </p>

    <h3 style="margin:25px 0 10px;">Profil candidat</h3>
    <p>
        <strong>Téléphone :</strong> {{ $candidature->user->candidat->telephone ?? 'Non renseigné' }}<br>
        <strong>Niveau d'étude :</strong> {{ $candidature->user->candidat->niveau_etude ?? 'Non renseigné' }}<br>
        <strong>Compétences :</strong> {{ $candidature->user->candidat->competences ?? 'Non renseignées' }}
    </p>

    <h3 style="margin:25px 0 10px;">Lettre de motivation</h3>
    <p style="white-space:pre-line; background:#fafafa; padding:20px; border-radius:15px; border:1px solid #eee;">
        {{ $candidature->lettre_motivation ?? 'Aucune lettre de motivation fournie.' }}
    </p>

    <div style="margin-top:25px;">
        @if($candidature->cv)
            <a class="btn" href="{{ route('recruteur.candidatures.cv', $candidature) }}">
                Télécharger le CV
            </a>
        @endif
        <a class="btn btn-outline" href="{{ route('recruteur.candidatures.index') }}">
            Retour à la liste
        </a>
    </div>

</div>

<div class="card">

    <h2>Changer le statut</h2>

    <form method="POST" action="{{ route('recruteur.candidatures.statut', $candidature) }}" style="display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
        @csrf
        @method('PATCH')

        <div class="form-group" style="flex:1; min-width:200px; margin-bottom:0;">
            <label>Statut</label>
            <select name="statut">
                <option value="en_attente" {{ $candidature->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="entretien" {{ $candidature->statut == 'entretien' ? 'selected' : '' }}>Entretien</option>
                <option value="acceptee" {{ $candidature->statut == 'acceptee' ? 'selected' : '' }}>Acceptée</option>
                <option value="refusee" {{ $candidature->statut == 'refusee' ? 'selected' : '' }}>Refusée</option>
            </select>
        </div>

        <button type="submit" class="btn">Mettre à jour</button>

    </form>

</div>

@endsection
