<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BookCycle') }} - ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน</title>

        <!-- Fonts (Prompt for Thai & English) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800 {{ Auth::check() && Auth::user()->role === 'admin' ? 'bg-slate-100' : 'bg-slate-50' }} min-h-screen selection:bg-slate-800 selection:text-white">
        
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white border-b border-slate-200">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>

            <!-- Formal Footer -->
            <footer class="bg-white border-t border-slate-200 py-6 mt-12 text-slate-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-6 h-6 rounded-md bg-slate-800 text-white flex items-center justify-center">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h10"/>
                            </svg>
                        </div>
                        <span class="font-bold text-slate-800 text-sm tracking-tight">BookCycle Platform</span>
                        <span class="text-xs text-slate-400 hidden sm:inline">| ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน</span>
                    </div>
                    <div class="text-xs text-slate-400 text-center sm:text-right">
                        <span>© {{ date('Y') }} BookCycle. All rights reserved.</span>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
