<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['listing_id','body','user_id'];
    
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

