@extends('template/main')

@section('content')
    <div class="pagetitle">
        <h1>DATA BUKU</h1>
    </div><!-- End Page Title -->
    <form action="{{ route('peminjam.buku.cari') }}" class="d-flex">
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Cari Buku..." aria-label="Search" name="cari"
                aria-describedby="search-addon" style="max-width: 200px;">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </div>
    </form>
    <div class="row mt-3">
        @foreach ($buku as $item)
            <div class="col-6 col-md-3 mt-3">
                <div class="card movie-card">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="cover buku"
                        style="max-width: 100%; height: 350px; max-height: 350px;">
                    <div class="overlay"></div>
                    <div class="card-body">
                        <h5 class="fw-bolder">{{ $item->judul }}</h5>
                        <p>Penulis: {{ $item->penulis }}</p>
                        <p>Kategori: {{ $item->kategori->nama_kategori }}</p>
                        <div class="">
                            <a href="{{ route('peminjam.buku.show', $item->id) }}" class="btn btn-primary">Detail</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#pinjamModal-{{ $item->id }}">
                                Pinjam Buku
                            </button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#koleksiModal-{{ $item->id }}">
                                <i class="bi bi-save"></i>
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
                            <h5 class="modal-title" id="pinjamModalLabel">Pinjam Buku - {{ $item->judul }}
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


            <div class="modal fade" id="koleksiModal-{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="koleksiModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="koleksiModalLabel">Simpan ke Koleksi -
                                {{ $item->judul }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your pinjam form here -->
                            <form action="{{ route('peminjam.koleksi.store', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="buku_id">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    {{ $buku->links() }}
@endsection
