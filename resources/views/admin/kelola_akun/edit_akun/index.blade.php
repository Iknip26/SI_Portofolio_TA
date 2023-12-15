@extends('admin.dashboard.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif


        <div class="card">
            <div class="card-header">List akun</div>
            <div class="card-body">
                <a href="{{ route('account.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Tambah Akun</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $data_akun)
                        <tr>
                            <td>{{ $data_akun->id}}</td>
                            <td>{{ $data_akun->role }}</td>
                            <td>{{ $data_akun->username }}</td>
                            <td>{{ $data_akun->password }}</td>
                            <td>
                                <form action="{{ route('account.destroy', $data_akun->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <a href="{{ route('account.show', $data_akun->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('account.edit_akun', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit Akun</a>

                                    <a href="{{ route('account.edit_profil', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit Profil</a>

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this product?');"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Belum ada akun</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $accounts->links() }}

            </div>

        </div>
    </div>
</div>

@endsection
