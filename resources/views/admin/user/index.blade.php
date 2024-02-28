@extends('template/main')

@section('content')
    <div class="text-right py-2 pt-md-0 mt-3">
        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah User</a>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>role</th>
                <th>Aksi</th>
            </thead>
            @php
                $no = ($users->currentPage() - 1) * $users->perPage() + 1;
            @endphp
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
