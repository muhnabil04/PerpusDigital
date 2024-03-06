@extends('template/main')
@section('content')
    <div class="pagetitle">
        <h1>Data Kategori</h1>

    </div><!-- End Page Title -->
    <div class="text-right py-2 pt-md-0 mt-3">

        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
            Tambah Kategori</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </thead>
            @php
                $no = ($kategori->currentPage() - 1) * $kategori->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_kategori }}</td>

                        <td>
                            <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-warning">
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
                                        {{ $item->nama_kategori }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your pinjam form here -->
                                    <form action="{{ route('admin.kategori.delete', $item->id) }}" method="get">
                                        @csrf
                                        <input type="hidden" value="{{ $item->nama_kategori }}" name="id">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </tbody>
        </table>
        {{ $kategori->links() }}
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
