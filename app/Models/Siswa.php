<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'jurusan',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'email',
        'jenis_kelamin',
    ];
}
