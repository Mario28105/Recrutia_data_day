<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact — Recrutia</title>

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

    <!-- CSS page Contact -->
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
                <li><a href="{{ route('tarif') }}">Tarifs</a></li>
                <li><a href="{{ route('contact') }}" class="active">Contact</a></li>
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

    <!-- CONTACT SECTION -->
    <section class="contact-section">
        <div class="container">

            <!-- Header -->
            <div class="contact-header">
                <span class="section-tag">Contact</span>
                <h1>Nous sommes là pour vous aider</h1>
                <p>Une question ? Un problème ? Contactez-nous et nous vous répondrons dans les 24 heures.</p>
            </div>

            <!-- Grille info + formulaire -->
            <div class="contact-grid">

                <!-- Colonne info -->
                <div class="contact-info">

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope" style="color: var(--brand);"></i>
                        </div>
                        <div class="contact-item-body">
                            <h4>Email</h4>
                            <p>Pour toute question, écrivez-nous à :</p>
                            <a href="mailto:support@recrutia.mg">support@recrutia.mg</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-comments" style="color: var(--brand);"></i>
                        </div>
                        <div class="contact-item-body">
                            <h4>Chat en direct</h4>
                            <p>Besoin d'aide immédiate ? Notre équipe est disponible :</p>
                            <p>Lun–Ven : 9h à 18h (Heure de Madagascar)</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone" style="color: var(--brand);"></i>
                        </div>
                        <div class="contact-item-body">
                            <h4>Téléphone</h4>
                            <p>Appelez-nous directement :</p>
                            <a href="tel:+261201234567">+261 20 123 4567</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt" style="color: var(--brand);"></i>
                        </div>
                        <div class="contact-item-body">
                            <h4>Bureau</h4>
                            <p>Recrutia<br>Antananarivo, Madagascar</p>
                        </div>
                    </div>

                </div>

                <!-- Colonne formulaire -->
                <div class="contact-form-card z-depth-1">
                    <h3>Envoyez-nous un message</h3>

                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <!-- Prénom + Nom -->
                        <div class="row" style="margin-bottom: 0;">
                            <div class="input-field col s12 m6">
                                <i class="fas fa-user prefix" style="font-size:16px; margin-top:14px;"></i>
                                <input id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required>
                                <label for="firstName" class="active">Prénom</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required>
                                <label for="lastName">Nom</label>
                            </div>
                        </div>

                        <!-- Email + Téléphone -->
                        <div class="row" style="margin-bottom: 0;">
                            <div class="input-field col s12 m6">
                                <i class="fas fa-envelope prefix" style="font-size:16px; margin-top:14px;"></i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="active">Email</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}">
                                <label for="phone">Téléphone (optionnel)</label>
                            </div>
                        </div>

                        <!-- Sujet -->
                        <div class="row" style="margin-bottom: 0;">
                            <div class="input-field col s12">
                                <select id="subject" name="subject" required>
                                    <option value="" disabled selected>Sélectionnez un sujet</option>
                                    <option value="support">Support technique</option>
                                    <option value="billing">Facturation</option>
                                    <option value="feature">Demande de fonctionnalité</option>
                                    <option value="partnership">Partenariat</option>
                                    <option value="other">Autre</option>
                                </select>
                                <label for="subject">Sujet</label>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="row" style="margin-bottom: 0;">
                            <div class="input-field col s12">
                                <i class="fas fa-comment prefix" style="font-size:16px; margin-top:14px;"></i>
                                <textarea id="message" name="message" class="materialize-textarea" required>{{ old('message') }}</textarea>
                                <label for="message" class="active">Message</label>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="contact-success" style="background:#fdecea; color:#b91c1c; display:block;">
                                <ul style="margin:0; padding-left:18px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="contact-success" style="display:block;">
                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <button type="submit" class="btn-primary btn-submit" id="submitBtn">
                            <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                            Envoyer le message
                        </button>
                    </form>
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
    <script src="{{ asset('js/contact.js') }}"></script>

</body>

</html>