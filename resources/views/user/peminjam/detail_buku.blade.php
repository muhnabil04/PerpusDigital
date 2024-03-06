@extends('template/main')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('peminjam.buku.index') }}" class="btn btn-danger mb-3">kembali</a>
        <div class="row">
            {{-- Left Column - Book Details --}}

            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Detail Buku
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $buku->foto) }}" alt="cover buku"
                            style="max-width: 100%; height: 350px; max-height: 350px;">
                        <h5 class="card-title">Judul : {{ $buku->judul }}</h5>
                        <p class="card-text">Penulis: {{ $buku->penulis }}</p>
                        <p class="card-text">Penerbit: {{ $buku->penerbit }}</p>
                        <p class="card-text">Tahun Terbit: {{ $buku->TahunTerbit }}</p>
                        <p class="card-text">Kategori: {{ $buku->kategori->nama_kategori }}</p>
                        <p class="card-text">Deskrispi: {{ $buku->deskripsi }}</p>
                        <!-- Add more details as needed -->
                    </div>
                </div>
            </div>

            {{-- Right Column - Reviews --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Reviews
                    </div>
                    <div class="card-body">
                        <!-- Add your review display logic here -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Pemberi Ulasan</th>
                                    <th>Ulasan</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ulasan as $item)
                                    <tr>
                                        <td>{{ $item->user->username }}</td>
                                        <td>{{ $item->ulasan }}</td>
                                        <td>{{ $item->rating }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ulasan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
