<x-layouts.web>
    <main>
        {{-- Hero --}}
        <section class="relative min-h-screen flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden bg-gradient-to-br from-gray-900 via-gray-950 to-black">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-500/30 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-green-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-1/4 left-1/4 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            </div>

            <!-- Floating Stars -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <div class="absolute top-20 left-10 w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                <div class="absolute top-40 right-20 w-3 h-3 bg-pink-400 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="absolute bottom-40 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                <div class="absolute top-1/3 right-1/3 w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 1.5s;"></div>
            </div>
    
            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Star Rating Visual -->
                <div class="flex justify-center mb-8 space-x-2">
                    <svg class="w-10 h-10 text-yellow-400 animate-bounce" style="animation-delay: 0s;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-10 h-10 text-yellow-400 animate-bounce" style="animation-delay: 0.1s;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-10 h-10 text-yellow-400 animate-bounce" style="animation-delay: 0.2s;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-10 h-10 text-yellow-400 animate-bounce" style="animation-delay: 0.3s;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-10 h-10 text-yellow-400 animate-bounce" style="animation-delay: 0.4s;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight text-white mb-6">
                    Effortlessly Grow Your Business with More 5-Star Reviews.
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-12">AfterSay is the all-in-one platform that automates customer feedback collection, helps you manage your online reputation, and turns happy clients into powerful brand advocates.</p>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="px-8 py-5 bg-green-400 text-black rounded-lg md:text-xl font-bold hover:bg-green-500 transition-all hover:scale-105 shadow-lg shadow-green-400/50">Get Started Free</a>
                </div>

                <!-- Social Proof -->
                <div class="mt-16 flex flex-col items-center">
                    <p class="text-gray-400 text-sm mb-4">Trusted by growing businesses</p>
                    <div class="flex items-center space-x-8 text-gray-600">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300 font-medium">5,000+ Reviews Collected</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section id="features" class="py-24 px-4 md:px-6 bg-gray-950">
            <div class="max-w-7xl mx-auto">
                <!-- Feature 1: Automated Feedback Collection -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-32 md:space-x-16">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <div class="inline-block px-4 py-2 bg-pink-500/10 border border-pink-500/30 rounded-full mb-6">
                            <span class="text-pink-400 font-semibold text-sm">AUTOMATED</span>
                        </div>
                        <h3 class="text-4xl sm:text-5xl font-bold text-white mb-6">
                            <span class="text-pink-400">Stop waiting</span> for reviews to happen
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            Getting more reviews for your business has never been simpler. AfterSay automates the entire process, sending personalized requests to your clients on your behalf. More positive reviews, less work for you. It's that easy.
                        </p>
                    </div>
                    <!-- Visual Element -->
                    <div class="md:w-1/2 flex justify-center">
                        <div class="relative w-full max-w-md">
                            <!-- Message bubbles illustration -->
                            <div class="space-y-4">
                                <div class="bg-gradient-to-r from-pink-500/20 to-pink-600/10 backdrop-blur-sm border border-pink-500/30 rounded-2xl p-6 transform hover:scale-105 transition-all">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-white font-medium mb-1">Review request sent</p>
                                            <p class="text-gray-400 text-sm">To: customer@email.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-r from-green-500/20 to-green-600/10 backdrop-blur-sm border border-green-500/30 rounded-2xl p-6 ml-8 transform hover:scale-105 transition-all">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-green-400 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-white font-medium">5-star review received!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 2: Private Feedback Channel -->
                <div class="flex flex-col-reverse md:flex-row items-center justify-between mb-32 md:space-x-16">
                    <!-- Visual Element -->
                    <div class="md:w-1/2 flex justify-center mb-10 md:mb-0">
                        <div class="relative w-full max-w-md">
                            <!-- Shield with checkmark -->
                            <div class="relative">
                                <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-3xl"></div>
                                <div class="relative bg-gradient-to-br from-blue-500/20 to-blue-600/10 backdrop-blur-sm border-2 border-blue-500/30 rounded-3xl p-12 transform hover:scale-105 transition-all">
                                    <svg class="w-full h-full text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Text Content -->
                    <div class="md:w-1/2">
                        <div class="inline-block px-4 py-2 bg-blue-500/10 border border-blue-500/30 rounded-full mb-6">
                            <span class="text-blue-400 font-semibold text-sm">PROTECTION</span>
                        </div>
                        <h3 class="text-4xl sm:text-5xl font-bold text-white mb-6">
                            <span class="text-blue-400">Protect</span> your star rating from a bad day
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            No one is perfect, and sometimes a bad experience happens. Instead of letting a single negative review tank your rating, our system gives unhappy customers a private channel to reach out to you directly. You can solve their problem privately, show them you're committed to great service, and protect your public reputation all at once.
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Quick Setup -->
                <div class="flex flex-col md:flex-row items-center justify-between md:space-x-16">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <div class="inline-block px-4 py-2 bg-green-500/10 border border-green-500/30 rounded-full mb-6">
                            <span class="text-green-400 font-semibold text-sm">SIMPLE</span>
                        </div>
                        <h3 class="text-4xl sm:text-5xl font-bold text-white mb-6">
                            Set up in minutes. <span class="block text-green-400">See results immediately.</span>
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            We know you're busy. That's why we designed AfterSay to be a seamless solution. Get set up and running in a matter of minutes, and you'll be on your way to a stronger online reputation and a steady flow of new reviews.
                        </p>
                    </div>
                    <!-- Visual Element -->
                    <div class="md:w-1/2 flex justify-center">
                        <div class="relative w-full max-w-md">
                            <!-- Progress steps -->
                            <div class="space-y-6">
                                <div class="flex items-center space-x-4 group">
                                    <div class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center font-bold text-black group-hover:scale-110 transition-all">1</div>
                                    <div class="flex-1 bg-gradient-to-r from-green-500/20 to-transparent backdrop-blur-sm border border-green-500/30 rounded-xl p-4 group-hover:border-green-400/50 transition-all">
                                        <p class="text-white font-medium">Connect your account</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4 group">
                                    <div class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center font-bold text-black group-hover:scale-110 transition-all">2</div>
                                    <div class="flex-1 bg-gradient-to-r from-green-500/20 to-transparent backdrop-blur-sm border border-green-500/30 rounded-xl p-4 group-hover:border-green-400/50 transition-all">
                                        <p class="text-white font-medium">Customize your message</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4 group">
                                    <div class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center font-bold text-black group-hover:scale-110 transition-all">3</div>
                                    <div class="flex-1 bg-gradient-to-r from-green-500/20 to-transparent backdrop-blur-sm border border-green-500/30 rounded-xl p-4 group-hover:border-green-400/50 transition-all">
                                        <p class="text-white font-medium">Start collecting reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Pricing --}}
        <section id="pricing" class="py-24 px-4 md:px-6 bg-gradient-to-b from-gray-950 to-gray-900 relative overflow-hidden">
            <!-- Background accents -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-green-500/20 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pink-500/20 rounded-full opacity-20 blur-3xl"></div>
            
            <div class="max-w-5xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-4xl sm:text-6xl font-bold text-white mb-4">Simple, <span class="text-green-400">Transparent</span> Pricing</h2>
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto">One straightforward price. Add features as you grow.</p>
                </div>

                <div class="max-w-2xl mx-auto">
                    <!-- Single Pricing Card -->
                    <div class="bg-gradient-to-br from-gray-950 to-gray-900 rounded-3xl p-12 border-2 border-green-400 shadow-2xl shadow-green-500/20 hover:shadow-green-500/40 transition-all transform hover:scale-105">
                        <div class="text-center mb-8">
                            <div class="mb-6">
                                <span class="text-6xl md:text-7xl font-extrabold text-white">$29</span>
                                <span class="text-xl text-gray-400">/month</span>
                            </div>
                            <p class="text-lg text-gray-300">Everything you need to grow your reputation</p>
                        </div>
                        
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start text-gray-300">
                                <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Automated feedback collection</span>
                            </li>
                            <li class="flex items-start text-gray-300">
                                <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Private feedback channel for unhappy customers</span>
                            </li>
                            <li class="flex items-start text-gray-300">
                                <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Unlimited review requests</span>
                            </li>
                            <li class="flex items-start text-gray-300">
                                <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Analytics dashboard</span>
                            </li>
                            <li class="flex items-start text-gray-300">
                                <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Email support</span>
                            </li>
                        </ul>

                        <a href="/home#pricing" class="block w-full px-8 py-5 bg-green-400 text-black text-center rounded-xl text-lg font-bold hover:bg-green-500 transition-all hover:scale-105 shadow-lg shadow-green-400/50">Start Your Free Trial</a>
                        
                        <p class="text-center text-gray-400 text-sm mt-6">No credit card required. Cancel anytime.</p>
                    </div>

                    <div class="text-center mt-12">
                        <p class="text-gray-300 text-lg mb-4">Need custom features or multiple locations?</p>
                        <a href="/home#pricing" class="text-green-400 hover:text-green-300 font-medium text-lg underline">Contact us for custom pricing</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="py-24 px-4 sm:px-6 bg-gray-950 relative overflow-hidden">
            <!-- Background accents -->
            <div class="absolute top-1/4 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-0 w-96 h-96 bg-pink-500/10 rounded-full blur-3xl"></div>

            <div class="max-w-4xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-4xl sm:text-6xl font-bold text-white mb-4">Frequently Asked <span class="text-green-400">Questions</span></h2>
                    <p class="text-lg text-gray-300">Everything you need to know about AfterSay</p>
                </div>

                <div class="space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">How does AfterSay work?</h3>
                        <p class="text-gray-300 leading-relaxed">AfterSay automatically sends personalized review requests to your customers after they interact with your business. Happy customers are directed to leave public reviews on platforms like Google, while those who might leave negative feedback are given a private channel to share concerns directly with you first.</p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">What happens if someone wants to leave a negative review?</h3>
                        <p class="text-gray-300 leading-relaxed">When a customer indicates they had a poor experience, they're given the option to contact you privately instead of posting publicly. This gives you a chance to address their concerns, resolve the issue, and potentially turn a negative experience into a positive one before it affects your online rating.</p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">How long does it take to set up?</h3>
                        <p class="text-gray-300 leading-relaxed">Most businesses are up and running in less than 5 minutes. Simply connect your account, customize your review request message, and start sending requests. No technical knowledge required.</p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">Which review platforms does AfterSay support?</h3>
                        <p class="text-gray-300 leading-relaxed">AfterSay works with all major review platforms including Google, Yelp, Facebook, Trustpilot, and more. You can customize which platform you'd like customers to leave reviews on based on your business needs.</p>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">Can I cancel anytime?</h3>
                        <p class="text-gray-300 leading-relaxed">Yes! There are no long-term contracts or commitments. You can cancel your subscription at any time, and you'll retain access until the end of your current billing period.</p>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl border border-gray-800 hover:border-green-400/50 transition-all p-6">
                        <h3 class="text-xl font-bold text-white mb-3">Is there a free trial?</h3>
                        <p class="text-gray-300 leading-relaxed">Yes! We offer a free trial so you can experience AfterSay risk-free. No credit card required to start your trial.</p>
                    </div>
                </div>

                <!-- Still have questions CTA -->
                <div class="mt-16 text-center">
                    <p class="text-gray-300 text-lg mb-4">Still have questions?</p>
                    <a href="#contact" class="text-green-400 hover:text-green-300 font-medium text-lg underline">Contact our support team</a>
                </div>
            </div>
        </section>
    </main>
</x-layouts.web>