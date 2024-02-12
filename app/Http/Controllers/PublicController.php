<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function home() {

        // $announcements = Announcement::take(8)->get()->sortByDesc('created_at');
        $announcements = Announcement::latest()->take(8)->get();

        $titleView = "Home Page";
        return view('welcome', compact('titleView', 'announcements'));

    }
    public function showAnnouncement(Announcement $announcement){
        return view('show', compact('announcement'));
    }
    
    public function indexAnnouncement(){
        
        $announcements = Announcement::all();
        return view('index', compact('announcements'));
    }
}
