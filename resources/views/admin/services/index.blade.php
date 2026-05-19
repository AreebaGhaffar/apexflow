@extends('layouts.admin')
@section('title', 'Services')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="font-bold text-lg text-gray-800">All Services</h2>
    <a href="{{ route('admin.services.create') }}"
       class="bg-blue-900 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-800">
        + Add Service
    </a>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 text-gray-600 text-left">
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Icon</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Description</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4 text-gray-400">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 text-2xl">{{ $service->icon ?? '🔧' }}</td>
                <td class="py-3 px-4 font-semibold">{{ $service->name }}</td>
                <td class="py-3 px-4 text-gray-500 max-w-xs truncate">{{ $service->description ?? '—' }}</td>
                <td class="py-3 px-4">
                    <span class="px-2 py-1 rounded-full text-xs font-bold
                        {{ $service->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $service->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="py-3 px-4 flex gap-2">
                    <a href="{{ route('admin.services.edit', $service) }}"
                       class="bg-blue-100 text-blue-700 px-3 py-1 rounded text-xs font-semibold hover:bg-blue-200">
                        Edit
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                          onsubmit="return confirm('Delete this service?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-100 text-red-700 px-3 py-1 rounded text-xs font-semibold hover:bg-red-200">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-8 text-center text-gray-400">No services yet. Add your first service.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection