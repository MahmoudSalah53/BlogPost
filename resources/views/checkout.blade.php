<x-public.layouts :title="__('Checkout')">
    <div
        class="min-h-screen bg-gradient-to-br from-zinc-50 via-slate-50 to-zinc-100 dark:from-zinc-900 dark:via-slate-900 dark:to-zinc-800 py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Progress Bar -->
            <div class="mb-12">
                <div class="flex items-center justify-center">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                1</div>
                            <span class="ml-2 text-sm font-medium text-zinc-600 dark:text-zinc-300">Plan
                                Selection</span>
                        </div>
                        <div
                            class="w-16 h-1 bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 rounded-full">
                        </div>
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                2</div>
                            <span class="ml-2 text-sm font-medium text-zinc-900 dark:text-white">Checkout</span>
                        </div>
                        <div class="w-16 h-1 bg-zinc-300 dark:bg-zinc-600 rounded-full"></div>
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-zinc-300 dark:bg-zinc-600 rounded-full flex items-center justify-center text-zinc-600 dark:text-zinc-400 font-bold">
                                3</div>
                            <span class="ml-2 text-sm font-medium text-zinc-400 dark:text-zinc-500">Confirmation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Payment Form Section -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <!-- Header -->
                        <div
                            class="px-8 py-6 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-fuchsia-900/20 dark:to-purple-900/20 border-b border-zinc-200 dark:border-zinc-700">
                            <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Complete Your Purchase</h2>
                            <p class="text-zinc-600 dark:text-zinc-300 mt-1">Secure payment processing</p>
                        </div>

                        <div class="p-8">
                            <!-- Payment Method Selection -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-4">Payment Method</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="relative">
                                        <input type="radio" id="visa" name="payment-method" class="peer sr-only" checked>
                                        <label for="visa"
                                            class="flex items-center justify-center p-4 bg-white dark:bg-zinc-700 border-2 border-zinc-200 dark:border-zinc-600 rounded-xl cursor-pointer peer-checked:border-amber-500 dark:peer-checked:border-fuchsia-500 peer-checked:bg-amber-50 dark:peer-checked:bg-fuchsia-900/20 transition-all hover:shadow-md">
                                            <div class="text-center">
                                                <div class="w-12 h-8 mx-auto mb-2 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                                                    <span class="text-white text-sm font-bold">VISA</span>
                                                </div>
                                                <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Visa Card</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" id="paypal" name="payment-method" class="peer sr-only">
                                        <label for="paypal"
                                            class="flex items-center justify-center p-4 bg-white dark:bg-zinc-700 border-2 border-zinc-200 dark:border-zinc-600 rounded-xl cursor-pointer peer-checked:border-amber-500 dark:peer-checked:border-fuchsia-500 peer-checked:bg-amber-50 dark:peer-checked:bg-fuchsia-900/20 transition-all hover:shadow-md">
                                            <div class="text-center">
                                                <div class="w-12 h-8 mx-auto mb-2 bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">PayPal</span>
                                                </div>
                                                <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">PayPal</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Visa Card Form -->
                            <div id="visa-form" class="payment-form">
                                <form class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                Card Number
                                            </label>
                                            <div class="relative">
                                                <input type="text" placeholder="1234 5678 9012 3456" maxlength="19"
                                                    class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                                <div class="absolute right-3 top-3">
                                                    <div class="w-8 h-5 bg-blue-600 rounded-sm flex items-center justify-center">
                                                        <span class="text-white text-xs font-bold">VISA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                Cardholder Name
                                            </label>
                                            <input type="text" placeholder="John Doe"
                                                class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                Expiry Date
                                            </label>
                                            <input type="text" placeholder="MM/YY" maxlength="5"
                                                class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                CVC
                                            </label>
                                            <input type="text" placeholder="123" maxlength="4"
                                                class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                        </div>
                                    </div>

                                    <!-- Billing Address -->
                                    <div class="pt-6 border-t border-zinc-200 dark:border-zinc-700">
                                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-4">Billing Address</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                    Email Address
                                                </label>
                                                <input type="email" placeholder="john@example.com"
                                                    class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                    Country
                                                </label>
                                                <select class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                                    <option>Egypt</option>
                                                    <option>United States</option>
                                                    <option>United Kingdom</option>
                                                    <option>Canada</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                                                    Postal Code
                                                </label>
                                                <input type="text" placeholder="12345"
                                                    class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- PayPal Form -->
                            <div id="paypal-form" class="payment-form" style="display: none;">
                                <div class="text-center py-8">
                                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                        <span class="text-white text-2xl font-bold">PayPal</span>
                                    </div>
                                    <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-2">Pay with PayPal</h3>
                                    <p class="text-zinc-600 dark:text-zinc-300 mb-6">You'll be redirected to PayPal to complete your payment securely.</p>
                                    
                                    <!-- Email for PayPal -->
                                    <div class="max-w-md mx-auto mb-6">
                                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2 text-left">
                                            Email Address
                                        </label>
                                        <input type="email" placeholder="your.email@example.com"
                                            class="w-full px-4 py-3 bg-white dark:bg-zinc-700 border border-zinc-300 dark:border-zinc-600 rounded-xl focus:ring-2 focus:ring-amber-500 dark:focus:ring-fuchsia-500 focus:border-transparent text-zinc-900 dark:text-white transition-all">
                                    </div>

                                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 max-w-md mx-auto">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="text-left">
                                                <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300">Secure PayPal Payment</h4>
                                                <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">Pay with your PayPal account or any major credit card through PayPal's secure checkout.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6">
                        <!-- Order Summary Card -->
                        <div
                            class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden mb-6">
                            <div
                                class="px-6 py-4 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-fuchsia-900/20 dark:to-purple-900/20 border-b border-zinc-200 dark:border-zinc-700">
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Order Summary</h3>
                            </div>

                            <div class="p-6">
                                @if(session('plan'))
                                    <!-- Selected Plan -->
                                    <div
                                        class="flex items-start space-x-4 p-4 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-fuchsia-900/10 dark:to-purple-900/10 rounded-xl border border-amber-200 dark:border-fuchsia-800">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-500 dark:from-fuchsia-600 dark:to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-zinc-900 dark:text-white">
                                                {{ session('plan.name') }} Plan</h4>
                                            <p class="text-sm text-zinc-600 dark:text-zinc-300">30 Days Access</p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-bold text-zinc-900 dark:text-white">
                                                ${{ session('plan.price') }}</div>
                                        </div>
                                    </div>

                                    <!-- Plan Features -->
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm text-zinc-600 dark:text-zinc-300">
                                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Publish unlimited content
                                        </div>
                                        <div class="flex items-center text-sm text-zinc-600 dark:text-zinc-300">
                                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Author status badge
                                        </div>
                                        <div class="flex items-center text-sm text-zinc-600 dark:text-zinc-300">
                                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Priority customer support
                                        </div>
                                    </div>

                                    <!-- Pricing Breakdown -->
                                    <div class="mt-6 pt-4 border-t border-zinc-200 dark:border-zinc-700 space-y-3">
                                        <div class="flex justify-between text-sm">
                                            <span class="text-zinc-600 dark:text-zinc-300">Subtotal</span>
                                            <span class="text-zinc-900 dark:text-white">${{ session('plan.price') }}</span>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-zinc-600 dark:text-zinc-300">Tax</span>
                                            <span class="text-zinc-900 dark:text-white">$0.00</span>
                                        </div>
                                        <div
                                            class="flex justify-between text-lg font-bold pt-2 border-t border-zinc-200 dark:border-zinc-700">
                                            <span class="text-zinc-900 dark:text-white">Total</span>
                                            <span class="text-zinc-900 dark:text-white">${{ session('plan.price') }}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div
                                            class="w-16 h-16 bg-zinc-100 dark:bg-zinc-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-zinc-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                            </svg>
                                        </div>
                                        <p class="text-zinc-500 dark:text-zinc-400">No plan selected</p>
                                        <a wire:navigate href="{{ route('membership.index') }}"
                                            class="mt-4 text-amber-600 dark:text-fuchsia-400 hover:underline text-sm font-medium">
                                            Select a plan
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Security Notice -->
                        <div
                            class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 mb-6">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-0.5 mr-3 flex-shrink-0"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-green-800 dark:text-green-300">Secure Payment</h4>
                                    <p class="text-xs text-green-600 dark:text-green-400 mt-1">Your payment information is encrypted and secure</p>
                                </div>
                            </div>
                        </div>

                        <!-- Complete Purchase Button -->
                        <button type="button" id="complete-purchase-btn"
                            class="w-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 dark:from-fuchsia-600 dark:to-purple-600 dark:hover:from-fuchsia-700 dark:hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span id="button-text">Complete Purchase</span>
                        </button>

                        <!-- Money Back Guarantee -->
                        <div class="mt-4 text-center">
                            <p class="text-xs text-zinc-500 dark:text-zinc-400">
                                🔒 14-day money-back guarantee
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get payment method radio buttons
            const visaRadio = document.getElementById('visa');
            const paypalRadio = document.getElementById('paypal');
            const visaForm = document.getElementById('visa-form');
            const paypalForm = document.getElementById('paypal-form');
            const completeBtn = document.getElementById('complete-purchase-btn');
            const buttonText = document.getElementById('button-text');

            // Function to switch payment forms
            function switchPaymentMethod() {
                if (visaRadio.checked) {
                    visaForm.style.display = 'block';
                    paypalForm.style.display = 'none';
                    buttonText.textContent = 'Complete Purchase';
                } else if (paypalRadio.checked) {
                    visaForm.style.display = 'none';
                    paypalForm.style.display = 'block';
                    buttonText.textContent = 'Pay with PayPal';
                }
            }

            // Add event listeners for radio buttons
            visaRadio.addEventListener('change', switchPaymentMethod);
            paypalRadio.addEventListener('change', switchPaymentMethod);

            // Initialize with Visa selected
            switchPaymentMethod();

            // Format card number input for Visa
            const cardInput = document.querySelector('input[placeholder="1234 5678 9012 3456"]');
            if (cardInput) {
                cardInput.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
                    let formattedInputValue = value.match(/.{1,4}/g)?.join(' ') || value;
                    if (formattedInputValue.length > 19) {
                        formattedInputValue = formattedInputValue.substring(0, 19);
                    }
                    e.target.value = formattedInputValue;
                });
            }

            // Format expiry date
            const expiryInput = document.querySelector('input[placeholder="MM/YY"]');
            if (expiryInput) {
                expiryInput.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2, 4);
                    }
                    e.target.value = value;
                });
            }

            // Format CVC input
            const cvcInput = document.querySelector('input[placeholder="123"]');
            if (cvcInput) {
                cvcInput.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/[^0-9]/gi, '');
                    e.target.value = value;
                });
            }

            // Handle form submission
            completeBtn.addEventListener('click', function (e) {
                e.preventDefault();
                
                // Add loading state to button
                const originalText = buttonText.textContent;
                buttonText.textContent = 'Processing...';
                completeBtn.innerHTML = '<svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Processing...';
                completeBtn.disabled = true;

                // Simulate processing
                setTimeout(() => {
                    completeBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg><span>${originalText}</span>`;
                    completeBtn.disabled = false;
                    
                    if (paypalRadio.checked) {
                        alert('Redirecting to PayPal... (Demo)');
                        // Here you would redirect to PayPal
                        // window.location.href = 'paypal_checkout_url';
                    } else {
                        alert('Payment processed successfully with Visa! (Demo)');
                        // Here you would process Stripe payment
                    }
                }, 2000);
            });
        });
    </script>
</x-public.layouts>