<x-layouts.web>
    {{-- <main class="flex-grow flex flex-col items-center justify-center text-center px-6 py-16">
        <h1 class="text-4xl md:text-5xl sm:text-6xl font-extrabold mb-6">Turn Happy Clients Into 5-Star Proof</h1>
        <p class="text-lg max-w-2xl mb-8 text-zinc-600 dark:text-zinc-300">The all-in-one platform for businesses to build trust, attract new customers, and own their online reputation - on autopilot.</p>
    </main> --}}

    <main>
        {{-- Hero --}}
        <section class="relative min-h-screen flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden">
            <!-- Background Blob -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500 rounded-full opacity-20 blur-3xl animate-pulse duration-1000"></div>
                <div class="absolute top-1/4 right-1/4 w-72 h-72 bg-blue-500 rounded-full opacity-15 blur-3xl animate-pulse delay-500"></div>
            </div>
    
            <div class="max-w-7xl mx-auto relative z-10">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight text-white mb-4">
                    Effortlessly Grow Your Business with More <br class="hidden md:inline"><span class="text-gradient">5-Star Reviews</span>.
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-8">AfterSay is the all-in-one platform that automates customer feedback collection, helps you manage your online reputation, and turns happy clients into powerful brand advocates.</p>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#get-started" class="px-8 py-3 rounded-full text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg transform hover:scale-105">Start Your Free Trial</a>
                    <a href="#features" class="px-8 py-3 rounded-full text-lg font-semibold text-blue-400 border border-blue-400 hover:bg-blue-400 hover:text-gray-950 transition-colors transform hover:scale-105">Learn More</a>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section id="features" class="py-20 px-4 md:px-6 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-white mb-16">Features That Drive Growth</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1: Automated Feedback Collection -->
                    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-700 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15.5V16c0-1.1.9-2 2-2h4v-1.5H13v-1H21c-1.1 0-2 .9-2 2v2.5H11z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-2">Automated Collection</h3>
                        <p class="text-gray-400">Effortlessly send review and feedback requests to your customers after every transaction. Set it and forget it.</p>
                    </div>

                    <!-- Feature 2: Private Feedback Channel -->
                    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-700 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 10h-2V6H8v4H6c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2zM8 8h8v2H8V8z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-2">Private Feedback Channel</h3>
                        <p class="text-gray-400">Give unhappy customers a direct, private way to share their feedback, so you can address their concerns before they leave a public review.</p>
                    </div>

                    <!-- Feature 3: Reputation Protection -->
                    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-700 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-green-600 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM15.5 14c-.83 0-1.5.67-1.5 1.5S14.67 17 15.5 17s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zM8.5 14c-.83 0-1.5.67-1.5 1.5S7.67 17 8.5 17s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-2">Reputation Protection</h3>
                        <p class="text-gray-400">By resolving issues privately, you protect your online reputation and ensure your public reviews are a true reflection of your great service.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Pricing --}}
        <section id="pricing" class="py-20 px-4 md:px-6 bg-gray-950">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-white mb-16">Simple & Transparent Pricing</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Starter Plan -->
                    <div class="bg-gray-900 p-8 rounded-2xl shadow-xl border border-gray-800 text-center flex flex-col items-center">
                        <h3 class="text-3xl font-bold text-white mb-2">Starter</h3>
                        <p class="text-gray-400 mb-6">For businesses just getting started.</p>
                        <p class="text-4xl font-extrabold text-white mb-2">$29<span class="text-lg font-normal text-gray-500">/mo</span></p>
                        <p class="text-sm text-gray-500 mb-8">billed annually</p>
                        <ul class="text-gray-300 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>100 review requests/month</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Basic review dashboard</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Email support</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg transform hover:scale-105">Choose Plan</a>
                    </div>

                    <!-- Pro Plan - Highlighted -->
                    <div class="bg-blue-900 p-8 rounded-2xl shadow-2xl border border-blue-700 text-center flex flex-col items-center transform scale-105 relative">
                        <span class="absolute top-0 right-0 mt-4 mr-4 px-3 py-1 bg-white text-blue-900 text-xs font-bold rounded-full uppercase">Most Popular</span>
                        <h3 class="text-3xl font-bold text-white mb-2">Pro</h3>
                        <p class="text-blue-200 mb-6">For businesses ready to scale.</p>
                        <p class="text-5xl font-extrabold text-white mb-2">$99<span class="text-lg font-normal text-blue-300">/mo</span></p>
                        <p class="text-sm text-blue-300 mb-8">billed annually</p>
                        <ul class="text-blue-100 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Unlimited review requests</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Customizable feedback forms</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Multi-platform integration (Google, Yelp)</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Priority chat support</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-blue-900 bg-white hover:bg-gray-200 transition-colors shadow-lg transform hover:scale-105">Choose Plan</a>
                    </div>

                    <!-- Enterprise Plan -->
                    <div class="bg-gray-900 p-8 rounded-2xl shadow-xl border border-gray-800 text-center flex flex-col items-center">
                        <h3 class="text-3xl font-bold text-white mb-2">Enterprise</h3>
                        <p class="text-gray-400 mb-6">For large organizations.</p>
                        <p class="text-4xl font-extrabold text-white mb-2">Contact Us</p>
                        <p class="text-sm text-gray-500 mb-8">custom pricing</p>
                        <ul class="text-gray-300 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Dedicated account manager</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Custom integrations</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Advanced analytics & reporting</span>
                            </li>
                        </ul>
                        <a href="#contact" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg transform hover:scale-105">Contact Sales</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Call to Action --}}
        <section class="py-20 px-4 md:px-6 bg-gray-900">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-white mb-4">Ready to Grow Your Reputation?</h2>
                <p class="text-lg text-gray-400 mb-8">Join thousands of businesses who are already using AfterSay to get more 5-star reviews.</p>
                <a href="#get-started" class="px-8 py-4 rounded-full text-xl font-bold text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg transform hover:scale-110">Get Started Free</a>
            </div>
        </section>
    </main>
</x-layouts.web>