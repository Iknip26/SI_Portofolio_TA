@extends('admin.kelola_proyek.layouts')

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
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosens as $data)
                        <tr>
                            <td style="column-span: 3">{{ $data->id}}</td>
                            <td style="column-span: 3">{{ $data->name}}</td>
                            <td>
                                <form action="{{ route('proyek.lihat_projek', $data->id) }}" method="get">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Lihat Proyek </button>
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
                  
                  {{ $dosens->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection