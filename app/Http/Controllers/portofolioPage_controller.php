<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class portofolioPage_controller extends Controller
{
    public function showPage(){
        $tags = tags::all();
        $portofolio = DB::table('contents')
        ->join('dosen', 'contents.id_dosen', '=', 'dosen.id_dosen')
        // ->join('tags', 'contents.id_content', '=', 'tags.id_content')
        ->select('contents.image_url', 'contents.id_content', 'contents.tittle', 'contents.description', 'dosen.name')
        ->orderBy('contents.created_at')
        ->get();
        return view('testcontroller1', compact('portofolio', 'tags'));
    }
}
