@extends('layouts.admin')
@section('title', 'Payments')

@section('content')

<div class="grid md:grid-cols-2 gap-8">

    <!-- ADD PAYMENT FORM -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg text-gray-800 mb-6">Record Payment</h2>
        <form action="{{ route('admin.payments.store') }}" method="POST">
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
                <label class="block text-sm font-semibold mb-1 text-gray-700">Amount (AED) *</label>
                <input type="number" name="amount" step="0.01" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Payment Type *</label>
                <select name="type" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="salary">Salary</option>
                    <option value="bonus">Bonus</option>
                    <option value="advance">Advance</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Payment Date *</label>
                <input type="date" name="payment_date" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Month *</label>
                <input type="text" name="month" placeholder="e.g. April 2025" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1 text-gray-700">Notes</label>
                <textarea name="notes" rows="2"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2"></textarea>
            </div>
            <button type="submit"
                class="w-full bg-blue-900 text-white py-2 rounded-lg font-bold hover:bg-blue-800">
                Record Payment
            </button>
        </form>
    </div>

    <!-- PAYMENTS LIST -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg text-gray-800 mb-6">Payment Records</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-left">
                    <th class="py-2 px-3">Employee</th>
                    <th class="py-2 px-3">Amount</th>
                    <th class="py-2 px-3">Type</th>
                    <th class="py-2 px-3">Month</th>
                    <th class="py-2 px-3">Date</th>
                    <th class="py-2 px-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-3 font-semibold">{{ $payment->employee->name }}</td>
                    <td class="py-2 px-3 text-green-700 font-bold">AED {{ number_format($payment->amount, 2) }}</td>
                    <td class="py-2 px-3">
                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                            {{ ucfirst($payment->type) }}
                        </span>
                    </td>
                    <td class="py-2 px-3">{{ $payment->month }}</td>
                    <td class="py-2 px-3 text-gray-400">{{ $payment->payment_date }}</td>
                    <td class="py-2 px-3">
                        <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST"
                              onsubmit="return confirm('Delete this payment?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-xs font-semibold">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-400">No payments recorded yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection