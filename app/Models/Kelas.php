<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'kelas';
    protected $primaryKey = '_id';
    protected $fillable = ['namaKelas', 'listSiswa'];
    public $timestamps = false;
    
    public function relationSiswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }
}
