<x-layouts.web>
    <main>
        {{-- Hero --}}
        <section class="relative sm:min-h-screen flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden hero-pattern">
            <!-- Background Blob -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-128 h-128 bg-pink-500/50 rounded-full opacity-10 blur-3xl animate-pulse duration-1000"></div>
                <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-green-600/40 rounded-full opacity-15 blur-3xl animate-pulse delay-800"></div>
            </div>
    
            <div class="max-w-7xl mx-auto relative z-10">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight text-white mb-4">
                    Effortlessly Grow Your Business with More 5-Star Reviews.
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-8">AfterSay is the all-in-one platform that automates customer feedback collection, helps you manage your online reputation, and turns happy clients into powerful brand advocates.</p>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#get-started" class="px-8 py-5 bg-green-400 text-black rounded-lg md:text-xl font-medium">Get Started</a>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section id="features" class="py-20 px-4 md:px-6 bg-gray-950">
            <div class="max-w-7xl mx-auto">
                <!-- Feature 1: Automated Feedback Collection -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-24 md:space-x-12">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <h3 class="text-3xl sm:text-5xl font-semibold text-white mb-4"><span class="text-pink-500">Stop waiting</span> for reviews to happen</h3>
                        <p class="text-white text-lg leading-relaxed">
                            Getting more reviews for your business has never been simpler. AfterSay automates the entire process, sending personalized requests to your clients on your behalf. More positive reviews, less work for you. It's that easy.
                        </p>
                    </div>
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center">
                        {{--  --}}
                    </div>
                </div>

                <!-- Feature 2: Private Feedback Channel -->
                <div class="flex flex-col-reverse md:flex-row items-center justify-between mb-24 md:space-x-12">
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center mb-10 md:mb-0">
                        {{--  --}}
                    </div>
                    <!-- Text Content -->
                    <div class="md:w-1/2">
                        <h3 class="text-3xl sm:text-5xl font-semibold text-white mb-4"><span class="text-blue-500">Protect</span> your star rating from a bad day</h3>
                        <p class="text-white text-lg leading-relaxed">
                            No one is perfect, and sometimes a bad experience happens. Instead of letting a single negative review tank your rating, our system gives unhappy customers a private channel to reach out to you directly. You can solve their problem privately, show them you're committed to great service, and protect your public reputation all at once.
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Reputation Protection -->
                <div class="flex flex-col md:flex-row items-center justify-between md:space-x-12">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <h3 class="text-3xl sm:text-5xl font-semibold text-white mb-4">Set up in minutes. <span class="block text-green-400">See results immediately.</span></h3>
                        <p class="text-white text-lg leading-relaxed">
                            We know you're busy. That's why we designed AfterSay to be a seamless solution. Get set up and running in a matter of minutes, and you'll be on your way to a stronger online reputation and a steady flow of new reviews.
                        </p>
                    </div>
                    <!-- Image/SVG -->
                    <div class="md:w-1/2 flex justify-center">
                        {{--  --}}
                    </div>
                </div>

            </div>
        </section>

        {{-- Call to Action --}}
        <section class="mb-12 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-24 space-y-8 text-center border-2 border-green-600 rounded-xl shadow-lg shadow-green-500/30 bg-center cta-pattern">
                <h2 class="text-3xl sm:text-5xl font-bold text-white">Ready to Grow Your Reputation?</h2>
                <p class="text-lg text-white mb-12">Join hundreds of businesses who are already using AfterSay to get more 5-star reviews.</p>
                <a href="{{ route('register') }}" class="px-8 py-5 bg-green-400 text-black rounded-lg md:text-xl font-medium">Create Your Account</a>
            </div>
        </section>
    </main>
</x-layouts.web>