<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme Communautaire</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .hero {
            text-align:center;
            max-width: 700px;
        }

        .hero h1 {
            color: #4f9ef8;
            font-size: 42px;
            margin-bottom: 15px;
        }

        .hero p {
            color: #888;
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }
        .btn {
            display: inline-block; 
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: opacity 0.3s;
        }

        .btn:hover { opacity: 0.85;}

        .btn-primary { background: #4f9ef8; color: white;}
        .btn-secondary { background:#1a1a1a; color: #4f9ef8; border: 1px solid #4f9ef8;}

        .features {
            display:  grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            max-width: 900px;
            width: 100%;
            margin-bottom: 40px;
        }

        .feature-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }

        .feature-card .icon { font-size: 32px; margin-bottom: 10px; }
        .feature-card h3 { color:#ffffff; font-size: 16px; }
        .feature-card p { color: #888; font-size: 13px;}

        .nav-top {
            position: absolute;
            top: 20px;
            right: 30px;
            display: flex;
            gap: 15px;
        }

        .nav-top a {
            color: #4f9ef8;
            text-decoration: none; 
            font-size: 14px;
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
        <h1>🏘️ Plateforme Communautaire </h1>
        <p>Découvrez et connectez-vous avec les cadres et opérateur économiques de votre commune.</p>

        <div class="buttons">
            <a href="{{ route('communaute.index') }}" class="btn btn-primary">
               📋 Voir l'annuaire 
            </a>
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
               📢 Voir les annonces 
            </a>
            @guest
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    ✍️ Soumettre mon profil
                </a>
            @endguest
            @auth
                <a href="{{ route('communaute.create') }}" class="btn btn-secondary">
                    ✍️ Soumettre mon profil
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