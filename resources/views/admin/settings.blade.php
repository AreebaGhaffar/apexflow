@extends('layouts.admin')
@section('title', 'Site Settings')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="font-bold text-xl text-gray-800 mb-2">Site Settings</h2>
        <p class="text-gray-500 text-sm mb-8">Changes here will reflect instantly on the website.</p>

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <h3 class="font-bold text-blue-900 mb-4 text-sm uppercase tracking-wider">General Info</h3>
            <div class="grid grid-cols-2 gap-4 mb-8">
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Company Name</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Phone Number</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">WhatsApp Number</label>
                    <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}"
                        placeholder="e.g. 971501234567"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    <p class="text-xs text-gray-400 mt-1">No + or spaces. Example: 971501234567</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Email Address</label>
                    <input type="text" name="email" value="{{ $settings['email'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ $settings['address'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Working Hours</label>
                    <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? '' }}"
                        placeholder="e.g. Saturday - Thursday: 8AM - 8PM"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <h3 class="font-bold text-blue-900 mb-4 text-sm uppercase tracking-wider">Home Page Content</h3>
            <div class="grid grid-cols-1 gap-4 mb-8">
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <h3 class="font-bold text-blue-900 mb-4 text-sm uppercase tracking-wider">About Page Content</h3>
            <div class="mb-8">
                <label class="block text-sm font-semibold mb-1 text-gray-700">About Us Text</label>
                <textarea name="about_text" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">{{ $settings['about_text'] ?? '' }}</textarea>
            </div>

            <button type="submit"
                class="bg-blue-900 text-white px-10 py-3 rounded-lg font-bold hover:bg-blue-800 text-lg">
                Save All Settings
            </button>
        </form>
    </div>
</div>

@endsection