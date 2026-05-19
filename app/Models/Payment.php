<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'employee_id', 'amount', 'type', 'payment_date', 'month', 'notes'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}