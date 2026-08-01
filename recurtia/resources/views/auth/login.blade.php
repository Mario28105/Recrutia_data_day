 <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Recrutia</title>

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

    <!-- CSS page Login -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <!-- NAVBAR SIMPLIFIÉE -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">

            <a href="{{ route('home') }}" class="nav-logo">
                <span class="logo-icon">⬢</span>
                Recrutia<span class="logo-accent">.</span>
            </a>

            <div class="nav-cta">
                <span style="font-size:13px; color:var(--text-muted);">Nouveau ici ?</span>
                <a href="{{ route('register') }}" class="btn-primary">Créer un compte</a>
            </div>

        </div>
    </nav>

    <!-- PAGE AUTH -->
    <div class="auth-page">
        <div class="auth-split">

            <!-- ===== GAUCHE — branding ===== -->
            <div class="auth-left">
                <div class="auth-left-content">

                    <div class="auth-brand">
                        <span class="logo-icon">⬢</span>
                        Recrutia<span class="logo-accent">.</span>
                    </div>

                    <h2>Bon retour parmi nous</h2>
                    <p>Vos prochaines opportunités vous attendent. Connectez-vous pour voir les nouvelles offres
                        matchées depuis votre dernière visite.</p>

                    <div class="auth-benefits">
                        <div class="benefit-item">
                            <div class="benefit-icon">🎯</div>
                            <div>
                                <strong>Offres fraîchement matchées</strong>
                                <span>Nouvelles opportunités depuis votre dernière connexion</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon">💬</div>
                            <div>
                                <strong>Messages en attente</strong>
                                <span>Des recruteurs ont peut-être consulté votre profil</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon">📊</div>
                            <div>
                                <strong>Suivi de vos candidatures</strong>
                                <span>Avancement de vos processus de recrutement</span>
                            </div>
                        </div>
                    </div>

                    <div class="auth-testimonial">
                        <div class="at-stars">★★★★★</div>
                        <p>"En tant que RH, je gagne des heures chaque semaine. Les candidats Recrutia sont toujours
                            pertinents."</p>
                        <div class="at-author">
                            <div class="at-avatar" style="background:#E6F1FB;">SM</div>
                            <span>Soa M. · DRH, TechCorp Madagascar</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ===== DROITE — formulaire ===== -->
            <div class="auth-right">
                <div class="auth-form-container">

                    <h1>Se connecter</h1>
                    <p class="auth-subtitle">Accédez à votre espace personnel</p>

                    <!-- Alert -->
                    <div id="alertBox" class="alert"></div>

                    @if ($errors->any())
                        <div class="alert alert-error show">
                            <ul style="margin:0; padding-left:18px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="input-field">
                            <i class="fas fa-envelope prefix" style="font-size:16px; margin-top:14px;"></i>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required>
                            <label for="email">Adresse email</label>
                        </div>

                        <!-- Mot de passe -->
                        <div class="input-field password-field">
                            <i class="fas fa-lock prefix" style="font-size:16px; margin-top:14px;"></i>
                            <input id="password" name="password" type="password" autocomplete="current-password" required>
                            <label for="password">Mot de passe</label>
                            <button type="button" class="password-toggle" id="togglePassword"
                                aria-label="Voir le mot de passe">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>

                        <!-- Mot de passe oublié -->
                        <a href="#" class="forgot-link" onclick="return false;">Mot de passe oublié ?</a>

                        <!-- Se souvenir -->
                        <label style="margin-bottom: 24px; display: flex; align-items: center;">
                            <input type="checkbox" id="rememberMe" name="remember">
                            <span>Se souvenir de moi pendant 30 jours</span>
                        </label>

                        <!-- Submit -->
                        <button type="submit" class="btn-primary btn-submit" id="submitBtn">
                            <i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>
                            Se connecter
                        </button>

                    </form>

                    <div class="auth-divider">ou</div>

                    <a href="#" class="social-btn" id="demoBtn">
                        <span>🚀</span> Connexion démo (sans compte)
                    </a>

                    <p class="auth-switch">
                        Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte gratuit</a>
                    </p>

                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>

</body>

</html>