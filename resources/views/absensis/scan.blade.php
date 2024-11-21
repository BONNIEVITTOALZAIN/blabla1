@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-center">
        <h2 class="mb-4">Scan Kartu Absensi</h2>

        <div id="scan-status" class="p-4 border rounded shadow-sm bg-light">
            <h3 id="status-message" class="text-muted mb-3">Silakan Tempelkan Kartu RFID</h3>
            <div id="employee-details" style="display: none;">
                <p><strong>Nama:</strong> <span id="employee-name"></span></p>
                <p><strong>ID Karyawan:</strong> <span id="employee-id"></span></p>
                <p><strong>Waktu Scan:</strong> <span id="scan-time"></span></p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('absensis.index') }}" class="btn btn-secondary">Lihat Rekap Absensi</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // URL API untuk proses scan
            const scanApiUrl = "{{ route('absensis.scan') }}";

            // Simulasi scanning kartu (seharusnya dikendalikan oleh ESP32 yang mengirim UID via AJAX)
            const simulatedUID = "03E47511"; // Ganti dengan UID kartu RFID sesuai dengan ESP32 Anda

            // Fungsi untuk memproses hasil scan
            function processScan(uid) {
                fetch(scanApiUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}", // Token CSRF untuk keamanan Laravel
                        },
                        body: JSON.stringify({
                            rfid_uid: uid
                        }),
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw response.json();
                        }
                        return response.json();
                    })
                    .then((data) => {
                        // Jika absensi berhasil
                        const statusMessage = document.getElementById("status-message");
                        const employeeDetails = document.getElementById("employee-details");
                        const employeeName = document.getElementById("employee-name");
                        const employeeId = document.getElementById("employee-id");
                        const scanTime = document.getElementById("scan-time");

                        // Update status dan detail karyawan
                        statusMessage.textContent = "Absensi Berhasil!";
                        statusMessage.className = "text-success";

                        employeeName.textContent = data.absensi.karyawan.name;
                        employeeId.textContent = data.absensi.karyawan_id;
                        scanTime.textContent = new Date(data.absensi.scan_time).toLocaleString();

                        employeeDetails.style.display = "block";
                    })
                    .catch((error) => {
                        // Jika absensi gagal
                        error.then((err) => {
                            const statusMessage = document.getElementById("status-message");
                            const employeeDetails = document.getElementById("employee-details");

                            statusMessage.textContent = err.message || "Absensi Gagal!";
                            statusMessage.className = "text-danger";

                            employeeDetails.style.display = "none";
                        });
                    });
            }

            // Simulasi proses scan RFID setelah 3 detik
            setTimeout(() => {
                processScan(simulatedUID);
            }, 3000);
        });
    </script>
@endsection
