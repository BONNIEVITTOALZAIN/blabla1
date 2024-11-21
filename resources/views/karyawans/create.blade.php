@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Form Registrasi Karyawan</h2>
        <a href="{{ route('karyawans.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('karyawans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Karyawan</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="employee_id">ID Karyawan</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="rfid_uid">UID RFID</label>
                <input type="text" class="form-control" id="rfid_uid" name="rfid_uid" required
                    value="{{ session('rfid_uid') }}">
                <small>Masukkan UID RFID dalam format hex (contoh: 03E47511)</small>
            </div>
            <button type="submit" class="btn btn-primary">Daftar Karyawan</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengecek perubahan data RFID di session setiap 2 detik
            setInterval(function() {
                $.get("/api/rfid", function(data) {
                    if (data.rfid) {
                        $('#rfid_uid').val(data.rfid); // Perbarui nilai input RFID
                    }
                });
            }, 2000);
        });
    </script>
@endsection
