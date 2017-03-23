<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingFile extends Model
{
    protected $fillable = ['filename','listing_id'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }


}
