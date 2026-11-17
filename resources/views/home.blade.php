<x-layout title="Home - Skilltrail">

    <div class="max-w-3xl mx-auto space-y-6">

        {{-- Welcome Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-3xl p-8 text-white shadow-lg">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold bg-white/20 px-3 py-1 rounded-full text-indigo-100">
                    Laravel Blade in Action
                </span>
            </div>
            <h1 class="text-3xl font-extrabold sm:text-4xl">
                
                Welcome, {{ $name ?? 'Developer' }}! 👋
            </h1>
            <p class="mt-2 text-indigo-100 text-sm sm:text-base">
                Your Laravel application is running with Blade templates and Tailwind CSS.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ url('/blade-guide') }}" class="inline-flex items-center gap-2 bg-white text-indigo-700 font-bold px-5 py-2.5 rounded-xl shadow-md hover:bg-indigo-50 transition text-sm">
                    Open Interactive Blade Guide →
                </a>
            </div>
        </div>

        {{-- Demonstration of Reusable Alert Component --}}
        <x-alert type="success" title="Blade Setup Ready!">
            Tailwind CSS and Blade Components are compiled and working properly.
        </x-alert>

        {{-- Demonstration of Reusable Card Component --}}
        <x-card title="Quick Blade Example" subtitle="Components make UI clean and maintainable" badge="Active" badgeColor="green">
            
            <p class="text-slate-600 mb-4">
                This box is rendered using <code class="bg-slate-100 text-indigo-600 px-1 py-0.5 rounded text-xs font-mono">&lt;x-card&gt;</code>. 
                Instead of repeating the same HTML and Tailwind classes on every page, you just write the card markup once in <code class="bg-slate-100 text-indigo-600 px-1 py-0.5 rounded text-xs font-mono">resources/views/components/card.blade.php</code> and reuse it everywhere.
            </p>

            <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-100">
                <span class="text-xs text-slate-500 font-medium self-center mr-1">Reused Badges:</span>
                <x-badge color="blue">&#64;if Directive</x-badge>
                <x-badge color="purple">&#64;foreach Directive</x-badge>
                <x-badge color="emerald">&lt;x-slot&gt;</x-badge>
                <!-- <x-badge color="amber">@props</x-badge> -->
            </div>

            <x-slot:footer>
                <span>Click the button above to study the full guide.</span>
                <a href="{{ url('/blade-guide') }}" class="text-indigo-600 font-semibold hover:underline">Explore Guide &rarr;</a>
            </x-slot:footer>
        </x-card>

    </div>

</x-layout>
