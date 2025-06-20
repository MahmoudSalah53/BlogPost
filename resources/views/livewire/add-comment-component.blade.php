<div class="mt-10 border-t border-zinc-300 dark:border-zinc-600 pt-8">
    <h2 class="text-2xl font-bold text-foreground mb-6">Comments</h2>

    {{-- Show Comments --}}
    @forelse($comments as $comment)
        <div class="flex items-start gap-4 mb-6">
            {{-- Circle Avatar with Initial or Image --}}
            @if($comment->user->avatar)
                <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                     alt="{{ $comment->user->name }}"
                     class="w-11 h-11 rounded-full object-cover border border-zinc-300 dark:border-zinc-600 shadow-sm">
            @else
                <div class="w-11 h-11 rounded-full bg-zinc-300 dark:bg-zinc-700 text-zinc-900 dark:text-white flex items-center justify-center font-semibold text-sm shadow">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>
            @endif

            {{-- Comment Body --}}
            <div class="flex-1 bg-zinc-100 dark:bg-zinc-900 rounded-xl px-4 py-3 shadow-sm">
                <div class="flex items-center justify-between mb-1">
                    <span class="font-semibold text-zinc-900 dark:text-white text-sm">
                        {{ $comment->user->name }}
                    </span>
                    <span class="text-xs text-zinc-500 dark:text-zinc-400">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="text-sm text-zinc-700 dark:text-zinc-200 leading-relaxed">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <div class="text-center py-10 text-zinc-500 dark:text-zinc-400">
            No comments yet. Be the first to comment!
        </div>
    @endforelse

    {{-- Add Comment --}}
    @auth
        <form wire:submit="save" class="space-y-4 pt-4">
            <flux:textarea style="resize: none;" wire:model.defer="content" required placeholder="Write your comment..."
                class="bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-600 text-zinc-800 dark:text-zinc-100 rounded-xl shadow-sm px-4 py-3" />

            <div class="text-right">
                <flux:button type="submit" variant="primary">
                    Submit
                </flux:button>
            </div>
        </form>
    @else
        <p class="text-zinc-900 dark:text-white mt-6">
            You need to <a wire:navigate href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 underline">log in</a> to comment.
        </p>
    @endauth
</div>