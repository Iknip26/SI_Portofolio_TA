@extends('admin.dashboard.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Product
                </div>
                <div class="float-end">
                    <a href="{{ route('account.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">


                <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h5 class="mt-2 mb-2">Account Detail</h5>

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">role</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('code') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}">
                            @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-md-4 col-form-label text-md-end text-start">username</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">password</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="password" name="password" value="{{ old('quantity') }}">
                            @if ($errors->has('quantity'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <h5 class="mt-4 mb-2">Profile Detail</h5>

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image_profile') is-invalid @enderror" name="image_profile" id="image_profile">

                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">nama</label>
                                <div class="col-md-6">
                                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>


                    <div class="mb-3 row">
                        <label for="contact" class="col-md-4 col-form-label text-md-end text-start">Kontak</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="">
                            @if ($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="specialization" class="col-md-4 col-form-label text-md-end text-start">Spesialisasi</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="">
                            @if ($errors->has('specialization'))
                                <span class="text-danger">{{ $errors->first('specialization') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Tambah Akun">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
