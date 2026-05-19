<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Apex Flow' }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans">

<!-- NAVBAR -->
<nav class="bg-blue-900 text-white shadow-lg sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold">
            ⚙️ {{ $settings['site_name'] ?? 'Apex Flow' }}
        </a>
        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
            <a href="{{ route('services') }}" class="hover:text-yellow-300">Services</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-300">About Us</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-300">Contact</a>
        </div>
        <a href="tel:{{ $settings['phone'] ?? '' }}"
           class="bg-yellow-400 text-blue-900 px-4 py-2 rounded-full font-bold text-sm hover:bg-yellow-300">
            📞 Call Now
        </a>
    </div>
</nav>

<!-- WHATSAPP FLOATING BUTTON -->
<a href="https://wa.me/{{ $settings['whatsapp'] ?? '' }}"
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full px-5 py-3 shadow-2xl z-50 hover:bg-green-600 font-bold">
    💬 WhatsApp
</a>

<!-- MAIN CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="bg-blue-900 text-white py-10 mt-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <p class="font-bold text-lg">{{ $settings['site_name'] ?? 'Apex Flow' }}</p>
        <p class="text-blue-300 mt-2 text-sm">{{ $settings['address'] ?? 'UAE' }}</p>
        <p class="text-blue-300 text-sm">{{ $settings['email'] ?? '' }}</p>
        <p class="text-blue-200 text-xs mt-4">© {{ date('Y') }} All rights reserved</p>
    </div>
</footer>

</body>
</html>