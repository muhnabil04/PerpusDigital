<!DOCTYPE html>
<html>

<head>
    <title>Buku List</title>
</head>

<body>
    <h1>Riwayat Peminjaman</h1>
    <table class="table table-bordered">
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
            $no = 1;
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
</body>

</html>
