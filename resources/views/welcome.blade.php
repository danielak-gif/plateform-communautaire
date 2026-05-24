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
            <div class="icon">👥</div>
            <h3>Annuaire</h3>
            <p>Consultez les profils des cadres et entrepreneurs</p>
        </div>

        <div class="feature-card">
            <div class="icon">🔍</div>
            <h3>Recherche</h3>
            <p>Filtrer par secteur, catégorie ou localisation</p>
        </div>

        <div class="feature-card">
            <div class="icon">📢</div>
            <h3>Annonces</h3>
            <p>Restez informé des actualités de la commune</p>
        </div>

        <div class="feature-card">
            <div class="icon">📊</div>
            <h3>Statistiques</h3>
            <p>Tableau de bord pour la municipalité</p>
        </div>
    </div>
</body>
</html>