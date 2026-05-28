<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            background:#f5f3ef;
            color:#1c1c1a;
            font-family:"DM Sans", system-ui, sans-serif;
            padding:40px 20px;
        }

        .header {
            text-align:center;
            margin-bottom:30px;
        }

        .header h1 {
            font-family:"DM Serif Display", serif;
            font-size:34px;
        }

        .header p { color:#888; }

        .nav {
            text-align:center;
            margin-bottom:25px;
        }

        .nav a {
            margin:0 12px;
            text-decoration:none;
            color:#1c1c1a;
            opacity:.7;
        }

        .nav a:hover { opacity:1; }

        .success {
            max-width:900px;
            margin:0 auto 20px;
            background:#f0eee9;
            border:1px solid #e8e6e1;
            padding:12px;
            border-radius:14px;
        }

        .export {
            max-width:900px;
            margin:0 auto 20px;
            display:flex;
            gap:10px;
        }

        .btn-export {
            padding:10px 14px;
            border:1px solid #e8e6e1;
            border-radius:12px;
            text-decoration:none;
            color:#1c1c1a;
            background:#fff;
        }

        .stats {
            max-width:900px;
            margin:0 auto 30px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(160px,1fr));
            gap:12px;
        }

        .stat-card {
            background:#fff;
            border:1px solid #e8e6e1;
            border-radius:16px;
            padding:20px;
            text-align:center;
        }

        .stat-number {
            font-size:28px;
            font-weight:600;
        }

        .stat-label {
            font-size:12px;
            color:#888;
        }

        .charts {
            max-width:1100px;
            margin:0 auto 30px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
            gap:15px;
        }

        .chart-box {
            background:#fff;
            border:1px solid #e8e6e1;
            border-radius:16px;
            padding:18px;
        }

        .table-responsive {
            width:100%;
            overflow-x:auto;
            margin-bottom:30px;
        }

        @media (max-width: 768px) {
            body {
                padding:20px 10px;
            }

            .export {
                flex-direction:column;
                gap:10px;
                align-items:flex-start;
            }

            .nav a {
                display:inline-block;
                margin:6px 8px;
            }
        }

        .chart-title {
            font-size:14px;
            margin-bottom:10px;
        }

        table {
            width:100%;
            border-collapse:collapse;
            background:#fff;
            border:1px solid #e8e6e1;
            border-radius:16px;
            overflow:hidden;
        }

        thead { background:#f0eee9; }

        th, td {
            padding:12px;
            font-size:13px;
            border-top:1px solid #e8e6e1;
        }

        .badge {
            padding:4px 10px;
            border-radius:999px;
            font-size:11px;
        }

        .badge.en_attente { background:#f0eee9; color:#8a6d00; }
        .badge.approuve { background:#e9f5ee; color:#1f6b3a; }
        .badge.rejete { background:#fdeaea; color:#b00020; }
    </style>
</head>

<body>

<div class="header">
    <h1>Dashboard Administrateur</h1>
    <p>Gestion des profils</p>
</div>

<div class="nav">
    <a href="{{ route('communaute.index') }}">← Annuaire</a>
    <a href="{{ route('dashboard') }}">Mon compte</a>
</div>

@if(session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

<div class="export">
    <a class="btn-export" href="{{ route('admin.export.excel') }}">📊 Excel</a>
    <a class="btn-export" href="{{ route('admin.export.pdf') }}">📄 PDF</a>
</div>

<div class="stats">
    <div class="stat-card">
        <div class="stat-number">{{ $total }}</div>
        <div class="stat-label">Total</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $en_attente }}</div>
        <div class="stat-label">En attente</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $approuves }}</div>
        <div class="stat-label">Approuvés</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $rejetes }}</div>
        <div class="stat-label">Rejetés</div>
    </div>
</div>

<div class="charts">

    <div class="chart-box">
        <div class="chart-title">Statuts</div>
        <canvas id="chartStatut"></canvas>
    </div>

    <div class="chart-box">
        <div class="chart-title">Catégories</div>
        <canvas id="chartCategorie"></canvas>
    </div>

    <div class="chart-box">
        <div class="chart-title">Niveaux</div>
        <canvas id="chartNiveau"></canvas>
    </div>

</div>

<script>
    // STATUT
    new Chart(document.getElementById('chartStatut'), {
        type: 'doughnut',
        data: {
            labels: ['Attente', 'Approuvés', 'Rejetés'],
            datasets: [{
                data: [
                    {{ $en_attente }},
                    {{ $approuves }},
                    {{ $rejetes }}
                ]
            }]
        }
    });

    // CATÉGORIES ✔ FIX
    new Chart(document.getElementById('chartCategorie'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($par_categorie ? $par_categorie->keys()->toArray() : []) !!},
            datasets: [{
                label: 'Catégories',
                data: {!! json_encode($par_categorie ? $par_categorie->values()->toArray() : []) !!}
            }]
        }
    });

    // NIVEAUX ✔ FIX
    new Chart(document.getElementById('chartNiveau'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($par_niveau ? $par_niveau->keys()->toArray() : []) !!},
            datasets: [{
                label: 'Niveaux',
                data: {!! json_encode($par_niveau ? $par_niveau->values()->toArray() : []) !!}
            }]
        }
    });
</script>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Secteur</th>
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
                <td>
                    <span class="badge {{ $profile->statut }}">
                        {{ ucfirst($profile->statut) }}
                    </span>
                </td>
                <td>
                    @if($profile->statut === 'en_attente')
                        <form method="POST" action="{{ route('admin.profiles.approuver', $profile->id) }}" style="display:inline">
                            @csrf @method('PATCH')
                            <button type="submit">✅ Approuver</button>
                        </form>
                        <form method="POST" action="{{ route('admin.profiles.rejeter', $profile->id) }}" style="display:inline">
                            @csrf @method('PATCH')
                            <button type="submit">❌ Rejeter</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center; color:#888;">
                    Aucun profil
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>

</body>
</html>