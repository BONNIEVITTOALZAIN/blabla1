@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Selamat Datang di Sistem Absensi</h1>
            <p class="text-muted">Kelola absensi karyawan Anda dengan mudah dan cepat.</p>
        </div>

        <div class="row g-4">
            <!-- Card 1: Data Karyawan -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Karyawan</h5>
                        <p class="card-text">Lihat dan kelola data karyawan yang terdaftar.</p>
                        <a href="{{ route('karyawans.index') }}" class="btn btn-primary">Kelola Karyawan</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Rekap Absensi -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rekap Absensi</h5>
                        <p class="card-text">Lihat dan pantau absensi karyawan secara lengkap.</p>
                        <a href="{{ route('absensis.index') }}" class="btn btn-success">Lihat Rekap</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Scan Kartu -->
            {{-- <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Scan Kartu</h5>
                        <p class="card-text">Proses absensi dengan memindai kartu RFID.</p>
                        <a href="{{ route('absensis.scan') }}" class="btn btn-warning">Scan Sekarang</a>
                    </div>
                </div>
            </div>
        </div> --}}

            <div class="mt-5 text-center text-muted">
                <p>&copy; {{ date('Y') }} Sistem Absensi. Dibuat dengan ❤️ oleh Tim Anda.</p>
            </div>
        </div>
    @endsection
