<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    
    // only admin may execute these
    public function __construct()
    {
        $this->middleware('admin')->except('webshow');
    }
    
    public function webshow(Category $category){
        $listings = $category->listings;
        return view('layouts.home',compact('listings'));
    }

    public function index(){ 
        $categories = Category::orderBy('name','asc')->get();
        return view('console.categories.index',compact('categories'));
    }
    
    public function show(Category $category)
    {
        return view('console.categories.show',compact('category'));
    }
    
    public function showlistings(Category $category){
        $listings = $category->listings;
        $filterTxt = "Categoría ->".$category->name;
        return view('console.listings.index',compact('listings','filterTxt'));
    }

    public function create()
    {
        return view('console.categories.create');
    }
    
    public function store()
    {
        //dd($request->input('name'));
        
        $this->validate(request(),[
            'name' => 'required|max:255',
            'description' => 'required'            
        ]);
        Category::create([
            'name'=>request('name'),
            'description'=>request('description'),
        ]);
        
        session()->flash('message', 'Categoria agregada exitosamente!');
        session()->flash('message-type', 'success');
        return redirect('/console/categories');
    }

    public function destroy(Category $category){
       // cant delete if it has Listings associated
        if (count($category->listings) > 0){
            session()->flash('message', 'No se puede eliminar la Categoria si tiene Lotes asociados');
            session()->flash('message-type', 'danger');
            return redirect()->back();
        }
        else{
            $category->delete();
            session()->flash('message', 'Categoria eliminada exitosamente.');
            session()->flash('message-type', 'success');
            return redirect('/console/categories');
        }
        
        
        
    }
}
