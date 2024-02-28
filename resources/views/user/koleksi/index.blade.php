@extends('template/main')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th width="300px">Aksi</th>
            </thead>
            @php
                $no = ($koleksi->currentPage() - 1) * $koleksi->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($koleksi as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->penulis }}</td>
                        <td>{{ $item->buku->penerbit }}</td>
                        <td>{{ $item->buku->TahunTerbit }}</td>
                        <td>
                            <a href="{{ route('peminjam.koleksi.delete', $item->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $koleksi->links() }}
    </div>
@endsection
