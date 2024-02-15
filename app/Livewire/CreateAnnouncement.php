<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $images = [];
    public $image;
    public $temporary_images;

    protected $rules = [
        'title'=> 'required|min:5',
        'description'=> 'required|min:15',
        'price'=> 'required|numeric',
        'category'=> 'required',
        'images.*'=> 'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute deve contenere solo numeri',
        'temporary_images.required'=> 'L\'immagine è richiesta',
        'temporary_images.*.image'=> 'I file devono essere immagini',
        'temporary_images.*.max'=> 'L\'immagine dev\essere un\'immagine',

    ];

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',

        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store(){
       
        // $this->validate();
        // dd($this->images);

        $category = Category::find($this->category);
        $announcement=$category->announcements()->create(
            $this->validate()
            // [
            
            // 'title'=>$this->title,
            // 'description'=>$this->description,
            // 'price'=>$this->price,
        // ]
    );
    if(count($this->images)){
        foreach ($this->images as $image){

            $announcement->images()->create(['path'=>$image->store('images', 'public')]);
        }
       
    }
        Auth::user()->announcements()->save($announcement);
        // $announcement->user()->associate(Auth::user());



        // $announcement->save();

        session()->flash('message', 'Annuncio inserito correttamente, sarà pubblicato dopo la revisione');
        $this->reset();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function cleanForm(){
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->images = '';
        $this->temporary_images = [];
        
    }
    public function render()
    {   
        return view('livewire.create-announcement');
    }

}
