@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('tambahRuang'));
            myModal.show();
        });
    </script>
@endif
<div class="modal fade" id="TambahPeminjaman" tabindex="-1" aria-labelledby="TambahPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="TambahPeminjamanLabel">Form Peminjaman Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body px-3">
                <form class="row g-3 mb-3" action="{{ route('peminjaman.store') }}" method="POST">

                    <div class="col-12">
                        <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tanggalPinjam" name="tanggal_pinjam">
                    </div>

                    <div class="col-12">
                        <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="namaPeminjam" name="nama_peminjam">
                    </div>

                    <div class="col-12">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit">
                    </div>

                    <div class="col-12">
                        <label for="barang" class="form-label">Barang</label>
                        <input type="text" class="form-control" id="barang" name="barang">
                    </div>

                    <div class="col-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>

                    <div class="col-12">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option selected disabled>Pilih status</option>
                            <option>Dipinjam</option>
                            <option>Dikembalikan</option>
                            <option>Hilang</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
