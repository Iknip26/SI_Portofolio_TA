@extends('admin.dashboard.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Profil
                    </div>
                    <div class="float-end">
                        <a href="{{ route('account.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('account.update_profil', $dosens->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Foto Profil</label>
                            <input type="file" class="form-control" id="image_profile" name="image_profile">
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $dosens->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="contact" class="col-md-4 col-form-label text-md-end text-start">Kontak</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                    id="contact" name="contact" value="{{ $dosens->contact }}">
                                @if ($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="mb-3 row">
                        <label for="specialization" class="col-md-4 col-form-label text-md-end text-start">Spesialisasi</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="{{ $dosens->specialization }}">
                            @if ($errors->has('specialization'))
                                <span class="text-danger">{{ $errors->first('specialization') }}</span>
                            @endif
                        </div>
                    </div> --}}

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
