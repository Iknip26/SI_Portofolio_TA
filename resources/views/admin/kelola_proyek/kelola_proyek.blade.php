@extends('layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">List Proyek
            </div>
            <div class="card-body">
                <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Tambah Akun</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Tipe Proyek</th>
                        <th scope="col">Dosen pembimbing</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $data_projek)
                        <tr>
                            <td>{{ $data_projek->id }}</td>
                            <td>{{ $data_projek->tittle }}</td>
                            <td>{{ $data_projek->content_type }}</td>
                            <td>{{ $dosen_pembimbing->name }}</td>
                            <td>
                                <form action="{{ route('project.destroy', $data_projek->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <a href="{{ route('project.show', $data_projek->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('project.edit', $data_projek->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a> 

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this product?');"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {{-- {{ $projects->links() }} --}}

            </div>
        </div>
    </div>    
</div>
    
@endsection