<x-layouts.web>
    <main>
        {{-- Hero --}}
        <section class="relative min-h-screen flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden hero-pattern">
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
                <h2 class="text-3xl sm:text-5xl font-bold text-center text-white mb-16">Your All-in-One Review & Feedback Solution</h2>

                <!-- Feature 1: Automated Feedback Collection -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-24 md:space-x-12">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">Automated Review & Feedback Requests</h3>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Stop waiting for reviews to happen. AfterSay automatically sends personalized feedback requests via email or SMS, making it easy for customers to leave a review on Google, Yelp, or any platform that matters to your business. Boost your online presence with a steady flow of new reviews.
                        </p>
                    </div>
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center">
                        <svg class="w-full h-auto max-w-lg" viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:rgb(74,222,128);stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:rgb(250,204,21);stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="50" y="50" width="400" height="200" rx="20" ry="20" fill="#1F2937" stroke="#4B5563" stroke-width="2" />
                            <circle cx="100" cy="100" r="10" fill="#4ADE80" />
                            <circle cx="130" cy="100" r="10" fill="#FDE047" />
                            <circle cx="160" cy="100" r="10" fill="#FB7185" />
                            <path d="M70 140 H430 M70 160 H430 M70 180 H350" stroke="#6B7280" stroke-width="8" stroke-linecap="round" opacity="0.8" />
                            <path d="M250 200 H430" stroke="#6B7280" stroke-width="8" stroke-linecap="round" opacity="0.8" />
                            <path d="M120 220 H280" stroke="#6B7280" stroke-width="8" stroke-linecap="round" opacity="0.8" />
                            <rect x="250" y="100" width="180" height="100" rx="10" ry="10" fill="url(#gradient1)" opacity="0.7" />
                            <path d="M280 130 Q 340 100, 400 130" stroke="#FFFFFF" stroke-width="4" fill="none" />
                            <path d="M280 130 Q 300 160, 320 130" stroke="#FFFFFF" stroke-width="4" fill="none" />
                            <text x="340" y="150" font-family="Inter" font-size="20" fill="white" text-anchor="middle" font-weight="bold">5 Stars</text>
                            <path d="M300 170 Q 340 190, 380 170" stroke="#FFFFFF" stroke-width="4" fill="none" />
                        </svg>
                    </div>
                </div>

                <!-- Feature 2: Private Feedback Channel -->
                <div class="flex flex-col-reverse md:flex-row items-center justify-between mb-24 md:space-x-12">
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center mb-10 md:mb-0">
                        <svg class="w-full h-auto max-w-lg" viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:rgb(250,204,21);stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:rgb(234,88,12);stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="50" y="50" width="400" height="200" rx="20" ry="20" fill="#1F2937" stroke="#4B5563" stroke-width="2" />
                            <path d="M80 80 H420 V220 H80 Z" fill="#2D3748" stroke="#4B5563" stroke-width="2" />
                            <path d="M80 80 Q 250 120, 420 80" stroke="#8C52FF" stroke-width="4" fill="none" />
                            <circle cx="250" cy="150" r="60" fill="url(#gradient2)" opacity="0.7" />
                            <path d="M250 120 V180 M220 150 H280" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" />
                            <text x="250" y="200" font-family="Inter" font-size="20" fill="#FFFFFF" text-anchor="middle" font-weight="bold">Private</text>
                        </svg>
                    </div>
                    <!-- Text Content -->
                    <div class="md:w-1/2">
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">Capture Negative Feedback Privately</h3>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Not all feedback is for public display. Our system gives unhappy customers a private channel to voice their concerns directly to you, preventing negative reviews from impacting your public rating and giving you a chance to resolve issues professionally.
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Reputation Protection -->
                <div class="flex flex-col md:flex-row items-center justify-between md:space-x-12">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">Protect & Enhance Your Brand's Reputation</h3>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            A strong online reputation is your most valuable asset. By directing happy customers to public review sites and handling negative feedback privately, AfterSay ensures your business consistently showcases its best face online, building trust and attracting new clients.
                        </p>
                    </div>
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center">
                        <svg class="w-full h-auto max-w-lg" viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:rgb(255,255,255);stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:rgb(147,51,234);stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="50" y="50" width="400" height="200" rx="20" ry="20" fill="#1F2937" stroke="#4B5563" stroke-width="2" />
                            <circle cx="250" cy="150" r="80" fill="#333" stroke="url(#gradient3)" stroke-width="4" opacity="0.9" />
                            <path d="M250 100 Q 280 150, 250 200 Q 220 150, 250 100 Z" fill="#D1D5DB" />
                            <polygon points="250,120 270,180 230,180" fill="#4C33C9" />
                            <text x="250" y="170" font-family="Inter" font-size="20" fill="#FFFFFF" text-anchor="middle" font-weight="bold">SAFE</text>
                            <path d="M120 120 Q 150 180, 180 120" stroke="#FB7185" stroke-width="4" fill="none" />
                            <path d="M320 120 Q 350 180, 380 120" stroke="#FB7185" stroke-width="4" fill="none" />
                            <path d="M120 120 L 150 180 L 180 120" stroke="#FB7185" stroke-width="4" fill="none" />
                            <path d="M320 120 L 350 180 L 380 120" stroke="#FB7185" stroke-width="4" fill="none" />
                        </svg>
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
                        <p class="text-4xl font-extrabold text-white mb-2">$19<span class="text-lg font-normal text-gray-500">/mo</span></p>
                        <p class="text-sm text-gray-500 mb-8">Starts with a 14-day free trial. No credit card required.</p>
                        <ul class="text-gray-300 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Up to 200 customer contacts</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Up to 3 public review platforms</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Internal private feedback</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Custom branding</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Basic analytics dashboard</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>AfterSay 'Powered by' branding</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg transform hover:scale-105">Choose Plan</a>
                    </div>

                    <!-- Pro Plan - Highlighted -->
                    <div class="bg-blue-900 p-8 rounded-2xl shadow-2xl border border-blue-700 text-center flex flex-col items-center transform scale-105 relative">
                        <span class="absolute top-0 right-0 mt-4 mr-4 px-3 py-1 bg-white text-blue-900 text-xs font-bold rounded-full uppercase">Most Popular</span>
                        <h3 class="text-3xl font-bold text-white mb-2">Pro</h3>
                        <p class="text-blue-200 mb-6">For businesses ready to scale.</p>
                        <p class="text-5xl font-extrabold text-white mb-2">$49<span class="text-lg font-normal text-blue-300">/mo</span></p>
                        <p class="text-sm text-blue-300 mb-8">Starts with a 14-day free trial. No credit card required.</p>
                        <ul class="text-blue-100 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Up to 500 customer contacts</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Up to 10 public review platforms</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Internal private feedback</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Custom branding</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Advanced analytics dashboard</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>No AfterSay branding</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-blue-900 bg-white hover:bg-gray-200 transition-colors shadow-lg transform hover:scale-105">Choose Plan</a>
                    </div>

                    <!-- Business Plan -->
                    <div class="bg-gray-900 p-8 rounded-2xl shadow-xl border border-gray-800 text-center flex flex-col items-center">
                        <h3 class="text-3xl font-bold text-white mb-2">Business</h3>
                        <p class="text-gray-400 mb-6">For high-volume businesses.</p>
                        <p class="text-4xl font-extrabold text-white mb-2">$99<span class="text-lg font-normal text-gray-500">/mo</span></p>
                        <p class="text-sm text-gray-500 mb-8">Starts with a 14-day free trial. No credit card required.</p>
                        <ul class="text-gray-300 space-y-3 text-left w-full mb-8">
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Up to 2500 customer contacts</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Unlimited public review platforms</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Internal private feedback</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Custom branding</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>Advanced analytics dashboard</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2l-3.5-3.5L4 14.2l5 5 9-9-1.4-1.4L9 16.2z"/></svg>
                                <span>No AfterSay branding</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full px-6 py-3 rounded-full text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg transform hover:scale-105">Choose Plan</a>
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