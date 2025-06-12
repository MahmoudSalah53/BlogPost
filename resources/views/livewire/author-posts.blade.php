<div class="max-w-7xl mx-auto p-6">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-1 text-foreground">All Posts</h1>
            <flex:text>Here you can mange you posts</flex:text>
        </div>
        <flux:button variant="primary">
            <a wire:navigate href="{{ route('author.posts.create') }}"
               class="flex items-center gap-1 w-full text-sm text-muted-foreground hover:text-primary transition">
                New Post
            </a>
        </flux:button>
    </div>
    <flux:separator/>

    {{-- posts table --}}
    <div class="overflow-auto rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-sm mt-8">
        <table class="min-w-full overflow-x-auto divide-y divide-zinc-200 dark:divide-zinc-700 text-sm">
            <thead class="bg-zinc-50 dark:bg-zinc-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Author
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Categories
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Tags
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                    Action
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 bg-white dark:bg-zinc-900">
            @forelse($posts as $post)
                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition" wire:key="{{ $post->id }}">
                    <td class="px-6 py-4 text-zinc-900 dark:text-zinc-100">{{  $post->title }}</td>
                    <td class="px-6 py-4 text-zinc-900 dark:text-zinc-100">{{ $post->author->name }}</td>
                    <td class="px-6 py-4 text-zinc-900 dark:text-zinc-100">{{ $post->categories->pluck('name')->implode(' ,') }}</td>
                    <td class="px-6 py-4 text-zinc-900 dark:text-zinc-100">{{ $post->tags->pluck('name')->implode(' ,') }}</td>
                    <td class="px-6 py-4 text-zinc-700 dark:text-zinc-300">
                        @if($post->status === 'published')
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            published
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 min-w-fit">{{ $post->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4 text-right">

                        <div class="flex items-center justify-center gap-2.5">
                            <a wire:navigate href="{{ route('author.posts.edit') }}">
                                <flux:icon.pencil-square class="hover:text-blue-500 w-full"/>
                            </a>
                            <a wire:click="delete($post->id)">
                                <flux:icon.trash class="hover:text-red-500 cursor-pointer w-full"/>
                            </a>
                        </div>

                    </td>
                </tr>
            @empty
                You Don't Have Any Posts
            @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

</div>

