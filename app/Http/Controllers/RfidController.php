<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RfidController extends Controller
{
    public function store(Request $request)
    {
        // Ambil data RFID yang dikirim
        $rfid = $request->input('rfid');

        // Simpan data RFID dalam session untuk diakses di frontend
        session(['rfid_uid' => $rfid]);

        // Mengembalikan response sukses
        return response()->json([
            'status' => 'success',
            'rfid' => $rfid
        ]);
    }
}
