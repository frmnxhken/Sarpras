<div class="modal fade" id="modalPerawatanBarang" tabindex="-1" aria-labelledby="modalPerawatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalPerawatanLabel">Form Perawatan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="tanggalPerawatan" class="form-label">Tanggal Perawatan</label>
                        <input type="date" class="form-control" id="tanggalPerawatan" required>
                    </div>

                    <div class="col-md-12">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Komputer"
                            required>
                    </div>

                    <div class="col-md-12">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" placeholder="Contoh: Lab Komputer"
                            required>
                    </div>

                    <div class="col-md-12">
                        <label for="jenisPerawatan" class="form-label">Jenis Perawatan</label>
                        <input type="text" class="form-control" id="jenisPerawatan" placeholder="Contoh: Pembersihan"
                            required>
                    </div>

                    <div class="col-md-12">
                        <label for="biaya" class="form-label">Biaya Perawatan (Rp)</label>
                        <input type="number" class="form-control" id="biaya" placeholder="Contoh: 50000" required>
                    </div>

                    <div class="col-12">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3"
                            placeholder="Contoh: Membersihkan debu pada komponen internal"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>

        </form>
    </div>
</div>
