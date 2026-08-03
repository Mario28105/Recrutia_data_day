<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recrutia - Accueil</title>


    <!-- Materialize -->
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Instrument+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>


<body>



<!-- =========================
        NAVBAR
========================= -->


<nav class="navbar" id="navbar">


    <div class="nav-container">


        <!-- LOGO -->

        <a href="{{ route('home') }}" class="nav-logo">

            <span class="logo-icon">⬢</span>

            Recrutia<span class="logo-accent">.</span>

        </a>



        <!-- MENU -->

        <ul class="nav-links">


            <li>
                <a href="{{ route('home') }}">
                    Accueil
                </a>
            </li>



            <li>
                <a href="#fonctionnement">
                    Comment ça marche
                </a>
            </li>



            <li>
                <a href="#offres">
                    Offres
                </a>
            </li>



        </ul>




        <!-- BOUTONS -->

        <div class="nav-cta">


            <a href="{{ route('login') }}" class="btn-ghost">
                Connexion
            </a>



            <a href="{{ route('register') }}" class="btn-primary">
                Créer un compte
            </a>


        </div>





        <!-- MOBILE -->

        <button class="nav-toggle" id="navToggle">

            <span></span>

            <span></span>

            <span></span>

        </button>



    </div>




    <!-- MENU MOBILE -->

    <ul class="nav-mobile" id="navMobile">


        <li>
            <a href="{{ route('home') }}">
                Accueil
            </a>
        </li>


        <li>
            <a href="#fonctionnement">
                Comment ça marche
            </a>
        </li>


        <li>
            <a href="#offres">
                Offres
            </a>
        </li>


        <li>
            <a href="{{ route('login') }}">
                Connexion
            </a>
        </li>


        <li>
            <a href="{{ route('register') }}" class="btn-primary">
                Créer un compte
            </a>
        </li>


    </ul>



</nav>





<!-- =========================
        CONTENU
========================= -->


<main class="page-wrapper">





<!-- =========================
        HERO
========================= -->


<section class="hero">


<div class="container">



<div class="hero-content">





<span class="badge-smart badge-solid">


<i class="fas fa-sparkles"></i>


Plateforme emploi intelligente


</span>






<h1>

Trouvez l'offre qui correspond à votre profil

</h1>





<p>

Recrutia analyse vos compétences et vous propose les meilleures opportunités professionnelles.

</p>






<div class="hero-cta">





<a href="{{ route('register') }}" class="btn-primary btn-lg">

Créer mon profil gratuitement

</a>





</div>





</div>



</div>



</section>

<!-- =========================
        COMMENT ÇA MARCHE
========================= -->

<section class="how-it-works" id="fonctionnement">

    <div class="container">


        <div class="section-header">

            <span class="section-tag">
                Processus
            </span>


            <h2>
                4 étapes, c'est tout
            </h2>


            <p>
                De la création du profil à la candidature.
            </p>


        </div>



        <div class="row">



            <!-- ETAPE 1 -->

            <div class="col s12 m6 l3">

                <div class="step-card" data-step="01">


                    <div class="step-icon-wrap">

                        <i class="fas fa-user step-icon"></i>

                    </div>



                    <h3>
                        Créez votre profil
                    </h3>


                    <p>
                        Ajoutez vos compétences, expériences et préférences.
                    </p>



                </div>

            </div>





            <!-- ETAPE 2 -->

            <div class="col s12 m6 l3">

                <div class="step-card" data-step="02">


                    <div class="step-icon-wrap">

                        <i class="fas fa-robot step-icon"></i>

                    </div>



                    <h3>
                        Smart Matching
                    </h3>


                    <p>
                        Notre système compare votre profil avec les offres disponibles.
                    </p>



                </div>

            </div>





            <!-- ETAPE 3 -->

            <div class="col s12 m6 l3">

                <div class="step-card" data-step="03">


                    <div class="step-icon-wrap">

                        <i class="fas fa-bell step-icon"></i>

                    </div>



                    <h3>
                        Recevez des alertes
                    </h3>


                    <p>
                        Soyez averti lorsqu'une offre vous correspond.
                    </p>



                </div>

            </div>






            <!-- ETAPE 4 -->

            <div class="col s12 m6 l3">

                <div class="step-card" data-step="04">


                    <div class="step-icon-wrap">

                        <i class="fas fa-rocket step-icon"></i>

                    </div>



                    <h3>
                        Postulez rapidement
                    </h3>


                    <p>
                        Envoyez votre candidature facilement.
                    </p>



                </div>

            </div>




        </div>


    </div>


</section>