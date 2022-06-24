<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'title',
        'video',
        'size',
        'user_id',
        'is_invalid',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function views()
    {
        return $this->hasMany(VideoView::class);
    }

    public function uploader()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function access()
    {
        return $this->hasOne(VideoAccess::class, 'video_record_key', 'key');
    }
}
