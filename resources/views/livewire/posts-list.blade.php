<div>
    <!-- Hero Section -->
    <section class="bg-zinc-100 dark:bg-zinc-800 py-12">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-2 text-zinc-800 dark:text-white">
                    Community Posts
                </h2>
                <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300">
                    Discover what our community is sharing. Engage with developers worldwide.
                </flux:text>
            </div>

            <!-- Search Input -->
            <div class="mb-6">
                <flux:input type="text" wire:model.live="search" placeholder="Search posts..." icon="magnifying-glass"
                    autocomplete="off" size="lg" class="w-full" />
            </div>

            <!-- Filters -->
            <div
                class="bg-zinc-100 dark:bg-zinc-800 p-4 rounded-2xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                <!-- Tag Filter -->
                <flux:select wire:model.live="selectedTag" class="w-full">
                    <option value="">All Tags</option>
                    @foreach (App\Models\Tag::all() as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                </flux:select>

                <!-- Category Filter -->
                <flux:select wire:model.live="selectedCategoryId" class="w-full">
                    <option value="">All Categories</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </flux:select>

                <!-- Date Filter -->
                <flux:select wire:model.live="selectedDate" class="w-full">
                    <option value="">All Dates</option>
                    <option value="today">Today</option>
                    <option value="this_week">This Week</option>
                    <option value="this_month">This Month</option>
                    <option value="this_year">This Year</option>
                </flux:select>
            </div>
        </div>
    </section>

    <!-- Posts Feed -->
    <section class="py-8 bg-white dark:bg-zinc-900 flex-1">
        <div class="max-w-2xl mx-auto px-4 space-y-6">
            <div x-data="{
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
            }" x-init="init()">
                @forelse($posts as $post)
                    <div
                        class="border mb-8 border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">

                        <!-- Post Header with Author Info -->
                        <div
                            class="p-4 flex items-center justify-between border-b border-zinc-100 dark:border-zinc-700">
                            <div class="flex items-center gap-3">
                                @if ($post->author->avatar)
                                    <flux:avatar size="sm"
                                        src="{{ asset('storage/' . $post->author->avatar) }}" />
                                @else
                                    <flux:avatar size="sm" name="{{ $post->author->name }}" />
                                @endif
                                <span
                                    class="text-lg {{ $post->author->id == auth()->id() ? 'text-blue-600 dark:text-blue-400 font-medium' : '' }}">{{ $post->author->id == auth()->id() ? 'You' : ucfirst($post->author->name) }}</span>
                            </div>
                            @if (auth()->id() !== $post->author->id)
                                <div>
                                    <livewire:follow-author-component :author="$post->author" :key="'follow-' . $post->author->id . '-' . $post->id" />
                                </div>
                            @endif
                        </div>

                        <!-- Post Content -->
                        <div class="p-4">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="rounded-lg mb-4 w-full"
                                    alt="{{ $post->title }}">
                            @endif

                            <h3 class="text-lg font-bold mb-3 text-zinc-800 dark:text-white">
                                <a wire:navigate href="posts/{{ $post->slug }}"
                                    class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 flex items-center gap-2 group">
                                    {{ $post->title }}
                                    <flux:icon name="arrow-top-right-on-square" size="sm"
                                        class="opacity-0 group-hover:opacity-100 transition-opacity duration-200" />
                                </a>
                            </h3>

                            <div>
                                <flux:text size="base"
                                    class="line-clamp-2 text-justify text-zinc-600 dark:text-zinc-300 mb-4">
                                    {!! str($post->content)->sanitizeHtml() !!}

                                    @php
                                        $colors = ['blue', 'green', 'red', 'yellow', 'purple', 'pink', 'indigo'];
                                    @endphp

                                    @foreach ($post->tags as $tag)
                                        @php
                                            $index = crc32($tag->name) % count($colors);
                                            $color = $colors[$index];
                                        @endphp
                                        <flux:badge color="{{ $color }}" variant="subtle"
                                            class="float-right ml-2 mb-3">
                                            {{ $tag->name }}
                                        </flux:badge>
                                    @endforeach
                                </flux:text>
                            </div>

                            <!-- Post Stats with Read More Button -->
                            <div
                                class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2 opacity-60">
                                        <flux:icon name="like" size="sm" />
                                        <span>{{ $post->liked_by_users_count }}</span>
                                    </div>
                                    <span class="flex items-center gap-1 opacity-60">
                                        <flux:icon name="chat-bubble-left" size="sm" />
                                        {{ $post->comments_count }} comments
                                    </span>
                                    <span class="flex items-center gap-1 opacity-60">
                                        <flux:icon name="save" size="sm" />
                                        {{ $post->saved_by_users_count }} saves
                                    </span>
                                </div>

                                <!-- Read More Button -->
                                <div>
                                    <a wire:navigate href="posts/{{ $post->slug }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors duration-200">
                                        Read More
                                        <flux:icon name="arrow-right" size="sm" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </section>
</div>
