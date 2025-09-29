<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'customer_id');
    }

    protected $fillable = ['customer_name', 'email', 'password', 'money_owned'];

    protected $attributes = ['money_owned' => 0];

    protected $primaryKey = 'customer_id';
}
