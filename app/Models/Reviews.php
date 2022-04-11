<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;



class Reviews extends Model
{
    public static function getReviews(){
        return static::get();
        }
     
        
        
    use HasFactory;
    
}
