<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Listing;
use \App\Offer;


use App\Http\Requests\StoreOfferRequest;


class OffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }

    // Console tasks!!
    public function index()
    {
        //show all the offers if ADMIN or show all offers received to listings owned by current user

        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $offers = Offer::latest()->get();
            }else{
                $offers = auth()->user()->receivedOffers();
            }
               
        }
     

        $filterTxt = "";
        return view('console.offers.index',compact('offers','filterTxt'));
    }

    
    
    public function store(StoreOfferRequest $request, Listing $listing)
    {    
        /*$regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        $this->validate(request(),[
            'note' => 'max:255',
            'amount' => array('required','regex:'.$regex)
        ]);
        */
/*
        //User cannot bid its own listing
        $request->after(function ($request) {
            if (auth()->user()->id==$request->listing->user_id)
                $request->errors()->add('field', 'Something is wrong with this field!');

        });
*/
        
        
        //por la relacion user has many offers el user id no es necesario
        auth()->user()->addOffer(
            new Offer([
            'amount'=>request('amount'),
            'note'=>request('body'),
            'listing_id'=>$listing->id
            ]
        ));
        
        //session()->flash('message', 'Tu Oferta ha sido enviada!');
        //return back();
    }
}
