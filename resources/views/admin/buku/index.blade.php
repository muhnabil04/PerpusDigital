@extends('template/main')
@section('content')
    <div class="pagetitle">
        <h1>Data Buku</h1>

    </div><!-- End Page Title -->
    <form action="{{ route('admin.buku.cari') }}" class="d-flex">
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Cari Buku..." aria-label="Search" name="cari"
                aria-describedby="search-addon" style="max-width: 200px;">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </div>
    </form>
    <div class="text-right py-2 pt-md-0 mt-3">
        <a href="{{ route('admin.buku.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
            Tambah Buku</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>foto</th>
                <th>Aksi</th>
            </thead>
            @php
                $no = ($buku->currentPage() - 1) * $buku->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($buku as $item)
                    <tr>

                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->TahunTerbit }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td class="text-center"><img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid w-50"
                                alt="cover buku"></td>
                        <td>
                            <a href="{{ route('admin.buku.edit', $item->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i> <!-- Edit button -->
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hapusModal-{{ $item->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>

                    </tr>


                    <div class="modal fade" id="hapusModal-{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Hapus -
                                        {{ $item->judul }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your pinjam form here -->
                                    <form action="{{ route('admin.buku.delete', $item->id) }}" method="get">
                                        @csrf
                                        <input type="hidden" value="{{ $item->judul }}" name="id">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        {{ $buku->links() }}


        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}'
                });
            </script>
        @endif
    </div>
@endsection
