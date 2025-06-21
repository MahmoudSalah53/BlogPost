<div class="max-w-7xl mx-auto p-6">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-1 text-foreground">All Comments</h1>
            <flex:text>See all your previous comments.</flex:text>
        </div>
    </div>

    <flux:separator />

    {{-- comments table --}}
    <div class="overflow-auto rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-sm mt-8">
        <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700 text-sm">
            <thead class="bg-zinc-50 dark:bg-zinc-800">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                        Post
                    </th>
                    <th class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                        Content
                    </th>
                    <th class="px-6 py-3 text-left font-semibold text-zinc-700 dark:text-white">
                        Date
                    </th>
                    <th class="px-6 py-3 text-center font-semibold text-zinc-700 dark:text-white">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 bg-white dark:bg-zinc-900">
                @forelse($comments as $comment)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition" wire:key="{{ $comment->id }}">
                        <td class="px-6 py-4 text-zinc-900 dark:text-zinc-100">
                            <a href="{{ route('posts.show', $comment->post->slug) }}"
                               class="text-primary hover:underline">
                                {{ $comment->post->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-zinc-700 dark:text-zinc-300">
                            {{ Str::limit($comment->content, 100) }}
                        </td>
                        <td class="px-6 py-4 text-zinc-700 dark:text-zinc-300">
                            {{ $comment->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2.5">
                                <livewire:delete-my-comment :comment-id="$comment->id" wire:key="delete-comment-{{ $comment->id }}" />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4 text-muted-foreground">
                            You don't have any comments yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $comments->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>