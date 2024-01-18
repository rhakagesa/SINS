<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'nilai';
    protected $fillable = ['mataPelajaran','latihanSoal'=>[], 'ulanganHarian'=>[],'UTS', 'UAS', 'avgScore'];
    public $timestamps = false;
    
    public function averageScore() {
        $avgLatianSoal = ($this->latihanSoal[0] + $this->latihanSoal[1] + $this->latihanSoal[2] + $this->latihanSoal[3]) / 4;
        $avgUlanganHarian = ($this->ulanganHarian[0] + $this->ulanganHarian[1]) / 2;

        return $this->avgScore = $avgLatianSoal*0.15 + $avgUlanganHarian*0.2 + $this->UTS*0.25 + $this->UAS*0.4;
    }
}


$tes = new Nilai('Mat', [15,15,15,15], [20, 20], 80, 80, 0);
echo $tes;
