@extends('template/main')
@section('content')
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
                            <a href="{{ route('admin.kategori.delete', $item->id) }}" class="btn btn-danger">
                                <i class="bi bi-trash"></i> <!-- Delete button -->
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $kategori->links() }}

    </div>
@endsection
