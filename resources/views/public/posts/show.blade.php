<x-public.layouts>
    {{-- <div>--}}

    {{-- <section class="py-8 bg-white dark:bg-zinc-900">--}}
    {{-- <div class="max-w-2xl mx-auto px-4 space-y-6">--}}

    {{-- @php--}}
    {{-- $isLiked = $post->likedByUsers->isNotEmpty();--}}
    {{-- $isSaved = $post->savedByUsers->isNotEmpty();--}}
    {{-- $limit = 100;--}}
    {{-- $content = $post->content;--}}
    {{-- $isLong = strlen($content) > $limit;--}}
    {{-- $shortContent = $isLong ? substr($content, 0, $limit) : $content;--}}
    {{-- @endphp--}}

    {{-- <article x-data="{ showComments: true, expanded: false }"--}}
    {{-- class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">--}}

    {{-- <!-- Post Header -->--}}
    {{-- <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">--}}
    {{-- <flux:avatar--}}
    {{-- src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : 'https://www.gravatar.com/avatar/?d=mp' }}"--}}
    {{-- alt="{{ $post->author->name }}" />--}}
    {{-- <div class="flex-1 text-left">--}}
    {{-- <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">--}}
    {{-- {{ $post->author->name }}--}}
    {{-- </flux:text>--}}
    {{-- <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">--}}
    {{-- {{ Str::limit($post->author->bio, 25, '...') }} • {{ $post->updated_at->diffForHumans() }}--}}
    {{-- </flux:text>--}}
    {{-- </div>--}}
    {{-- </div>--}}

    {{-- <!-- Post Content -->--}}
    {{-- <div class="p-4">--}}
    {{-- <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">--}}
    {{-- {{ $post->title }}--}}
    {{-- </flux:text>--}}

    {{-- <div>--}}
    {{-- <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4" x-show="!expanded" x-cloak>--}}
    {{-- {{ $shortContent }}--}}
    {{-- @if ($isLong)--}}
    {{-- <span @click="expanded = true"--}}
    {{-- class="text-indigo-600 dark:text-indigo-400 text-sm font-medium cursor-pointer">--}}
    {{-- ... See More--}}
    {{-- </span>--}}
    {{-- @endif--}}
    {{-- </flux:text>--}}
    {{-- <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4" x-show="expanded" x-cloak>--}}
    {{-- {{ $content }}--}}
    {{-- <span @click="expanded = false"--}}
    {{-- class="text-indigo-600 dark:text-indigo-400 text-sm font-medium cursor-pointer ml-1">--}}
    {{-- See Less--}}
    {{-- </span>--}}
    {{-- </flux:text>--}}
    {{-- </div>--}}

    {{-- @if ($post->featured_image)--}}
    {{-- <img src="{{ asset('storage/' . $post->featured_image) }}"--}}
    {{-- class="rounded-lg mb-4 w-full" alt="{{ $post->title }}">--}}
    {{-- @endif--}}

    {{-- <!-- Stats -->--}}
    {{-- <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">--}}
    {{-- <div class="flex items-center gap-2">--}}
    {{-- <flux:icon name="heart" size="sm" class="text-red-500" />--}}
    {{-- <span>{{ $post->liked_by_users_count }}</span>--}}
    {{-- </div>--}}
    {{-- <div class="flex items-center gap-4">--}}
    {{-- <span class="flex items-center gap-1">--}}
    {{-- <flux:icon name="chat-bubble-left" size="sm" />--}}
    {{-- {{ $post->comments_count }} comments--}}
    {{-- </span>--}}
    {{-- <span class="flex items-center gap-1">--}}
    {{-- <flux:icon name="save" size="sm" />--}}
    {{-- {{ $post->saved_by_users_count }} saves--}}
    {{-- </span>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}

    {{-- <!-- Comments -->--}}
    {{-- <div x-show="showComments" x-cloak x-transition class="mt-6 space-y-5 px-4">--}}

    {{-- @php--}}
    {{-- $commentsToShow = $expandedPosts[$post->id] ?? $commentsPerPage;--}}
    {{-- @endphp--}}

    {{-- @foreach ($post->comments->take($commentsToShow) as $comment)--}}
    {{-- <div class="flex items-start gap-3 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">--}}
    {{-- <flux:avatar size="sm"--}}
    {{-- src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : 'https://www.gravatar.com/avatar/?d=mp' }}"--}}
    {{-- alt="{{ $comment->name }}" />--}}
    {{-- <div class="flex-1">--}}
    {{-- <div class="flex justify-between items-center mb-1">--}}
    {{-- <flux:text size="sm" class="font-semibold text-zinc-900 dark:text-white">--}}
    {{-- {{ $comment->name }}--}}
    {{-- </flux:text>--}}
    {{-- <flux:text size="xs" class="text-zinc-400 dark:text-zinc-500">--}}
    {{-- {{ $comment->created_at->diffForHumans() }}--}}
    {{-- </flux:text>--}}
    {{-- </div>--}}
    {{-- <flux:text size="base" class="text-zinc-700 dark:text-zinc-300 leading-relaxed">--}}
    {{-- {{ $comment->content }}--}}
    {{-- </flux:text>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- @endforeach--}}

    {{-- @if ($post->comments_count > $commentsToShow)--}}
    {{-- <div class="text-center">--}}
    {{-- <flux:button--}}
    {{-- size="sm"--}}
    {{-- variant="primary"--}}
    {{-- wire:click="loadMoreComments({{ $post->id }})"--}}
    {{-- class="rounded-full px-6 py-2 cursor-pointer">--}}
    {{-- See More Comments--}}
    {{-- </flux:button>--}}
    {{-- </div>--}}
    {{-- @endif--}}

    {{-- <form wire:submit="addComment({{ $post->id }})" class="flex items-center gap-3 mt-4">--}}
    {{-- <flux:input--}}
    {{-- type="text"--}}
    {{-- wire:model="newCommentContent.{{ $post->id }}"--}}
    {{-- placeholder="Write a comment..."--}}
    {{-- autocomplete="off"--}}
    {{-- class="flex-1 rounded-full px-4 py-3" />--}}
    {{-- <flux:button--}}
    {{-- type="submit"--}}
    {{-- variant="primary"--}}
    {{-- class="rounded-full px-6 py-3 cursor-pointer">--}}
    {{-- Post--}}
    {{-- </flux:button>--}}
    {{-- </form>--}}

    {{-- </div>--}}

    {{-- <!-- Post Actions -->--}}
    {{-- <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">--}}
    {{-- <button wire:click="toggleLike({{ $post->id }})"--}}
    {{-- class="flex cursor-pointer items-center gap-2 {{ $isLiked ? 'text-red-500' : 'text-zinc-700 dark:text-zinc-300' }}">--}}
    {{-- <flux:icon name="heart" variant="solid" size="lg" />--}}
    {{-- Like--}}
    {{-- </button>--}}

    {{-- <flux:button variant="ghost" size="sm" class="cursor-pointer flex items-center gap-2 text-zinc-700 dark:text-zinc-300"--}}
    {{-- @click="showComments = !showComments">--}}
    {{-- <flux:icon name="chat-bubble-left" size="lg" />--}}
    {{-- Comment--}}
    {{-- </flux:button>--}}

    {{-- <button wire:click="toggleSave({{ $post->id }})"--}}
    {{-- class="cursor-pointer flex items-center gap-2 {{ $isSaved ? 'text-violet-500' : 'text-zinc-700 dark:text-zinc-300' }}">--}}
    {{-- <flux:icon name="save" size="lg" />--}}
    {{-- Save--}}
    {{-- </button>--}}
    {{-- </div>--}}
    {{-- </article>--}}

    {{-- </div>--}}
    {{-- </section>--}}

    {{-- </div>--}}
    <div class="max-w-3xl mx-auto px-4 py-10 space-y-8">

        {{-- title --}}
        <h1 class="text-4xl font-bold leading-tight">
            {{ $post->title }}
        </h1>

        {{-- post meta data --}}
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-4">
                @if($post->author->avatar)
                <img src="{{ asset('storage/' . $post->author->avatar) }}"
                    alt="{{ $post->author->name }}"
                    class="w-12 h-12 rounded-md ring-2 ring-blue-500 dark:ring-blue-500 object-cover border border-zinc-300 dark:border-zinc-600 shadow-sm">
                @else
                <div class="w-11 h-11 rounded-full bg-zinc-300 dark:bg-zinc-700 text-zinc-900 dark:text-white flex items-center justify-center font-semibold text-sm shadow">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>
                @endif
                <h5 class="text-[20px] font-bold text-zinc-800 dark:text-white">{{ $post->author->name }}</h5>
                @if(auth()->id() !== $post->author->id)
                <livewire:follow-author-component :author="$post->author" />
                @endif
            </div>
            <div class="flex items-center space-x-4">
                <livewire:save-post-component :post="$post" />
                <livewire:liked-post-component :post="$post" />
            </div>
        </div>
        {{-- Featured image --}}
        @if($post->featured_image)
        <img src="{{ asset('storage/'. $post->featured_image) }}" alt="{{ $post->title }}" class="rounded-2xl w-full max-h-[500px] object-cover shadow">
        @endif

        {{-- post content --}}
        <article class="prose dark:prose-invert max-w-none text-lg">
            {{ $post->content }}
        </article>
        {{-- comments section --}}
        <livewire:add-comment-component :post-id="$post->id" />
    </div>



</x-public.layouts>