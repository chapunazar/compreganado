<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Breed;
use App\Http\Requests\BreedRequest;

class BreedsController extends Controller
{
    
    // only admin may execute these
    public function __construct()
    {
        $this->middleware('admin')->except('webshow');
    }
    


    public function webshow(Breed $breed){
        $listings = $breed->listings;
        return view('layouts.home',compact('listings'));
    }

    public function index()
    {
        //$breeds = DB::table('breeds')->get();
        $breeds = Breed::orderBy('name','asc')->get();
        return view('console.breeds.index',compact('breeds'));
    }
    
    public function show(Breed $breed)
    {
        return view('console.breeds.show',compact('breed'));
    }
    
    public function create()
    {
        return view('console.breeds.create');
    }
    
    public function store(BreedRequest $request)
    {
        //dd($request->input('name'));
        

        Breed::create([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'description'=>$request->input('description')
        ]);
        
        session()->flash('message', 'Raza agregada exitosamente!');
        session()->flash('message-type', 'success');
        return redirect('/console/breeds');
    }
    
    public function edit($id){
        $breed = Breed::findOrFail($id);
        return view('console.breeds.edit', compact('breed'));        
    }
    
    public function update($id, BreedRequest $request){
        $breed = Breed::findOrFail($id);
        
        $breed->update([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'description'=>$request->input('description')
        ]);
        
        session()->flash('message', 'Raza actualizada exitosamente!');
        session()->flash('message-type', 'success');
        return redirect('/console/breeds');
        
        
    }
    
    public function showlistings(Breed $breed){
        $listings = $breed->listings;
        $filterTxt = "Raza ->".$breed->name;
        return view('console.listings.index',compact('listings','filterTxt'));
    }
    
    public function destroy(Breed $breed){
       // cant delete if it has Listings associated
        if (count($breed->listings) > 0){
            session()->flash('message', 'No se puede eliminar la Raza si tiene Lotes asociados');
            session()->flash('message-type', 'danger');
            return redirect()->back();
        }
        else{
            $breed->delete();
            session()->flash('message', 'Raza eliminada exitosamente.');
            session()->flash('message-type', 'success');
            return redirect('/console/breeds');
        }
        
        
        
    }
    
    
}
