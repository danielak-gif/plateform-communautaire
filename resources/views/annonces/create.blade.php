<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle annonce</title>

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
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 18px;
            padding: 40px;
        }

        h1 {
            font-family: "DM Serif Display", serif;
            font-size: 30px;
            color: #1c1c1a;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #1c1c1a;
            opacity: 0.7;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid #e8e6e1;
            background: #ffffff;
            font-size: 14px;
            outline: none;
            color: #1c1c1a;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #1c1c1a;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        /* ERROR */
        .error {
            font-size: 12px;
            color: #b00020;
            margin-top: 5px;
        }

        /* BUTTON */
        .btn {
            width: 100%;
            padding: 13px;
            border-radius: 14px;
            border: none;
            background: #1c1c1a;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.85;
        }

        /* ICON STYLE (OPTION UX CLEAN) */
        .hint {
            font-size: 12px;
            color: #999;
            margin-top: 4px;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="{{ route('annonces.index') }}">← Retour aux annonces</a>
        <a href="{{ route('admin.index') }}">Admin</a>
    </div>

    <div class="container">

        <h1>Nouvelle annonce</h1>
        <p class="subtitle">
            Publiez une annonce visible par tous les utilisateurs de la communauté.
        </p>

        <form method="POST" action="{{ route('annonces.store') }}">
            @csrf

            <!-- TITRE -->
            <div class="form-group">
                <label>Titre *</label>
                <input type="text"
                       name="titre"
                       value="{{ old('titre') }}"
                       placeholder="Ex: Réunion communautaire du 15 juin">
                @error('titre')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- TYPE -->
            <div class="form-group">
                <label>Type</label>
                <select name="type">
                    <option value="info">Information</option>
                    <option value="alerte">Alerte</option>
                    <option value="evenement">Évènement</option>
                </select>
                <div class="hint">Choisissez le niveau d’importance de l’annonce</div>
            </div>

            <!-- CONTENU -->
            <div class="form-group">
                <label>Contenu *</label>
                <textarea name="contenu"
                          placeholder="Rédigez votre annonce ici...">{{ old('contenu') }}</textarea>
                @error('contenu')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Publier l’annonce
            </button>

        </form>

    </div>

</body>
</html>