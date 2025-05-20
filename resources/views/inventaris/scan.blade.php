<!DOCTYPE html>
<html>

<head>
    <title>Scan QR Code</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>

<body>
    <h2>Scan QR Code</h2>

    <div id="reader" style="width: 300px;"></div>
    <p id="status">Menunggu kamera...</p>
    <p>Hasil Scan: <span id="result"></span></p>

    <script>
        let hasScanned = false; // Penanda agar tidak redirect berkali-kali

        function onScanSuccess(decodedText, decodedResult) {
            if (!hasScanned) {
                hasScanned = true; // Cegah scan ulang

                document.getElementById('result').innerText = decodedText;
                document.getElementById('status').innerText = "QR berhasil dibaca. Mengarahkan...";

                // Opsional: stop kamera setelah scan berhasil
                html5QrCode.stop().then(() => {
                    // Redirect ke halaman detail barang
                    window.location.href = `/barang/scan/result/${decodedText}`;
                }).catch(err => {
                    console.error("Gagal menghentikan kamera: ", err);
                });
            }
        }

        const html5QrCode = new Html5Qrcode("reader");
        const config = {
            fps: 10,
            qrbox: 250
        };

        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                const cameraId = devices.find(d => d.label.toLowerCase().includes("back"))?.id || devices[0].id;
                // const cameraId = devices[0].id;
                html5QrCode.start(cameraId, config, onScanSuccess).then(() => {
                    document.getElementById('status').innerText = "Arahkan kamera ke QR Code.";
                });
            } else {
                document.getElementById('status').innerText = "Tidak ada kamera terdeteksi.";
            }
        }).catch(err => {
            document.getElementById('status').innerText = "Izin kamera ditolak atau gagal mendeteksi: " + err;
        });
    </script>

</body>

</html>
