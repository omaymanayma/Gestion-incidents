<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incident extends Model
{
    use HasFactory;
    protected $fillable = ["name","type","description","location"] ; 

    function images(){
        return $this->morphMany(image::class,'imageable');
    }
}
