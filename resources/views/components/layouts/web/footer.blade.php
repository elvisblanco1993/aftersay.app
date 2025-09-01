<footer class="bg-gray-950 py-12 px-4 md:px-6 footer-pattern">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <x-app-logo />
                <p class="text-gray-400 text-sm max-w-sm">Automating your business reputation, one review at a time.</p>
            </div>
            <!-- Navigation Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">Home</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-blue-400 transition-colors">Features</a></li>
                    <li><a href="{{ route('pricing') }}" class="text-gray-400 hover:text-blue-400 transition-colors">Pricing</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-blue-400 transition-colors">About</a></li>
                </ul>
            </div>
            <!-- Legal Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-blue-400 transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-blue-400 transition-colors">Terms of Service</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Connect</h4>
                <div class="flex space-x-4">
                    <a href="#" aria-label="Twitter" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-1.042.614-2.188 1.062-3.42 1.291a4.912 4.912 0 00-8.384 4.482c-3.268-.2-6.185-1.725-8.12-4.102a4.887 4.887 0 00-.66 2.45c0 1.7.868 3.193 2.188 4.064-.808-.025-1.565-.245-2.228-.616v.061a4.88 4.88 0 003.922 4.793 4.872 4.872 0 01-2.21.084c.725 2.15 2.83 3.718 5.333 3.762A9.704 9.704 0 010 20.478c2.81 1.791 6.163 2.846 9.728 2.846 11.69 0 18.06-9.67 18.06-18.056 0-.276-.008-.55-.022-.823a12.915 12.915 0 003.176-3.29z"/></svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.04c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zM15 13h-2v4h-2v-4h-2V11h4V9c0-1.66 1.34-3 3-3h1v2h-1c-.55 0-1 .45-1 1v2h2l1 2z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.04c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm4 1.5c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm3.95 6.09c-.06 1.48-.19 2.9-.53 4.29-.3 1.25-.97 2.37-2.02 3.42-1.05 1.05-2.17 1.72-3.42 2.02-1.39.34-2.81.47-4.29.53-1.48.06-2.9-.07-4.29-.41-1.25-.3-2.37-.97-3.42-2.02-1.05-1.05-1.72-2.17-2.02-3.42-.34-1.39-.47-2.81-.53-4.29-.06-1.48.07-2.9.41-4.29.3-1.25.97-2.37 2.02-3.42 1.05-1.05 2.17-1.72 3.42-2.02 1.39-.34 2.81-.47 4.29-.53 1.48-.06 2.9.07 4.29.41 1.25.3 2.37.97 3.42 2.02 1.05 1.05 1.72 2.17 2.02 3.42.34 1.39.47 2.81.53 4.29zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-sm text-gray-500 border-t border-gray-800 pt-8">
            &copy; 2025 AfterSay. All rights reserved.
        </div>
    </div>
</footer>