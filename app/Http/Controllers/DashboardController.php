<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use App\Paymentmethod;
use App\Breed;
use App\Category;
use App\Comment;
use App\Offer;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //get all the listings if ADMIN or show all listings created by current user
        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $lall = Listing::latest()->get();
                $call = Comment::latest()->get();
                $oall = Offer::latest()->get();

            }else{
                $lall = auth()->user()->listings()->latest()->get();
                $call = auth()->user()->comments()->latest()->get();
                $oall = auth()->user()->receivedOffers();

            }
               
        }

        $values = [
        'num_listings' => count($lall),
        'num_comments' => count($call),
        'num_offers' => count($oall),
        ];

            

        //get the latest and active ones
        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $listings = Listing::latest()->take(10)->get();
            }else{
                $listings = auth()->user()->listings()->latest()->take(10)->get();
            }
               
        }


     

        
        return view('console.index',compact('listings','values'));
    }
}
