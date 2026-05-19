@extends('layouts.website')
@section('title', 'Professional Plumbing Services in UAE')

@section('content')

<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-24">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">
            {{ $settings['hero_title'] ?? 'Expert Plumbing & Maintenance in UAE' }}
        </h1>
        <p class="text-xl text-blue-200 mb-10 max-w-2xl mx-auto">
            {{ $settings['hero_subtitle'] ?? 'Fast, reliable, professional plumbing services for homes and businesses.' }}
        </p>
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="{{ route('contact') }}"
               class="bg-yellow-400 text-blue-900 px-8 py-3 rounded-full font-bold text-lg hover:bg-yellow-300">
                Get Free Quote
            </a>
            <a href="tel:{{ $settings['phone'] ?? '' }}"
               class="border-2 border-white text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-white hover:text-blue-900">
                📞 Call Now
            </a>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-4">Our Services</h2>
        <p class="text-center text-gray-500 mb-12">Professional solutions for all your plumbing needs</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                <div class="text-4xl mb-4">{{ $service->icon ?? '🔧' }}</div>
                <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $service->name }}</h3>
                <p class="text-gray-600 text-sm">{{ $service->description }}</p>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-400">Services coming soon.</div>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('services') }}" class="text-blue-700 font-semibold hover:underline">
                View All Services →
            </a>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-12">Why Choose Apex Flow?</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="p-6">
                <div class="text-5xl mb-4">⚡</div>
                <p class="font-bold text-blue-900">Fast Response</p>
                <p class="text-gray-500 text-sm mt-2">We arrive quickly when you need us most</p>
            </div>
            <div class="p-6">
                <div class="text-5xl mb-4">🛡️</div>
                <p class="font-bold text-blue-900">Licensed & Insured</p>
                <p class="text-gray-500 text-sm mt-2">Fully certified professionals</p>
            </div>
            <div class="p-6">
                <div class="text-5xl mb-4">💯</div>
                <p class="font-bold text-blue-900">Quality Work</p>
                <p class="text-gray-500 text-sm mt-2">Guaranteed satisfaction on every job</p>
            </div>
            <div class="p-6">
                <div class="text-5xl mb-4">🕐</div>
                <p class="font-bold text-blue-900">24/7 Available</p>
                <p class="text-gray-500 text-sm mt-2">Emergency services around the clock</p>
            </div>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="bg-yellow-400 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-4">Need a Plumber Right Now?</h2>
        <p class="text-blue-800 mb-8 text-lg">Contact us today for a free quote. Fast, reliable service across UAE.</p>
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="{{ route('contact') }}"
               class="bg-blue-900 text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-blue-800">
                Get Free Quote
            </a>
            <a href="tel:{{ $settings['phone'] ?? '' }}"
               class="bg-white text-blue-900 px-8 py-3 rounded-full font-bold text-lg hover:bg-gray-100">
                📞 {{ $settings['phone'] ?? 'Call Us' }}
            </a>
        </div>
    </div>
</section>

@endsection