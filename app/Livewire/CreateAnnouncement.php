<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $description;
    public $price;
    public $category;

    public function store(){
        $category = Category::find($this->category);
        $category->announcements()->create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,

        ]);
     
             
        

        $this->reset();

    }

    public function render()
    {   
        
        return view('livewire.create-announcement');
    }
}
