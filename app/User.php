<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }
    
    public static function menuOptions()
    {

        $menu = array();

        if (Auth::check()){
            $menu['dashboard'] = 1;
            $menu['listings'] = 1;
            $menu['comments'] = 1;
            $menu['offers'] = 1;
            $menu['template'] = 1;

            $id = Auth::id();
            $user = new User($id);
            if ($user->isAdmin()){        
                $menu['breeds'] = 1;
                $menu['categories'] = 1;
                $menu['paymentmethods'] = 1;
            }

        }

        return $menu;

    }
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function publish(Listing $listing)
    {
        $this->listings()->save($listing);
    }
    
    public function addComment(Comment $comment)
    {
        $this->comments()->save($comment);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function addOffer(Offer $offer)
    {
        $this->offers()->save($offer);
    }

    public function receivedOffers()
    {
         
        $listings = $this->listings()->latest()->get();

        $offers = array();

        foreach ($listings as $listing){
             $list_offers = $listing->offers()->latest()->get();
             foreach ($list_offers as $list_offer){
                $offers[] = $list_offer;
             }
        }

        return $offers;
    }

}
