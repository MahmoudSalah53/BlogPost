<x-layouts.app :title="__('Liked Posts')">
    @forelse($likedPosts as $post)
        <div>
            {{ $post }}
        </div>
    @empty
        <div>
            No Found Posts!
        </div>
    @endforelse
</x-layouts.app>
