<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Export Profils</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4f9ef8;
            padding-bottom: 15px;
        }

        .header h1 {
            color: #4f9ef8;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .header p {
            color: #888;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #4f9ef8;
            color: white;
        }

        th {
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }

        td {
            padding: 7px;
            border-bottom: 1px solid #eee;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .badge {
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
        }

        .en_attente { background: #fff3cd; color: #856404;}
        .approuve { background: #d4edda; color: #155724;}
        .rejete { background: #f8d7da; color: #721c24;}

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 10px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <h1>Plateforme Communautaire</h1>
        <p>Liste des profils - Exporté le {{ date('d/m/Y à H:i') }}</p>
        <p>Total : {{ count($profiles) }} profil(s)</p>
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
                    <td>{{ $profile->categorie ?? '-'}}</td>
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
        <p>Document généré automatiquement par la Plateforme Communautaire</p>
    </div>
</body>
</html>