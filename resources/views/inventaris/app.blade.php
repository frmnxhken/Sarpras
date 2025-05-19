<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahData">
        Tambah Data
    </button>
    @include('inventaris.popup.tambah_data')
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataInventaris as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->ruangan->nama_ruangan ?? '-' }}</td>
                        <td>{{ $item->kondisi_barang }}</td>
                        <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#ImageModal">
                                <img src="assets/images/small/img-5.jpg" alt="image"
                                    class="img-fluid avatar-md rounded" />
                            </a>
                            <div class="modal fade" id="ImageModal" tabindex="-1"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <img src="{{ asset($item->gambar_barang) }}" class="d-block w-100"
                                                alt="img-3"> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1 align-items-center">
                                <a class="btn btn-primary px-2 py-1" href="{{ route('inventaris.detail', $item->id) }}">
                                    Detail
                                </a>
                            <button class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $loop->iteration }}">
                                Hapus
                            </button>
                            @include('inventaris.popup.confirmation_delete', [
                                'modalId' => $loop->iteration,
                                'item' => $item
                            ])
                            {{-- @include('inventaris.popup.confirmation_delete') --}}
                            </div>
                        </td>
                    </tr>
                @empty
                    Data Kosong
                @endforelse
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $dataInventaris->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $dataInventaris->previousPageUrl() }}" tabindex="-1">Previous</a>
            </li>

            @for ($i = 1; $i <= $dataInventaris->lastPage(); $i++)
                <li class="page-item {{ $dataInventaris->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dataInventaris->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <li class="page-item {{ $dataInventaris->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $dataInventaris->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </nav>
</x-layout>
