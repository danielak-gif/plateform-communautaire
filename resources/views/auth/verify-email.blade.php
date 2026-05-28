<x-guest-layout>
    
    <style>
        body {
            background-color: #f5f3ef;
            font-family: "DM Sans", system-ui, -apple-system, Segoe UI, sans-serif;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 18px;
            padding: 32px;
        }

        .title {
            font-family: "DM Serif Display", serif;
            font-size: 22px;
            color: #1c1c1a;
            margin-bottom: 12px;
        }

        .text {
            font-size: 14px;
            color: #888;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .success {
            background: #f0eee9;
            border: 1px solid #e8e6e1;
            color: #1c1c1a;
            padding: 12px;
            border-radius: 14px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            background: #1c1c1a;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 14px;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .link {
            font-size: 13px;
            color: #1c1c1a;
            opacity: 0.6;
            text-decoration: none;
        }

        .link:hover {
            opacity: 1;
            text-decoration: underline;
        }
    </style>

    <div class="wrapper">
        <div class="card">

            <div class="title">
                Vérification de votre email
            </div>

            <div class="text">
                Merci pour votre inscription. Avant de commencer, veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.  
                Si vous n’avez pas reçu l’email, nous pouvons vous en renvoyer un autre.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="success">
                    Un nouveau lien de vérification a été envoyé à votre adresse email.
                </div>
            @endif

            <div class="actions">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn">
                        Renvoyer l’email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="link" type="submit">
                        Se déconnecter
                    </button>
                </form>

            </div>

        </div>
    </div>

</x-guest-layout>