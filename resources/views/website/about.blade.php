@extends('layouts.website')
@section('title', 'About Us')

@section('content')

<!-- HERO -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">About Us</h1>
        <p class="text-blue-200 text-lg">Trusted plumbing experts serving the UAE</p>
    </div>
</section>

<!-- ABOUT CONTENT -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-blue-900 mb-6">
                    {{ $settings['site_name'] ?? 'Apex Flow Technical Services LLC' }}
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    {{ $settings['about_text'] ?? 'Apex Flow Technical Services LLC is a professional plumbing and maintenance company based in the UAE. We provide fast, reliable, and high-quality services for residential and commercial properties.' }}
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Our team of licensed and experienced technicians is available around the clock to handle all your plumbing needs — from emergency repairs to scheduled maintenance.
                </p>
                <div class="mt-8">
                    <a href="{{ route('contact') }}"
                       class="bg-blue-900 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-800">
                        Contact Us Today
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-blue-50 rounded-xl p-6 text-center">
                    <p class="text-4xl font-bold text-blue-900">10+</p>
                    <p class="text-gray-600 mt-2">Years Experience</p>
                </div>
                <div class="bg-yellow-50 rounded-xl p-6 text-center">
                    <p class="text-4xl font-bold text-yellow-600">500+</p>
                    <p class="text-gray-600 mt-2">Projects Done</p>
                </div>
                <div class="bg-green-50 rounded-xl p-6 text-center">
                    <p class="text-4xl font-bold text-green-600">24/7</p>
                    <p class="text-gray-600 mt-2">Available</p>
                </div>
                <div class="bg-red-50 rounded-xl p-6 text-center">
                    <p class="text-4xl font-bold text-red-600">100%</p>
                    <p class="text-gray-600 mt-2">Satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUES -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-12">Our Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-md">
                <div class="text-5xl mb-4">🎯</div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Reliability</h3>
                <p class="text-gray-600">We show up on time, every time. Your schedule matters to us.</p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-md">
                <div class="text-5xl mb-4">⭐</div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Quality</h3>
                <p class="text-gray-600">We use only the best materials and proven techniques.</p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-md">
                <div class="text-5xl mb-4">🤝</div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Integrity</h3>
                <p class="text-gray-600">Honest pricing and transparent communication always.</p>
            </div>
        </div>
    </div>
</section>

@endsection