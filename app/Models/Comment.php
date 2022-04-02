<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table    = 'comments';
    protected $guarded  = [];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $casts    = ['status' => 'int'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->belongsTo(User::class, 'post_id', 'id');
    }
}
