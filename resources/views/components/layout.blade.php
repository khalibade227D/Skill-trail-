@props([
    'title' => 'Skilltrail - Blade Mastery Guide'
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    {{-- Load Tailwind CSS and JavaScript via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full text-slate-800 antialiased font-sans">
    
    {{-- Header / Navigation Bar --}}
    <header class="sticky top-0 z-40 w-full border-b border-slate-200 bg-white/95 backdrop-blur shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black text-xl shadow-md shadow-indigo-200">
                    S
                </div>
                <div>
                    <a href="{{ url('/') }}" class="font-bold text-lg text-slate-900 hover:text-indigo-600 transition">Skilltrail</a>
                    <span class="text-xs text-indigo-600 bg-indigo-50 font-semibold px-2 py-0.5 rounded-full ml-1">Blade Guide</span>
                </div>
            </div>

            <nav class="flex items-center gap-4 text-sm font-medium">
                <a href="{{ url('/') }}" class="text-slate-600 hover:text-indigo-600 transition">Home</a>
                <a href="{{ url('/blade-guide') }}" class="text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg">Blade Tutorial</a>
            </nav>
        </div>
    </header>

    {{-- Main Content Area: Injected via $slot --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="mt-20 border-t border-slate-200 bg-white py-8 text-center text-sm text-slate-500">
        <p>Built with ❤️ using <strong>Laravel Blade</strong> and <strong>Tailwind CSS</strong>.</p>
    </footer>

</body>
</html>
