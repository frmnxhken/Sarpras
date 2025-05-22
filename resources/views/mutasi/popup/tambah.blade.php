@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalMutasiBarang'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
@endif
<!-- Modal Form Mutasi -->
<div class="modal fade" id="modalMutasiBarang" tabindex="-1" aria-labelledby="modalMutasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalMutasiLabel">Form Mutasi Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="tanggalMutasi" class="form-label">Tanggal Mutasi</label>
                        <input type="date" class="form-control" id="tanggalMutasi" required>
                    </div>

                    <div class="col-md-12">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Laptop"
                            required>
                    </div>

                    <div class="col-md-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="Contoh: 2" required>
                    </div>

                    <div class="col-md-12">
                        <label for="keUnit" class="form-label">Ke Unit</label>
                        <input type="text" class="form-control" id="keUnit" placeholder="Contoh: Keuangan"
                            required>
                    </div>

                    <div class="col-md-12">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" placeholder="Contoh: Pindah ke ruangan baru"></textarea>
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
