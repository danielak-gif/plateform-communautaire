<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces</title>

    <!-- Fonts -->
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
            font-family: "DM Serif Display", serif;
            font-size: 34px;
            color: #1c1c1a;
            margin-bottom: 6px;
        }

        .header p {
            color: #888;
            font-size: 14px;
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

        /* CONTAINER */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* SUCCESS */
        .success {
            background: #f0eee9;
            border: 1px solid #e8e6e1;
            color: #1c1c1a;
            padding: 12px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* BUTTON CREATE */
        .btn-creer {
            display: inline-block;
            background: #1c1c1a;
            color: white;
            padding: 10px 18px;
            border-radius: 14px;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 25px;
            transition: 0.2s;
        }

        .btn-creer:hover {
            opacity: 0.85;
        }

        /* CARD */
        .annonce-card {
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 16px;
            transition: 0.2s ease;
        }

        .annonce-card:hover {
            border-color: #d6d2cb;
            transform: translateY(-2px);
        }

        .annonce-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            gap: 10px;
        }

        .annonce-card h3 {
            font-size: 16px;
            color: #1c1c1a;
        }

        /* BADGES */
        .badge-type {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            white-space: nowrap;
        }

        .badge-type.info {
            background: #f0eee9;
            color: #1c1c1a;
        }

        .badge-type.alerte {
            background: #fff3e6;
            color: #8a4b00;
        }

        .badge-type.evenement {
            background: #e9f5ee;
            color: #1f6b3a;
        }

        /* TEXT */
        .annonce-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .annonce-meta {
            font-size: 12px;
            color: #999;
        }

        /* ACTIONS */
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .btn-supprimer {
            background: transparent;
            border: 1px solid #e8e6e1;
            color: #1c1c1a;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-supprimer:hover {
            border-color: #b00020;
            color: #b00020;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            color: #888;
            padding: 60px 20px;
            font-size: 15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>📢 Annonces</h1>
        <p>Actualités et informations de la commune</p>
    </div>

    <div class="nav">
        <a href="{{ route('communaute.index') }}">← Annuaire</a>

        @auth
            <a href="{{ route('dashboard') }}">Mon compte</a>

            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.index') }}">Admin</a>
            @endif
        @endauth
    </div>

    <div class="container">

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('annonces.create') }}" class="btn-creer">
                    + Nouvelle annonce
                </a>
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

                <div class="actions">
                    <span class="annonce-meta">
                        {{ $annonce->created_at->format('d/m/Y à H:i') }}
                    </span>

                    @auth
                        @if(auth()->user()->is_admin)
                            <form method="POST" action="{{ route('annonces.destroy', $annonce) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-supprimer"
                                        onclick="return confirm('Supprimer cette annonce ?')">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>

            </div>

        @empty
            <div class="empty">
                Aucune annonce pour le moment.
            </div>
        @endforelse

        <div style="text-align:center; margin-top:20px;">
            {{ $annonces->links() }}
        </div>

    </div>

</body>
</html>