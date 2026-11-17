{{--
  COMPONENT: <x-alert>
  Purpose: Displays an informational or warning callout box.
  
  Example Usage:
  <x-alert type="success" title="Great Job!">Your profile was saved.</x-alert>
--}}
@props([
    'type' => 'info',
    'title' => null,
])

@php
    $config = match($type) {
        'success' => [
            'wrapper' => 'bg-emerald-50 border-emerald-200 text-emerald-900',
            'title'   => 'text-emerald-800',
            'icon'    => '✓',
        ],
        'warning' => [
            'wrapper' => 'bg-amber-50 border-amber-200 text-amber-900',
            'title'   => 'text-amber-800',
            'icon'    => '⚠️',
        ],
        'danger' => [
            'wrapper' => 'bg-rose-50 border-rose-200 text-rose-900',
            'title'   => 'text-rose-800',
            'icon'    => '✕',
        ],
        default => [
            'wrapper' => 'bg-indigo-50 border-indigo-200 text-indigo-900',
            'title'   => 'text-indigo-800',
            'icon'    => '💡',
        ],
    };
@endphp

<div {{ $attributes->merge(['class' => "p-4 rounded-xl border flex gap-3 {$config['wrapper']}"]) }}>
    <div class="text-base font-bold shrink-0">{{ $config['icon'] }}</div>
    <div class="text-sm flex-1">
        @if ($title)
            <h4 class="font-bold mb-1 {{ $config['title'] }}">{{ $title }}</h4>
        @endif
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
