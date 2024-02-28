@extends('template/main')
@section('content')
    <div class="pagetitle">
        <h1>Edit {{ $title }}</h1>

    </div><!-- End Page Title -->
    <div class="card-body flex-wrap py-3">
        <form enctype="multipart/form-data" action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('Nama Kategori') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="nama" value="{{ $kategori->nama_kategori }}">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a href="#"
                        class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
