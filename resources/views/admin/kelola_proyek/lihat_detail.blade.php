@extends('admin.kelola_akun.edit_akun.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Detail_konten
                </div>
                <div class="float-end">
                    <a href="{{ route('proyek.pilih_akun') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Judul: </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contents->tittle }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>tipe proyek : </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contents->tipe_konten }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Tag: </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @foreach ( $tags as $tag )
                            <a href="">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Pemilik: </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @foreach ( $owners as $owner )
                            <a href="">{{ $owner }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Dosen Pembimbing: </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contents->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Deskripsi proyek : </strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contents->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>dokumen : </strong></label>
                        <div class="col-md-6" style="line-height: 35px;"><?php
                            if ($contents->content_url != null){
                                ?> <embed src="{{ asset('storage/content/'.$contents->content_url) }}" width="500" height="500" >
                             <?php }else{
                                ?><p>TIDAK ADA DOKUMEN</p><?php
                             }; ?>
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>video : </strong></label>
                        <div class="col-md-6" style="line-height: 35px;"><?php
                            if ($contents->video_url != null){
                                ?> <video controls autoplay muted loop src="{{ asset('storage/content_video/'.$contents->video_url) }}" width="500" height="500" >
                             <?php }else{
                                ?><p>TIDAK ADA VIDEO</p><?php
                             }; ?>
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>previe project : </strong></label>
                        <div class="col-md-6" style="line-height: 35px;"><?php
                            if ($images != null){
                                ?> <embed src="{{ asset('storage/content_images/'.$images->image_url) }}" width="500" height="500" >
                             <?php }else{
                                ?><p>TIDAK ADA GAMBAR</p><?php
                             }; ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection