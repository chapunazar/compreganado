<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;



class Listing extends Model
{
    protected $fillable = ['title','heads','description','user_id','unitweight', 'breed_id','category_id','expiration_date','active'];

    // need to tell Laravel to convert this into a Carbon instace ALWAYS
    protected $dates = ['expiration_date'];

    public function hasExpired()
    {
        if (Carbon::now()->gt($this->expiration_date))
            return true;
        else
            return false;

    }

    public function isActive()
    {
        if ($this->active)
            return true;
        else
            return false;

    }

    public function expire()
    {
        $this->expiration_date=Carbon::today();
    }

    public function enableforMonths($months)
    {
        $this->expiration_date=Carbon::tomorrow()->addMonths($months);  //tomorrow returns tomorrow but at the start
    }


    public function activate()
    {
        $this->active=true;
    }

    public function deactivate()
    {
        $this->active=false;
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeFilter($query,$filters)
    {
        if ($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        
        if ($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }
    
    public static function archives()
    {
         return static::selectRaw('year(created_at) year, monthname(created_at) month, count(id) as total')->groupBy('year','month')->orderBy('year','desc')->orderBy('month','desc')->get()->toArray();
    }
    
    public function paymentmethods()
    {
        return $this->belongsToMany(Paymentmethod::class);
    }
    
    public function breed(){
        
        return $this->belongsTo(Breed::class);
    }

    public function category(){
        
        return $this->belongsTo(Category::class);
    }

    public function listingfiles()
    {
        return $this->hasMany(ListingFile::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

   
    
}
