<div class="mt-8 border-t pt-6">
    <h2 class="text-xl font-semibold mb-4"> Comments</h2>
{{-- show comments --}}
    @forelse($comments as $comment)
        <div class="mb-6 pb-4">
            <div class="flex items-center justify-between">
               <div class="flex items-center gap-2 text-lg">
                  @if($comment->user->avatar)
                       <flux:avatar size="sm" src="{{ asset('storage/' . $comment->user->avatar) }}" />
                   @else
                      <flux:avatar size="sm" :name="$comment->user->name" />
                  @endif
                   <span class="font-semibold text-zinc-800 dark:text-white">
                    {{ $comment->user->name }}
                </span>
               </div>
                <span class="text-sm text-zinc-500 dark:text-zinc-400">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>
            <p class="text-zinc-700 mt-2 dark:text-zinc-200 pl-6">
                {{ $comment->content }}
            </p>
        </div>
    @empty
        <p class="text-zinc-700 dark:text-zinc-200 my-10">No Comment Found!</p>
    @endforelse

    @auth
        <form wire:submit="save" class="space-y-4">
            <flux:textarea wire:model="content" required placeholder="Write Your Comment"/>

            <flux:button type="submit" variant="primary">
                Submit
            </flux:button>
        </form>
    @else
        <p class="text-zinc-900 dark:text-white">You Should <a wire:navigate href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 underline">Login</a> first to write a comment</p>
    @endauth
</div>
