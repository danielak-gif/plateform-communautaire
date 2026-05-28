<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre mon profil</title>

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
            margin-bottom: 6px;
            font-size: 13px;
            color: #1c1c1a;
            opacity: 0.75;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 14px;
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
            min-height: 120px;
            resize: vertical;
        }

        /* ERROR */
        .error {
            color: #b00020;
            font-size: 12px;
            margin-top: 5px;
        }

        /* BUTTON */
        .btn {
            width: 100%;
            padding: 13px;
            background: #1c1c1a;
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="{{ route('communaute.index') }}">← Retour à l'annuaire</a>
    </div>

    <div class="container">

        <h1>Soumettre mon profil</h1>
        <p class="subtitle">
            Rejoignez l'annuaire communautaire et présentez votre activité.
        </p>

        <form action="{{ route('communaute.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nom complet *</label>
                <input type="text" name="nom_complet" value="{{ old('nom_complet') }}" placeholder="Ex: Jean Dupont">
                @error('nom_complet')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="categorie">
                    <option value="">-- Choisir --</option>
                    <option value="Cadre administratif">Cadre administratif</option>
                    <option value="Cadre technique">Cadre technique</option>
                    <option value="Chef d'entreprise">Chef d'entreprise</option>
                    <option value="Artisan">Artisan</option>
                    <option value="Commerçant">Commerçant</option>
                    <option value="Jeune entrepreneur">Jeune entrepreneur</option>
                    <option value="Investisseur">Investisseur</option>
                </select>
            </div>

            <div class="form-group">
                <label>Secteur d'activité</label>
                <input type="text" name="secteur" value="{{ old('secteur') }}" placeholder="Ex: Informatique, Agriculture...">
            </div>

            <div class="form-group">
                <label>Niveau d'étude</label>
                <select name="niveau_etude">
                    <option value="">-- Choisir --</option>
                    <option value="Bac">Bac</option>
                    <option value="Bac+2">Bac+2</option>
                    <option value="Bac+3">Bac+3</option>
                    <option value="Bac+5">Bac+5</option>
                    <option value="Doctorat">Doctorat</option>
                </select>
            </div>

            <div class="form-group">
                <label>Localisation</label>
                <input type="text" name="localisation" value="{{ old('localisation') }}" placeholder="Ex: Cotonou, Abomey-Calavi">
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Ex: +229 01 23 45 67">
            </div>

            <div class="form-group">
                <label>Biographie</label>
                <textarea name="bio" placeholder="Parlez de vous, vos compétences, expériences...">{{ old('bio') }}</textarea>
            </div>

            <div class="form-group">
                <label>Photo de profil</label>
                <input type="file" name="photo" accept="image/*">
            </div>

            <button type="submit" class="btn">Soumettre mon profil</button>

        </form>
    </div>

</body>
</html>