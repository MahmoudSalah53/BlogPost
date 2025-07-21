<x-filament-panels::page>
@forelse ($savedPosts as $savedPost)
    {{  $savedPost->title }}
@empty
    <div>There Are No Saved Posts</div>
@endforelse
</x-filament-panels::page>
