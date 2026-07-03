<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GearTrail') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Sidebar -->
            <aside class="fixed inset-y-0 left-0 w-64 bg-geartrail-dark text-white hidden md:block">
                <div class="p-6">
                    <img src="{{ asset('assets/logo.webp') }}" alt="GearTrail" class="h-12 mx-auto">
                </div>
                <nav class="mt-6 px-4">
                    <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-geartrail-red {{ request()->routeIs('dashboard') ? 'bg-geartrail-red' : '' }}">
                        Dashboard
                    </a>
                    @can('manage branches')
                    <a href="{{ route('branches') }}" class="block py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-geartrail-red {{ request()->routeIs('branches') ? 'bg-geartrail-red' : '' }}">
                        Branches
                    </a>
                    @endcan
                    @can('view customers')
                    <a href="{{ route('customers') }}" class="block py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-geartrail-red {{ request()->routeIs('customers') ? 'bg-geartrail-red' : '' }}">
                        Customers
                    </a>
                    @endcan
                    <div class="mt-10 border-t border-gray-700 pt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-2.5 px-4 rounded transition duration-200 hover:bg-geartrail-red">
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="md:ml-64 flex flex-col min-h-screen">
                <!-- Header -->
                <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">
                        {{ $header ?? 'Dashboard' }}
                    </h2>
                    <div class="flex items-center space-x-4">
                        @if(auth()->user()->hasRole('Super Admin'))
                            <select onchange="window.location.href='?switch_branch='+this.value" class="rounded border-gray-300 text-sm">
                                @foreach(\App\Models\Branch::all() as $branch)
                                    <option value="{{ $branch->id }}" {{ session('current_branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <span class="text-sm font-medium text-gray-600">
                                Branch: {{ auth()->user()->branch?->name ?? 'N/A' }}
                            </span>
                        @endif
                        <span class="text-sm font-medium text-gray-600">{{ auth()->user()->name }}</span>
                    </div>
                </header>

                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
