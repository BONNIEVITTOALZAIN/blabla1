<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'employee_id', 'rfid_uid'];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
