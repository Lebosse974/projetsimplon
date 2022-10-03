<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'image',
        'content',
       
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'post_id', 'id');
    }

    public function communautes()
    {
        return $this->belongsTo(Communaute::class, 'comm_id');
    }
}
