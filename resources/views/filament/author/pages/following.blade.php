<x-filament-panels::page>
    @forelse ($followings as $following)
        {{ $following->name }}
    @empty
        <div>No followings Found!</div>
    @endforelse
</x-filament-panels::page>
