<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nom_complet }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box;}

        body {
            background-color: #0f0f0f;
            color: #e0e0e0;
            font-family: 'Segeo UI', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
        }

        .container {
            max-width: 750px; 
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 12px;
            padding: 40px;
            border: 1px solid #2a2a2a;
        }

        .profil-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #4f9ef8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #4f9ef8;
        }

        .profil-header h1 {
            color: #ffffff;
            font-size: 26px;
            margin-bottom: 8px;
        }

        .categorie {
            display: inline-block;
            background: #1e3a5f;
            color: #4f9ef8;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .infos {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-item {
            background: #252525;
            padding: 15px;
            border-radius: 8px;
        }

        .info-item .label {
            color: #888;
            font-size: 12px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .info-item .value {
            color: #e0e0e0;
            font-size: 15px;
        }

        .bio {
            background: #252525;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .bio h3 {
            color: #4f9ef8;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .bio p {
            color: #aaa;
            line-height: 1.7;
        }

        .btn-retour {
            display: inline-block;
            background: #4f9ef8;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
        }

        .btn-retour:hover { background: #2d7dd2;}
    </style>
</head>
<body>
    <div class="nav">
        <a href="{{ route('communaute.index') }}"><- Retour à l'annuaire</a>
    </div>

    <div class="container">
        <div class="profil-header">
            @if($profile->photo_path)
                <div class="avatar">
                    <img src="{{ asset('storage/' . $profile->photo_path) }}" alt="Photo">
                </div>
            @else
                <div class="avatar">
                    {{ strtoupper(substr($profile->nom_complet, 0, 1)) }}
                </div>
            @endif

            <div>
                <h1>{{ $profile->nom_complet }}</h1>
                @if($profile->categorie)
                    <span class="categorie">{{ $profile->categorie }}</span>
                @endif
            </div>
        </div>

        <div class="infos">
            @if($profile->secteur)
                <div class="info-item">
                    <div class="label">Secteur</div>
                    <div class="value">🏢 {{ $profile->secteur }}</div>
                </div>
            @endif

            @if($profile->niveau_etude)
                <div class="info-item">
                    <div class="label">Niveau d'étude</div>
                    <div class="value">🎓 {{ $profile->niveau_etude }}</div>
                </div>
            @endif

            @if($profile->localisation)
                <div class="info-item">
                    <div class="label">Localisation</div>
                    <div class="value">📍 {{ $profile->localisation }}</div>
                </div>
            @endif

            @if($profile->telephone)
                <div class="info-item">
                    <div class="label">Téléphone</div>
                    <div class="value">📞 {{ $profile->telephone }}</div>
                </div>
            @endif
        </div>

        @if($profile->bio)
            <div class="bio">
                <h3>Biographie</h3>
                <p>{{ $profile->bio }}</p>
            </div>
        @endif

        <a href="{{ route('communaute.index')  }}" class="btn-retour"><- Retour à l'annuaire</a>
    </div>
</body>
</html>