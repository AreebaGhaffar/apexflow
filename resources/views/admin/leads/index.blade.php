@extends('layouts.admin')
@section('title', 'Customer Leads')

@section('content')

<div class="bg-white rounded-xl shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="font-bold text-lg text-gray-800">All Customer Leads</h2>
        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-bold">
            {{ $leads->count() }} Total
        </span>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 text-gray-600 text-left">
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Phone</th>
                <th class="py-3 px-4">Email</th>
                <th class="py-3 px-4">Service</th>
                <th class="py-3 px-4">Message</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Date</th>
                <th class="py-3 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leads as $lead)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4 text-gray-400">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-semibold">{{ $lead->name }}</td>
                <td class="py-3 px-4">
                    <a href="tel:{{ $lead->phone }}" class="text-blue-600 hover:underline">
                        {{ $lead->phone }}
                    </a>
                </td>
                <td class="py-3 px-4">{{ $lead->email ?? '—' }}</td>
                <td class="py-3 px-4">{{ $lead->service ?? '—' }}</td>
                <td class="py-3 px-4 max-w-xs truncate">{{ $lead->message ?? '—' }}</td>
                <td class="py-3 px-4">
                    <form action="{{ route('admin.leads.update', $lead) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()"
                            class="text-xs border rounded px-2 py-1
                            {{ $lead->status === 'new' ? 'bg-yellow-100 text-yellow-800' :
                              ($lead->status === 'contacted' ? 'bg-blue-100 text-blue-800' :
                               'bg-green-100 text-green-800') }}">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </form>
                </td>
                <td class="py-3 px-4 text-gray-400">{{ $lead->created_at->format('d M Y') }}</td>
                <td class="py-3 px-4">
                    <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST"
                          onsubmit="return confirm('Delete this lead?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700 font-semibold text-xs">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="py-8 text-center text-gray-400">No leads yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection