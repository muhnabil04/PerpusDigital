<!DOCTYPE html>
<html>

<head>
    <title>Buku List</title>
</head>

<body>
    <center>
        <h3>Perpustakaan Digital SMKN 6 KENDARI</h3>
    </center>
    <p>Riwayat Peminjaman</p>
    <table class="table table-bordered" style="bordered">
        <thead>
            <th>No</th>
            <th>peminjam</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tanggal peminjam</th>
            <th>Tanggal pengembalian</th>
            <th>status</th>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody>
            @foreach ($buku as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->buku->judul }}</td>[]
                    <td>{{ $item->buku->penulis }}</td>
                    <td>{{ $item->buku->penerbit }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    @if ($item->status_peminjaman == 'dikembalikan')
                        <td>{{ $item->tanggal_pengembalian }}</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ $item->status_peminjaman }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
