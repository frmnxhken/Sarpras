<x-layout>
    <h1>Detail Barang</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kode Barang</th>
                                <td>{{ $item->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $item->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Barang</th>
                                <td>{{ $item->jenis_barang }}</td>
                            </tr>
                            <tr>
                                <th>Merk / Spesifikasi</th>
                                <td>{{ $item->merk_barang }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Perolehan</th>
                                <td>{{ $item->tahun_perolehan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Dana</th>
                                <td>{{ $item->sumber_dana }}</td>
                            </tr>
                            <tr>
                                <th>Harga Perolehan</th>
                                <td>{{ $item->harga_perolehan }}</td>
                            </tr>
                            <tr>
                                <th>CV Pengadaan</th>
                                <td>{{ $item->cv_pengadaan }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Barang</th>
                                <td>{{ $item->jumlah_barang }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $item->ruangan_id }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>{{ $item->kondisi_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kepemilikan</th>
                                <td>{{ $item->kepemilikan_barang }}</td>
                            </tr>
                            <tr>
                                <th>Penanggung Jawab</th>
                                <td>{{ $item->penanggung_jawab }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="gap-2 d-flex justify-content-end">
                        <!-- <button class="btn btn-primary px-2 py-1" href="/detail">
                            Cetak
                        </button> -->
                        <button class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#editData">
                            Edit
                        </button>
                        @include('inventaris.popup.edit_data')
                        <button class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Hapus
                        </button>
                        @include('inventaris.popup.confirmation_delete', [
                        'modalId' => '',
                        'item' => $item
                        ])
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset($item->gambar_barang) }}" class="d-block w-100"
                        alt="img-3">
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body text-center" style="min-height: 300px;">
                    <h5>Qr Code</h5>
                    <!-- {{ QrCode::size(242 )->generate($item->kode_barang) }} -->
                    <div id="print-area">
                        {!! QrCode::size(216)->generate($item->kode_barang) !!}
                        <p style="margin-top: 10px;">{{ $item->kode_barang }}</p>
                    </div>
                </div>
                <button class="btn btn-primary px-2 py-1"  onclick="printQRCode()">
                    Cetak
                </button>
                <!-- <div class="text-center mb-3">
                    <button class="btn btn-primary px-2 py-1" onclick="printQRCode()">Cetak</button>
                </div> -->
            </div>
        </div>
    </div>
</x-layout>
<script>
    function printQRCode() {
        const printContents = document.getElementById('print-area').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = `
            <html>
                <head>
                    <title>Cetak QR Code</title>
                    <style>
                        body {
                            text-align: center;
                            margin-top: 100px;
                            font-family: Arial, sans-serif;
                        }
                    </style>
                </head>
                <body>
                    ${printContents}
                </body>
            </html>
        `;

        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
