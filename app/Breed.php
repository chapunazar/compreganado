<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['name','type','description'];
    
    public function listings(){
        
        return $this->hasMany(Listing::class);
        
    }
}
