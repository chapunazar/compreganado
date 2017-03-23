<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Listing;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }
    
    // Console tasks!!
    public function index()
    {
        //show all the comments if ADMIN or show all comments made by current user

        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $comments = Comment::latest()->get();
            }else{
                $comments = auth()->user()->comments()->latest()->get();
            }
               
        }
     

        $filterTxt = "";
        return view('console.comments.index',compact('comments','filterTxt'));
    }



    ////////////////////////////////////////

    /*public function store(Request $request)
    {    
        $this->validate(request(),[
            'body' => 'required|max:255',
            'listing_id' => 'required|numeric|min:1',
        ]);
        
        Listing::create([
            'body'=>$request->input('body'),
            'listing_id'=>$request->input('listing_id'),
        ]);
        
        
        return redirect('/');
    }
    */
    
    public function store(Listing $listing)
    {    
        $this->validate(request(),[
            'body' => 'required|max:255'
        ]);
        
        //por la relacion user has many comments el user id no es necesario
        auth()->user()->addComment(
            new Comment([
            'body'=>request('body'),
            'listing_id'=>$listing->id
            ]
        ));
        
        session()->flash('message', 'Tu comentario ha sido agregado!');
        return back();
    }


}
