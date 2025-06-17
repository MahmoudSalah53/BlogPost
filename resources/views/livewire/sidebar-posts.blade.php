<div>
    <flux:sidebar sticky stashable
        class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700 w-72">

        <div class="px-4 py-4 space-y-6">

            <!-- Categories - Scrollable -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                        Categories
                    </flux:text>
                    <flux:badge size="sm" class="bg-zinc-200 dark:bg-zinc-700">{{ $categories->count() }}</flux:badge>
                </div>

                <div class="max-h-60 overflow-y-auto pr-2">
                    <flux:navlist variant="ghost" class="space-y-1">
                        <flux:navlist.item
                            icon="list-bullet"
                            wire:click="selectCategory(null)"
                            :current="$selectedCategory === null">
                            All Categories
                        </flux:navlist.item>

                        @forelse($categories as $category)
                        <flux:navlist.item
                            icon="tag"
                            wire:click="selectCategory({{ $category->id }})"
                            :current="$selectedCategory === $category->id">
                            {{ $category->name }}
                        </flux:navlist.item>

                        @empty
                        <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                            Not Found
                        </flux:text>
                        @endforelse
                    </flux:navlist>
                </div>

            </div>

            <!-- Tags - Searchable and Scrollable -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                        Popular Tags
                    </flux:text>
                    <flux:badge size="sm" class="bg-zinc-200 dark:bg-zinc-700">24</flux:badge>
                </div>

                <div class="max-h-48 overflow-y-auto pr-2">
                    <div class="flex flex-wrap gap-2">
                        @forelse($tags as $tag)
                        <flux:badge color="blue" clickable active>#{{ $tag->name }}</flux:badge>
                        @empty
                        <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white">
                            Not Found
                        </flux:text>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Date Filter - Improved -->
            <div>
                <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-2">
                    Publication Date
                </flux:text>

                <div class="space-y-2">
                    <flux:radio.group>
                        <flux:radio name="date_filter" value="all" label="All Time" />
                        <flux:radio name="date_filter" value="today" label="Today" />
                        <flux:radio name="date_filter" value="week" label="This Week" />
                        <flux:radio name="date_filter" value="month" label="This Month" />
                        <flux:radio name="date_filter" value="year" label="This Year" />
                    </flux:radio.group>

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
</div>