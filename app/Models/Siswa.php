<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'siswa';
    protected $primaryKey = '_id';
    protected $fillable = ['namaSiswa', 'nilaiMataPelajaran', 'kelas_id'];
    public $timestamps = false;
    
    public function relationKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function relationNilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

}
