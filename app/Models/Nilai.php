<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'nilai';
    protected $primaryKey = '_id';
    protected $fillable = ['mataPelajaran', 'latihanSoal', 'ulanganHarian', 'UTS', 'UAS', 'avgScore'];
    public $timestamps = false;

    public function calculateScore($arrayLatihanSoal, $arrayUlanganHarian){
        $avgLatihanSoal = ($arrayLatihanSoal[0] + $arrayLatihanSoal[1] + $arrayLatihanSoal[2] + $arrayLatihanSoal[3]) / 4;
        $avgUlanganHarian = ($arrayUlanganHarian[0] + $arrayUlanganHarian[1]) / 2;
    
        $avgScore = $avgLatihanSoal*0.15 + $avgUlanganHarian*0.2 + $this->UTS*0.25 + $this->UAS*0.4;

        $this->avgScore = $avgScore;

        return $this->avgScore;
    }
}
