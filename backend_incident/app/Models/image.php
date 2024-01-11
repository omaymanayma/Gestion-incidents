<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable = ['filename','imageable_id','imageable_type' ];
    
    function imageable(){
        return $this->morphTo();
    }
}
