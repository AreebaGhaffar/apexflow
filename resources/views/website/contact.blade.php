@extends('layouts.website')
@section('title', 'Contact Us')

@section('content')

<!-- HERO -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
        <p class="text-blue-200 text-lg">Get a free quote today — we respond within minutes</p>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-8 text-center font-semibold text-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-12">

            <!-- CONTACT FORM -->
            <div class="bg-white shadow-xl rounded-2xl p-8">
                <h2 class="text-2xl font-bold mb-6 text-blue-900">Get a Free Quote</h2>
                <form action="{{ route('lead.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Your Name *</label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Phone Number *</label>
                        <input type="text" name="phone" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Email Address</label>
                        <input type="email" name="email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Service Needed</label>
                        <select name="service" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                            <option value="">Select a service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->name }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Message</label>
                        <textarea name="message" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                            placeholder="Describe your issue..."></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-900 text-white py-3 rounded-lg font-bold hover:bg-blue-800 text-lg">
                        Send Request
                    </button>
                </form>
            </div>

            <!-- CONTACT INFO -->
            <div class="space-y-6">
                <div class="bg-blue-50 rounded-xl p-6">
                    <p class="font-bold text-blue-900 mb-2 text-lg">📞 Phone</p>
                    <a href="tel:{{ $settings['phone'] ?? '' }}"
                       class="text-blue-700 text-xl font-semibold hover:underline">
                        {{ $settings['phone'] ?? '+971 XX XXX XXXX' }}
                    </a>
                </div>
                <div class="bg-green-50 rounded-xl p-6">
                    <p class="font-bold text-green-900 mb-2 text-lg">💬 WhatsApp</p>
                    <a href="https://wa.me/{{ $settings['whatsapp'] ?? '' }}" target="_blank"
                       class="text-green-700 text-xl font-semibold hover:underline">
                        Chat on WhatsApp
                    </a>
                </div>
                <div class="bg-gray-50 rounded-xl p-6">
                    <p class="font-bold text-gray-900 mb-2 text-lg">📧 Email</p>
                    <p class="text-gray-700">{{ $settings['email'] ?? 'info@apexflow.ae' }}</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-6">
                    <p class="font-bold text-gray-900 mb-2 text-lg">📍 Address</p>
                    <p class="text-gray-700">{{ $settings['address'] ?? 'Dubai, UAE' }}</p>
                </div>
                <div class="bg-yellow-50 rounded-xl p-6">
                    <p class="font-bold text-yellow-900 mb-2 text-lg">🕐 Working Hours</p>
                    <p class="text-gray-700">{{ $settings['working_hours'] ?? 'Saturday - Thursday: 8AM - 8PM' }}</p>
                    <p class="text-gray-700">Emergency: 24/7</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection