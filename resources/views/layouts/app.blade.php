<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('cw-logo.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <title>{{ $title ?? 'Creative Waff | Software Engineering & Live Production' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Creative Waff bridges software engineering, live event production, and motion design.' }}">

    <!-- Open Graph for Meta & WhatsApp Previews -->
    <meta property="og:title" content="{{ $title ?? 'Creative Waff' }}" />
    <meta property="og:description" content="{{ $metaDescription ?? 'Software Engineering Meets High-Impact Live Production.' }}" />
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Alpine.js for lightweight mobile navigation toggle -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-950 text-gray-100 antialiased min-h-screen flex flex-col justify-between">

<!-- Header Navigation with Mobile Hamburger -->
<header x-data="{ mobileMenuOpen: false }" class="border-b border-gray-800 bg-gray-900/90 backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="z-50" aria-label="Creative Waff home">
            <img src="{{ asset('cw-logo.svg') }}" alt="Creative Waff" class="h-10 w-auto">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-amber-400 transition {{ request()->routeIs('home') ? 'text-amber-400 font-semibold' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="hover:text-amber-400 transition {{ request()->routeIs('about') ? 'text-amber-400 font-semibold' : '' }}">About</a>
            <a href="{{ route('services.index') }}" class="hover:text-amber-400 transition {{ request()->routeIs('services.*') ? 'text-amber-400 font-semibold' : '' }}">Services Catalog</a>
            <a href="{{ route('projects.index') }}" class="hover:text-amber-400 transition {{ request()->routeIs('projects.*') ? 'text-amber-400 font-semibold' : '' }}">Projects</a>
            <a href="{{ route('contact') }}" class="bg-amber-500 text-gray-950 font-bold px-4 py-2 rounded-lg hover:bg-amber-400 transition">Contact</a>
        </nav>

        <!-- Mobile Hamburger Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen"
                type="button"
                class="md:hidden text-gray-400 hover:text-white focus:outline-none p-2"
                aria-label="Toggle navigation">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu Dropdown -->
    <div x-show="mobileMenuOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         class="md:hidden border-b border-gray-800 bg-gray-900 px-6 pt-2 pb-6 space-y-4">

        <a href="{{ route('home') }}" class="block text-base font-medium text-gray-200 hover:text-amber-400 transition">Home</a>
        <a href="{{ route('about') }}" class="block text-base font-medium text-gray-200 hover:text-amber-400 transition">About</a>
        <a href="{{ route('services.index') }}" class="block text-base font-medium text-gray-200 hover:text-amber-400 transition">Services Catalog</a>
        <a href="{{ route('projects.index') }}" class="block text-base font-medium text-gray-200 hover:text-amber-400 transition">Projects</a>

        <div class="pt-2">
            <a href="{{ route('contact') }}" class="block text-center w-full bg-amber-500 text-gray-950 font-bold px-4 py-3 rounded-xl hover:bg-amber-400 transition">
                Contact Us
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl w-full mx-auto px-6 py-12 flex-grow">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="border-t border-gray-800 bg-gray-900 py-8 text-sm text-gray-400 text-center">
    <div class="max-w-7xl mx-auto px-6 space-y-2">
        <p>&copy; {{ date('Y') }} Creative Waff. All rights reserved.</p>
        <p class="text-xs text-gray-500">Official Business Entity & Registered Digital Service Provider.</p>
    </div>
</footer>

@livewireScripts
</body>
</html>
