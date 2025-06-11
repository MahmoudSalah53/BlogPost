<div>

    @forelse($posts as $post)
    <article class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
        <!-- Post Header with Author Info -->
        <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
            <flux:avatar
                src="https://randomuser.me/api/portraits/men/32.jpg"
                size="md"
                alt="Ahmed Mohamed"
                class="ring-2 ring-blue-500" />
            <div class="flex-1 text-left">
                <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                    Ahmed Mohamed
                </flux:text>
                <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                    Senior Laravel Developer • 2h ago
                </flux:text>
            </div>
            <flux:button
                variant="ghost"
                size="sm"
                class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
                <flux:icon name="ellipsis-horizontal" size="lg" />
            </flux:button>
        </div>

        <!-- Post Content -->
        <div class="p-4">
            <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">
                How to Master Laravel in 2025
            </flux:text>
            <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                After 5 years working with Laravel, I've compiled my top tips for mastering the framework in today's ecosystem. The key is understanding the lifecycle...
            </flux:text>
            <img src="https://source.unsplash.com/random/800x400?laravel" class="rounded-lg mb-4 w-full" alt="Laravel code example">

            <!-- Post Tags -->
            <div class="flex flex-wrap gap-2 mb-4">
                <flux:badge color="blue">#Laravel</flux:badge>
                <flux:badge color="emerald">#PHP</flux:badge>
                <flux:badge color="indigo">#Backend</flux:badge>
            </div>

            <!-- Post Stats -->
            <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                <div class="flex items-center gap-2">
                    <flux:icon name="heart" size="sm" class="text-red-500" />
                    <span>45 likes</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1">
                        <flux:icon name="chat-bubble-left" size="sm" />
                        12 comments
                    </span>
                    <span class="flex items-center gap-1">
                        <flux:icon name="arrow-path" size="sm" />
                        3 shares
                    </span>
                </div>
            </div>
        </div>

        <!-- Post Actions -->
        <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">
            <flux:button
                variant="ghost"
                size="sm"
                class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                <flux:icon name="heart" size="lg" />
                Like
            </flux:button>
            <flux:button
                variant="ghost"
                size="sm"
                class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                <flux:icon name="chat-bubble-left" size="lg" />
                Comment
            </flux:button>
            <flux:button
                variant="ghost"
                size="sm"
                class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                <flux:icon name="arrow-path" size="lg" />
                Share
            </flux:button>
        </div>
    </article>
    @empty
    <div class="text-center py-12 text-zinc-500 dark:text-zinc-400">
        <flux:text size="xl">No posts available</flux:text>
    </div>
    @endforelse

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>