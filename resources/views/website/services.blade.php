@extends('layouts.website')
@section('title', 'Our Services')

@section('content')

<!-- HERO -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Our Services</h1>
        <p class="text-blue-200 text-lg">Professional plumbing and maintenance solutions across UAE</p>
    </div>
</section>

<!-- SERVICES GRID -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition border border-gray-100">
                <div class="text-5xl mb-4">{{ $service->icon ?? '🔧' }}</div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">{{ $service->name }}</h3>
                <p class="text-gray-600">{{ $service->description }}</p>
                <a href="{{ route('contact') }}"
                   class="inline-block mt-6 bg-blue-900 text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-blue-800">
                    Request Service
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 text-gray-400">
                <p class="text-5xl mb-4">🔧</p>
                <p class="text-xl">Services will be listed here soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-blue-200 mb-8">Contact us now and get a free quote within minutes.</p>
        <a href="{{ route('contact') }}"
           class="bg-yellow-400 text-blue-900 px-8 py-3 rounded-full font-bold text-lg hover:bg-yellow-300">
            Get Free Quote
        </a>
    </div>
</section>

@endsection