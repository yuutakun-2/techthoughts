<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Blog;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $appends = [
        'nickname'
    ];

    public function getNicknameAttribute() {
        return $this->name . $this->username;
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setUsernameAttribute ($value) {
        $this->attributes['username'] = $value.fake()->numberBetween(1,100);
    }

//     // Accessor Test
//     public function getEmailAttribute($value) {
//         return "Mr. email heheh " . $value;
//     }

//     // Mutator test
//     public function setNameAttribute ($value) {
//         $this->attributes['name'] = "Mutator " . $value;
//     }
}
