<x-filament-panels::page>
    @forelse ($likedPosts as $likedPost)
        {{ $likedPost->title }}
    @empty
        <div>There Are No Liked Posts!</div>
    @endforelse
</x-filament-panels::page>
