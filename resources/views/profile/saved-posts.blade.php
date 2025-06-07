<x-layouts.app :title="__('Saved Posts')">
    @forelse($savedPosts as $post)
        <div>
            {{ $post }}
        </div>
    @empty
        <div>
            No Saved Posts Found!
        </div>
    @endforelse
</x-layouts.app>
