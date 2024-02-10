<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class CreateAnnouncement extends Component
{
    public $title;
    public $description;
    public $price;
    public $category;

    protected $rules = [
        'title'=> 'required|min:5',
        'description'=> 'required|min:15',
        'price'=> 'required|numeric',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute deve contenere solo numeri',
    ];

    public function store(){
        $category = Category::find($this->category);
        $announcement=$category->announcements()->create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
        ]);
        Auth::user()->announcements()->save($announcement);

        session()->flash('message', 'Annuncio inserito correttamente');
        $this->reset();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render()
    {   
        return view('livewire.create-announcement');
    }
}
