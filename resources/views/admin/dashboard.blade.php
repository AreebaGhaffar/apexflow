@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

<!-- STATS -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-xl p-6 shadow text-center">
        <p class="text-4xl font-bold text-blue-900">{{ $stats['total_leads'] }}</p>
        <p class="text-gray-500 text-sm mt-2">Total Leads</p>
    </div>
    <div class="bg-yellow-50 rounded-xl p-6 shadow text-center">
        <p class="text-4xl font-bold text-yellow-600">{{ $stats['new_leads'] }}</p>
        <p class="text-gray-500 text-sm mt-2">New Leads</p>
    </div>
    <div class="bg-blue-50 rounded-xl p-6 shadow text-center">
        <p class="text-4xl font-bold text-blue-600">{{ $stats['total_employees'] }}</p>
        <p class="text-gray-500 text-sm mt-2">Active Employees</p>
    </div>
    <div class="bg-green-50 rounded-xl p-6 shadow text-center">
        <p class="text-4xl font-bold text-green-600">{{ $stats['today_present'] }}</p>
        <p class="text-gray-500 text-sm mt-2">Present Today</p>
    </div>
</div>

<!-- QUICK LINKS -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
    <a href="{{ route('admin.leads.index') }}"
       class="bg-white rounded-xl p-4 shadow text-center hover:shadow-md transition">
        <p class="text-3xl mb-2">📋</p>
        <p class="font-semibold text-gray-700">View Leads</p>
    </a>
    <a href="{{ route('admin.employees.create') }}"
       class="bg-white rounded-xl p-4 shadow text-center hover:shadow-md transition">
        <p class="text-3xl mb-2">➕</p>
        <p class="font-semibold text-gray-700">Add Employee</p>
    </a>
    <a href="{{ route('admin.attendance.index') }}"
       class="bg-white rounded-xl p-4 shadow text-center hover:shadow-md transition">
        <p class="text-3xl mb-2">📅</p>
        <p class="font-semibold text-gray-700">Attendance</p>
    </a>
    <a href="{{ route('admin.settings') }}"
       class="bg-white rounded-xl p-4 shadow text-center hover:shadow-md transition">
        <p class="text-3xl mb-2">⚙️</p>
        <p class="font-semibold text-gray-700">Site Settings</p>
    </a>
</div>

<!-- RECENT LEADS -->
<div class="bg-white rounded-xl shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="font-bold text-lg text-gray-800">Latest Customer Leads</h2>
        <a href="{{ route('admin.leads.index') }}" class="text-blue-600 text-sm hover:underline">View All →</a>
    </div>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 text-gray-600 text-left">
                <th class="py-3 px-4 rounded-l">Name</th>
                <th class="py-3 px-4">Phone</th>
                <th class="py-3 px-4">Service</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4 rounded-r">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recent_leads as $lead)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4 font-semibold">{{ $lead->name }}</td>
                <td class="py-3 px-4">{{ $lead->phone }}</td>
                <td class="py-3 px-4">{{ $lead->service ?? '—' }}</td>
                <td class="py-3 px-4">
                    <span class="px-2 py-1 rounded-full text-xs font-bold
                        {{ $lead->status === 'new' ? 'bg-yellow-100 text-yellow-800' :
                          ($lead->status === 'contacted' ? 'bg-blue-100 text-blue-800' :
                           'bg-green-100 text-green-800') }}">
                        {{ ucfirst($lead->status) }}
                    </span>
                </td>
                <td class="py-3 px-4 text-gray-400">{{ $lead->created_at->diffForHumans() }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-gray-400">No leads yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection