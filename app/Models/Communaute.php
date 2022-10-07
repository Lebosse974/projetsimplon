<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communaute extends Model
{
    use HasFactory;
    protected $table = 'communaute';
    
    public function users()
    {
        return $this->belongsToMany(User::class,'user_com','comm_id', 'user_id' );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'comm_id', 'id');
    }
}
