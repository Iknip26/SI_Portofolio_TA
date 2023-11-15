<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dosens;
use App\Models\User;
use Illuminate\Http\Request;

class publicPageController extends Controller
{
    public function homescreen(){
        return view('public.index');
    }

    public function showcase(){
        $dosens = dosens::all();
        return view('public.showcase', compact('dosens'));
    }

}