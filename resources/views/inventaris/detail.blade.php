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
                                <td>{{ $details->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $details->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Barang</th>
                                <td>{{ $details->jenis_barang }}</td>
                            </tr>
                            <tr>
                                <th>Merk / Spesifikasi</th>
                                <td>{{ $details->merk_barang }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Perolehan</th>
                                <td>{{ $details->tahun_perolehan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Dana</th>
                                <td>{{ $details->sumber_dana }}</td>
                            </tr>
                            <tr>
                                <th>Harga Perolehan</th>
                                <td>{{ $details->harga_perolehan }}</td>
                            </tr>
                            <tr>
                                <th>CV Pengadaan</th>
                                <td>{{ $details->cv_pengadaan }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Barang</th>
                                <td>{{ $details->jumlah_barang }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $details->ruangan_id }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>{{ $details->kondisi_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kepemilikan</th>
                                <td>{{ $details->kepemilikan_barang }}</td>
                            </tr>
                            <tr>
                                <th>Penanggung Jawab</th>
                                <td>{{ $details->penanggung_jawab }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="gap-2 d-flex justify-content-end">
                        <button class="btn btn-primary px-2 py-1" href="/detail">
                            Cetak
                        </button>
                        <button class="btn btn-warning px-2 py-1" href="/detail">
                            Edit
                        </button>
                        <button class="btn btn-danger px-2 py-1" href="/detail">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('/') }}assets/images/small/img-5.jpg" class="d-block w-100" alt="img-3">
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h5>Qr Code</h5>
                    <svg width="400px" height="400px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9h6V3H3zm1-5h4v4H4zm1 1h2v2H5zm10 4h6V3h-6zm1-5h4v4h-4zm1 1h2v2h-2zM3 21h6v-6H3zm1-5h4v4H4zm1 1h2v2H5zm15 2h1v2h-2v-3h1zm0-3h1v1h-1zm0-1v1h-1v-1zm-10 2h1v4h-1v-4zm-4-7v2H4v-1H3v-1h3zm4-3h1v1h-1zm3-3v2h-1V3h2v1zm-3 0h1v1h-1zm10 8h1v2h-2v-1h1zm-1-2v1h-2v2h-2v-1h1v-2h3zm-7 4h-1v-1h-1v-1h2v2zm6 2h1v1h-1zm2-5v1h-1v-1zm-9 3v1h-1v-1zm6 5h1v2h-2v-2zm-3 0h1v1h-1v1h-2v-1h1v-1zm0-1v-1h2v1zm0-5h1v3h-1v1h-1v1h-1v-2h-1v-1h3v-1h-1v-1zm-9 0v1H4v-1zm12 4h-1v-1h1zm1-2h-2v-1h2zM8 10h1v1H8v1h1v2H8v-1H7v1H6v-2h1v-2zm3 0V8h3v3h-2v-1h1V9h-1v1zm0-4h1v1h-1zm-1 4h1v1h-1zm3-3V6h1v1z" />
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M3 9h6V3H3zm1-5h4v4H4zm1 1h2v2H5zm..." />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-layout>
