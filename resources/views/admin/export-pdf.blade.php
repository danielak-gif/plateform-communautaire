<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Export Profils</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DM Sans", system-ui, -apple-system, Segoe UI, sans-serif;
            font-size: 12px;
            color: #1c1c1a;
            background: #ffffff;
            padding: 30px;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 1px solid #e8e6e1;
            padding-bottom: 15px;
        }

        .header h1 {
            font-family: "DM Serif Display", serif;
            font-size: 22px;
            color: #1c1c1a;
            margin-bottom: 4px;
        }

        .header p {
            color: #888;
            font-size: 11px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        thead {
            background: #f5f3ef;
        }

        th {
            text-align: left;
            padding: 10px;
            font-size: 11px;
            text-transform: uppercase;
            color: #888;
            border-bottom: 1px solid #e8e6e1;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #f0eee9;
            font-size: 11px;
            color: #1c1c1a;
        }

        tr:nth-child(even) {
            background: #faf9f7;
        }

        /* BADGES */
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 10px;
        }

        .en_attente {
            background: #f5f3ef;
            color: #8a6d00;
        }

        .approuve {
            background: #e9f5ee;
            color: #1f6b3a;
        }

        .rejete {
            background: #fdeaea;
            color: #b00020;
        }

        /* FOOTER */
        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #e8e6e1;
            padding-top: 10px;
        }

        .meta {
            text-align: center;
            font-size: 11px;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Plateforme Communautaire</h1>
        <p>Export des profils utilisateurs</p>
        <div class="meta">
            Généré le {{ date('d/m/Y à H:i') }} — Total : {{ count($profiles) }} profils
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom complet</th>
                <th>Catégorie</th>
                <th>Secteur</th>
                <th>Localisation</th>
                <th>Téléphone</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @forelse($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->nom_complet }}</td>
                    <td>{{ $profile->categorie ?? '-' }}</td>
                    <td>{{ $profile->secteur ?? '-' }}</td>
                    <td>{{ $profile->localisation ?? '-' }}</td>
                    <td>{{ $profile->telephone ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $profile->statut }}">
                            {{ ucfirst(str_replace('_', ' ', $profile->statut)) }}
                        </span>
                    </td>
                    <td>{{ $profile->created_at->format('d/m/Y') }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="8" style="text-align:center; color:#888;">
                        Aucun profil trouvé
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Document généré automatiquement par la Plateforme Communautaire
    </div>

</body>
</html>