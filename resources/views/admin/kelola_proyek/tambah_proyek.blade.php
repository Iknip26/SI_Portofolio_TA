@extends('admin.kelola_proyek.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Tambah Proyek
                </div>
                <div class="float-end">
                    <a href="{{ route('proyek.pilih_akun') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">

                    <form action="{{ route('proyek.simpan_data_projek', $id_dosen) }}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                        <div class="mb-3 row">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end text-start">Judul : </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle"
                                    name="tittle" value="{{ old('role') }}">
                                @if ($errors->has('tittle'))
                                <span class="text-danger">{{ $errors->first('tittle') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="tipe_konten" class="col-md-4 col-form-label text-md-end text-start">Tipe</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tipe_konten') is-invalid @enderror"
                                    id="tipe_konten" name="tipe_konten" value="{{ old('tipe_konten') }}">
                                @if ($errors->has('tipe_konten'))
                                <span class="text-danger">{{ $errors->first('tipe_konten') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group">
                            <button type="button" value="Tambah Tag" id="addTagButton" class="btn btn-primary btn-sm"> <i class="fas fa-plus">+</i></button>
                            <button type="button" value="Hapus Tag" id="removeTagButton" class="btn btn-primary btn-sm"> <i class="fas fa-minus">-</i></button>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="tag" class="col-md-4 col-form-label text-md-end text-start">Tag : </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tag') is-invalid @enderror"
                                    id="tag" name="tag" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="owner_name" class="col-md-4 col-form-label text-md-end text-start">Owner : </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('owner_name') is-invalid @enderror"
                                    id="owner_name" name="owner_name" value="">
                            </div>
                        </div>
    
                        <div id="tambahInputTag">
                            
                        </div>
    
                        <div class="mb-3 row">
                            <label for="owner_contact" class="col-md-4 col-form-label text-md-end text-start">Kontak Pemilik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('owner_contact') is-invalid @enderror"
                                    id="owner_contact" name="owner_contact" value="{{ old('owner_contact') }}">
                                @if ($errors->has('owner_contact'))
                                <span class="text-danger">{{ $errors->first('owner_contact') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Deskripsi</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description"></textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="github_url" class="col-md-4 col-form-label text-md-end text-start">Link source code ( jika ada ) </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('github_url') is-invalid @enderror"
                                    id="github_url" name="github_url" value="{{ old('github_url') }}">
                                @if ($errors->has('github_url'))
                                <span class="text-danger">{{ $errors->first('github_url') }}</span>
                                @endif
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <label class="font-weight-bold">File Dokumen ( Jika ada )</label>
                            <input type="file" class="form-control @error('content_url') is-invalid @enderror"
                                name="content_url" id="content_url">
    
                            <!-- error message untuk title -->
                            @error('content_url')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="font-weight-bold">Video demo ( Jika ada )</label>
                            <input type="file" class="form-control @error('video_url') is-invalid @enderror"
                                name="video_url" id="video_url">
    
                            <!-- error message untuk title -->
                            @error('video_url')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="font-weight-bold">Screenshoot proyek ( Jika ada )</label>
                            <input type="file" class="form-control @error('image_url') is-invalid @enderror"
                                name="image_url" id="image_url">
    
                            <!-- error message untuk title -->
                            @error('image_url')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Tambah Akun">
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
   $(document).ready(function () {
    let counter = 1;

    // Fungsi untuk menambah input tag
    $('addTagButton').click(function () {
        counter++;
        let newTagInput = `
            <div class="mb-3 row">
                <label for="tag" class="col-md-4 col-form-label text-md-end text-start">Tag : </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="tag${counter}" name="tag${counter}" placeholder="Masukkan tag" value="">
                </div>
                <button type="button" class="btn btn-danger btn-sm removeTagButton"> <i class="fas fa-minus">-</i></button>
            </div>
        `;
        $('#tambahInputTag').append(newTagInput);
    });

    // Fungsi untuk menghapus input tag
    $('#tambahInputTag').on('click', '.removeTagButton', function () {
        $(this).parent().remove();
        counter--;
    });
});

</script>
    
@endpush

