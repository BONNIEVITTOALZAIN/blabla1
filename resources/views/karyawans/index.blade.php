@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Karyawan</h2>
        <a href="{{ route('karyawans.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>ID Karyawan</th>
                    <th>RFID UID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawans as $key => $karyawan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $karyawan->name }}</td>
                        <td>{{ $karyawan->employee_id }}</td>
                        <td>{{ $karyawan->rfid_uid }}</td>
                        <td>
                            <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus karyawan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
