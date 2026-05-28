<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme Communautaire</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

body {
    font-family: 'Segoe UI', sans-serif;
    color: #1a1a1a;
    background: #ffffff;
}

.nav-top {
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    padding: 16px 32px;
    border-bottom: 1px solid #e5e5e5;
}

.nav-top a {
    font-size: 14px;
    color: #666;
    text-decoration: none;
}

.nav-top a:hover { color: #1a1a1a; }

.hero {
    width: min(100%, 640px);
    margin: 80px auto;
    padding: 0 24px;
    text-align: center;
}

.hero h1 {
    font-size: 28px;
    font-weight: 500;
    margin-bottom: 12px;
}

.hero p {
    font-size: 15px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 36px;
}

.logo {
            width: auto;
            max-width: 140px;
            max-height: 56px;
            height: auto;
            margin-bottom: 20px;
            display: block;
}

.buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 64px;
}

.btn {
    padding: 10px 22px;
    border-radius: 8px;
    font-size: 14px;
    text-decoration: none;
    border: 1px solid #d0d0d0;
    color: #1a1a1a;
    background: #fff;
    transition: background 0.15s;
}

.btn:hover { background: #f5f5f5; }

.btn-primary {
    background: #1a1a1a;
    color: #fff;
    border-color: transparent;
}

.btn-primary:hover { opacity: 0.85; }

.features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
    max-width: 640px;
    margin: 0 auto;
    text-align: left;
    padding: 0 24px;
}

.feature-card {
    background: #f7f7f7;
    border-radius: 12px;
    padding: 20px;
}

.feature-card .icon { font-size: 20px; margin-bottom: 12px; }
.feature-card h3 { font-size: 14px; font-weight: 500; margin-bottom: 4px; color: #1a1a1a; }
.feature-card p { font-size: 13px; color: #666; line-height: 1.5; }

@media (max-width: 768px) {
    .nav-top {
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        padding: 16px 12px;
    }

    .hero {
        margin: 40px auto;
        padding: 0 16px;
    }

    .buttons {
        gap: 8px;
    }
}

    </style>
</head>
<body>
    
    <div class="nav-top">
        @auth
            <a href="{{ route('dashboard') }}">Mon compte</a>
            <a href="{{ route('communaute.index') }}">Annuaire</a>
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.index') }}">Admin</a>
            @endif
        @else 
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">S'inscrire</a>
        @endauth
    </div>

    <div class="hero">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="logo"> 
        <h1>
            Plateforme Communautaire 
        </h1>
        <p>Découvrez et connectez-vous avec les cadres et opérateur économiques de votre commune.</p>

        <div class="buttons">
            <a href="{{ route('communaute.index') }}" class="btn btn-primary">
               Voir l'annuaire 
            </a>
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
                Voir les annonces 
            </a>
            @guest
                <a href="{{ route('communaute.create') }}" class="btn btn-secondary">
                    Soumettre mon profil
                </a>
            @endguest
            @auth
                <a href="{{ route('communaute.create') }}" class="btn btn-secondary">
                    Soumettre mon profil
                </a>
            @endauth
        </div>
    </div>

    <div class="features">
        <div class="feature-card">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </div>
            <h3>Annuaire</h3>
            <p>Consultez les profils des cadres et entrepreneurs</p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </div>
            <h3>Recherche</h3>
            <p>Filtrer par secteur, catégorie ou localisation</p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                    <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06"/>
                </svg>
            </div>
            <h3>Annonces</h3>
            <p>Restez informé des actualités de la commune</p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                    <path d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z"/>
                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                </svg>
            </div>
            <h3>Statistiques</h3>
            <p>Tableau de bord pour la municipalité</p>
        </div>
    </div>
</body>
</html>