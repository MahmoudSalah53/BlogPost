<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 max-w-7xl mx-auto">
        @forelse ($myFollowings as $following)
        <div class="rounded-2xl border border-border bg-background shadow-sm p-6 flex flex-col items-center space-y-4 transition hover:shadow-md">
            <img
                src="{{ $following->avatar ? asset('storage/' . $following->avatar) : 'https://www.gravatar.com/avatar/?d=mp' }}"
                alt="{{ $following->name }}"
                class="w-20 h-20 rounded-full object-cover" />


            <div class="text-center">
                <p class="text-lg font-semibold text-foreground">{{ $following->name }}</p>
                <p class="text-sm text-muted">{{ Str::limit($following->bio, 25, '...') }}</p>
            </div>
            <livewire:follow-author-component :author="$following" />
        </div>
        @empty
        <p class="col-span-3 text-center text-muted">You are not following anyone currently.</p>
        @endforelse
    </div>

</div>