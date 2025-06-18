<div>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header with Search -->
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-1 text-foreground">Saved Posts</h1>
                <flex:text>Posts you saved for later</flex:text>
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

        <!-- Saved Posts Cards -->
        <div class="grid gap-6 mt-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($userSavedPosts as $post)
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-sm transition hover:shadow-md">
                <div class="block p-4">
                    <div class="mb-3 h-40 bg-zinc-100 dark:bg-zinc-800 rounded-xl overflow-hidden flex items-center justify-center flex-col">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="object-cover w-full h-full" />
                        @else
                        <flux:icon.photo class="text-zinc-400 w-10 h-10 mb-1" />
                        <flux:text class="text-xs text-zinc-500">No Image</flux:text>
                        @endif
                    </div>

                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">
                        {{ $post->title }}
                    </h2>

                    <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">
                        {{ Str::limit($post->content, 25, '...') }}
                    </p>

                    <div class="flex items-center justify-between text-xs text-zinc-500 dark:text-zinc-400">
                        <span>By {{ $post->author->name }}</span>
                        <span>{{ $post->updated_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="flex justify-between items-center p-4 border-t border-zinc-100 dark:border-zinc-800">
                    <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Read More</a>
                    <flux:icon.trash wire:click="removeSavedPost({{ $post->id }})" class="hover:text-red-500 cursor-pointer" />
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <flux:icon.book-open class="mx-auto mb-4 w-10 h-10 text-zinc-400" />
                <h3 class="text-lg font-semibold text-zinc-600 dark:text-zinc-400">No saved posts found</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-500">Try searching for something else or save posts to see them here.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>