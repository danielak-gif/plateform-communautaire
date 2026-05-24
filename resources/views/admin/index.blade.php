<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            margin-bottom: 30px;
        }

        .nav a {
            color: #4f9ef8;
            text-decoration: none;
            margin: 0 15px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
            max-width: 900px;
            margin: 0 auto 40px auto;
        }

        .stat-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-card .nombre {
            font-size: 36px;
            font-weight: bold;
            color: #4f9ef8;
        }

        .stat-card .label {
            color: #888;
            font-size: 13px;
            margin-top: 5px;
        }

        .success {
            max-width: 900px;
            margin: 0 auto 20px auto;
            background: #1a3a1a;
            border: 1px solid #2d7d2d; 
            color: #4caf50;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .table-container {
            max-width: 1100px;
            margin: 0 auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse; 
            background: #1a1a1a;
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background: #252525;
        }

        th {
            padding: 15px;
            text-align: left;
            color: #aaa;
            font-size: 13px;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            border-top: 1px solid #2a2a2a;
            font-size: 14px;
        }

        tr:hover { background: #1f1f1f;}

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .badge.en_attente { background: #3a3a3a; color: #f0c040;}
        .badge.approuve { background: #1a3a1a; color: #4caf50; }
        .badge.rejete { background: #3a1a1a; color: #f44336;}

        .actions { display: flex; gap: 8px; flex-wrap: wrap; }

        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-approuver { background: #2d7d2d; color: white;}
        .btn-rejeter { background: #7d2d2d; color: white;}
        .btn-supprimer { background: #555; color: white; }

        .btn:hover { opacity: 0.85;}

        .empty {
            text-align: center;
            color: #888;
            padding: 40px;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <h1>Dashboard Administrateur</h1>
        <p>Gestion des profils de la plateforme communautaire</p>
    </div>

    <div class="nav">
        <a href="{{ route('communaute.index') }}"><- Voir l'annuaire</a>
        <a href="{{ route('dashboard') }}">Mon compte</a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    {{--Boutons export --}}
    <div style="max-width:900px; margin: 0 auto 20px; display:flex; gap:10px;">
        <a href="{{ route('admin.export.excel') }}"
            style="padding:10px 20px; background:#2d7d2d; color:white; border-radius:8px; text-decoration:none;
            font-size:14px;"
        >
            📊 Exporter Excel
        </a>
        <a href="{{ route('admin.export.pdf') }}"
            style="padding:10px 20px; background:#7d2d2d; color:white; border-radius:8px; text-decoration:none;
            font-size:14px;"
        >
            📄 Exporter PDF
        </a>

    </div>

    {{-- Statistiques --}}
    <div class="stats">
        <div class="stat-card">
            <div class="nombre">{{ $total }}</div>
            <div class="label">Total profils</div>
        </div>
        <div class="stat-card">
            <div class="nombre" style="color:#f0c040">{{ $en_attente }}</div>
            <div class="label">En attente</div>
        </div>
        <div class="stat-card">
            <div class="nombre" style="color:#4caf50">{{ $approuves }}</div>
            <div class="label">Approuvés</div>
        </div>
        <div class="stat-card">
            <div class="nombre" style="color:#f44336">{{ $rejetes }}</div>
            <div class="label">Rejetés</div>
        </div>
    </div>

    {{-- Graphiques --}}
    <div style="max-width:1100px; margin: 0 auto; display:grid; grid-template-columns: 1fr 1fr 1fr; gap:20px;">

        {{-- Graphique 1: Statuts --}}
        <div style="background:#1a1a1a; border:1px solid #2a2a2a; border-radius:12px; padding:20px;">
            <h3 style="color:#4f9ef8; margin-bottom:15px; font-size:15px;">Répartition par statut</h3>
            <canvas id="chartStatut"></canvas>
        </div>

        {{-- Graphique 2: Catégories --}}
        <div style="background:#1a1a1a; border:1px solid #2a2a2a; border-radius:12px; padding:20px;">
            <h3 style="color:#4f9ef8; margin-bottom:15px; font-size:15px;">Répartition par catégorie</h3>
            <canvas id="chartCategorie"></canvas>
        </div>

        {{-- Graphique 1: Niveau d'étude --}}
        <div style="background:#1a1a1a; border:1px solid #2a2a2a; border-radius:12px; padding:20px;">
            <h3 style="color:#4f9ef8; margin-bottom:15px; font-size:15px;">Répartition par niveau d'étude</h3>
            <canvas id="chartNiveau"></canvas>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <script>
        // Graphique 1: Statuts
        new Chart(document.getElementById('chartStatut'), {
            type: 'doughnut',
            data: {
                labels: ['En attente', 'Approuvés', 'Rejetés'],
                datasets: [{
                    data: [{{ $en_attente }}, {{ $approuves }}, {{ $rejetes }}],
                    backgroundColor: ['#f0c040', '#4caf50','#f44336'],
                }]
            },
            options : {
                plugins : { legend: {labels: {color: '#e0e0e0'}}}
            }
        });

        // Graphique 2: Catégories
        new Chart(document.getElementById('chartCategorie'), {
            type: 'bar',
            data: {
                label: {!! json_encode($par_categorie->keys()) !!},
                datasets: [{
                    labels: 'Profils',
                    data: {!! json_encode($par_categorie->values()) !!},
                    backgroundColor: '#4f9ef8',
                }]
            },
            options : {
                plugins : { legend: {labels: {color: '#e0e0e0'}}},
                scales: {
                    x: { ticks: {color: '#aaa'}, grid: {color: '#2a2a2a'}},
                    y: { ticks: {color: '#aaa'}, grid: {color: '#2a2a2a'}}
                }
            }
        });

        // Graphique 3: Niveau d'étude
        new Chart(document.getElementById('chartNiveau'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($par_niveau->keys()) !!},
                datasets: [{
                    label: 'Profils',
                    data: {!! json_encode($par_niveau->values()) !!},
                    backgroundColor: '#a78bfa',
                }]
            },
            options : {
                plugins : { legend: {labels: {color: '#e0e0e0'}}},
                scales: {
                    x: { ticks: {color: '#aaa'}, grid: {color: '#2a2a2a'}},
                    y: { ticks: {color: '#aaa'}, grid: {color: '#2a2a2a'}}
                }
            }
        });
    </script>

    {{-- Tableau des profils --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom complet</th>
                    <th>Catégorie</th>
                    <th>Secteur</th>
                    <th>Localisation</th>
                    <th>Statut</th>
                    <th>Actions</th>
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
                        <td>
                            <span class="badge {{ $profile->statut }}">
                                {{  ucfirst(str_replace('_', ' ', $profile->statut)) }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                @if($profile->statut !== 'approuve')
                                    <form method="POST" action="{{ route('admin.approuver', $profile) }}">
                                        @csrf
                                        <button class="btn btn-approuver">✓ Approuver</button>
                                    </form>
                                @endif

                                @if($profile->statut !== 'rejete')
                                    <form method="POST" action="{{ route('admin.rejeter', $profile) }}">
                                        @csrf
                                        <button class="btn btn-rejeter">✗ Rejeter</button>
                                    </form>
                                @endif

                                <form method="POST" action="{{ route('admin.supprimer', $profile) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-supprimer" onclick="return confirm('Supprimer ce profil ?')">🗑 Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">Aucun profil pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="text-align:center; margin-top: 20px;">
            {{ $profiles->links() }}
        </div>
    </div>

</body>
</html>