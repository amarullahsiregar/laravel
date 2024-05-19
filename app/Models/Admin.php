<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    public $timestamp = false;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'admins';
    protected $primaryKey = 'email';
    protected $keyType = 'String';
    protected $fillable = [
        'nama', 'email', 'password'  //Attribut Login Mahasiswa
    ];
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
}
