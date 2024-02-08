<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $description;
    public $price;

    public function store(){
        Announcement::create([
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
