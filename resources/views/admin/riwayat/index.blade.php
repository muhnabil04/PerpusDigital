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
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            @php
                $no = ($buku->currentPage() - 1) * $buku->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($buku as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->penulis }}</td>
                        <td>{{ $item->buku->penerbit }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        @if ($item->status_peminjaman == 'dikembalikan')
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        @else
                            <td>-</td>
                        @endif

                        <td>{{ $item->status_peminjaman }}</td>

                        @if ($item->status_peminjaman == 'dikembalikan')
                            <td>
                                <p>sudah di kembalikan</p>
                            </td>
                        @else
                            <td> <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#pinjamModal-{{ $item->id }}">
                                    Kembalikan Buku
                                </button>
                            </td>
                        @endif
                    </tr>
                    </td>
                @endforeach
            </tbody>

            <div class="modal fade" id="pinjamModal-{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="pinjamModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pinjamModalLabel">Kembalikan Buku -
                                {{ $item->buku->judul }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('peminjam.buku.update', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->tanggal_peminjaman }} " name="tanggal_peminjaman">
                                <input type="hidden" value="{{ $item->id }}" name="buku_id">
                                <input type="hidden" value=" {{ Auth::id() }}" name="user_id">
                                <button type="submit" class="btn btn-primary">Kembalikan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </table>
        {{ $buku->links() }}
    </div>
@endsection
