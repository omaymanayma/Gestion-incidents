<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    use HasFactory;
    protected $fillable = ['description' , 'date_action','incident_id'] ;
   
function images(){
    return $this->morphMany(image::class,'imageable');
}
}
