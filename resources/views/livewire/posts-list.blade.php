<div>
    @forelse($posts as $post)
    <article class="border mb-8 border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
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
                    Senior Laravel Developer • {{ $post->updated_at->diffForHumans() }}
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
                {{ $post->title }}
            </flux:text>
            @php
            $limit = 100;
            $content = $post->content;
            $isLong = strlen($content) > $limit;
            $shortContent = $isLong ? substr($content, 0, $limit) : $content;
            @endphp

            <div x-data="{ expanded: false }">
                <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                    <span x-show="!expanded">
                        {{ $shortContent }}
                        @if($isLong)
                        <span @click="expanded = true"
                            class="text-indigo-600 dark:text-indigo-400 text-sm font-medium cursor-pointer">
                            ... See More
                        </span>
                        @endif
                    </span>

                    <span x-show="expanded">
                        {{ $content }}
                        <span @click="expanded = false"
                            class="text-indigo-600 dark:text-indigo-400 text-sm font-medium cursor-pointer ml-1">
                            See Less
                        </span>
                    </span>
                </flux:text>
            </div>

            @if($post->featured_image !=null)
            <img src="{{ asset('storage/'.$post->featured_image) }}" class="rounded-lg mb-4 w-full" alt="{{ $post->title }}">
            @endif
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
                        <flux:icon name="save" size="sm" />
                        3 saves
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
                <flux:icon name="save" size="lg" />
                Save
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