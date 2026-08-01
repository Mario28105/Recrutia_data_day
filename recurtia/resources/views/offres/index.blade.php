@extends('layouts.app')

@section('content')


<div class="container">


    <h1 class="text-center mb-4">
        Mes candidatures
    </h1>



    @forelse($candidatures as $c)



    <div class="card shadow mb-4">

        <div class="card-body">


            <h4>
                {{ $c->offre->titre ?? 'Offre supprimée' }}
            </h4>



            <p>

                <strong>Entreprise :</strong>

                {{ $c->offre->entreprise ?? 'N/A' }}

                <br>


                <strong>Localisation :</strong>

                {{ $c->offre->localisation ?? 'N/A' }}

            </p>




            <p>

                <strong>Statut :</strong>


                @if($c->statut == "en_attente")

                    <span class="badge bg-warning text-dark">
                        En attente
                    </span>


                @elseif($c->statut == "acceptee")

                    <span class="badge bg-success">
                        Acceptée
                    </span>


                @else

                    <span class="badge bg-danger">
                        Refusée
                    </span>


                @endif


            </p>




            <p>

                <strong>CV :</strong>


                @if($c->cv)

                <a href="{{ asset('storage/'.$c->cv) }}" 
                   target="_blank"
                   class="btn btn-outline-primary btn-sm">

                    Voir mon CV

                </a>

                @else

                    Aucun CV

                @endif


            </p>



            <p>

                <strong>Lettre de motivation :</strong>

                <br>

                {{ $c->lettre_motivation }}

            </p>



        </div>


    </div>




    @empty


    <div class="alert alert-info text-center">

        Vous n'avez envoyé aucune candidature.

    </div>


    @endforelse



</div>

<a href="{{ route('offres.postuler.form',$offre->id) }}">
    Postuler
</a>


@endsection