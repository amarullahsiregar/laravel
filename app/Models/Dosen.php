<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model implements Authenticatable
{
    public $timestamp = false;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'dosens';
    protected $fillable = [
        'id',
        'email',
        'nama',
        'password',
        'inisial_dosen',
        'status_kehadiran',
        'kesediaan_bimbingan',
        'slot_bimbingan',
        //Attribut Login Dosen
    ];
}
