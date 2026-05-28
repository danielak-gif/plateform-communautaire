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

        .status {
            background: #f0eee9;
            border: 1px solid #e8e6e1;
            color: #1c1c1a;
            padding: 10px 12px;
            border-radius: 14px;
            font-size: 13px;
            margin-bottom: 14px;
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
            flex-wrap: wrap;
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

        .checkbox {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #1c1c1a;
            opacity: 0.7;
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
                Connexion
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="status" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
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
                           autocomplete="current-password">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember + Links -->
                <div class="row">

                    <label class="checkbox">
                        <input type="checkbox" name="remember">
                        Se souvenir de moi
                    </label>

                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif

                </div>

                <!-- Button -->
                <div class="row" style="justify-content: flex-end;">
                    <button type="submit" class="btn">
                        Se connecter
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>