@props([
    'maxWidth' => '7xl', // Default max width
    'padding' => 'px-4 sm:px-6 lg:px-8', // Default padding
    'bg' => 'bg-white', // Default background
    'darkBg' => 'dark:bg-zinc-800', // Dark mode background
])

@php
    // Map maxWidth values to Tailwind classes
    $maxWidthClasses = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        '7xl' => 'max-w-7xl',
        'full' => 'max-w-full',
    ];

    $maxWidthClass = $maxWidthClasses[$maxWidth];
@endphp

<div {{ $attributes->merge(['class' => "{$maxWidthClass} mx-auto w-full {$padding} {$bg} {$darkBg} "]) }}>
    {{ $slot }}
</div>
