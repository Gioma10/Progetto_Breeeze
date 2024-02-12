<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        return redirect()->route('login');
    }

    public function addAnnouncement() {
        $titleView = 'Aggiungi Annuncio';
        return view('announcements.addAnnouncement', compact('titleView'));

    }
}
