@extends('admin.dashboard.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Acoount Information
                </div>
                <div class="float-end">
                    <a href="{{ route('account.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">


                    <h5>Data Akun</h5>
                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Username:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $accounts->username }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Password:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $accounts->password }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Role:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $accounts->role }}
                        </div>
                    </div>

                    <h5>Data Profil</h5>

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Foto profil : </strong></label>
                        <img src="{{ asset('storage/photos/profile_view/'.$dosens->image_profile) }}" style="width: 300px; height: 400px">
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Role:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dosens->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Role:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dosens->contact }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Role:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dosens->email }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Role:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dosens->specialization }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
