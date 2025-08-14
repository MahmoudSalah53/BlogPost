<x-public.layouts :title="__('Membership')">
    <div class="min-h-screen bg-zinc-50 dark:bg-zinc-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Enhanced Header with Decorative Elements -->
            <div class="text-center mb-16 relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-amber-400 to-orange-500 dark:from-fuchsia-500 dark:to-purple-600 rounded-full"></div>
                <flux:text size="5xl" weight="bold" class="text-zinc-900 dark:text-white relative">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-500 to-orange-600 dark:from-fuchsia-400 dark:to-purple-400">
                        Choose Your Plan
                    </span>
                </flux:text>
                <flux:text size="xl" class="mt-5 max-w-xl mx-auto text-zinc-600 dark:text-zinc-300">
                    Unlock your full potential with our <span class="font-medium text-amber-500 dark:text-fuchsia-400">premium features</span>
                </flux:text>
            </div>

            <!-- Plans with Ribbon Effect -->
            <div class="mt-16 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-8 max-w-5xl mx-auto">
                <!-- Free Plan with Subtle Pattern -->
                <div class="relative p-8 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-2xl shadow-sm flex flex-col overflow-hidden">
                    <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2IiBoZWlnaHQ9IjYiPgo8cmVjdCB3aWR0aD0iNiIgaGVpZ2h0PSI2IiBmaWxsPSIjMDAwMDAwIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNiA2WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxMTExMTEiPjwvcGF0aD4KPHBhdGggZD0iTTYgMEwwIDZaIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZT0iIzExMTExMSI+PC9wYXRoPgo8L3N2Zz4=')] dark:opacity-10"></div>

                    <div class="flex-1 relative">
                        <flux:text size="xl" weight="semibold" class="text-zinc-900 dark:text-white">Free</flux:text>
                        <div class="mt-4 flex items-baseline text-zinc-900 dark:text-white">
                            <span class="text-5xl font-extrabold">$0</span>
                            <span class="ml-1 text-xl font-semibold">/forever</span>
                        </div>
                        <flux:text class="mt-3 text-zinc-500 dark:text-zinc-400">
                            Basic access to the platform
                        </flux:text>

                        <!-- Features with Animated Icons -->
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-green-100 dark:bg-green-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="check" size="md" class="text-green-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300">Read content</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-red-100 dark:bg-red-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="x-circle" size="md" class="text-red-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300">Cannot publish content</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-red-100 dark:bg-red-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="x-circle" size="md" class="text-red-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300">No author status</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-red-100 dark:bg-red-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="x-circle" size="md" class="text-red-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300">Cannot gain followers</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 relative">
                        @if(auth()->user()->role === 'reader')
                            <flux:button
                                class="w-full bg-zinc-200 hover:bg-zinc-300 text-zinc-700 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:text-zinc-200 transition-colors"
                                disabled>
                                Current Plan
                            </flux:button>
                        @elseif(auth()->user()->role === 'author')
                            <flux:button
                                class="w-full bg-zinc-200 text-zinc-500 dark:bg-zinc-700 dark:text-zinc-400 cursor-not-allowed"
                                disabled>
                                You're Premium Author
                            </flux:button>
                        @else
                            <flux:button
                                class="w-full bg-zinc-200 text-zinc-500 dark:bg-zinc-700 dark:text-zinc-400 cursor-not-allowed"
                                disabled>
                                Admin Account
                            </flux:button>
                        @endif
                    </div>
                </div>

                <!-- Premium Plan with Glow Effect -->
                <div class="relative p-8 bg-white dark:bg-zinc-800 border-2 border-indigo-500 rounded-2xl shadow-xl flex flex-col transform hover:scale-[1.01] transition-transform duration-300">
                    @if(auth()->user()->role !== 'admin')
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <div class="px-6 py-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 shadow-md">
                                <span class="text-sm font-bold text-white uppercase tracking-wide">Most Popular</span>
                            </div>
                        </div>
                    @endif

                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-400/20 to-orange-500/20 dark:from-fuchsia-500/20 dark:to-purple-600/20 rounded-2xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="flex-1 relative">
                        <div class="flex justify-between items-start">
                            <flux:text size="xl" weight="semibold" class="text-zinc-900 dark:text-white">Premium</flux:text>
                            @if(auth()->user()->role === 'author' && auth()->user()->hasActiveSubscription())
                                <div class="px-3 py-1 rounded-full bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-300 text-sm font-medium">
                                    Active Subscription
                                </div>
                            @elseif(auth()->user()->role !== 'admin')
                                <div class="px-3 py-1 rounded-full bg-amber-50 dark:bg-fuchsia-900/30 text-amber-600 dark:text-fuchsia-300 text-sm font-medium">
                                    30 Days Access
                                </div>
                            @endif
                        </div>

                        <div class="mt-4 flex items-baseline text-zinc-900 dark:text-white">
                            <span class="text-5xl font-extrabold">$9.99</span>
                            <span class="ml-1 text-xl font-semibold">/month</span>
                        </div>

                        <flux:text class="mt-3 text-zinc-500 dark:text-zinc-400">
                            @if(auth()->user()->role === 'admin')
                                Administrative access included
                            @else
                                Full publishing capabilities
                            @endif
                        </flux:text>

                        <!-- Enhanced Features List -->
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-green-100 dark:bg-green-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="check-circle" size="md" class="text-green-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300 font-medium">Publish unlimited content</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-green-100 dark:bg-green-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="check-circle" size="md" class="text-green-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300 font-medium">Author status badge</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-green-100 dark:bg-green-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="check-circle" size="md" class="text-green-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300 font-medium">Gain & manage followers</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-green-100 dark:bg-green-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="check-circle" size="md" class="text-green-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300 font-medium">Priority customer support</span>
                            </li>
                            <li class="flex items-center group">
                                <div class="p-1 rounded-full bg-blue-100 dark:bg-blue-900/50 group-hover:scale-110 transition-transform">
                                    <flux:icon name="bolt" size="md" class="text-blue-500" />
                                </div>
                                <span class="ml-3 text-zinc-600 dark:text-zinc-300 font-medium">Exclusive content access</span>
                            </li>
                        </ul>

                        <!-- Subscription Status for Authors -->
                        @if(auth()->user()->role === 'author' && auth()->user()->hasActiveSubscription())
                            <div class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                                <div class="flex items-center">
                                    <flux:icon name="check-circle" size="sm" class="text-green-500 mr-2" />
                                    <span class="text-sm font-medium text-green-800 dark:text-green-200">
                                        You're currently subscribed to Premium
                                    </span>
                                </div>
                                @if(auth()->user()->activeSubscription())
                                    <p class="text-xs text-green-600 dark:text-green-300 mt-1">
                                        Expires: {{ auth()->user()->activeSubscription()->expires_at->format('M d, Y') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 relative">
                        @if(auth()->user()->role === 'admin')
                            <flux:button 
                                class="w-full bg-gray-400 text-gray-600 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed"
                                disabled>
                                Not Available for Admin Users
                            </flux:button>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-center">
                                Admin accounts have full access without subscription
                            </p>
                        @elseif(auth()->user()->role === 'author' && auth()->user()->hasActiveSubscription())
                            <flux:button 
                                class="w-full bg-green-500 hover:bg-green-600 text-white shadow-lg transition-all"
                                disabled>
                                <flux:icon name="check-circle" size="sm" class="mr-2" />
                                Currently Subscribed
                            </flux:button>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-center">
                                You have access to all premium features
                            </p>
                        @else
                            <form action="{{ route('membership.upgrade') }}" method="POST">
                                @csrf
                                <flux:button 
                                    type="submit"
                                    class="cursor-pointer w-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white dark:from-fuchsia-600 dark:to-purple-600 dark:hover:from-fuchsia-700 dark:hover:to-purple-700 shadow-lg hover:shadow-amber-200/50 dark:hover:shadow-fuchsia-200/20 transition-all"
                                    icon="arrow-right"
                                    icon-position="right">
                                    Upgrade Now - Start Publishing
                                </flux:button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-public.layouts>
