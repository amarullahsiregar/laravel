<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntrianBimbingan extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'antrianbimbingan'; // Nama tabel di database
    protected $primaryKey = 'id_antrian'; // Kunci utama tabel

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'topik_ta',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'waktu_pengajuan' => 'datetime',
        // Atribut lain yang perlu di-cast
    ];
    protected $hidden = [
        // Kolom yang ingin disembunyikan
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'email', 'email');
    }
}
