<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable=['name','content','category_id','important'];


    public function category(){
return $this->belongsTo(Category::class);
    }


    
public function getNameAttribute($value)
{
return ucfirst($value);
}

public function getThumbnailAttribute($value)
{
    return $value ? $value:'/images/noimage.png';
}

}
