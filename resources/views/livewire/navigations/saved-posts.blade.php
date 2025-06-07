<div>
    @forelse($savedPosts as $post)
        <div>
            {{ $post }}
        </div>
    @empty
        <div>
            No Saved Posts Found!
        </div>
    @endforelse
</div>
