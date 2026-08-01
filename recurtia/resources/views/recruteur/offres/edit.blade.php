@extends('recruteur.layout')

@section('title', 'Modifier l\'offre')
@section('topbar_title', 'Modifier l\'offre')

@section('content')

<div class="card">

    <h2>Modifier l'offre : {{ $offre->titre }}</h2>

    <form method="POST" action="{{ route('recruteur.offres.update', $offre) }}">
        @csrf
        @method('PUT')

        @include('recruteur.offres._form')

        <button type="submit" class="btn">Enregistrer les modifications</button>
        <a href="{{ route('recruteur.offres.index') }}" class="btn btn-outline">Annuler</a>

    </form>

</div>

@endsection
