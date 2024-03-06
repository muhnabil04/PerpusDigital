@extends('template/main')

@section('content')
    <div class="row mt-3">
        @foreach ($koleksi as $item)
            <div class="col-6 col-md-3 mt-3">
                <div class="card movie-card">
                    <img src="{{ asset('storage/' . $item->buku->foto) }}" alt="cover buku"
                        style="max-width: 100%; height: 350px; max-height: 350px;">
                    <div class="overlay"></div>
                    <div class="card-body">
                        <h5 class="fw-bolder">{{ $item->buku->judul }}</h5>
                        <p>Penulis: {{ $item->buku->penulis }}</p>
                        <p>Kategori: {{ $item->buku->kategori->nama_kategori }}</p>
                        <div class="">
                            <a href="{{ route('peminjam.buku.show', $item->id) }}" class="btn btn-primary">Detail</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $item->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="pinjamModal-{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="pinjamModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pinjamModalLabel">Pinjam Buku - {{ $item->buku->judul }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your pinjam form here -->
                            <form action="{{ route('peminjam.buku.store', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}">
                                <input type="hidden" value="{{ $item->id }}" name="buku_id">
                                <input type="hidden" value=" {{ Auth::id() }}" name="user_id">
                                <button type="submit" class="btn btn-primary">Pinjam</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus -
                                {{ $item->buku->judul }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your pinjam form here -->
                            <form action="{{ route('peminjam.koleksi.delete', $item->id) }}" method="get">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection
