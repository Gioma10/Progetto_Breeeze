<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('announcements.show', compact('announcement'));
    }
    
    public function indexAnnouncement(Request $request){
        
        if($request->filled('category_id')) {

            $category = Category::findOrFail($request->category_id);

            $announcements = $category->announcements;

        } else {
            
            $announcements = Announcement::all();
        }
        
        // $selectedCategoryId = $request->get('category_id');
        // $selectedCategoryName = null;

        // if($selectedCategoryId) {
        //     $selectedCategory = Category::find($selectedCategoryId);
        //     $selectedCategoryName = $selectedCategory ? $selectedCategory->name : 'Tutte le categorie';
        // }

        // $announcements = Announcement::all();
        return view('announcements.index', compact('announcements', 'selectedCategoryName'));
    }

}