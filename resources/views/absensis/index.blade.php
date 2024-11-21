@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Rekapitulasi Absensi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>ID Karyawan</th>
                    <th>Waktu Scan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $key => $absensi)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $absensi->karyawan->name }}</td>
                        <td>{{ $absensi->karyawan->employee_id }}</td>
                        <td>{{ $absensi->scan_time }}</td>
                        <td>{{ ucfirst($absensi->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
