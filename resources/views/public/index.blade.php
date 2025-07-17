<x-public.layouts :title="__('Home')">
    <!-- Hero Section -->
    <div class="relative bg-zinc-100 dark:bg-zinc-900 pt-20 pb-13">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <flux:heading
                    level="1"
                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('Share Your Stories') }}
                </flux:heading>

                <div class="flex justify-center gap-1">
                    <flux:text class="text-xl text-zinc-800 dark:text-gray-300">
                        {{ __('Connect with friends and the world around you on') }}
                    </flux:text>
                    <flux:text variant="strong" class="text-xl text-black dark:text-white">
                        {{ __('BlogPost') }}
                    </flux:text>
                    <flux:text class="text-xl text-gray-600 dark:text-white">.</flux:text>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                    @guest
                    <flux:button
                        wire:navigate
                        variant="primary"
                        class="px-8 py-5"
                        href="{{route('login')}}">
                        <flux:icon.user-plus />
                        {{ __('Join Now') }}
                    </flux:button>
                    @endguest
                    @auth
                    <flux:button
                        wire:navigate
                        class="px-8 py-5"
                        href="{{ route('posts.index') }}">
                        <flux:icon.arrow-right-circle />
                        {{ __('Explore Posts') }}
                    </flux:button>
                    @endauth
                </div>
            </div>

        </div>
    </div>

    <!-- New Posts carousel -->
    <x-container class="mt-8 pt-10">
        <x-carousel :title="__('New Posts')" :posts="$newPosts"></x-carousel>
    </x-container>

    <!-- Popular Categories -->
    <x-container>
        <flux:heading class="text-xl font-semibold mb-6">
            {{ __(' Popular Categories') }}
        </flux:heading>
    </x-container>
    <x-container>
        @if($popularCategories && $popularCategories->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($popularCategories as $category)
                <a
                    wire:navigate
                    href="#"
                    class="block p-5 bg-white dark:bg-zinc-700 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700 text-center cursor-pointer">
                    <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                        {{ $category->name }}
                    </flux:text>
                    <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        {{ $category->posts_count }} posts
                    </flux:text>
                </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-100 dark:border-zinc-700 p-8">
                    <flux:text class="text-gray-500 dark:text-gray-400 text-lg">
                        No popular categories available at the moment.
                    </flux:text>
                </div>
            </div>
        @endif
    </x-container>

    <!-- Preferred Posts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 my-5">
        <div class="flex justify-between items-center mb-8">
            <flux:heading level="2" class="text-3xl font-bold text-gray-800 dark:text-white">
                {{ __('Preferred Posts') }}
            </flux:heading>
            @if($popularPosts && $popularPosts->count() > 3)
                <flux:link
                    wire:navigate
                    href="{{ route('posts.index') }}"
                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium gap-1"
                    style="display:flex;">
                    {{ __('View All') }}
                    <flux:icon.arrow-right variant="mini" />
                </flux:link>
            @endif
        </div>

        @if($popularPosts && $popularPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($popularPosts as $post)
                <!-- Post 1 -->
                <div
                    class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700">
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

                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                            <flux:text>{{ $post->categories->pluck('name')->join(', ') }}</flux:text>
                            <span class="mx-2">•</span>
                            <flux:text>{{ $post->created_at->diffForHumans() }}</flux:text>
                        </div>
                        <flux:heading level="3" class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                            {{ $post->title }}
                        </flux:heading>
                        <flux:text class="text-gray-600 dark:text-gray-300 mb-4">
                            {{ Str::limit($post->content, 25, '...') }}
                        </flux:text>
                        <div class="flex justify-between items-center">
                            <flux:link href="{{ route('posts.show', $post->slug) }}"
                                class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                Read More
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
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-100 dark:border-zinc-700 p-8">
                    <flux:text class="text-gray-500 dark:text-gray-400 text-lg">
                        No popular posts available at the moment.
                    </flux:text>
                </div>
            </div>
        @endif
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 my-10">
        <hr class="border-2 border-gray-300 dark:border-zinc-600 rounded" />
    </div>

    <!-- Subscription Area -->
    <div
        class="max-w-md mx-auto p-6 mb-10 bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-gray-200 dark:border-zinc-700">
        <flux:heading level="2" class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
            Buy Subscription
        </flux:heading>

        <form class="space-y-5">
            <div>
                <flux:input
                    type="text"
                    label="Full Name"
                    placeholder="Enter your full name"
                    required />
            </div>

            <div>
                <flux:input
                    type="email"
                    label="Email Address"
                    placeholder="your@email.com"
                    required />
            </div>

            <div>
                <flux:select label="Subscription Plan" required>
                    <option value="" disabled selected>Select a plan</option>
                    <option value="monthly">Monthly - $10</option>
                    <option value="yearly">Yearly - $100</option>
                </flux:select>
            </div>

            <div>
                <flux:input
                    type="text"
                    label="Card Number"
                    placeholder="1234 5678 9012 3456"
                    required />
            </div>

            <div class="flex gap-4">
                <flux:input
                    type="text"
                    label="Expiry Date"
                    placeholder="MM/YY"
                    required />
                <flux:input
                    type="text"
                    label="CVC"
                    placeholder="123"
                    required />
            </div>

            <flux:button type="submit" variant="primary" class="w-full">
                Buy Now
            </flux:button>
        </form>
    </div>
    @push('carousel')
    @vite('resources/js/carousel.js')
    @endpush
</x-public.layouts>