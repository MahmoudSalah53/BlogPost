<div>
    <div
        x-data="{
            loading: false,
            threshold: 150,
            init() {
                window.addEventListener('scroll', () => {
                    if (this.loading) return;
                    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - this.threshold) {
                        this.loading = true;
                        $wire.loadMore().then(() => {
                            this.loading = false;
                        });
                    }
                });
            }
        }"
        x-init="init()">
        @forelse($posts as $post)
        @php
        $isLiked = $post->likedByUsers->isNotEmpty();
        $isSaved = $post->savedByUsers->isNotEmpty();
        @endphp

        <article x-data="{ showComments: false }" class="border mb-8 border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">

            <!-- Post Header with Author Info -->
            <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
                <flux:avatar
                    src="{{$post->author->avatar ? asset('storage/'.$post->author->avatar) : 'https://www.gravatar.com/avatar/?d=mp'}}"
                    alt="{{ $post->author->name }}" />
                <div class="flex-1 text-left w-full h-full">
                    <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                        {{ $post->author->name }}
                    </flux:text>
                    <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                        {{ Str::limit($post->author->bio, 25, '...') }} • {{ $post->updated_at->diffForHumans() }}
                    </flux:text>
                </div>
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

                <!-- Post Stats -->
                <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                    <div class="flex items-center gap-2">
                        <flux:icon name="heart" size="sm" class="text-red-500" />
                        <span>{{ $post->liked_by_users_count }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-1">
                            <flux:icon name="chat-bubble-left" size="sm" />
                            {{ $post->comments_count }} comments
                        </span>
                        <span class="flex items-center gap-1">
                            <flux:icon name="save" size="sm" />
                            {{ $post->saved_by_users_count }} saves
                        </span>
                    </div>
                </div>
            </div>

            <div x-show="showComments" x-transition class="mt-6 space-y-5">

                <!-- Existing comments -->
                @foreach ($post->comments->take($commentsPerPage[$post->id]) as $comment)
                <div class="flex items-start gap-3 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">

                    <flux:avatar
                        size="sm"
                        src="{{$post->author->avatar ? asset('storage/'.$post->author->avatar) : 'https://www.gravatar.com/avatar/?d=mp'}}"
                        alt="{{ $comment->name }}" />

                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-1">
                            <flux:text size="sm" class="font-semibold text-zinc-900 dark:text-white">
                                {{ $comment->name }}
                            </flux:text>
                            <flux:text size="xs" class="text-zinc-400 dark:text-zinc-500">
                                {{ $comment->created_at->diffForHumans() }}
                            </flux:text>
                        </div>
                        <flux:text size="base" class="text-zinc-700 dark:text-zinc-300 leading-relaxed">
                            {{ $comment->content }}
                        </flux:text>
                    </div>
                </div>
                @endforeach

                <!-- See More button -->
                @if ($post->comments->count() > $commentsPerPage[$post->id])
                <div class="text-center">
                    <flux:button
                        size="sm"
                        variant="primary"
                        wire:click="loadMoreComments({{ $post->id }})"
                        class="rounded-full px-6 py-2 cursor-pointer ">
                        See More Comments
                    </flux:button>
                </div>
                @endif

                <!-- Add new comment -->
                <form wire:submit.prevent="addComment({{ $post->id }})" class="flex items-center gap-3 mt-4">
                    <flux:input
                        type="text"
                        wire:model.defer="newCommentContent.{{ $post->id }}"
                        placeholder="Write a comment..."
                        autocomplete="off"
                        class="flex-1 rounded-full px-4 py-3" />
                    <flux:button
                        type="submit"
                        variant="primary"
                        class="rounded-full px-6 py-3 cursor-pointer">
                        Post
                    </flux:button>
                </form>

            </div>


            <!-- Post Actions -->
            <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">
                <button wire:click="toggleLike({{ $post->id }})" class="flex cursor-pointer items-center gap-2 {{ $isLiked ? 'text-red-500' : 'text-zinc-700 dark:text-zinc-300' }}">
                    <flux:icon name="heart" variant="solid" size="lg" />
                    Like
                </button>

                <flux:button variant="ghost" size="sm" class=" cursor-pointer flex items-center gap-2 text-zinc-700 dark:text-zinc-300"
                    @click="showComments = !showComments">
                    <flux:icon name="chat-bubble-left" size="lg" />
                    Comment
                </flux:button>

                <button wire:click="toggleSave({{ $post->id }})" class=" cursor-pointer flex items-center gap-2 {{ $isSaved ? 'text-violet-500' : 'text-zinc-700 dark:text-zinc-300' }}">
                    <flux:icon name="save" size="lg" />
                    Save
                </button>
            </div>

        </article>
        @empty
        <div class="text-center py-12 text-zinc-500 dark:text-zinc-400">
            <flux:text size="xl">No posts available</flux:text>
        </div>
        @endforelse

        @if ($posts->hasMorePages())
        <div class="mt-4 text-center text-zinc-500 dark:text-zinc-400">
            Loading more...
        </div>
        @endif
    </div>

    <script>
        window.history.scrollRestoration = 'manual';
    </script>
</div>