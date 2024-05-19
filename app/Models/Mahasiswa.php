<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model implements Authenticatable
{
    public $timestamp = false;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'password',
        'dosbing1',
        'topik_ta',
        'dosbing2'  //Attribut Login Mahasiswa
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
