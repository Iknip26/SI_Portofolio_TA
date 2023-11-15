<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owners extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_content', 'owner_name'];
}