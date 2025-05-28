<!-- Modal Edit Pengadaan -->
<div class="modal fade" id="modalEditPengadaan" tabindex="-1" aria-labelledby="modalEditPengadaanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPengadaanLabel">Edit Data Pengadaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="BRG-001" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="Proyektor Epson" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="Elektronik" required>
                        </div>
                        <div class="col-md-6">
                            <label for="spesifikasi" class="form-label">Merk / Spesifikasi</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="Epson X600, 3000 lumens" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="2" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal Pengadaan</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="2025-01-15" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sumber_dana" class="form-label">Sumber Dana</label>
                            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="BOS" required>
                        </div>
                        <div class="col-md-6">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="CV. Sinar Abadi" required>
                        </div>
                        <div class="col-md-6">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="5000000" required>
                        </div>
                        <div class="col-md-6">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" value="10000000" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
