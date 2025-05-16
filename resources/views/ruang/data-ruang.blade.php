<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahRuang">
        Tambah Ruang
    </button>
    <div class="modal fade" id="tambahRuang" tabindex="-1"
        aria-labelledby="tambahRuangTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRuangTitle">Tambah Ruang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                         @csrf
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Ruang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                         </div>
                         <div class="mb-3">
                              <label for="nama_barang" class="form-label">Nama Ruang</label>
                              <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                         </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
     <thead>
          <tr>
               <th scope="col">No</th>
               <th scope="col">Kode Ruang</th>
               <th scope="col">Nama Ruang</th>
               <th scope="col">Jumlah Barang</th>
          </tr>
     </thead>
     <tbody>
          <tr>
               <td>1</td>
               <td>023</td>
               <td>Lab Kumputer</td>
               <td>43</td>
          </tr>
          <tr>
               <td>2</td>
               <td>024</td>
               <td>Kls X-A</td>
               <td>30</td>
          </tr>
          <tr>
               <td>3</td>
               <td>025</td>
               <td>Kelas XII</td>
               <td>2</td>
          </tr>
        </tbody>
    </table>
</x-layout>