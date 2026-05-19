@extends('layouts.admin')
@section('title', 'Add Employee')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="font-bold text-xl text-gray-800 mb-6">Add New Employee</h2>
        <form action="{{ route('admin.employees.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Full Name *</label>
                    <input type="text" name="name" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Phone *</label>
                    <input type="text" name="phone" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Role *</label>
                    <input type="text" name="role" required placeholder="e.g. Plumber, Technician"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Nationality</label>
                    <input type="text" name="nationality"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Join Date *</label>
                    <input type="date" name="join_date" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Salary (AED)</label>
                    <input type="number" name="salary" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button type="submit"
                    class="bg-blue-900 text-white px-8 py-2 rounded-lg font-bold hover:bg-blue-800">
                    Save Employee
                </button>
                <a href="{{ route('admin.employees.index') }}"
                   class="bg-gray-100 text-gray-700 px-8 py-2 rounded-lg font-bold hover:bg-gray-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection