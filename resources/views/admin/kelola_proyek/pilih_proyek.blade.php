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
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                  <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
                    <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                  </a>
                </div>
              </div>
              <!-- /Search -->
            <div class="card-header">List Proyek</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Tipe konten</th>
                        <th scope="col">Dosen</th>
                        <th scope="col">Upload_date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($contents as $data)
                        <tr>
                            <td style="column-span: 3">{{ $data->tittle}}</td>
                            <td style="column-span: 3">{{ $data->tipe_konten}}</td>
                            <td style="column-span: 3">{{ $data->name}}</td>
                            {{-- <td style="column-span: 3">
                                @foreach ($tags as $tag )
                                <a href="">{{$tag->tag}}</a>
                                <br>
                                @endforeach
                            </td> --}}
                            <td style="column-span: 3">{{ $data->created_at}}</td>
                            <td>
                                <form action="{{ route('proyek.hapus_projek', $data->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <a href="{{ route('proyek.lihat_detail', $data->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('proyek.edit_projek', $data->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit Projek</a>

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Hapus Projek</button>
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

                  {{-- {{ $contents->links() }} --}}

            </div>
            <a href="{{ route('proyek.tambah_projek', $id_dosen) }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Tambah Projek</a>
        </div>
    </div>
</div>

@endsection
