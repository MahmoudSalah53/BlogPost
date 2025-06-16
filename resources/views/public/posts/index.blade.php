<x-public.layouts :title="__('Posts')">
    <div class="flex min-h-screen">
        <flux:sidebar sticky stashable
            class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700 w-72">

            <div class="px-4 py-4 space-y-6">

                <!-- Search Input -->
                <div class="mb-4">
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-2">
                        Search
                    </flux:text>
                    <flux:input placeholder="Filter articles..." icon="magnifying-glass" />
                </div>

                <!-- Categories - Scrollable -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                            Categories
                        </flux:text>
                        <flux:badge size="sm" class="bg-zinc-200 dark:bg-zinc-700">24</flux:badge>
                    </div>

                    <div class="max-h-60 overflow-y-auto pr-2">
                        <flux:navlist variant="ghost" class="space-y-1">
                            <flux:navlist.item icon="list-bullet" current>All Categories</flux:navlist.item>
                            <flux:navlist.item icon="server-stack">Backend Development</flux:navlist.item>
                            <flux:navlist.item icon="window">Frontend Development</flux:navlist.item>
                            <flux:navlist.item icon="server">Database</flux:navlist.item>
                            <flux:navlist.item icon="phone">Mobile</flux:navlist.item>
                            <flux:navlist.item icon="lock-closed">Security</flux:navlist.item>
                            <flux:navlist.item icon="light-bulb">Best Practices</flux:navlist.item>
                        </flux:navlist>
                    </div>
                </div>

                <!-- Tags - Searchable and Scrollable -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                            Popular Tags
                        </flux:text>
                        <flux:button  size="sm" icon="plus">More</flux:button>
                    </div>

                    <div class="mb-2">
                        <flux:input placeholder="Search tags..." size="sm" />
                    </div>

                    <div class="max-h-48 overflow-y-auto pr-2">
                        <div class="flex flex-wrap gap-2">
                            <flux:badge color="blue" clickable active>#Laravel</flux:badge>
                            <flux:badge color="emerald" clickable>#PHP</flux:badge>
                            <flux:badge color="purple" clickable>#Vue</flux:badge>
                            <flux:badge color="sky" clickable>#Tailwind</flux:badge>
                            <flux:badge color="amber" clickable>#React</flux:badge>
                            <flux:badge color="rose" clickable>#MySQL</flux:badge>
                            <flux:badge color="fuchsia" clickable>#Livewire</flux:badge>
                            <flux:badge color="indigo" clickable>#AlpineJS</flux:badge>
                            <flux:badge color="teal" clickable>#Inertia</flux:badge>
                            <flux:badge color="orange" clickable>#JavaScript</flux:badge>
                            <flux:badge color="cyan" clickable>#CSS</flux:badge>
                            <flux:badge color="violet" clickable>#TypeScript</flux:badge>
                        </div>
                    </div>
                </div>

                <!-- Date Filter - Improved -->
                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-2">
                        Publication Date
                    </flux:text>

                    <div class="space-y-2">
                        <flux:radio name="date_filter" value="all" checked>All Time</flux:radio>
                        <flux:radio name="date_filter" value="today">Today</flux:radio>
                        <flux:radio name="date_filter" value="week">This Week</flux:radio>
                        <flux:radio name="date_filter" value="month">This Month</flux:radio>
                        <flux:radio name="date_filter" value="year">This Year</flux:radio>

                        <div class="pt-2">
                            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400 mb-1">Custom Range</flux:text>
                            <div class="grid grid-cols-2 gap-2">
                                <flux:input type="date" size="sm" placeholder="Start date" />
                                <flux:input type="date" size="sm" placeholder="End date" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-4 flex space-x-2">
                    <flux:button variant="outline" icon="arrow-path" size="sm" class="flex-1">
                        Reset
                    </flux:button>
                    <flux:button icon="funnel" size="sm" class="flex-1">
                        Apply
                    </flux:button>
                </div>
            </div>
        </flux:sidebar>

        <div class="flex-1 flex flex-col">
            <main class="flex-1">
                <livewire:posts-list />
            </main>


</x-public.layouts>