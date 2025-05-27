<x-layout>
    <div class="row mb-3">
        <div class="col-md-6">
            @if (in_array(auth()->user()->role, [1, 3]))
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </button>
            @include('inventaris.popup.tambah_data')
            @endif
        </div>
        <div class="col-md-6 text-end">
            <a href="/scan" class="btn btn-outline-primary d-inline-flex align-items-center">
                <i class="bi bi-qr-code-scan me-2"></i> Scan QR
            </a>
        </div>
    </div>
    <form method="GET" action="{{ route('inventaris.index') }}">
        <div class="row mb-3 align-items-center">
            <div class="col-md-3">
                <select class="form-select" id="ruangan_id" name="ruangan_id">
                    <option selected disabled>Pilih Lokasi</option>
                    @foreach ($ruangan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" id="globalSearch" name="search" class="form-control" placeholder="Cari data barang....">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ri-search-line me-1"></i>Filter
                </button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataInventaris as $item)
                <tr>
                    <td>{{ $loop->iteration + ($dataInventaris->currentPage() - 1) * $dataInventaris->perPage() }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->ruangan->nama_ruangan ?? '-' }}</td>
                    <td>
                        @if ($item->kondisi_barang == 'baik')
                        Baik
                        @elseif ($item->kondisi_barang == 'rusak')
                        Rusak Ringan
                        @elseif ($item->kondisi_barang == 'berat')
                        Rusak Berat
                        @endif
                    </td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#ImageModal{{ $loop->iteration }}">
                            <img src="{{ asset($item->gambar_barang) }}" alt="image"
                                class="img-fluid avatar-md rounded" />
                        </a>
                        <div class="modal fade" id="ImageModal{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            {{ $item->nama_barang }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset($item->gambar_barang) }}" class="d-block w-100"
                                            alt="img-3">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2 p-0">
                            <a class="btn btn-primary px-2 py-1 m-0"
                                href="{{ route('inventaris.detail', $item->id) }}">
                                Detail
                            </a>
                            @if (in_array(auth()->user()->role, [1, 3]))
                            <button class="btn btn-danger px-2 py-1 m-0" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->id }}">
                                Hapus
                            </button>
                            @include('inventaris.popup.ajuan_penghapusan', [
                            'modalId' => $item->id,
                            'item' => $item,
                            ])
                            @endif
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