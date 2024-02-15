<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable=[
        'title', 
        'description',
        'price',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
        'id'=>$this->id,
        'title'=>$this->title,
        'description'=>$this->description,
        'price'=>$this->price,
        'category_id'=>$this->category_id,
        'category'=>$category,
        ];
        return $array;
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
    
}
