<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('karyawan')->orderBy('scan_time', 'desc')->get();
        return view('absensis.index', compact('absensis'));
    }

    public function scan(Request $request)
    {
        $rfid_uid = $request->input('rfid_uid');
        $karyawan = Karyawan::where('rfid_uid', $rfid_uid)->first();

        if (!$karyawan) {
            return response()->json(['message' => 'RFID tidak terdaftar'], 404);
        }

        $absensi = Absensi::create([
            'karyawan_id' => $karyawan->id,
            'scan_time' => now(),
            'status' => 'in',
        ]);

        return response()->json(['message' => 'Absensi berhasil', 'absensi' => $absensi]);
    }

    public function scanView()
    {
        return view('absensis.scan'); // Pastikan file scan.blade.php ada di resources/views/absensis
    }
}
