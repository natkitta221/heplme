<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BookCycle') }} - เข้าสู่ระบบสารสนเทศ</title>

        <!-- Fonts (Prompt & Plus Jakarta Sans) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800 bg-[#f6f3fa] min-h-screen flex flex-col justify-between selection:bg-violet-800 selection:text-white">

        <!-- Header / Back to home -->
        <header class="py-4 px-6 flex justify-between items-center max-w-7xl mx-auto w-full">
            <a href="/" class="flex items-center gap-2">
                <x-application-logo />
            </a>

            <a href="/" class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-slate-200 shadow-xs">
                <span>←</span> <span>กลับสู่หน้าแรก</span>
            </a>
        </header>

        <!-- Main Content (Centered Form Card) -->
        <main class="flex-1 guest-canvas page-arrive flex flex-col justify-center items-center px-4 py-8 sm:py-12">
            <div class="auth-panel w-full sm:max-w-md bg-white p-6 sm:p-8 rounded-xl border border-slate-200">
                {{ $slot }}
            </div>
        </main>

        <!-- Formal Footer -->
        <footer class="py-5 text-center text-xs text-slate-400 border-t border-slate-200 bg-white">
            <div class="max-w-7xl mx-auto px-4 flex items-center justify-center gap-2">
                <img src="{{ asset('images/logo-icon.png') }}" alt="BookCycle" class="w-5 h-5 object-contain shrink-0">
                <span>© {{ date('Y') }} BookCycle. ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน.</span>
            </div>
        </footer>

    </body>
</html>
