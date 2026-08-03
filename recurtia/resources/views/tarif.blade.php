<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifs — Recrutia</title>

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Instrument+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- CSS global Recrutia -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CSS page Tarif -->
    <link rel="stylesheet" href="{{ asset('css/tarif.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">

            <a href="{{ route('home') }}" class="nav-logo">
                <span class="logo-icon">⬢</span>
                Recrutia<span class="logo-accent">.</span>
            </a>

            <ul class="nav-links">
                <li><a href="{{ route('home') }}#fonctionnement">Comment ça marche</a></li>
                <li><a href="{{ route('home') }}#fonctionnalites">Fonctionnalités</a></li>
                <li><a href="{{ route('tarif') }}" class="active">Tarifs</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <div class="nav-cta">
                <a href="{{ route('login') }}" class="btn-ghost">Connexion</a>
                <a href="{{ route('register') }}" class="btn-primary">Commencer gratuitement</a>
            </div>

            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false"
                aria-controls="navMobile">
                <span></span><span></span><span></span>
            </button>
        </div>

        <ul class="nav-mobile" id="navMobile">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('home') }}#fonctionnement">Comment ça marche</a></li>
            <li><a href="{{ route('home') }}#fonctionnalites">Fonctionnalités</a></li>
            <li><a href="{{ route('tarif') }}">Tarifs</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('login') }}" class="mobile-login">Connexion</a></li>
            <li><a href="{{ route('register') }}" class="btn-primary">Commencer gratuitement</a></li>
        </ul>
    </nav>

    <!-- PRICING SECTION -->
    <section class="pricing-section">
        <div class="container">

            <div class="pricing-header">
                <span class="section-tag">Tarifs</span>
                <h1>Plans adaptés à votre ambition</h1>
                <p>Trouvez le plan parfait pour accélérer votre carrière. Tous les plans incluent une période d'essai
                    gratuite de 7 jours.</p>
            </div>

            <div class="pricing-grid">

                <!-- Starter -->
                <div class="pricing-card z-depth-1">
                    <div class="pricing-name">Starter</div>
                    <p class="pricing-description">Pour commencer votre recherche</p>
                    <div class="pricing-price">0 Ar</div>
                    <div class="pricing-period">Gratuit pour toujours</div>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> 5 matches par jour</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Profil basique</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Candidatures limitées</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Support email</li>
                    </ul>
                    <a href="{{ route('register') }}" class="pricing-btn">Commencer</a>
                </div>

                <!-- Professional -->
                <div class="pricing-card popular z-depth-2">
                    <div class="pricing-badge">⭐ POPULAIRE</div>
                    <div class="pricing-name">Professional</div>
                    <p class="pricing-description">Pour optimiser votre recherche</p>
                    <div class="pricing-price">99 000 Ar</div>
                    <div class="pricing-period">par mois</div>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> Matches illimités</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Profil premium avec vidéo</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Alertes personnalisées</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Feedback sur candidatures</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Support prioritaire</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Voir qui vous a visité</li>
                    </ul>
                    <a href="{{ route('register') }}" class="pricing-btn">Essai gratuit 7j</a>
                </div>

                <!-- Expert -->
                <div class="pricing-card z-depth-1">
                    <div class="pricing-name">Expert</div>
                    <p class="pricing-description">Pour réussir votre évolution</p>
                    <div class="pricing-price">249 000 Ar</div>
                    <div class="pricing-period">par mois</div>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> Tout le plan Professional</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Coach carrière personnel</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Préparation aux entretiens</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Optimisation CV illimitée</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Accès prioritaire aux offres</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Suivi des entretiens</li>
                    </ul>
                    <a href="{{ route('register') }}" class="pricing-btn">Essai gratuit 7j</a>
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURES INCLUSES -->
    <section class="pricing-features-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Inclus partout</span>
                <h2>Ce qui est inclus dans chaque plan</h2>
                <p>Des fonctionnalités essentielles accessibles dès le plan gratuit.</p>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    <div class="feature-card">
                        <div class="feature-icon">🧠</div>
                        <h3>Matching IA avancé</h3>
                        <p>Notre IA analyse votre profil et trouve les meilleures opportunités en quelques secondes.</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <div class="feature-icon">🔔</div>
                        <h3>Alertes en temps réel</h3>
                        <p>Soyez notifié dès que des offres correspondent à vos critères de recherche.</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3>Statistiques détaillées</h3>
                        <p>Suivez votre progression et optimisez votre approche avec des données précises.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="nav-logo">
                    <span class="logo-icon">⬢</span>
                    Recrutia<span class="logo-accent">.</span>
                </a>
                <p>La plateforme intelligente qui centralise le recrutement et inverse la recherche d'emploi.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn">in</a>
                    <a href="#" aria-label="Twitter">tw</a>
                    <a href="#" aria-label="Facebook">fb</a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Produit</h4>
                <a href="{{ route('home') }}#fonctionnement">Comment ça marche</a>
                <a href="{{ route('home') }}#fonctionnalites">Fonctionnalités</a>
                <a href="{{ route('tarif') }}">Tarifs</a>
            </div>
            <div class="footer-col">
                <h4>Candidats</h4>
                <a href="{{ route('register') }}">Créer un profil</a>
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="#">Conseils emploi</a>
            </div>
            <div class="footer-col">
                <h4>Entreprises</h4>
                <a href="{{ route('register') }}?type=recruteur">Publier une offre</a>
                <a href="{{ route('tarif') }}">Plans recruteur</a>
                <a href="{{ route('contact') }}">Nous contacter</a>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <a href="#">Mentions légales</a>
                <a href="#">Confidentialité</a>
                <a href="#">CGU</a>
                <a href="#">Cookies</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Recrutia. Tous droits réservés. Fait avec ❤️ à Madagascar.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>

    <script src="{{ asset('js/tarif.js') }}"></script>

</body>

</html>