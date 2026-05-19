<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Employee;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('employee')->latest()->get();
        $employees = Employee::where('status', 'active')->get();
        return view('admin.payments.index', compact('payments', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => 'required|exists:employees,id',
            'amount'       => 'required|numeric',
            'type'         => 'required|string',
            'payment_date' => 'required|date',
            'month'        => 'required|string',
            'notes'        => 'nullable|string',
        ]);

        Payment::create($request->all());
        return back()->with('success', 'Payment recorded!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Payment deleted.');
    }
}