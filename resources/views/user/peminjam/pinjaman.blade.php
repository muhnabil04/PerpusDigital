@extends('template/main')
@section('content')
    <div class="text-right py-2 pt-md-0 mt-3">

    </div>
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
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
                        <td>{{ $item->buku->judul }}</td>
                        @if ($item->status_peminjaman == 'dikembalikan')
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->status_peminjaman }}</td>
                        <td>
                            @if ($item->status_peminjaman == 'dipinjam')
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#pinjamModal-{{ $item->id }}">
                                    Kembalikan Buku
                                </button>
                            @else
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#ulasanModal-{{ $item->id }}">
                                    Beri Ulasan
                                </button>
                            @endif
                            <!-- Edit Modal -->
                            <div class="modal fade" id="pinjamModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="pinjamModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pinjamModalLabel">Kembalikan Buku -
                                                {{ $item->buku->judul }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('peminjam.buku.update', $item->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->tanggal_peminjaman }} "
                                                    name="tanggal_peminjaman">
                                                <input type="hidden" value="{{ $item->id }}" name="buku_id">
                                                <input type="hidden" value=" {{ Auth::id() }}" name="user_id">
                                                <button type="submit" class="btn btn-primary">Kembalikan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="ulasanModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ulasanModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ulasanModalLabel">Kembalikan Buku -
                                                {{ $item->buku->judul }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('peminjam.buku.ulasan', $item->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="buku_id" value="{{ $item->buku->id }}">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">
                                                        Tulis Ulasan</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ulasan"></textarea>
                                                </div>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    name="rating">
                                                    <option selected>Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Beri ulasan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $buku->links() }}
    </div>
@endsection
