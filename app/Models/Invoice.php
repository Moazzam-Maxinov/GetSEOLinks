<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_guid',
        'order_id',
        'user_id',
        'total_amount',
        'status',
        'payment_method',
        'transaction_id',
        'issued_at',
        'paid_at',
        'notes',
        'created_at',
        'updated_at'
    ];
}
