{{-- 
  COMPONENT: <x-card>
  Purpose: Reusable container with optional title, badge, actions, and custom classes.
  
  Concepts Demonstrated:
  1. @props: Defines expected attributes and default values.
  2. $attributes->merge(): Merges default Tailwind classes with any custom classes passed from outside.
  3. $slot: The default slot where inner content goes.
  4. Named slot ($header / $actions): For specialized sections.
--}}
@props([
    'title' => null,
    'subtitle' => null,
    'badge' => null,
    'badgeColor' => 'indigo'
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 p-6 flex flex-col']) }}>
    
    {{-- Header Section (renders only if title or header slot is provided) --}}
    @if ($title || isset($header))
        <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-4 mb-4">
            <div>
                @if ($title)
                    <h3 class="text-lg font-bold text-slate-900 tracking-tight flex items-center gap-2">
                        {{ $title }}
                        @if ($badge)
                            <x-badge :color="$badgeColor">{{ $badge }}</x-badge>
                        @endif
                    </h3>
                @endif

                @if ($subtitle)
                    <p class="text-xs text-slate-500 mt-0.5">{{ $subtitle }}</p>
                @endif

                {{-- Custom header slot if provided --}}
                @isset($header)
                    {{ $header }}
                @endisset
            </div>

            {{-- Actions slot (e.g., buttons, menu, links) --}}
            @isset($actions)
                <div class="flex items-center gap-2">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    @endif

    {{-- Main Body: $slot contains whatever is placed inside <x-card>...</x-card> --}}
    <div class="text-slate-600 text-sm leading-relaxed flex-1">
        {{ $slot }}
    </div>

    {{-- Optional Footer Slot --}}
    @isset($footer)
        <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-500 flex items-center justify-between">
            {{ $footer }}
        </div>
    @endisset
</div>
