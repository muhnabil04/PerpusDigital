@extends('template/main')
@section('content')
    <div class="pagetitle">
        <h1>Edit {{ $title }}</h1>
    </div><!-- End Page Title -->
    <div class="card-body flex-wrap py-3">
        <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('username') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('email') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="col-sm-4 control-label">{{ __('password') }} <span class="required"
                            style="color: #dd4b39;">*</span></label>
                    <input type="text" class="form-control" name="password">
                    <small class="text-muted">biarkan kosong jika anda tidak ingin mengubah.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">role</label>
                    <select class="form-select form-select mb-3" name="role" required>
                        <option disabled>Silahkan pilih</option>
                        <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>peminjam</option>
                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>petugas</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
