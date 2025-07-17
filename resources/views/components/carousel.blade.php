@props(['posts', 'title'])

<div class="swiper space-y-4">
    {{-- title and navigation arrows --}}
    <div class=" flex justify-between items-center">
        <flux:heading class="text-xl font-semibold">
            {{ $title }}
        </flux:heading>
        <div class="space-x-2 flex ">
            <button
                class="swiper-button-prev flex items-center justify-center w-8 h-8 bg-gray-100 dark:bg-zinc-700 rounded-full shadow  dark:hover:bg-zinc-600">
                <flux:icon.chevron-left />
            </button>
            <button
                class="swiper-button-next flex items-center justify-center w-8 h-8 bg-gray-100 dark:bg-zinc-700 rounded-full shadow  dark:hover:bg-zinc-600">
                <flux:icon.chevron-right />
            </button>
        </div>
    </div>

    {{-- Check if posts exist --}}
    @if($posts && $posts->count() > 0)
        {{-- slides --}}
        <div class="swiper-wrapper mb-8">
            @foreach($posts as $post)
            <div class="swiper-slide p-2">
                <div
                    class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700 h-full  flex flex-col">
                    {{-- post image --}}
                    <div class="relative h-48 w-full overflow-hidden rounded-t-xl flex items-center justify-center bg-gray-100 dark:bg-zinc-700">
                        @if($post->featured_image)
                        <img
                            src="{{ asset('storage/' . $post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="absolute inset-0 w-full h-full object-cover" />
                        @else
                        <div class="text-center">
                            <flux:icon name="photo" class="text-zinc-400 w-10 h-10 mx-auto mb-1" />
                            <flux:text size="xs" class="text-zinc-500">No Image</flux:text>
                        </div>
                        @endif
                    </div>

                    {{-- post body --}}
                    <div class="p-5 flex flex-col flex-1">
                        {{-- post meta data --}}
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                            <flux:text>{{ $post->categories->pluck('name')->join(', ') }}</flux:text>
                            <span class="mx-2">•</span>
                            <flux:text>{{ $post->created_at->diffForHumans() }}</flux:text>
                            <flux:badge color="lime" class="ml-auto">New</flux:badge>
                        </div>
                        {{-- post title --}}
                        <flux:heading level="3"
                            class="text-xl font-semibold text-gray-800 dark:text-white mb-2 text-justify line-clamp-2">
                            {{ $post->title }}
                        </flux:heading>
                        {{-- post excerpt --}}
                        <flux:text class="line-clamp-3 text-gray-600 dark:text-gray-300 mb-4 text-justify grow">
                            {{ Str::limit($post->content, 25, '...') }}
                        </flux:text>
                        {{-- post footer [links , likes, comments] --}}
                        <div class="flex justify-between items-center mt-auto">
                            <flux:link href="{{ route('posts.show', $post->slug) }}"
                                class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                {{ __('Read More') }}
                            </flux:link>
                            <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                                <span class="flex items-center gap-1">
                                    <flux:icon.heart class="far" />
                                    <flux:text>{{ $post->liked_by_users_count }}</flux:text>
                                </span>

                                <span class="flex items-center gap-1">
                                    <flux:icon.comments class="far" />
                                    <flux:text>{{ $post->comments_count }}</flux:text>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    @else
        {{-- Empty state message --}}
        <div class="text-center py-12">
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-100 dark:border-zinc-700 p-8">
                <flux:text class="text-gray-500 dark:text-gray-400 text-lg">
                    No posts available at the moment.
                </flux:text>
            </div>
        </div>
    @endif

</div>