<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'pseudo',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }


   
     
    
     



    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'user_id', 'id');
    }


    public function communautes()
    {
        return $this->belongsToMany(Communaute::class, 'user_comm', 'user_id', 'comm_id');
    }

    public function communaute()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
