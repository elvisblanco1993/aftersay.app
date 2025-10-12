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
                    <li><a href="/" class="text-gray-400 hover:text-blue-400 transition-colors">Home</a></li>
                    <li><a href="/#features" class="text-gray-400 hover:text-blue-400 transition-colors">Features</a></li>
                    <li><a href="/#pricing" class="text-gray-400 hover:text-blue-400 transition-colors">Pricing</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-blue-400 transition-colors">About</a></li>
                </ul>
            </div>
            <!-- Legal Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('policy') }}" class="text-gray-400 hover:text-blue-400 transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-blue-400 transition-colors">Terms of Service</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Connect</h4>
                <div class="flex space-x-4">
                    {{-- <a href="https://www.instagram.com/codewizetech?ref=https://aftersay.app" target="x" aria-label="Twitter" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <svg role="img" class="size-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                    </a> --}}
                    <a href="https://www.facebook.com/codewizeco?ref=https://aftersay.app" target="fb" aria-label="Facebook" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <svg role="img" class="size-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-sm text-gray-500 border-t border-gray-800 pt-8">
            &copy; 2025 AfterSay. All rights reserved.
        </div>
    </div>
</footer>