<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'card_id',
        'last_4',
        'brand',
        'fingerprint',
        'exp_month',
        'exp_year',
    ];
}
