@extends('recruteur.layout')

@section('title', 'Publier une offre')
@section('topbar_title', 'Publier une offre')

@section('content')

<div class="card">

    <h2>Nouvelle offre</h2>

    <form method="POST" action="{{ route('recruteur.offres.store') }}">
        @csrf

        @include('recruteur.offres._form')

        <button type="submit" class="btn">Publier l'offre</button>
        <a href="{{ route('recruteur.offres.index') }}" class="btn btn-outline">Annuler</a>

    </form>

</div>

@endsection
