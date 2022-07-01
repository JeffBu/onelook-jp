<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company',
        'address',
        'phone_number',
        'notification_on'
    ];
}
