<div>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header with Search -->
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-1 text-foreground">Followings</h1>
                <flex:text>Browse through everyone you've followed</flex:text>
            </div>

            <!-- Search Bar -->
            <div class="relative w-full md:w-72">
                <input
                    type="text"
                    placeholder="Search..."
                    autocomplete="off"
                    wire:model.live="search"
                    class="w-full rounded-xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 px-4 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:text-white">
                <flux:icon.magnifying-glass class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 w-4 h-4" />
            </div>
        </div>

        <flux:separator />
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 max-w-7xl mx-auto">
    @forelse ($myFollowings as $following)
        <div class="rounded-2xl border border-border bg-background shadow-sm dark:shadow dark:bg-muted/40 dark:border-zinc-700 p-6 flex flex-col items-center space-y-4 transition hover:shadow-md bg-white dark:bg-zinc-900">
            <img
                src="{{ $following->avatar ? asset('storage/' . $following->avatar) : 'https://www.gravatar.com/avatar/?d=mp' }}"
                alt="{{ $following->name }}"
                class="w-20 h-20 rounded-full object-cover" />

            <div class="text-center">
                <p class="text-lg font-semibold text-foreground dark:text-white">{{ $following->name }}</p>
                <p class="text-sm text-muted dark:text-muted-foreground/70">{{ Str::limit($following->bio, 25, '...') }}</p>
            </div>

            <livewire:follow-author-component :author="$following" />
        </div>
    @empty
        <p class="col-span-3 text-center text-muted dark:text-muted-foreground/70">
            There are no followings.
        </p>
    @endforelse
</div>

        <div class="mt-6">
            {{ $myFollowings->links() }}
        </div>
    </div>
</div>