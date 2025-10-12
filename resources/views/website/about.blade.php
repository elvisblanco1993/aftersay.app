<x-layouts.web>
    <main>
        {{-- About Hero --}}
        <section class="relative min-h-[60vh] flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden bg-gradient-to-br from-gray-900 via-gray-950 to-black">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>

            <div class="max-w-4xl mx-auto relative z-10">
                <div class="inline-block px-6 py-2 bg-green-500/10 border border-green-500/30 rounded-full mb-8">
                    <span class="text-green-400 font-semibold">OUR STORY</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight text-white mb-6">
                    Built by a Business Owner, <span class="text-green-400">For Business Owners</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                    AfterSay was born out of frustration with the status quo—and a belief that collecting reviews shouldn't be complicated or expensive.
                </p>
            </div>
        </section>

        {{-- The Story --}}
        <section class="py-24 px-4 md:px-6 bg-gray-950">
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                    <!-- Story Content -->
                    <div class="space-y-6">
                        <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 border border-gray-800 hover:border-pink-500/30 transition-all">
                            <div class="w-16 h-16 bg-pink-500/20 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">The Problem</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Like many business owners, Elvis found himself spending hours manually collecting reviews from customers. It was time-consuming and honestly a bit awkward—nobody enjoys chasing people down for feedback.
                            </p>
                        </div>

                        <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 border border-gray-800 hover:border-blue-500/30 transition-all">
                            <div class="w-16 h-16 bg-blue-500/20 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">The Search</h3>
                            <p class="text-gray-300 leading-relaxed">
                                He started looking for solutions, but everything he found was either way too expensive for a small business or packed with complicated features he didn't need. Just unnecessary noise.
                            </p>
                        </div>
                    </div>

                    <!-- Solution Content -->
                    <div>
                        <div class="bg-gradient-to-br from-green-500/10 to-green-600/5 rounded-2xl p-10 border-2 border-green-400/30 shadow-xl shadow-green-500/10 hover:shadow-green-500/20 transition-all">
                            <div class="w-20 h-20 bg-green-400 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">The Solution</h3>
                            <p class="text-gray-300 leading-relaxed mb-6">
                                So Elvis built AfterSay—a simple, affordable tool that does exactly what it needs to do and nothing more. No fluff, no confusion, just automated review collection that actually works.
                            </p>
                            <p class="text-green-400 font-medium text-lg">
                                Made for real businesses who want real results.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Founder Quote -->
                <div class="max-w-5xl mx-auto mb-20">
                    <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 md:p-12 border border-gray-800 relative hover:border-green-400/30 transition-all">
                        <svg class="absolute top-6 left-6 w-12 h-12 text-green-400/20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path>
                        </svg>
                        <blockquote class="relative z-10">
                            <p class="text-xl md:text-2xl text-gray-300 italic mb-6 leading-relaxed">
                                I built AfterSay because I needed it for my own business. If you're tired of manually asking for reviews or paying too much for bloated software, this is for you.
                            </p>
                            <footer class="flex items-center space-x-4">
                                <img src="{{ asset('static/elvis.jpg') }}" alt="E" class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center">
                                <div>
                                    <p class="text-white font-bold">Elvis Blanco Gonzalez</p>
                                    <p class="text-gray-400 text-sm">Founder, AfterSay</p>
                                </div>
                            </footer>
                        </blockquote>
                    </div>
                </div>

                <!-- Mission & Values -->
                <div class="space-y-8">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">What We <span class="text-green-400">Stand For</span></h2>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Simplicity -->
                        <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 border border-gray-800 hover:border-green-400/30 transition-all text-center">
                            <div class="w-16 h-16 bg-green-400/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Simplicity First</h3>
                            <p class="text-gray-300">No bloated features. No overwhelming dashboards. Just what you need to get more reviews.</p>
                        </div>

                        <!-- Affordability -->
                        <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 border border-gray-800 hover:border-green-400/30 transition-all text-center">
                            <div class="w-16 h-16 bg-green-400/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Fair Pricing</h3>
                            <p class="text-gray-300">Built for small businesses with real budgets. No enterprise-level pricing for basic features.</p>
                        </div>

                        <!-- Results -->
                        <div class="bg-gradient-to-br from-gray-900 to-gray-950 rounded-2xl p-8 border border-gray-800 hover:border-green-400/30 transition-all text-center">
                            <div class="w-16 h-16 bg-green-400/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Real Results</h3>
                            <p class="text-gray-300">We focus on what matters: helping you collect more positive reviews and grow your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-20 px-4 sm:px-6 bg-gray-900">
            <div class="max-w-5xl mx-auto px-8 sm:px-12 py-16 text-center border-2 border-green-400 rounded-3xl shadow-2xl shadow-green-500/30 bg-gradient-to-br from-gray-950 to-gray-900 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-green-400 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-pink-400 rounded-full blur-3xl"></div>
                </div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl sm:text-5xl font-bold text-white mb-4">Ready to Join Us?</h2>
                    <p class="text-lg text-gray-300 mb-8">See why hundreds of businesses trust AfterSay to manage their reviews.</p>
                    <a href="{{ route('register') }}" class="inline-block px-8 py-5 bg-green-400 text-black rounded-xl md:text-xl font-bold hover:bg-green-500 transition-all hover:scale-105 shadow-lg shadow-green-400/50">Start Your Free Trial</a>
                </div>
            </div>
        </section>
    </main>
</x-layouts.web>