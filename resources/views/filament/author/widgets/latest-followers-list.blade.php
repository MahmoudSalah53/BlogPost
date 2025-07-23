<x-filament-widgets::widget>
    <x-filament::section>
        @vite(['resources/css/latest-followers-list.css'])

        <div class="followers-container">
            @forelse ($latestFollowers as $follower)
                <div class="follower-item">
                    <div class="follower-info">
                        <!-- Avatar -->
                        <div class="follower-avatar {{ $follower->role }}">
                            <img src="{{ $follower->avatar ? \Illuminate\Support\Facades\Storage::url($follower->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($follower->name) }}"
                                alt="{{ $follower->name }}" class="avatar-image">
                        </div>

                        <!-- Name and Role -->
                        <div class="follower-details">
                            <p class="follower-name">
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

                            <span class="role-badge" style="background-color: {{ $bgColor }}; color: {{ $textColor }};">
                                {{ ucfirst($follower->role) }}
                            </span>
                        </div>
                    </div>

                    <!-- Follow/Unfollow Button for Authors -->
                    @if($follower->role === 'author')
                        <button wire:click="toggleFollow({{ $follower->id }})" wire:loading.attr="disabled"
                            wire:target="toggleFollow({{ $follower->id }})" class="follow-button"
                            style="background-color: {{ auth()->user()->isFollowing($follower) ? '#ec4899' : '#06b6d4' }};">

                            <!-- Loading Spinner -->
                            <svg wire:loading wire:target="toggleFollow({{ $follower->id }})" class="loading-spinner"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                                <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>

                            <span wire:loading.remove wire:target="toggleFollow({{ $follower->id }})" class="follow-text">
                                @if(auth()->user()->isFollowing($follower))
                                    Unfollow
                                @else
                                    Follow
                                @endif
                            </span>
                        </button>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <p class="empty-text">
                        No followers yet
                    </p>
                </div>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>