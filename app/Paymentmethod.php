<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    protected $fillable = ['name'];
    
    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
    
    public function getRouteKeyName(){
        return 'name';
    }
}
