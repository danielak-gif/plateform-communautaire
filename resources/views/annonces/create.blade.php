<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle  annonce</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color : #0f0f0f;
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .nav {
            text-align : center;
            margin-bottom: 30px;
        }

        .nav a {
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
        }
        
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 12px;
            padding: 40px;
            border: 1px solid #2a2a2a;
        }

        h1 {
            color: #4f9ef8;
            margin-bottom: 10px;
            font-size: 28px;
        }

        p.subtitle {
            color: #888;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group { margin-bottom:20px; }

        label {
            display: block;
            margin-bottom: 6px;
            color: #aaa;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            background: #252525;
            border: 1px solid #333;
            border-radius: 8px;
            color: #e0e0e0;
            font-size: 15px;
            outline: none;
            transition: border 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #4f9ef8;
        }

        textarea { height: 150px;resize: vertical; }

        .error {
            color: #ff6b6b;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: #4f9ef8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover { background: #2d7dd2;}
    </style>
</head>
<body>
    <div class="nav">
        <a href="{{ route('annonces.index') }}"><- Retour aux annonces</a>
        <a href="{{ route('admin.index') }}">Dashboard Admin</a>
    </div>

    <div class="container">
        <h1>Nouvelle annonce</h1>
        <p class="subtitle">Publiez une annonce visible par tous les utilisateurs.</p>

        <form method="POST" action="{{ route('annonces.store') }}">
            @csrf

            <div class="form-group">
                <label>Titre *</label>
                <input type="text" name="titre" value="{{ old('titre') }}" placeholder="Ex: Réunion communautaire du 15 juin">
                @error('titre') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label>Type</label>
                <select name="type">
                    <option value="info">ℹ️ Information</option>
                    <option value="alerte">⚠️ Alerte</option>
                    <option value="evenement">📅 Evènement</option>
                </select>
            </div>

            <div class="form-group">
                <label>Contenu *</label>
                <textarea name="contenu" placeholder="Rédigez votre annonce ici...">{{  old('contenu') }}</textarea>
                @error('contenu') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn">📢 Publier l'annonce</button>
        </form>
    </div>
</body>
</html>