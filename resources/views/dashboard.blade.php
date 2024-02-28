@extends('template/main')
@section('content')
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
        <div class="container px-4 mx-auto">

            <div class="p-6 m-20 bg-white rounded shadow">
                {!! $chart->container() !!}
            </div>

            <div class="row justify-content-evenly">
                <div class="col-md-3">
                    <div class="card mt-4" style="width: 18rem; height: 10rem ;">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text display-6">{{ $userCount }}</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mt-4" style="width: 18rem; height: 10rem ;">
                        <div class="card-body mx-2">
                            <h5 class="card-title">Total Buku</h5>
                            <p class="card-text display-6">{{ $bookCount }}</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-4" style="width: 18rem; height: 10rem ;">
                        <div class="card-body mx-2">
                            <h5 class="card-title">Total Kategori Buku</h5>
                            <p class="card-text display-6">{{ $kategoriCount }}</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endif



    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

    @if (Auth::user()->role === 'peminjam')
        <h1>SELAMAT DATANG DI PERPUS DIGITAL</h1>
    @endif
@endsection
