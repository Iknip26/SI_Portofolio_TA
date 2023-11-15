<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tags;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class publicDataController extends Controller
{
    public function getTags(String $id){
        $tags = tags::find($id);
        return $tags;
    }
}