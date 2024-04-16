<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ENGAGEMENT LEUCEMIE">  

    <title>Dashboard-Engagement-Leucemie</title>

    <!-- // LINK CSS // -->
    <link rel="stylesheet" href="{{ asset('BackOffice/public/assets/css/style.css') }}">
    <!-- CDN REMIXICON // -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- // FAVICON  // -->
    <link rel="shortcut icon" href="{{ asset('BackOffice/public/assets/image/logo/logo.png') }}"/>

</head>
<body>

    <section class="login-dashboard">
        <!-- // LOGIN // -->
        <x-auth-session-status :status="session('status')"/>

        <form method="POST" action="{{ route('login') }}" class="form-login">
            @csrf

            <h3 class="middle-text" style="text-align: center; padding: 15px 0;">
                Login
            </h3>
        
            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" class="text label-dashboard"/>
                <x-text-input id="email" class="input-box text ibw" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-error"/>
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="input-box text ibw"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="error-text"/>
            </div>

            <!-- Remember Me -->
            <div class="bottom-login">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 check-box-container" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text fyp underline text-sm text-gray-600 check-box-container hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-primary-button class="btn green-btn text check-box-container">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </section>

</body>
</html>