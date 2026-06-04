<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nom_complet }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #f5f3ef;
            color: #1c1c1a;
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .nav {
            max-width: 700px;
            margin: 0 auto 24px;
        }

        .nav a {
            font-size: 13px;
            color: #888;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color .15s;
        }

        .nav a:hover { color: #1c1c1a; }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            border: 1px solid #e8e6e1;
        }

        .profil-header {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 32px;
            padding-bottom: 32px;
            border-bottom: 1px solid #f0ede8;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #1c1c1a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 500;
            color: #f5f3ef;
            flex-shrink: 0;
        }

        .avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profil-header h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 24px;
            font-weight: 400;
            color: #1c1c1a;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .categorie {
            display: inline-block;
            background: #f0ede8;
            color: #5f5e5a;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .infos {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 24px;
        }

        .info-item {
            background: #f8f6f2;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #f0ede8;
        }

        .info-item .label {
            color: #aaa;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .status {
            display: inline-flex;
            margin-top: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff4e5;
            color: #c56b00;
            border: 1px solid #f5d2a2;
        }

        .status-approved {
            background: #e8f7ed;
            color: #166534;
            border: 1px solid #a7f3d0;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .info-item .value {
            color: #1c1c1a;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .info-item .value svg {
            color: #aaa;
            flex-shrink: 0;
        }

        .bio {
            background: #f8f6f2;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #f0ede8;
            margin-bottom: 28px;
        }

        .bio h3 {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: #aaa;
            margin-bottom: 10px;
        }

        .bio p {
            color: #555;
            line-height: 1.7;
            font-size: 14px;
        }

        .btn-retour {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #666;
            background: #f0ede8;
            border: 1px solid #e8e6e1;
            padding: 9px 18px;
            border-radius: 10px;
            text-decoration: none;
            transition: background .15s, color .15s;
        }

        .btn-retour:hover { background: #e8e6e1; color: #1c1c1a; }
    </style>
</head>
<body>

    <div class="nav">
        <a href="{{ route('communaute.index') }}">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Retour à l'annuaire
        </a>
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

                @if($profile->statut === 'en_attente')
                    <p class="status status-pending">Profil en attente de validation</p>
                @elseif($profile->statut === 'approuve')
                    <p class="status status-approved">Profil validé</p>
                @elseif($profile->statut === 'rejete')
                    <p class="status status-rejected">Profil rejeté</p>
                @endif
            @if($profile->niveau_etude)
                <div class="info-item">
                    <div class="label">Niveau d'étude</div>
                    <div class="value">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                        </svg>
                        {{ $profile->niveau_etude }}
                    </div>
                </div>
            @endif

            @if($profile->localisation)
                <div class="info-item">
                    <div class="label">Localisation</div>
                    <div class="value">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                        {{ $profile->localisation }}
                    </div>
                </div>
            @endif

            @if($profile->telephone)
                <div class="info-item">
                    <div class="label">Téléphone</div>
                    <div class="value">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        {{ $profile->telephone }}
                    </div>
                </div>
            @endif
        </div>

        @if($profile->bio)
            <div class="bio">
                <h3>Biographie</h3>
                <p>{{ $profile->bio }}</p>
            </div>
        @endif

        <a href="{{ route('communaute.index') }}" class="btn-retour">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Retour à l'annuaire
        </a>
    </div>

</body>
</html>