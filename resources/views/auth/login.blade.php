<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'GearTrail') }} - Login</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <img src="{{ asset('assets/logo.webp') }}" alt="GearTrail" class="h-20">
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h2 class="text-2xl font-bold text-center mb-6">Staff Login</h2>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-geartrail-red focus:ring-geartrail-red">
                        @error('email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-geartrail-red focus:ring-geartrail-red">
                        @error('password') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-geartrail-red shadow-sm focus:ring-geartrail-red">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-geartrail-dark border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-geartrail-red active:bg-geartrail-red focus:outline-none focus:border-geartrail-red focus:ring ring-geartrail-red disabled:opacity-25 transition ease-in-out duration-150">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
