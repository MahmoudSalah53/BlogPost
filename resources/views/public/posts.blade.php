<x-public.layouts :title="__('Posts')">
    <main class="flex-1">
        <!-- Hero Section -->
        <section class="bg-zinc-100 dark:bg-zinc-800 py-12">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <flux:text as="h1" size="5xl" class="font-bold mb-4 text-zinc-900 dark:text-white">
                    Community Posts
                </flux:text>

                <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                    Discover what our community is sharing. Engage with developers worldwide.
                </flux:text>

                <div class="max-w-xl mx-auto">
                    <flux:input
                        type="text"
                        placeholder="Search posts..."
                        icon="magnifying-glass"
                        size="lg"
                        class="w-full" />
                </div>
            </div>
        </section>

        <!-- Posts Feed -->
        <section class="py-8 bg-white dark:bg-zinc-900">
            <div class="max-w-2xl mx-auto px-4 space-y-6">
                <!-- Post 1 -->
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

                <!-- Post 2 -->
                <article class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
                    <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
                        <flux:avatar
                            src="https://randomuser.me/api/portraits/men/75.jpg"
                            size="md"
                            alt="Michael Chen"
                            class="ring-2 ring-green-500" />
                        <div class="flex-1 text-left">
                            <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                                Michael Chen
                            </flux:text>
                            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                                PHP Core Contributor • 1d ago
                            </flux:text>
                        </div>
                        <flux:button
                            variant="ghost"
                            size="sm"
                            class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
                            <flux:icon name="ellipsis-horizontal" size="lg" />
                        </flux:button>
                    </div>

                    <div class="p-4">
                        <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">
                            PHP 8.3 Features You Should Know
                        </flux:text>
                        <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                            Having worked on the PHP 8.3 release, I want to highlight the most impactful new features that will change how you write PHP code...
                        </flux:text>
                        <img src="https://source.unsplash.com/random/800x400?php" class="rounded-lg mb-4 w-full" alt="PHP 8.3 code example">

                        <div class="flex flex-wrap gap-2 mb-4">
                            <flux:badge color="green">#PHP</flux:badge>
                            <flux:badge color="blue">#Backend</flux:badge>
                            <flux:badge color="orange">#Updates</flux:badge>
                        </div>

                        <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                            <div class="flex items-center gap-2">
                                <flux:icon name="heart" size="sm" class="text-red-500" />
                                <span>22 likes</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="flex items-center gap-1">
                                    <flux:icon name="chat-bubble-left" size="sm" />
                                    5 comments
                                </span>
                                <span class="flex items-center gap-1">
                                    <flux:icon name="arrow-path" size="sm" />
                                    1 share
                                </span>
                            </div>
                        </div>
                    </div>

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

                <!-- Post 3 -->
                <article class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
                    <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
                        <flux:avatar
                            src="https://randomuser.me/api/portraits/men/12.jpg"
                            size="md"
                            alt="Mohamed Alaa"
                            class="ring-2 ring-green-500" />
                        <div class="flex-1 text-left">
                            <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                                Mohamed Alaa
                            </flux:text>
                            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                                Full-stack Dev • 10h ago
                            </flux:text>
                        </div>
                        <flux:button variant="ghost" size="sm" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
                            <flux:icon name="ellipsis-horizontal" size="lg" />
                        </flux:button>
                    </div>

                    <div class="p-4">
                        <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">
                            REST vs GraphQL: Which One to Use?
                        </flux:text>
                        <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                            Understanding the trade-offs between REST APIs and GraphQL can save you a lot of headache in future projects. Here's what you need to know...
                        </flux:text>
                        <img src="https://source.unsplash.com/random/800x400?graphql" class="rounded-lg mb-4 w-full" alt="GraphQL REST">

                        <div class="flex flex-wrap gap-2 mb-4">
                            <flux:badge color="cyan">#API</flux:badge>
                            <flux:badge color="indigo">#GraphQL</flux:badge>
                            <flux:badge color="gray">#REST</flux:badge>
                        </div>

                        <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                            <div class="flex items-center gap-2">
                                <flux:icon name="heart" size="sm" class="text-red-500" />
                                <span>60 likes</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="flex items-center gap-1">
                                    <flux:icon name="chat-bubble-left" size="sm" />
                                    14 comments
                                </span>
                                <span class="flex items-center gap-1">
                                    <flux:icon name="arrow-path" size="sm" />
                                    4 shares
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="heart" size="lg" />
                            Like
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="chat-bubble-left" size="lg" />
                            Comment
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="arrow-path" size="lg" />
                            Share
                        </flux:button>
                    </div>
                </article>

                <!-- Post 4 -->
                <article class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
                    <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
                        <flux:avatar
                            src="https://randomuser.me/api/portraits/men/77.jpg"
                            size="md"
                            alt="Omar Tarek"
                            class="ring-2 ring-cyan-500" />
                        <div class="flex-1 text-left">
                            <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                                Omar Tarek
                            </flux:text>
                            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                                Mobile Developer • 3h ago
                            </flux:text>
                        </div>
                        <flux:button variant="ghost" size="sm" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
                            <flux:icon name="ellipsis-horizontal" size="lg" />
                        </flux:button>
                    </div>

                    <div class="p-4">
                        <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">
                            Flutter vs React Native: My Honest Opinion in 2025
                        </flux:text>
                        <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                            After building multiple apps with both Flutter and React Native, here's what I really think developers should know in 2025...
                        </flux:text>
                        <img src="https://source.unsplash.com/random/800x400?flutter,code" class="rounded-lg mb-4 w-full" alt="Mobile development">

                        <div class="flex flex-wrap gap-2 mb-4">
                            <flux:badge color="teal">#Flutter</flux:badge>
                            <flux:badge color="violet">#ReactNative</flux:badge>
                            <flux:badge color="yellow">#Mobile</flux:badge>
                        </div>

                        <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                            <div class="flex items-center gap-2">
                                <flux:icon name="heart" size="sm" class="text-red-500" />
                                <span>38 likes</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="flex items-center gap-1">
                                    <flux:icon name="chat-bubble-left" size="sm" />
                                    10 comments
                                </span>
                                <span class="flex items-center gap-1">
                                    <flux:icon name="arrow-path" size="sm" />
                                    2 shares
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="heart" size="lg" />
                            Like
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="chat-bubble-left" size="lg" />
                            Comment
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="arrow-path" size="lg" />
                            Share
                        </flux:button>
                    </div>
                </article>

                <!-- Post 5 -->
                <article class="border border-zinc-200 dark:border-zinc-700 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-sm">
                    <div class="p-4 flex items-center gap-3 border-b border-zinc-100 dark:border-zinc-700">
                        <flux:avatar
                            src="https://randomuser.me/api/portraits/men/85.jpg"
                            size="md"
                            alt="Youssef Adel"
                            class="ring-2 ring-indigo-500" />
                        <div class="flex-1 text-left">
                            <flux:text as="h3" size="base" class="font-semibold text-zinc-800 dark:text-white">
                                Youssef Adel
                            </flux:text>
                            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">
                                Dev Team Lead • 8h ago
                            </flux:text>
                        </div>
                        <flux:button variant="ghost" size="sm" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
                            <flux:icon name="ellipsis-horizontal" size="lg" />
                        </flux:button>
                    </div>

                    <div class="p-4">
                        <flux:text as="h2" size="xl" class="font-bold mb-3 text-zinc-800 dark:text-white">
                            Monorepo Strategy for Scalable Teams
                        </flux:text>
                        <flux:text size="base" class="text-zinc-600 dark:text-zinc-300 mb-4">
                            Managing multiple apps with a monorepo isn't just trendy — it’s practical. Here's how our team used Nx to boost productivity and reduce deployment time.
                        </flux:text>
                        <img src="https://source.unsplash.com/random/800x400?devops,teamwork" class="rounded-lg mb-4 w-full" alt="Monorepo tools">

                        <div class="flex flex-wrap gap-2 mb-4">
                            <flux:badge color="gray">#Monorepo</flux:badge>
                            <flux:badge color="indigo">#Architecture</flux:badge>
                            <flux:badge color="lime">#Teamwork</flux:badge>
                        </div>

                        <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-100 dark:border-zinc-700 pt-3">
                            <div class="flex items-center gap-2">
                                <flux:icon name="heart" size="sm" class="text-red-500" />
                                <span>54 likes</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="flex items-center gap-1">
                                    <flux:icon name="chat-bubble-left" size="sm" />
                                    17 comments
                                </span>
                                <span class="flex items-center gap-1">
                                    <flux:icon name="arrow-path" size="sm" />
                                    6 shares
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-t border-zinc-100 dark:border-zinc-700 flex justify-between">
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="heart" size="lg" />
                            Like
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="chat-bubble-left" size="lg" />
                            Comment
                        </flux:button>
                        <flux:button variant="ghost" size="sm" class="flex items-center gap-2 text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="arrow-path" size="lg" />
                            Share
                        </flux:button>
                    </div>
                </article>


                <!-- Pagination -->
                <div class="flex justify-center mt-12 gap-2">
                    <flux:button variant="outline" icon="chevron-left" disabled>Previous</flux:button>
                    <flux:button variant="filled">1</flux:button>
                    <flux:button variant="outline">2</flux:button>
                    <flux:button variant="outline">3</flux:button>
                    <flux:button variant="outline" icon="chevron-right" icon-position="end">Next</flux:button>
                </div>
            </div>
        </section>
    </main>


</x-public.layouts>