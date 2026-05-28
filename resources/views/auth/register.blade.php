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
            font-size: 24px;
            color: #1c1c1a;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #1c1c1a;
            opacity: 0.7;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid #e8e6e1;
            background: #ffffff;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
            color: #1c1c1a;
        }

        input:focus {
            border-color: #1c1c1a;
        }

        .error {
            font-size: 12px;
            color: #b00020;
            margin-top: 5px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 18px;
            gap: 12px;
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

        .btn {
            padding: 12px 18px;
            border-radius: 14px;
            border: none;
            background: #1c1c1a;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>

    <div class="wrapper">

        <div class="card">

            <div class="title">
                Créer un compte
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="username">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password"
                           name="password"
                           required
                           autocomplete="new-password">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm -->
                <div class="form-group">
                    <label>Confirmer le mot de passe</label>
                    <input type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">

                    <a class="link" href="{{ route('login') }}">
                        Déjà inscrit ?
                    </a>

                    <button type="submit" class="btn">
                        Créer le compte
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>