<x-public.layouts :title="__('Home')">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-50 to-purple-50 pt-20 pb-13">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <flux:heading
                    level="1"
                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                    Share Your Stories
                </flux:heading>

                <div class="flex justify-center gap-1">
                    <flux:text class="text-xl text-gray-600">
                        Connect with friends and the world around you on
                    </flux:text>
                    <flux:text variant="strong" class="text-xl text-black-50">
                        BlogPost
                    </flux:text>
                    <flux:text class="text-xl text-gray-600">.</flux:text>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                    @guest
                    <flux:button
                        variant="primary"
                        class="px-8 py-5"
                        href="{{route('register')}}">
                        <flux:icon.user-plus />
                        Join Now
                    </flux:button>
                    @endguest
                    @auth
                    <flux:button
                        class="px-8 py-5"
                        href="#">
                        <flux:icon.arrow-right-circle />
                        Explore Posts
                    </flux:button>
                    @endauth
                </div>
            </div>

        </div>
    </div>

    <!-- New Posts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 my-5">
        <flux:heading level="2" class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">
            New Posts
            <span class="ml-2 text-indigo-500">•</span>
            <span class="ml-2 text-sm font-medium text-indigo-600 dark:text-indigo-400">
                Scroll to discover →
            </span>
        </flux:heading>

        <div class="relative">
            <div class="flex overflow-x-auto gap-6 pb-6 -mx-4 px-4 scrollbar-hide">

                <!-- Post 1 -->
                <div class="min-w-[300px] bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-5 flex-shrink-0 border border-gray-100 dark:border-zinc-700">
                    <div class="relative overflow-hidden rounded-lg mb-4 h-40 w-full">
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=300&h=160&fit=crop"
                            alt="Exploring New Frontiers"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>

                    <!-- Category and Date -->
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Technology</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 15, 2023</flux:text>
                    </div>

                    <flux:text class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">Exploring New Frontiers</flux:text>
                    <flux:text class="text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                        Discover the latest trends in technology and how they're shaping our future...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            Read More
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Post 2 -->
                <div class="min-w-[300px] bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-5 flex-shrink-0 border border-gray-100 dark:border-zinc-700">
                    <div class="relative overflow-hidden rounded-lg mb-4 h-40 w-full">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=300&h=160&fit=crop"
                            alt="Nature's Wonders"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>

                    <!-- Category and Date -->
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Travel</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 10, 2023</flux:text>
                    </div>

                    <flux:text class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">Nature's Wonders</flux:text>
                    <flux:text class="text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                        Discover the latest trends in technology and how they're shaping our future...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            Read More
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Post 3 -->
                <div class="min-w-[300px] bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-5 flex-shrink-0 border border-gray-100 dark:border-zinc-700">
                    <div class="relative overflow-hidden rounded-lg mb-4 h-40 w-full">
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=300&h=160&fit=crop"
                            alt="Urban Exploration"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>

                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Lifestyle</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 8, 2023</flux:text>
                    </div>

                    <flux:text class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">Urban Exploration</flux:text>
                    <flux:text class="text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                        Discover the latest trends in technology and how they're shaping our future...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            Read More
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Post 4 -->
                <div class="min-w-[300px] bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-5 flex-shrink-0 border border-gray-100 dark:border-zinc-700">
                    <div class="relative overflow-hidden rounded-lg mb-4 h-40 w-full">
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=300&h=160&fit=crop"
                            alt="Culinary Adventures"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>

                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Food</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 1, 2023</flux:text>
                    </div>

                    <flux:text class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">Culinary Adventures</flux:text>
                    <flux:text class="text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                        Discover the latest trends in technology and how they're shaping our future...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            Read More
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Post 5 -->
                <div class="min-w-[300px] bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-5 flex-shrink-0 border border-gray-100 dark:border-zinc-700">
                    <div class="relative overflow-hidden rounded-lg mb-4 h-40 w-full">
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=300&h=160&fit=crop"
                            alt="Digital Nomad Life"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>

                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Work</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>April 25, 2023</flux:text>
                    </div>

                    <flux:text class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">Digital Nomad Life</flux:text>
                    <flux:text class="text-gray-600 dark:text-gray-300 line-clamp-3 mb-4">
                        Discover the latest trends in technology and how they're shaping our future...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            Read More
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Popular Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 my-5">
        <flux:heading level="2" class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">
            Popular Categories
        </flux:heading>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <a href="#technology" class="block p-5 bg-white dark:bg-zinc-800 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 text-center cursor-pointer">
                <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                    Technology
                </flux:text>
                <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    24 posts
                </flux:text>
            </a>
            <a href="#health" class="block p-5 bg-white dark:bg-zinc-800 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 text-center cursor-pointer">
                <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                    Health
                </flux:text>
                <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    18 posts
                </flux:text>
            </a>
            <a href="#travel" class="block p-5 bg-white dark:bg-zinc-800 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 text-center cursor-pointer">
                <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                    Travel
                </flux:text>
                <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    12 posts
                </flux:text>
            </a>
            <a href="#food" class="block p-5 bg-white dark:bg-zinc-800 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 text-center cursor-pointer">
                <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                    Food
                </flux:text>
                <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    9 posts
                </flux:text>
            </a>
            <a href="#lifestyle" class="block p-5 bg-white dark:bg-zinc-800 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 text-center cursor-pointer">
                <flux:text class="font-semibold text-lg text-gray-800 dark:text-white">
                    Lifestyle
                </flux:text>
                <flux:text class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    15 posts
                </flux:text>
            </a>
        </div>
    </div>

    <!-- Preferred Posts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 my-5">
        <div class="flex justify-between items-center mb-8">
            <flux:heading level="2" class="text-3xl font-bold text-gray-800 dark:text-white">
                Preferred Posts
            </flux:heading>
            <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium gap-1" style="display:flex;">
                View All
                <flux:icon.arrow-right variant="mini" />
            </flux:link>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Post 1 -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700">
                <div class="relative h-48 w-full overflow-hidden rounded-t-xl">
                    <img
                        src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=600&h=400&fit=crop"
                        alt="Tech Innovations"
                        class="absolute inset-0 w-full h-full object-cover" />
                </div>
                <div class="p-5">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Technology</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 15, 2023</flux:text>
                    </div>
                    <flux:heading level="3" class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Latest Tech Innovations
                    </flux:heading>
                    <flux:text class="text-gray-600 dark:text-gray-300 mb-4">
                        Discover the newest technological breakthroughs that are changing our world...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                            Read More
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>42</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>8</flux:text>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post 2 -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700">
                <div class="relative h-48 w-full overflow-hidden rounded-t-xl">
                    <img
                        src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=600&h=400&fit=crop"
                        alt="Mountain Adventure"
                        class="absolute inset-0 w-full h-full object-cover" />
                </div>
                <div class="p-5">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Travel</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 10, 2023</flux:text>
                    </div>
                    <flux:heading level="3" class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Mountain Adventure Guide
                    </flux:heading>
                    <flux:text class="text-gray-600 dark:text-gray-300 mb-4">
                        Essential tips for your next mountain hiking trip to ensure safety and enjoyment...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                            Read More
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>36</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>5</flux:text>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post 3 -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-zinc-700">
                <div class="relative h-48 w-full overflow-hidden rounded-t-xl">
                    <img
                        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&h=400&fit=crop"
                        alt="Healthy Eating"
                        class="absolute inset-0 w-full h-full object-cover" />
                </div>
                <div class="p-5">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <flux:text>Health</flux:text>
                        <span class="mx-2">•</span>
                        <flux:text>May 5, 2023</flux:text>
                    </div>
                    <flux:heading level="3" class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Healthy Eating Habits
                    </flux:heading>
                    <flux:text class="text-gray-600 dark:text-gray-300 mb-4">
                        Simple changes to your diet that can significantly improve your overall health and wellbeing...
                    </flux:text>
                    <div class="flex justify-between items-center">
                        <flux:link href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                            Read More
                        </flux:link>
                        <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <flux:icon.heart class="far" />
                                <flux:text>29</flux:text>
                            </span>
                            <span class="flex items-center gap-1">
                                <flux:icon.comments class="far" />
                                <flux:text>3</flux:text>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 my-10">
  <hr class="border-2 border-gray-300 dark:border-zinc-600 rounded" />
</div>

    <!-- Subscription Area -->
    <div class="max-w-md mx-auto p-6 bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-gray-200 dark:border-zinc-700">
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





    <script>
        const slider = document.querySelector('.overflow-x-auto');

        slider.addEventListener('wheel', (e) => {
            e.preventDefault();
            slider.scrollLeft += e.deltaY;
        });
    </script>
</x-public.layouts>