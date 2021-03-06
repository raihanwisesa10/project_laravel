<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Support\Facade\DB;
use App\Activity;

class Profile extends Model
{
    protected $table = "profiles";
    protected $primaryKey = "id_pemain";
    protected $fillable = ['nama', 'umur', 'tinggi', 'berat', 'posisi', 'tanggal_lahir', 'nomor_punggung', 'foto'];
}
