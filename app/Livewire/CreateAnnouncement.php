<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class CreateAnnouncement extends Component
{
    public $title;
    public $description;
    public $price;
    public $category;

    public function store(){
        $category = Category::find($this->category);
        $announcement=$category->announcements()->create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
        ]);
        // Auth::user()->announcements()->save($announcement);

        // session()->flash('message', 'Annuncio inserito correttamente');
        // $this->reset();
    }

    public function render()
    {   
        return view('livewire.create-announcement');
    }
}
