<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['cart', 'customer_id', 'overall_price'];

    protected $primaryKey = 'transaction_id';

    protected $casts = [
        'cart' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
