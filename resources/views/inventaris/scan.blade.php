<!DOCTYPE html>
<html>
<head>
    <title>Scan QR Code</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>
    <h2>Scan QR Code</h2>

    <div id="reader" style="width: 300px"></div>

    <p>Hasil Scan: <span id="result"></span></p>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Tampilkan hasil
            document.getElementById('result').innerText = decodedText;

            // Contoh: Redirect ke detail barang berdasarkan kode_barang
            window.location.href = `/barang/scan/result/${decodedText}`;
        }

        const html5QrCode = new Html5Qrcode("reader");
        const config = { fps: 10, qrbox: 250 };

        html5QrCode.start(
            { facingMode: "environment" }, // kamera belakang
            config,
            onScanSuccess
        ).catch(err => {
            console.error("Error scanning: ", err);
        });
    </script>
</body>
</html>
