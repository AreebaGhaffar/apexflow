@extends('layouts.admin')
@section('title', 'Edit Employee')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="font-bold text-xl text-gray-800 mb-6">Edit Employee</h2>
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Full Name *</label>
                    <input type="text" name="name" value="{{ $employee->name }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Phone *</label>
                    <input type="text" name="phone" value="{{ $employee->phone }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Role *</label>
                    <input type="text" name="role" value="{{ $employee->role }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Nationality</label>
                    <input type="text" name="nationality" value="{{ $employee->nationality }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Join Date *</label>
                    <input type="date" name="join_date" value="{{ $employee->join_date }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Salary (AED)</label>
                    <input type="number" name="salary" value="{{ $employee->salary }}" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                        <option value="active" {{ $employee->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $employee->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button type="submit"
                    class="bg-blue-900 text-white px-8 py-2 rounded-lg font-bold hover:bg-blue-800">
                    Update Employee
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