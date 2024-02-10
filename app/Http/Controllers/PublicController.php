<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function home() {

        $announcements = Announcement::take(8)->get()->sortByDesc('created_at');
        
        $titleView = "Home Page";
        return view('welcome', compact('titleView', 'announcements'));

        
        
    }

}
