<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire Communautaire</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box;}

        body {
            background-color: #0f0f0f;
            color: #e9e0e0;
            font-family: 'Segeo UI', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }        

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1{
            color: #4f9ef8;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header p {
            color: #888;
            font-size: 16px;
        }

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a{
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
            font-size: 15px;
        }

        .nav a:hover { text-decoration: underline;}

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
            padding: 12px 15px;
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            color: #e0e0e0;
            font-size: 14px;
            outline: none;
        }

        .search-bar button {
            padding: 12px 25px;
            background: #4f9ef8;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .search-bar button:hover { background: #2d7dd2; }

        .grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 25px;
            transition: border-color 0.3s;
        }

        .card:hover { border-color: #4f9ef8;}

        .card img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 2px solid #4f9ef8;
        }

        .card .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #4f9ef8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            color: white;
            margin-bottom: 5px;
        }

        .card h3 {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .card .categorie {
            display: inline-block;
            background: #1e3a5f;
            color: #4f9ef8;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .card p {
            color: #888;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .card a:hover { text-decoration: underline; }

        .empty {
            text-align: center;
            color: #888;
            font-size: 18px;
            margin-top: 60px;
            grid-column: 1/ -1;
        }

        .success {
            max-width : 900px;
            margin: 0 auto 20px auto; 
            background: #1a3a1a;
            border: 1px solid #2d7d2d;
            color: #4caf50;
            padding: 12px 20px;
            border-radius: 8px; 
        }

        .btn-soumettre {
            display: inline-block;
            background: #4f9ef8;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .pagination {
            max-width: 900px;
            margin:40px auto 0 auto;
            text-align: center;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 3px;
            border-radius: 6px;
            background: #1a1a1a;
            color: #4f9ef8;
            text-decoration: none;
            border: 1px solid #333;
        }

        .pagination span.current {
            background: #4f9ef8;
            color: white;
            border-color: #4f9ef8;
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
                    <div class="avatar">{{ strtoupper(substr($profile->nom_complet, 0, 1)) }}</div>
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

                <a href="{{ route('communaute.show', $profile) }}">Voir le profil -></a>
            </div>
        @empty
            <div class="empty">
                <p>Aucun profil approuvé pour le moment.</p>
                <br>
                <a href="{{ route('communaute.create') }}" class="btn-soumettre">Soyez le premier à soumettre votre profil</a>
            </div>
        @endforelse 
    </div>

    <div class="pagination">
        {{ $profiles->links() }}
    </div>
</body>
</html>