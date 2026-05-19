@extends('layouts.admin')
@section('title', 'Attendance')

@section('content')

<div class="grid md:grid-cols-2 gap-8">

    <!-- MARK ATTENDANCE FORM -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg text-gray-800 mb-6">Mark Attendance</h2>
        <form action="{{ route('admin.attendance.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Employee *</label>
                <select name="employee_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }} — {{ $employee->role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Date *</label>
                <input type="date" name="date" value="{{ $date }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Status *</label>
                <select name="status" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="half_day">Half Day</option>
                    <option value="leave">Leave</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Check In</label>
                <input type="time" name="check_in"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Check Out</label>
                <input type="time" name="check_out"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Hours Worked</label>
                <input type="number" name="hours_worked" step="0.5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <button type="submit"
                class="w-full bg-blue-900 text-white py-2 rounded-lg font-bold hover:bg-blue-800">
                Save Attendance
            </button>
        </form>
    </div>

    <!-- ATTENDANCE LIST -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-bold text-lg text-gray-800">Attendance for {{ $date }}</h2>
            <form method="GET">
                <input type="date" name="date" value="{{ $date }}"
                    onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
            </form>
        </div>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-left">
                    <th class="py-2 px-3">Employee</th>
                    <th class="py-2 px-3">Status</th>
                    <th class="py-2 px-3">Check In</th>
                    <th class="py-2 px-3">Check Out</th>
                    <th class="py-2 px-3">Hours</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                <tr class="border-t">
                    <td class="py-2 px-3 font-semibold">{{ $attendance->employee->name }}</td>
                    <td class="py-2 px-3">
                        <span class="px-2 py-1 rounded-full text-xs font-bold
                            {{ $attendance->status === 'present' ? 'bg-green-100 text-green-800' :
                              ($attendance->status === 'absent' ? 'bg-red-100 text-red-800' :
                               'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($attendance->status) }}
                        </span>
                    </td>
                    <td class="py-2 px-3">{{ $attendance->check_in ?? '—' }}</td>
                    <td class="py-2 px-3">{{ $attendance->check_out ?? '—' }}</td>
                    <td class="py-2 px-3">{{ $attendance->hours_worked ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-6 text-center text-gray-400">No attendance marked for this date.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection