<<<<<<< HEAD
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
=======
<html>

<head>
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img src="https://videos.adventistas.org/pt/wp-content/themes/pa-theme-sedes/assets/sedes/pt/default.svg">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{route('autenticar')}}">
                    @csrf
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="email">
                            Email
                        </label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autofocus="autofocus">
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password">
                            Senha
                        </label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('register')}}">
                            Cadastrar novo usuário
                        </a>

                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('showForgetPasswordForm')}}">
                            Esqueceu a senha?
                        </a>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
>>>>>>> d492f4d02e91d8f0f09967de6fe3cf28ada10009
