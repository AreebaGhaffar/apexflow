@extends('layouts.admin')
@section('title', 'Add Service')

@section('content')

<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="font-bold text-xl text-gray-800 mb-6">Add New Service</h2>
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Service Name *</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Icon (emoji)</label>
                <input type="text" name="icon" placeholder="e.g. 🔧 🚿 🪠"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                <p class="text-xs text-gray-400 mt-1">Paste any emoji as the icon</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Status</label>
                <select name="active" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="flex gap-3">
                <button type="submit"
                    class="bg-blue-900 text-white px-8 py-2 rounded-lg font-bold hover:bg-blue-800">
                    Save Service
                </button>
                <a href="{{ route('admin.services.index') }}"
                   class="bg-gray-100 text-gray-700 px-8 py-2 rounded-lg font-bold hover:bg-gray-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection