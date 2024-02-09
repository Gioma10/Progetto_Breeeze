<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function home() {
        $titleView = "Home Page";
        return view('welcome', compact('titleView'));
    }

}
