@extends('admin.kelola_akun.edit_akun.layouts')

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


                <form action="{{ route('proyek.update_projek', $contents->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")

                    <div class="mb-3 row">
                        <label for="tittle" class="col-md-4 col-form-label text-md-end text-start">Judul : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle"
                                name="tittle" value="{{ $contents->tittle }}">
                            @if ($errors->has('tittle'))
                            <span class="text-danger">{{ $errors->first('tittle') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tipe_konten" class="col-md-4 col-form-label text-md-end text-start">Tipe</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('tipe_konten') is-invalid @enderror"
                                id="tipe_konten" name="tipe_konten" value="{{ $contents->tipe_konten }}">
                            @if ($errors->has('tipe_konten'))
                            <span class="text-danger">{{ $errors->first('tipe_konten') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label for="owner_contact" class="col-md-4 col-form-label text-md-end text-start">Kontak Pemilik</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('owner_contact') is-invalid @enderror"
                                id="owner_contact" name="owner_contact" value="{{ $contents->owner_contact  }}">
                            @if ($errors->has('owner_contact'))
                            <span class="text-danger">{{ $errors->first('owner_contact') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Deskripsi</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description">{{$contents->description }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="github_url" class="col-md-4 col-form-label text-md-end text-start">Link source code ( jika ada ) </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('github_url') is-invalid @enderror"
                                id="github_url" name="github_url" value="{{$contents->github_url }}">
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
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="edir projek">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection