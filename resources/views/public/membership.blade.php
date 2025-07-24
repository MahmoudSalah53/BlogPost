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
                        <flux:button
                            class="w-full bg-zinc-200 hover:bg-zinc-300 text-zinc-700 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:text-zinc-200 transition-colors"
                            disabled>
                            Current Plan
                        </flux:button>
                    </div>
                </div>

                <!-- Premium Plan with Glow Effect -->
                <div class="relative p-8 bg-white dark:bg-zinc-800 border-2 border-indigo-500 rounded-2xl shadow-xl flex flex-col transform hover:scale-[1.01] transition-transform duration-300">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <div class="px-6 py-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 shadow-md">
                            <span class="text-sm font-bold text-white uppercase tracking-wide">Most Popular</span>
                        </div>
                    </div>

                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-400/20 to-orange-500/20 dark:from-fuchsia-500/20 dark:to-purple-600/20 rounded-2xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="flex-1 relative">
                        <div class="flex justify-between items-start">
                            <flux:text size="xl" weight="semibold" class="text-zinc-900 dark:text-white">Premium</flux:text>
                            <div class="px-3 py-1 rounded-full bg-amber-50 dark:bg-fuchsia-900/30 text-amber-600 dark:text-fuchsia-300 text-sm font-medium">
                                30 Days Access
                            </div>
                        </div>

                        <div class="mt-4 flex items-baseline text-zinc-900 dark:text-white">
                            <span class="text-5xl font-extrabold">$9.99</span>
                            <span class="ml-1 text-xl font-semibold">/month</span>
                        </div>

                        <flux:text class="mt-3 text-zinc-500 dark:text-zinc-400">
                            Full publishing capabilities
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
                    </div>

                    <div class="mt-8 relative">
                        <form action="{{ route('membership.upgrade') }}"method="POST">
                            @csrf
                            <flux:button 
                                type="submit"
                                class="cursor-pointer w-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white dark:from-fuchsia-600 dark:to-purple-600 dark:hover:from-fuchsia-700 dark:hover:to-purple-700 shadow-lg hover:shadow-amber-200/50 dark:hover:shadow-fuchsia-200/20 transition-all"
                                icon="arrow-right"
                                icon-position="right">
                                Upgrade Now - Start Publishing
                            </flux:button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Enhanced FAQ Section with Toggle -->
            <div class="mt-24 max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <flux:text size="3xl" weight="bold" class="text-zinc-900 dark:text-white mb-3">
                        Frequently Asked Questions
                    </flux:text>
                    <flux:text class="text-zinc-500 dark:text-zinc-400 max-w-2xl mx-auto">
                        Everything you need to know about our membership plans
                    </flux:text>
                </div>

                <div class="space-y-4">
                    <div x-data="{ open: false }" class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <button
                            @click="open = !open"
                            class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <flux:text size="lg" weight="medium" class="text-zinc-900 dark:text-white">
                                What payment methods do you accept?
                            </flux:text>
                            <flux:icon
                                name="chevron-down"
                                size="sm"
                                class="text-zinc-400 dark:text-zinc-500 transform transition-transform duration-200"
                                x-bind:class="{ 'rotate-180': open }" />
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5 -mt-2 text-zinc-600 dark:text-zinc-400">
                            We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and in some regions, Apple Pay and Google Pay. All payments are processed securely through our PCI-compliant payment processor.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <button
                            @click="open = !open"
                            class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <flux:text size="lg" weight="medium" class="text-zinc-900 dark:text-white">
                                Can I cancel anytime? Will I get a refund?
                            </flux:text>
                            <flux:icon
                                name="chevron-down"
                                size="sm"
                                class="text-zinc-400 dark:text-zinc-500 transform transition-transform duration-200"
                                x-bind:class="{ 'rotate-180': open }" />
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5 -mt-2 text-zinc-600 dark:text-zinc-400">
                            Yes, you can cancel your premium membership anytime. We offer a 14-day money-back guarantee for new subscribers. After cancellation, you'll retain access until the end of your current billing period.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <button
                            @click="open = !open"
                            class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <flux:text size="lg" weight="medium" class="text-zinc-900 dark:text-white">
                                What happens to my content if I switch to free?
                            </flux:text>
                            <flux:icon
                                name="chevron-down"
                                size="sm"
                                class="text-zinc-400 dark:text-zinc-500 transform transition-transform duration-200"
                                x-bind:class="{ 'rotate-180': open }" />
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5 -mt-2 text-zinc-600 dark:text-zinc-400">
                            All your published content remains visible, but you won't be able to publish new content or edit existing posts. Your author profile will be marked as "Former Premium Member" and you'll keep your followers, but they won't be notified of new content unless you upgrade again.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <button
                            @click="open = !open"
                            class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <flux:text size="lg" weight="medium" class="text-zinc-900 dark:text-white">
                                Are there any discounts for annual plans?
                            </flux:text>
                            <flux:icon
                                name="chevron-down"
                                size="sm"
                                class="text-zinc-400 dark:text-zinc-500 transform transition-transform duration-200"
                                x-bind:class="{ 'rotate-180': open }" />
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5 -mt-2 text-zinc-600 dark:text-zinc-400">
                            Yes! We offer 20% discount for annual subscriptions. Contact our support team to upgrade to an annual plan and save money in the long run.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public.layouts>