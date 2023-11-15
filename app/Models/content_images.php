<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content_images extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_content', 'image_url'];
}