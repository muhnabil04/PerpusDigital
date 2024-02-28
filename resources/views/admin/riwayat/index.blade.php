@extends('template/main')

@section('content')
    <div class="text-right py-2 pt-md-0 mt-3">

        <a href="{{ route('export.pdf') }}" class="btn btn-danger">export pdf</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>peminjam</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tanggal peminjam</th>
                <th>Tanggal pengembalian</th>
            </thead>
            @php
                $no = ($buku->currentPage() - 1) * $buku->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($buku as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->penulis }}</td>
                        <td>{{ $item->buku->penerbit }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $buku->links() }}
    </div>
@endsection
