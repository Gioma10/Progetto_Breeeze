<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function home() {

        // $announcements = Announcement::take(8)->get()->sortByDesc('created_at');
        $announcements = Announcement::where('is_accepted', true )->latest()->take(8)->get();

        $titleView = "Home Page";
        return view('welcome', compact('titleView', 'announcements'));

    }
    public function showAnnouncement(Announcement $announcement){
        return view('announcements.show', compact('announcement'));
    }
    
    public function indexAnnouncement(Request $request){
        
        

        if($request->filled('category_id')) {

            $category = Category::findOrFail($request->category_id);

            $announcements = $category->announcements()->where('is_accepted', true )->latest()->paginate(8)->withQueryString();

        } else {
            
            $announcements = Announcement::where('is_accepted', true )->latest()->paginate(8)->withQueryString();
        }
        
        // $selectedCategoryId = $request->get('category_id');
        // $selectedCategoryName = null;

        // if($selectedCategoryId) {
        //     $selectedCategory = Category::find($selectedCategoryId);
        //     $selectedCategoryName = $selectedCategory ? $selectedCategory->name : 'Tutte le categorie';
        // }

        // $announcements = Announcement::all();
        
          
         
        return view('announcements.index', compact('announcements'));
    }
  
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        
 
        
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang){
        
        session()->put('locale', $lang);
        return redirect()->back();
    }
    
}
