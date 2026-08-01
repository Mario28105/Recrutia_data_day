<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutia</title>

    <!-- Materialize CSS (gardé pour d'autres composants : formulaires, modals, etc.) -->
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">

    <!-- Google Fonts (thème SmartMatch) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Instrument+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- CSS perso (thème SmartMatch) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">

            <!-- LOGO -->
            <a href="{{ route('home') }}" class="nav-logo">
                <span class="logo-icon">⬢</span>
                Recrutia<span class="logo-accent">.</span>
            </a>

            <!-- LIENS DESKTOP -->
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="#fonctionnement">Comment ça marche</a></li>
                <li><a href="#fonctionnalites">Fonctionnalités</a></li>
                <li><a href="{{ route('tarif') }}">Tarifs</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <!-- CTA DESKTOP -->
            <div class="nav-cta">
                <a href="{{ route('login') }}" class="btn-ghost">Connexion</a>
                <a href="{{ route('register') }}" class="btn-primary">Commencer Gratuitement</a>
            </div>

            <!-- HAMBURGER (MOBILE) -->
            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false"
                aria-controls="navMobile">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

        <!-- MENU MOBILE -->
        <ul class="nav-mobile" id="navMobile">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="#fonctionnement">Comment ça marche</a></li>
            <li><a href="#fonctionnalites">Fonctionnalités</a></li>
            <li><a href="{{ route('tarif') }}">Tarifs</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('login') }}" class="mobile-login">Connexion</a></li>
            <li><a href="{{ route('register') }}" class="btn-primary">Commencer Gratuitement</a></li>
        </ul>
    </nav>

    <!-- CONTENU -->
    <main class="page-wrapper">
        <section class="hero">
            <div class="container">

                <div class="hero-content">
                    <span class="badge-smart badge-solid">
                        <i class="fas fa-sparkles"></i>
                        Plateforme intelligente
                    </span>

                    <h1>Le recrutement
                        qui vient à vous</h1>

                    <p>Fini la recherche passive et l'éparpillement des outils. Notre algorithme IA pousse
                        instantanément l'offre idéale au bon candidat, au bon moment.
                    </p>

                    <div class="hero-cta">
                        <a href="{{ route('register') }}" class="btn-primary btn-lg">Je Recherce un emploi</a>
                        <a href="{{ route('register') }}" class="btn-secondary btn-lg">Je Recrute</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- COMMENT ÇA MARCHE -->
        <section class="how-it-works" id="fonctionnement">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Processus</span>
                    <h2>4 étapes, c'est tout</h2>
                    <p>De la création de profil à la postulation, en moins de 5 minutes.</p>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="step-card" data-step="01">
                            <div class="step-icon-wrap">
                                <svg class="step-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <h3>Créez votre profil intelligent</h3>
                            <p>Compétences, expériences, localisation, type de poste souhaité. Fait une seule fois,
                                utilisé pour toutes vos candidatures.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="step-card" data-step="02">
                            <div class="step-icon-wrap">
                                <svg class="step-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                </svg>
                            </div>
                            <h3>Le Smart Matching analyse</h3>
                            <p>Notre IA compare votre profil à toutes les offres publiées et calcule un score de
                                compatibilité multi-critères en temps réel.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="step-card" data-step="03">
                            <div class="step-icon-wrap">
                                <svg class="step-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                            </div>
                            <h3>Recevez une alerte push</h3>
                            <p>Dès qu'une offre dépasse votre seuil de compatibilité, vous êtes notifié instantanément
                                sur tous vos appareils.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="step-card" data-step="04">
                            <div class="step-icon-wrap">
                                <svg class="step-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                                </svg>
                            </div>
                            <h3>Postulez en un clic</h3>
                            <p>Votre profil est votre CV. Un seul clic envoie votre candidature complète au recruteur,
                                sans ressaisir quoi que ce soit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DEMO SECTION — Vos offres arrivent à vous -->
        <section class="demo-section">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <span class="section-tag">En direct</span>
                        <h2>Vos offres arrivent à vous</h2>
                        <p>Plus besoin de scanner 15 sites d'emploi chaque matin. Votre tableau de bord centralise
                            toutes les opportunités qui vous correspondent vraiment.</p>
                        <ul class="demo-points">
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Score de compatibilité visible sur chaque offre
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Filtrage intelligent par secteur, salaire, mode de travail
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Postulation 1-clic sans refaire son CV
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Suivi des candidatures en temps réel
                            </li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn-primary btn-lg">Créer mon profil gratuitement</a>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="demo-visual">
                            <div class="phone-mockup">
                                <div class="phone-header">
                                    <span>SmartMatch</span>
                                </div>
                                <span class="phone-notif-dot">3</span>
                                <div class="phone-body">
                                    <p class="phone-section-label">Nouvelles offres matchées</p>
                                    <div class="phone-card active-card">
                                        <div class="pc-left">
                                            <div class="pc-logo" style="background:#E6F4FF">🏗️</div>
                                            <div class="pc-info">
                                                <strong>TechCorp Madagascar</strong>
                                                <span>Dev Full-Stack · CDI · Antananarivo</span>
                                                <div class="pc-tags">
                                                    <span class="tag-match">98% match</span>
                                                    <span class="tag">React</span>
                                                    <span class="tag">Node.js</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="pc-btn">Postuler</button>
                                    </div>
                                    <div class="phone-card">
                                        <div class="pc-left">
                                            <div class="pc-logo" style="background:#FFF0E6">📊</div>
                                            <div class="pc-info">
                                                <strong>DataVision Africa</strong>
                                                <span>Data Analyst · Remote</span>
                                                <div class="pc-tags">
                                                    <span class="tag-match">91%</span>
                                                    <span class="tag">Python</span>
                                                    <span class="tag">SQL</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="pc-btn">Postuler</button>
                                    </div>
                                    <div class="phone-card">
                                        <div class="pc-left">
                                            <div class="pc-logo" style="background:#F0EEFF">🎨</div>
                                            <div class="pc-info">
                                                <strong>CreativeHub</strong>
                                                <span>UX/UI Designer · Freelance</span>
                                                <div class="pc-tags">
                                                    <span class="tag-match">87%</span>
                                                    <span class="tag">Figma</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="pc-btn">Postuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FONCTIONNALITÉS -->
        <section class="features" id="fonctionnalites">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Fonctionnalités</span>
                    <h2>Tout ce dont vous avez besoin</h2>
                    <p>Une seule plateforme pour remplacer tous vos outils de recherche et de recrutement.</p>
                </div>
                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">🧠</div>
                            <h3>Smart Matching IA</h3>
                            <p>Algorithme multi-critères analysant compétences, expérience, localisation, salaire et
                                culture d'entreprise.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">🔔</div>
                            <h3>Alertes instantanées</h3>
                            <p>Push web, email et mobile. Notifié en temps réel dès qu'une offre dépasse votre seuil.
                            </p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">📊</div>
                            <h3>Dashboard centralisé</h3>
                            <p>Candidatures, messages, entretiens et offres sauvegardées, tout au même endroit.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">⚡</div>
                            <h3>Candidature 1-clic</h3>
                            <p>Un seul profil, des candidatures simplifiées : plus besoin de remplir les mêmes
                                informations à chaque offre.>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">💬</div>
                            <h3>Messagerie intégrée</h3>
                            <p>Échangez directement avec les recruteurs sans quitter la plateforme.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">🛡️</div>
                            <h3>Profils vérifiés</h3>
                            <p>Diplômes et expériences validés pour renforcer la confiance des deux côtés.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">📈</div>
                            <h3>Analytics recruteur</h3>
                            <p>Taux de réponse, temps de traitement, qualité des profils. Recrutement data-driven.</p>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="feature-card">
                            <div class="feature-icon">🌍</div>
                            <h3>Remote & Local</h3>
                            <p>Opportunités locales à Madagascar et postes full remote à l'international.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- DUAL CTA -->
        <section class="dual-cta">
            <div class="container">
                <div class="row dual-cta-row">
                    <!-- Carte Candidat -->
                    <div class="col s12 m6">
                        <div class="cta-card cta-candidate z-depth-2">
                            <span class="cta-emoji">🎯</span>
                            <h3>Vous cherchez un emploi ?</h3>
                            <p>Créez votre profil en 5 minutes et laissez les meilleures offres venir à vous
                                automatiquement.</p>
                            <ul class="cta-list">
                                <li><i class="fas fa-check"></i> Profil créé une seule fois</li>
                                <li><i class="fas fa-check"></i> Alertes personnalisées</li>
                                <li><i class="fas fa-check"></i> Postulation 1-clic</li>
                                <li><i class="fas fa-check"></i> Suivi en temps réel</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn-primary">Commencer gratuitement</a>
                        </div>
                    </div>
                    <!-- Carte Recruteur -->
                    <div class="col s12 m6">
                        <div class="cta-card cta-recruiter z-depth-2">
                            <span class="cta-emoji">🏢</span>
                            <h3>Vous recrutez ?</h3>
                            <p>Publiez vos offres et recevez uniquement des candidats pré-qualifiés grâce au Smart
                                Matching.</p>
                            <ul class="cta-list">
                                <li><i class="fas fa-check"></i> Ciblage précis de profils</li>
                                <li><i class="fas fa-check"></i> Dashboard unifié</li>
                                <li><i class="fas fa-check"></i> Messagerie intégrée</li>
                                <li><i class="fas fa-check"></i> Analytics avancés</li>
                            </ul>
                            <a href="{{ route('register') }}?type=recruteur" class="btn-dark">Publier une offre</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ -->
        <section class="faq">
            <div class="container faq-container">
                <div class="section-header">
                    <span class="section-tag">FAQ</span>
                    <h2>Questions fréquentes</h2>
                    <p>Tout ce que vous devez savoir avant de commencer.</p>
                </div>
                <ul class="collapsible faq-list" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header faq-q">
                            <span>Est-ce gratuit pour les candidats ?</span>
                            <i class="fas fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="collapsible-body faq-a">
                            <p>Oui, Recrutia est entièrement gratuit pour les candidats. Créez votre profil, recevez des
                                alertes et postulez sans jamais payer quoi que ce soit.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header faq-q">
                            <span>Comment fonctionne le Smart Matching ?</span>
                            <i class="fas fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="collapsible-body faq-a">
                            <p>Notre algorithme analyse votre profil (compétences, expérience, localisation, salaire
                                attendu, disponibilité) et le compare à chaque offre publiée. Un score de 0 à 100% est
                                calculé. Vous êtes notifié uniquement pour les offres au-dessus de votre seuil
                                configuré.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header faq-q">
                            <span>Puis-je contrôler la fréquence des alertes ?</span>
                            <i class="fas fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="collapsible-body faq-a">
                            <p>Absolument. Dans vos préférences, vous définissez votre seuil de matching minimum (ex :
                                n'alerter que pour les offres à +85%), la fréquence (temps réel, quotidien,
                                hebdomadaire) et les canaux (push, email, SMS).</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header faq-q">
                            <span>Les recruteurs peuvent-ils voir mon profil sans que je postule ?</span>
                            <i class="fas fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="collapsible-body faq-a">
                            <p>Vous contrôlez la visibilité de votre profil. Vous pouvez le rendre invisible, visible
                                uniquement aux entreprises que vous choisissez, ou ouvert à tous les recruteurs de la
                                plateforme.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header faq-q">
                            <span>Quels secteurs sont couverts ?</span>
                            <i class="fas fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="collapsible-body faq-a">
                            <p>Tech, finance, marketing, design, santé, éducation, BTP, logistique... Tous les secteurs
                                sont représentés. Recrutia couvre Madagascar et les postes remote internationaux.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- FOOTER CTA -->
        <section class="footer-cta">
            <div class="container">
                <h2>Prêt à inverser la recherche d'emploi ?</h2>
                <p>Rejoignez 12 000+ candidats et 800+ entreprises qui font confiance à Recrutia.</p>
                <div class="footer-cta-btns">
                    <a href="{{ route('register') }}" class="btn-primary btn-lg">Créer mon compte gratuit</a>
                    <a href="{{ route('contact') }}" class="btn-ghost btn-lg">Parler à l'équipe</a>
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
                    <a href="#fonctionnement">Comment ça marche</a>
                    <a href="#fonctionnalites">Fonctionnalités</a>
                    <a href="{{ route('tarif') }}">Tarifs</a>
                </div>
                <div class="footer-col">
                    <h4>Candidats</h4>
                    <a href="{{ route('register') }}">Créer un profil</a>
                    <a href="{{ route('login') }}">Se connecter</a>
                    <a href="#">Conseils emploi</a>
                    <a href="#">Ressources CV</a>
                </div>
                <div class="footer-col">
                    <h4>Entreprises</h4>
                    <a href="{{ route('register') }}?type=recruteur">Publier une offre</a>
                    <a href="{{ route('tarif') }}">Plans recruteur</a>
                    <a href="{{ route('contact') }}">Nous contacter</a>
                    <a href="#">Partenariats</a>
                </div>
                <div class="footer-col">
                    <h4>Légal</h4>
                    <a href="#">Mentions légales</a>
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">CGU</a>
                    <a href="#">Cookies</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 Recrutia. Tous droits réservés. Fait avec ❤️ à Madagascar.</p>
            </div>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>