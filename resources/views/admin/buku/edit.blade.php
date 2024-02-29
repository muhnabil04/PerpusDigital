@extends('template/main')
@section('content')
    <div class="pagetitle">
        <h1>Edit {{ $title }}</h1>
    </div><!-- End Page Title -->
    <div class="card-body flex-wrap py-3">
        <form enctype="multipart/form-data" action="{{ route('admin.buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('Judul') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('Penulis') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('Penerbit') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('Tahun Terbit') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="number" class="form-control" name="TahunTerbit" value="{{ $buku->TahunTerbit }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select form-select mb-3" name="kategori_id" required>
                        <option disabled>Silahkan pilih</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $buku->kategori_id) selected @endif>
                                {{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"
                        value="{{ $buku->deskripsi }}">{{ $buku->deskripsi }}</textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
