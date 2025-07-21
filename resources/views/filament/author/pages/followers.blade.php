<x-filament-panels::page>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse($this->followers as $follower)
            <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center space-x-3">
                    <div class="relative w-12 h-12">
                        <img src="{{ $follower->avatar ? \Illuminate\Support\Facades\Storage::url($follower->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($follower->name) }}"
                             alt="{{ $follower->name }}"
                             class="w-full h-full rounded-full object-cover">

                        @if($follower->role === 'author')
                            <button 
                                wire:click="toggleFollow({{ $follower->id }})"
                                wire:loading.attr="disabled"
                                wire:target="toggleFollow({{ $follower->id }})"
                                style="position: absolute; bottom: 0; right: 0; transform: translate(30%, 30%);
                                       width: 26px; height: 26px; border-radius: 9999px;
                                       background-color: {{ auth()->user()->isFollowing($follower) ? '#ec4899' : '#06b6d4' }};
                                       color: white; display: flex; align-items: center; justify-content: center;
                                       box-shadow: 0 4px 8px rgba(0,0,0,0.2); transition: background-color 0.2s;">

                                <svg wire:loading wire:target="toggleFollow({{ $follower->id }})"
                                     class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                </svg>

                                <span wire:loading.remove wire:target="toggleFollow({{ $follower->id }})">
                                    @if(auth()->user()->isFollowing($follower))
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 
                                                11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 
                                                001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M15 14c-2.7 0-5 1.3-5 3.9V20h10v-2.1c0-2.6-2.3-3.9-5-3.9zM15 12c1.7 0 3-1.3 3-3s-1.3-3-3-3-3 1.3-3 3 1.3 3 3 3zM7 9H5V7a1 1 0 00-2 0v2H1a1 1 0 000 2h2v2a1 1 0 002 0v-2h2a1 1 0 000-2z" />
                                        </svg>
                                    @endif
                                </span>
                            </button>
                        @endif
                    </div>

                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-gray-100" style="margin-left: 10px;">
                            {{ $follower->name }}
                        </p>

                        @php
                            $roleStyles = [
                                'admin' => ['bg' => '#dc2626', 'text' => '#ffffff'],
                                'author' => ['bg' => '#b3cf16ff', 'text' => '#ffffff'],
                                'reader' => ['bg' => '#10b981', 'text' => '#ffffff'],
                            ];

                            $bgColor = $roleStyles[$follower->role]['bg'] ?? '#6b7280';
                            $textColor = $roleStyles[$follower->role]['text'] ?? '#ffffff';
                        @endphp

                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium"
                              style="background-color: {{ $bgColor }}; color: {{ $textColor }}; margin-left: 10px;">
                            {{ ucfirst($follower->role) }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <p class="text-center text-gray-500 dark:text-gray-400">
                    No followers yet.
                </p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $this->followers->links() }}
    </div>
</x-filament-panels::page>
