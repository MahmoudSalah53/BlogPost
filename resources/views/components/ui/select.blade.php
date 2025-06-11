@props([
    'placeholder' => 'Select an option',
    'options' => [],
    'label' => null,
    'name' => 'select',
    'width' => 'w-[180px]',
    'model' => null, //
])

@php
    $entangle = $model ? "@entangle('$model')" : "''";
@endphp

<div x-data="{
        open: false,
        selectedValue: {{ $entangle }},
        selectedLabel: ''
    }"
     class="relative w-full sm:{{ $width }}">

    {{-- Hidden input لو حابب تشتغل بيه في form عادي --}}
    <input type="hidden" name="{{ $name }}" x-model="selectedValue">

    <button @click="open = !open" type="button"
            class="flex w-full items-center justify-between rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 text-sm sm:text-base shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <span x-text="selectedLabel ? selectedLabel : '{{ $placeholder }}'"
              class="truncate text-gray-700 dark:text-gray-200"></span>
        <svg class="h-4 w-4 ml-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div x-show="open"
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-800 shadow-lg z-50 border border-gray-200 dark:border-gray-600">

        @if($label)
            <div class="px-3 py-2 text-xs text-gray-500 dark:text-gray-400 uppercase">{{ $label }}</div>
        @endif

        <ul class="max-h-60 sm:max-h-80 overflow-auto py-1 text-sm text-gray-700 dark:text-gray-200">
            @foreach ($options as $option)
                <li @click="selectedValue = '{{ $option['value'] }}'; selectedLabel = '{{ $option['label'] }}'; open = false"
                    class="cursor-pointer select-none px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ $option['label'] }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
