<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box;}

        body {
            background-color: #0f0f0f;
            color: #e0e0e0;
            font-family: 'Segeo UI', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1  { color: #4f9ef8; font-size: 32px; margin-bottom: 8px; }
        .header p  {color: #888;}

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a{
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .success {
            background: #1a3a1a;
            border: 1px solid #2d7d2d;
            color: #4caf50;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }

        .annonce-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }

        .annonce-card:hover { border-color: #4f9ef8; }

        .annonce-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .annonce-card h3 {
            color: #ffffff;
            font-size: 18px;
        }

        .badge-type {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            flex-shrink: 0;
        }

        .badge-type.info  {background: #1e3a5f; color: #4f9ef8;}
        .badge-type.alerte  {background: #3a2a1a; color: #f0a040;}
        .badge-type.evenement  {background: #1a3a1a; color: #4caf50;}

        .annonce-card p {
            color: #aaa;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .annonce-meta {
            color: #555;
            font-size: 12px;
        }

        .btn-supprimer {
            background: #7d2d2d;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-supprimer:hover {opacity: 0.85;}

        .empty {
            text-align: center;
            color: #888;
            padding: 60px;
        }

        .btn-creer {
            display: inline-block;
            background: #4f9ef8 ;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            margin-bottom: 25px;
        }
    </style>
</head> 
<body>    
    <div class="header">
        <h1>📢 Annonces</h1>
        <p>Actualité et informations de la commune</p>
    </div>

    <div class="nav">
        <a href="{{ route('communaute.index') }}"><-Annuaire</a>
        @auth
            <a href="{{ route('dashboard') }}">Mon compte</a>
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.index') }}">Dashboard Admin</a>
            @endif
        @endauth
    </div>

    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('annonces.create') }}" class="btn-creer">+ Nouvelle annonce</a>
            @endif
        @endauth
    
        @forelse($annonces as $annonce)
            <div class="annonce-card">
                <div class="annonce-header">
                    <h3>{{ $annonce->titre }}</h3>
                    <span class="badge-type {{ $annonce->type }}">
                        {{ ucfirst($annonce->type) }}
                    </span>
                </div>

                <p>{{ $annonce->contenu }}</p>

                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span class="annonce-meta">
                        Publié le {{ $annonce->created_at->format('d/m/Y à H:i') }}
                    </span>

                    @auth
                        @if(auth()->user()->is_admin)
                            <form method="POST" action="{{ route('annonces.destroy', $annonce) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-supprimer" onclick="return confirm('Supprimer cette annonce ?')">
                                    🗑 Supprimer
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>

            
        @empty
            <div class="empty">
                <p>Aucune annonce pour le moment.</p>
            </div>
        @endforelse

        <div style="text-align:center; margin-top:20px;">
            {{ $annonces->links() }}
        </div>
    </div>
    
</body>
</html>