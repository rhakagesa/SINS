<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'kelas';
    protected $fillable = ['namaKelas', 'listSiswa'];
    public $timestamps = false;
}
