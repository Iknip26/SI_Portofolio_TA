<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    use HasFactory;
    protected $fillable = ['id_dosen', 'tipe_konten',
     'content_url', 'video_url', 'github_url', 'tittle',
     'description', 'owner_contact', 'created_at'];
}
