@extends('template/main')
@section('content')
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
                        <td>
                            <a href="{{ route('admin.buku.edit', $item->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i> <!-- Edit button -->
                            </a>
                            <a href="{{ route('admin.buku.delete', $item->id) }}" class="btn btn-danger">
                                <i class="bi bi-trash"></i> <!-- Delete button -->
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $buku->links() }}
    </div>
@endsection
