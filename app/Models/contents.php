<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    use HasFactory;
    protected $fillable = ['id_dosen', 'tipe_konten', 'thumbnail_image_url', 'owner',
     'content_url', 'video_url', 'video_tittle', 'github_url', 'tittle',
     'description', 'owner_contact', 'created_at'];
}