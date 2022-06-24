<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_record_key',
        'access_code',
        'granted_by_user_id'
    ];
}
