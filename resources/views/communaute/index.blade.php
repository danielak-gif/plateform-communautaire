<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire Communautaire</title>

    <!-- Fonts (important pour le style warm minimal) -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f3ef;
            color: #1c1c1a;
            font-family: "DM Sans", system-ui, -apple-system, Segoe UI, sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 38px;
            font-family: "DM Serif Display", serif;
            color: #1c1c1a;
            letter-spacing: -0.5px;
        }

        .header p {
            color: #888;
            font-size: 15px;
            margin-top: 8px;
        }

        /* NAV */
        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            color: #1c1c1a;
            text-decoration: none;
            margin: 0 12px;
            font-size: 14px;
            opacity: 0.7;
            transition: 0.2s;
        }

        .nav a:hover {
            opacity: 1;
        }

        /* SEARCH BAR */
        .search-bar {
            max-width: 900px;
            margin: 0 auto 30px auto;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-bar input,
        .search-bar select {
            flex: 1;
            padding: 12px 14px;
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 14px;
            font-size: 14px;
            color: #1c1c1a;
            outline: none;
            transition: 0.2s;
        }

        .search-bar input:focus,
        .search-bar select:focus {
            border-color: #1c1c1a;
        }

        .search-bar button {
            padding: 12px 22px;
            background: #1c1c1a;
            color: white;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .search-bar button:hover {
            opacity: 0.85;
        }

        /* GRID */
        .grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 18px;
        }

        /* CARD */
        .card {
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 18px;
            padding: 22px;
            transition: 0.2s ease;
        }

        .card:hover {
            border-color: #d6d2cb;
            transform: translateY(-2px);
        }

        .card img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 12px;
            border: 1px solid #e8e6e1;
        }

        .card .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #1c1c1a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            color: white;
            margin-bottom: 12px;
        }

        .card h3 {
            font-size: 16px;
            margin-bottom: 6px;
            color: #1c1c1a;
        }

        .card p {
            color: #888;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .categorie {
            display: inline-block;
            background: #f0eee9;
            color: #1c1c1a;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            margin-top: 8px;
            font-size: 13px;
            color: #1c1c1a;
            text-decoration: none;
            opacity: 0.7;
        }

        .card a:hover {
            opacity: 1;
            text-decoration: underline;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            color: #888;
            font-size: 16px;
            margin-top: 60px;
            grid-column: 1 / -1;
        }

        .btn-soumettre {
            display: inline-block;
            background: #1c1c1a;
            color: white;
            padding: 10px 20px;
            border-radius: 14px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 15px;
        }

        /* SUCCESS */
        .success {
            max-width: 900px;
            margin: 0 auto 20px auto;
            background: #f0eee9;
            border: 1px solid #e8e6e1;
            color: #1c1c1a;
            padding: 12px 18px;
            border-radius: 14px;
        }

        /* PAGINATION */
        .pagination {
            max-width: 900px;
            margin: 40px auto 0 auto;
            text-align: center;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 3px;
            border-radius: 10px;
            background: #ffffff;
            color: #1c1c1a;
            text-decoration: none;
            border: 1px solid #e8e6e1;
            font-size: 13px;
        }

        .pagination span.current {
            background: #1c1c1a;
            color: white;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Annuaire Communautaire</h1>
        <p>Découvrez les cadres et opérateurs économiques de la commune</p>
    </div>

    <div class="nav">
        <a href="{{ route('communaute.create') }}">+ Soumettre mon profil</a>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @endauth
    </div>

    @if(session('success')) 
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('communaute.index') }}" class="search-bar">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un nom...">

        <select name="categorie">
            <option value="">Toutes catégories</option>
            <option value="Cadre administratif">Cadre administratif</option>
            <option value="Cadre technique">Cadre technique</option>
            <option value="Chef d'entreprise">Chef d'entreprise</option>
            <option value="Artisan">Artisan</option>
            <option value="Commerçant">Commerçant</option>
            <option value="Jeune entrepreneur">Jeune entrepreneur</option>
            <option value="Investisseur">Investisseur</option>
        </select>

        <input type="text" name="secteur" value="{{ request('secteur') }}" placeholder="Secteur d'activité..."/>

        <button type="submit">Rechercher</button>
    </form>

    <div class="grid">
        @forelse($profiles as $profile)
            <div class="card">

                @if($profile->photo_path)
                    <img src="{{ asset('storage/' . $profile->photo_path) }}" alt="Photo">
                @else
                    <div class="avatar">
                        {{ strtoupper(substr($profile->nom_complet, 0, 1)) }}
                    </div>
                @endif

                <h3>{{ $profile->nom_complet }}</h3>

                @if($profile->categorie)
                    <span class="categorie">{{ $profile->categorie }}</span>
                @endif

                @if($profile->secteur)
                    <p>🏢 {{ $profile->secteur }}</p>
                @endif

                @if($profile->localisation)
                    <p>📍 {{ $profile->localisation }}</p>
                @endif

                <a href="{{ route('communaute.show', $profile) }}">
                    Voir le profil →
                </a>

            </div>
        @empty
            <div class="empty">
                <p>Aucun profil approuvé pour le moment.</p>
                <a href="{{ route('communaute.create') }}" class="btn-soumettre">
                    Soyez le premier à soumettre votre profil
                </a>
            </div>
        @endforelse 
    </div>

    <div class="pagination">
        {{ $profiles->links() }}
    </div>

</body>
</html>