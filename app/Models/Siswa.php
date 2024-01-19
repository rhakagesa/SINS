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
    protected $fillable = ['namaSiswa', 'nilaiMataPelajaran'];
    public $timestamps = false;
    
}
