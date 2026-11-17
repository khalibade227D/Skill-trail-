<x-layout title="Blade Directives & Components Masterclass">

    {{-- Hero Section --}}
    <div class="mb-12 text-center max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-xs font-semibold uppercase tracking-wider mb-4">
            🎓 Visual Learning Guide
        </div>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
            Laravel Blade Directives & Components
        </h1>
        <p class="mt-4 text-base sm:text-lg text-slate-600">
            This page explains <strong>every core Blade concept</strong> with live rendered output, code snippets, and beginner-friendly explanations.
        </p>
    </div>


    {{-- =========================================================================
         MODULE 1: PRINTING DATA & COMMENTS
         ========================================================================= --}}
    <section class="mb-14">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-sm">1</span>
            <h2 class="text-2xl font-bold text-slate-900">Printing Data & Comments</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Escaped vs Unescaped --}}
            <x-card title="Outputting Variables" subtitle="Escaped vs Raw HTML">
                <p class="mb-3 text-slate-600">
                    In Blade, double curly braces automatically sanitize data using PHP's <code class="bg-slate-100 text-indigo-600 px-1 py-0.5 rounded">htmlspecialchars</code> to protect you from Cross-Site Scripting (XSS).
                </p>

                <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase block">1. Escaped Safe Output:</span>
                        <code class="text-xs text-indigo-600 font-mono">&#123;&#123; $userName &#125;&#125;</code>
                        <div class="font-bold text-slate-800 text-base mt-1">Hello, {{ $userName }}!</div>
                    </div>

                    <div class="pt-2 border-t border-slate-200">
                        <span class="text-xs font-semibold text-slate-500 uppercase block">2. Raw Unescaped Output:</span>
                        <code class="text-xs text-rose-600 font-mono">&#123;!! $highlightedNote !!&#125;</code>
                        <div class="mt-1 text-sm">{!! $highlightedNote !!}</div>
                        <p class="text-[11px] text-amber-700 mt-1">⚠️ Only use unescaped output for trusted HTML!</p>
                    </div>
                </div>
            </x-card>

            {{-- Blade Comments --}}
            <x-card title="Blade Comments" subtitle="Private vs Public Source Code">
                <p class="mb-3 text-slate-600">
                    HTML comments are visible to anyone who uses "Inspect Element". Blade comments are stripped on the server and <strong>never</strong> sent to the browser.
                </p>

                <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs font-mono">
                    <div class="p-2 bg-emerald-50 border border-emerald-200 rounded text-emerald-800">
                        <p class="font-bold mb-1">✅ Blade Comment (Secret):</p>
                        <span>&#123;&#123;-- This is stripped on the server --&#125;&#125;</span>
                    </div>

                    <div class="p-2 bg-rose-50 border border-rose-200 rounded text-rose-800">
                        <p class="font-bold mb-1">❌ HTML Comment (Visible to public):</p>
                        <span>&lt;!-- Anyone can read this in browser source --&gt;</span>
                    </div>
                </div>
            </x-card>
        </div>
    </section>


    {{-- =========================================================================
         MODULE 2: CONDITIONAL DIRECTIVES
         ========================================================================= --}}
    <section class="mb-14">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-sm">2</span>
            <h2 class="text-2xl font-bold text-slate-900">Conditional Directives (&#64;if, &#64;unless, &#64;empty)</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- @if / @elseif / @else --}}
            <x-card title="Directive: if / else" subtitle="Standard Logic Check">
                <p class="mb-4 text-xs text-slate-500">
                    Evaluates if a condition is true.
                </p>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-sm">
                    <span class="text-xs text-slate-400 block mb-1">Current User Role: <strong>{{ $userRole }}</strong></span>
                    
                    @if ($userRole === 'admin')
                        <div class="flex items-center gap-2 text-emerald-700 font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Admin Privileges Granted
                        </div>
                    @elseif ($userRole === 'editor')
                        <div class="text-blue-700 font-semibold">Editor Access Only</div>
                    @else
                        <div class="text-slate-600">Standard Member</div>
                    @endif
                </div>

                <div class="mt-4 text-xs bg-slate-900 text-slate-100 p-3 rounded-lg font-mono">
                    &#64;if ($userRole === 'admin')<br>
                    &nbsp;&nbsp;Admin Privileges<br>
                    &#64;else<br>
                    &nbsp;&nbsp;Standard Member<br>
                    &#64;endif
                </div>
            </x-card>

            {{-- @unless --}}
            <x-card title="Directive: unless" subtitle="Runs if condition is FALSE">
                <p class="mb-4 text-xs text-slate-500">
                    Think of <code class="text-indigo-600 font-bold">&#64;unless($val)</code> as <code class="text-indigo-600 font-bold">&#64;if(!$val)</code>.
                </p>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-sm">
                    <span class="text-xs text-slate-400 block mb-1">isVerified status: <strong>{{ $isVerified ? 'true' : 'false' }}</strong></span>

                    @unless ($isVerified)
                        <div class="text-rose-600 font-semibold">
                            ⚠️ Please verify your email!
                        </div>
                    @else
                        <div class="text-emerald-600 font-semibold flex items-center gap-1.5">
                            <span>✓</span> Email is verified!
                        </div>
                    @endunless
                </div>

                <div class="mt-4 text-xs bg-slate-900 text-slate-100 p-3 rounded-lg font-mono">
                    &#64;unless ($isVerified)<br>
                    &nbsp;&nbsp;Show Warning<br>
                    &#64;else<br>
                    &nbsp;&nbsp;Email verified<br>
                    &#64;endunless
                </div>
            </x-card>

            {{-- @isset and @empty --}}
            <x-card title="Directives: isset & empty" subtitle="Variable Existence & Emptiness">
                <p class="mb-4 text-xs text-slate-500">
                    Safe checks without throwing PHP undefined index warnings.
                </p>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-sm space-y-2">
                    @isset($notificationCount)
                        <div class="flex items-center justify-between">
                            <span class="text-slate-600">Notifications:</span>
                            <x-badge color="indigo">{{ $notificationCount }} new</x-badge>
                        </div>
                    @endisset

                    @empty($emptyProjectsList)
                        <div class="text-xs text-slate-500 bg-white p-2 rounded border border-slate-200">
                            📁 <code class="text-slate-700 font-bold">&#64;empty:</code> No projects found in archive.
                        </div>
                    @endempty
                </div>

                <div class="mt-4 text-xs bg-slate-900 text-slate-100 p-3 rounded-lg font-mono">
                    &#64;isset($notificationCount)<br>
                    &nbsp;&nbsp;Badge: &#123;&#123; $notificationCount &#125;&#125;<br>
                    &#64;endisset
                </div>
            </x-card>
        </div>
    </section>


    {{-- =========================================================================
         MODULE 3: LOOPS & THE MAGIC $loop VARIABLE
         ========================================================================= --}}
    <section class="mb-14">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-sm">3</span>
            <h2 class="text-2xl font-bold text-slate-900">Loops & The Magic $loop Variable</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- @foreach with $loop --}}
            <x-card title="Directive: foreach + Magic $loop" subtitle="Looping through arrays effortlessly">
                <p class="mb-3 text-xs text-slate-500">
                    Inside any <code class="text-indigo-600 font-bold">&#64;foreach</code>, Laravel provides an automatic <code class="text-indigo-600 font-bold">$loop</code> object! You can check if it's the first or last iteration, get the 1-based index, and more.
                </p>

                <div class="overflow-hidden border border-slate-200 rounded-xl">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-xs">
                        <thead class="bg-slate-50 text-slate-600 font-semibold">
                            <tr>
                                <th class="px-3 py-2">Iter</th>
                                <th class="px-3 py-2">Skill</th>
                                <th class="px-3 py-2">Category</th>
                                <th class="px-3 py-2 text-right">Loop Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @foreach ($skills as $skill)
                                <tr class="{{ $loop->even ? 'bg-slate-50/50' : '' }}">
                                    <td class="px-3 py-2 font-mono text-slate-400">#{{ $loop->iteration }}</td>
                                    <td class="px-3 py-2 font-bold text-slate-800">{{ $skill['name'] }}</td>
                                    <td class="px-3 py-2">
                                        <x-badge :color="$skill['badge']">{{ $skill['category'] }}</x-badge>
                                    </td>
                                    <td class="px-3 py-2 text-right space-x-1">
                                        @if ($loop->first)
                                            <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-1.5 py-0.5 rounded">First</span>
                                        @endif
                                        @if ($loop->last)
                                            <span class="text-[10px] bg-purple-100 text-purple-800 font-bold px-1.5 py-0.5 rounded">Last</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 text-[11px] text-slate-500 flex justify-between">
                    <span>Total items: <strong class="text-slate-700">{{ count($skills) }}</strong></span>
                    <span>Helper properties: <code class="text-indigo-600">$loop->first</code>, <code class="text-indigo-600">$loop->last</code></span>
                </div>
            </x-card>

            {{-- @forelse & @empty --}}
            <x-card title="Directive: forelse" subtitle="Handling lists that might be empty">
                <p class="mb-3 text-xs text-slate-500">
                    Instead of writing <code class="text-indigo-600 font-bold">&#64;if(count) &#64;foreach &#64;else</code>, Blade has <code class="text-indigo-600 font-bold">&#64;forelse</code> which handles the empty state automatically!
                </p>

                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase block mb-1">Scenario: Empty list rendering</span>
                        
                        <div class="border border-dashed border-slate-300 rounded-xl p-6 text-center bg-slate-50">
                            @forelse ($emptyProjectsList as $project)
                                <div class="p-2 font-medium">{{ $project }}</div>
                            @empty
                                <div class="text-slate-400 text-3xl mb-1">📭</div>
                                <h4 class="font-bold text-slate-700 text-sm">No Pending Tasks Found</h4>
                                <p class="text-xs text-slate-500 mt-1">This fallback block executed because the array was empty!</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="text-xs bg-slate-900 text-slate-100 p-3 rounded-lg font-mono">
                        &#64;forelse ($projects as $project)<br>
                        &nbsp;&nbsp;&lt;li&gt;&#123;&#123; $project &#125;&#125;&lt;/li&gt;<br>
                        &#64;empty<br>
                        &nbsp;&nbsp;&lt;p&gt;No projects found!&lt;/p&gt;<br>
                        &#64;endforelse
                    </div>
                </div>
            </x-card>
        </div>
    </section>


    {{-- =========================================================================
         MODULE 4: BLADE COMPONENTS & REUSABILITY
         ========================================================================= --}}
    <section class="mb-14">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-sm">4</span>
            <h2 class="text-2xl font-bold text-slate-900">Blade Components & True Reusability</h2>
        </div>

        <p class="text-sm text-slate-600 max-w-2xl mb-8">
            Components let you write an HTML/Tailwind pattern <strong>once</strong> (like a button, card, modal, or alert) and reuse it everywhere with clean tags like <code class="text-indigo-600 font-bold">&lt;x-card&gt;</code> and <code class="text-indigo-600 font-bold">&lt;x-badge&gt;</code>.
        </p>

        {{-- Example 1: Alert Component Variations --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
                <span>Reusable &lt;x-alert&gt; Component</span>
                <span class="text-xs text-slate-400 font-normal">Passed with different 'type' prop</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-alert type="info" title="Info Alert">
                    Use this for helpful tips, hints, or system updates.
                </x-alert>

                <x-alert type="success" title="Success Alert">
                    Your profile changes and settings were saved successfully!
                </x-alert>

                <x-alert type="warning" title="Warning Alert">
                    Your subscription will renew in 3 days. Please check payment method.
                </x-alert>

                <x-alert type="danger" title="Error Alert">
                    Could not connect to the remote database. Please retry shortly.
                </x-alert>
            </div>
        </div>

        {{-- Example 2: Named Slots & Attribute Merging Demo --}}
        <div>
            <h3 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
                <span>Slots & Named Slots in &lt;x-card&gt;</span>
                <span class="text-xs text-slate-400 font-normal">Injecting content into custom areas</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Standard Card --}}
                <x-card title="Simple Card" subtitle="Uses default slot only" badge="Standard">
                    <p class="text-slate-600">
                        Everything written inside the opening and closing tag of <code class="text-indigo-600 font-mono">&lt;x-card&gt;...&lt;/x-card&gt;</code> automatically lands in the component's <code class="text-indigo-600 font-mono">&#123;&#123; $slot &#125;&#125;</code> variable.
                    </p>
                </x-card>

                {{-- Advanced Card with Named Slots --}}
                <x-card title="Card with Named Slots" subtitle="Header actions & custom footer" badge="Advanced" badgeColor="purple">
                    
                    {{-- Named Slot: Actions --}}
                    <x-slot:actions>
                        <button class="text-xs bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-2.5 py-1 rounded-md transition shadow-xs cursor-pointer">
                            Edit
                        </button>
                    </x-slot:actions>

                    {{-- Default Body Slot --}}
                    <p class="text-slate-600">
                        By using <code class="text-indigo-600 font-mono">&lt;x-slot:actions&gt;</code>, you can pass custom HTML elements (like the "Edit" button in top-right) into specific reserved positions inside the component!
                    </p>

                    {{-- Named Slot: Footer --}}
                    <x-slot:footer>
                        <span>Last updated: Just now</span>
                        <a href="#" class="text-indigo-600 font-semibold hover:underline">View Details →</a>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </section>


    {{-- =========================================================================
         QUICK REFERENCE CHEATSHEET
         ========================================================================= --}}
    <section class="bg-indigo-900 text-white rounded-3xl p-8 sm:p-10 shadow-xl">
        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
            <span>⚡</span> Blade Directives Quick Summary Cheat Sheet
        </h2>
        <p class="text-indigo-200 text-sm max-w-2xl mb-8">
            Keep these in mind whenever you write Blade templates in Laravel:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs font-mono">
            <div class="bg-indigo-950/60 p-4 rounded-xl border border-indigo-800">
                <span class="text-indigo-300 font-bold block mb-1">Printing</span>
                <p class="text-white">&#123;&#123; $name &#125;&#125; <span class="text-indigo-400 font-sans block text-[11px]">Safe escaped text</span></p>
                <p class="text-white mt-2">&#123;!! $html !!&#125; <span class="text-indigo-400 font-sans block text-[11px]">Raw HTML output</span></p>
            </div>

            <div class="bg-indigo-950/60 p-4 rounded-xl border border-indigo-800">
                <span class="text-indigo-300 font-bold block mb-1">Conditionals</span>
                <p class="text-white">&#64;if / &#64;else</p>
                <p class="text-white">&#64;unless ($guest)</p>
                <p class="text-white">&#64;isset / &#64;empty</p>
            </div>

            <div class="bg-indigo-950/60 p-4 rounded-xl border border-indigo-800">
                <span class="text-indigo-300 font-bold block mb-1">Loops</span>
                <p class="text-white">&#64;foreach ($arr as $x)</p>
                <p class="text-white">&#64;forelse ... &#64;empty</p>
                <p class="text-white">$loop-&gt;first / last</p>
            </div>

            <div class="bg-indigo-950/60 p-4 rounded-xl border border-indigo-800">
                <span class="text-indigo-300 font-bold block mb-1">Components</span>
                <p class="text-white">&lt;x-card title="..."&gt;</p>
                <p class="text-white">&lt;x-slot:actions&gt;</p>
                <p class="text-white">&#123;&#123; $attributes-&gt;merge() &#125;&#125;</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-white text-indigo-900 font-bold px-6 py-2.5 rounded-xl hover:bg-indigo-50 transition shadow-md">
                ← Back to Home
            </a>
        </div>
    </section>

</x-layout>
