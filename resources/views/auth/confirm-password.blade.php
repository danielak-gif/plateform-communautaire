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
            max-width: 480px;
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 18px;
            padding: 32px;
        }

        .title {
            font-family: "DM Serif Display", serif;
            font-size: 22px;
            color: #1c1c1a;
            margin-bottom: 10px;
        }

        .text {
            font-size: 14px;
            color: #888;
            line-height: 1.5;
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

        .btn {
            width: 100%;
            padding: 12px 18px;
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
    </style>

    <div class="wrapper">

        <div class="card">

            <div class="title">
                Confirmation requise
            </div>

            <div class="text">
                Cette zone est sécurisée. Veuillez confirmer votre mot de passe avant de continuer.
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

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

                <button type="submit" class="btn">
                    Confirmer
                </button>

            </form>

        </div>

    </div>

</x-guest-layout>