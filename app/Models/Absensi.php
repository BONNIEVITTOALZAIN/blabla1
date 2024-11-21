<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'scan_time', 'status'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
