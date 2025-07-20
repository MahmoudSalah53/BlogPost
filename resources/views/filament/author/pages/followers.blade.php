<x-filament-panels::page>
    @forelse ($followers as $follower)
        {{ $follower->name }}
    @empty
        <div>No Followers Found</div>
    @endforelse
</x-filament-panels::page>
