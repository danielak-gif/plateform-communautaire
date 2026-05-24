<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta 
        name="viewport" content="width=device-width, initial-scale=1.0"
    >
    <title>Soumettre mon profil</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box;}

        body {
            background-color : #0f0f0f;
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 12px;
            padding: 40px;
            border:1px solid #2a2a2a;
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #aaa;
            font-size: 14px;
        }

        input, select, textarea {
            width : 100%;
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

        textarea { height: 120px; resize: vertical;}

        .error {
            color: #ff6b6d;
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
            margin-top: 10px;
        }

        .btn:hover { background: #2d7dd2;}

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="{{ route('communaute.index') }}"><- Retour à l'annuaire</a>
    </div>
    
    <div class="container">
        <h1>Soumettre mon profil</h1>
        <p class="subtitle">Remplissez ce formulaire pour rejoindre l'annuaire communautaire.</p>

        <form action="{{ route('communaute.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nom_complet *</label>
                <input type="text" name="nom_complet" value="{{ old('nom_complet') }}" placeholder="Ex: Jean Dupont"/>
                @error('nom_complet') <p class="error">{{  $message }}</p> @enderror
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
                <input type="text" name="secteur" value="{{ old('secteur') }}" placeholder="Ex: Agriculture, Informatique..." />
            </div>

            <div class="form-group">
                <label>Niveau d'étude</label>
                <select name="niveau_etude" >
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
                <input type="text" name="localisation" value="{{ old('localisation') }}" placeholder="Ex: Cotonou, Abomey-Calavi...">
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Ex: +229 01 23 45 67">
            </div>

            <div class="form-group">
                <label>Biographie</label>
                <textarea name="bio" placeholder="Parlez de vous, vos expériences, vos compétences...">{{ old('bio') }}</textarea>
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