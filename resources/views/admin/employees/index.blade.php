@extends('layouts.admin')
@section('title', 'Employees')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="font-bold text-lg text-gray-800">All Employees</h2>
    <a href="{{ route('admin.employees.create') }}"
       class="bg-blue-900 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-800">
        + Add Employee
    </a>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 text-gray-600 text-left">
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Phone</th>
                <th class="py-3 px-4">Role</th>
                <th class="py-3 px-4">Nationality</th>
                <th class="py-3 px-4">Join Date</th>
                <th class="py-3 px-4">Salary</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4 text-gray-400">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-semibold">{{ $employee->name }}</td>
                <td class="py-3 px-4">{{ $employee->phone }}</td>
                <td class="py-3 px-4">{{ $employee->role }}</td>
                <td class="py-3 px-4">{{ $employee->nationality ?? '—' }}</td>
                <td class="py-3 px-4">{{ $employee->join_date }}</td>
                <td class="py-3 px-4">AED {{ number_format($employee->salary, 2) }}</td>
                <td class="py-3 px-4">
                    <span class="px-2 py-1 rounded-full text-xs font-bold
                        {{ $employee->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </td>
                <td class="py-3 px-4 flex gap-2">
                    <a href="{{ route('admin.employees.edit', $employee) }}"
                       class="bg-blue-100 text-blue-700 px-3 py-1 rounded text-xs font-semibold hover:bg-blue-200">
                        Edit
                    </a>
                    <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST"
                          onsubmit="return confirm('Delete this employee?')">
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
                <td colspan="9" class="py-8 text-center text-gray-400">No employees yet. Add your first employee.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection