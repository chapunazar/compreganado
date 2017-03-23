<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use App\Paymentmethod;
use App\Breed;
use App\Category;
use App\ListingFile;

use Carbon\Carbon;

class ListingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('home','webshow');
    }

    // Method checks if user passed (normallu would be the authenticated user or admin) may view, delete or edit a listing
    public function canUserAccessListing($user_id=0,$listing)
    {            
            if(auth()->user()->isAdmin() || $user_id==$listing->user->id)
                return true;
            else
                return false;
    }
    
    // Public views!!!
    public function home()
    { 
                
        $listings = Listing::latest()
        ->filter(request(['month', 'year']))
        ->get();

        if (auth()->check())
            $url_main = "/console";
        else  
            $url_main = "/login";

               
        return view('layouts.home',compact('listings','url_main'));
    }
    
    public function webshow(Listing $listing)
    {
        return view('layouts.listingcard',compact('listing'));
    }
    
    // Console tasks!!
    public function index()
    {
        //show all the listings if ADMIN or show all listings created by current user

        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $listings = Listing::latest()->get();
            }else{
                $listings = auth()->user()->listings()->latest()->get();
            }
               
        }
     

        $filterTxt = "";
        return view('console.listings.index',compact('listings','filterTxt'));
    }
    
    public function show(Listing $listing)
    {
        if(ListingsController::canUserAccessListing(auth()->user()->id, $listing))
            return view('console.listings.show',compact('listing'));
        else
            return redirect()->home();
    }

    
    /////////////////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        //List of payment methods
        $pms = Paymentmethod::orderBy('name','asc')->get();

        //List of Breeds
        $breeds = Breed::orderBy('name','asc')->get();
        
        //List of Categories
        $categories = Category::orderBy('name','asc')->get();


        return view('console.listings.create',compact('pms','breeds','categories'));
    }
    
    public function store()
    {    
        $this->validate(request(),[
            'heads' => 'required|numeric|min:1',
            'unitweight' => 'required|numeric|min:1',
            'paymentmethods' => 'required',
            'breed_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'required'            
        ]);

        $files = count(request('files'));
        foreach(range(0, $files) as $index) {
            $this->validate(request(),['files.' . $index => 'image|mimes:jpeg,bmp,png|max:2000']);
        }

        /*
        Listing::create([
            'title'=>$request->input('title'),
            'heads'=>$request->input('heads'),
            'description'=>$request->input('description'),
            'user_id' => auth()->user()->id
        ]);
        */

        
        //We regenerate the title based on the fields. its a formula field, besides we cant trust they send via post crap
        $heads = request('heads');
        $category = Category::findOrFail(request('category_id'));
        $breed = Breed::findOrFail(request('breed_id'));

        $title = $heads." ".$category->name." ".$breed->name;

        $listing = new Listing([
            'title'=>$title,
            'heads'=>$heads,
            'unitweight'=>request('unitweight'),
            'breed_id'=>request('breed_id'),            
            'category_id'=>request('category_id'),            
            'description'=>request('description'),
            'expiration_date' => Carbon::tomorrow()->addMonths(6), // tomorrow devuelve las 00 00 00 horas del dia siguiente          
            'active' => true
            ]
        );

        auth()->user()->publish($listing);

        //Update the payment methods once it exists
        $listing->paymentmethods()->sync(request('paymentmethods'));

        //move files to folder

        foreach (request('files') as $file) {
            $filename = $file->store('files');
            ListingFile::create([
                'listing_id' => $listing->id,
                'filename' => $filename
            ]);

        }
        
        
        session()->flash('message', 'Lote agregado exitosamente!');
        return redirect('/console/listings');
        
    }

    public function expire(Listing $listing)
    {
        if(ListingsController::canUserAccessListing(auth()->user()->id, $listing)){
            
            $listing->expire();
            $listing->save();
            session()->flash('message', 'Lote expirado');
            session()->flash('message-type', 'success');

            return redirect()->back();
        }
        else{
            return redirect()->home();
        }
    }

    public function enable(Listing $listing)
    {
        if(ListingsController::canUserAccessListing(auth()->user()->id, $listing)){
            
            $listing->enableforMonths(6);
            $listing->save();
            session()->flash('message', 'Vencimiento postergado');
            session()->flash('message-type', 'success');

            return redirect()->back();
        }
        else{
            return redirect()->home();
        }
    }

    public function activate(Listing $listing)
    {
        if(ListingsController::canUserAccessListing(auth()->user()->id, $listing)){
            
            $listing->activate();
            $listing->save();
            session()->flash('message', 'Lote activado');
            session()->flash('message-type', 'success');

            return redirect()->back();
        }
        else{
            return redirect()->home();
        }
    }

    public function deactivate(Listing $listing)
    {
        if(ListingsController::canUserAccessListing(auth()->user()->id, $listing)){
            
            $listing->deactivate();
            $listing->save();
            session()->flash('message', 'Lote desactivado');
            session()->flash('message-type', 'success');

            return redirect()->back();
        }
        else{
            return redirect()->home();
        }
    }


    
}
