<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paymentmethod;

class PaymentmethodsController extends Controller
{
    
        // only admin may execute these
    public function __construct()
    {
        $this->middleware('admin')->except('webshow');
    }

    public function webshow(Paymentmethod $paymentmethod){
        $listings = $paymentmethod->listings;
        
         return view('layouts.home',compact('listings'));
    }
    
    public function index()
    {  
        $paymentmethods = Paymentmethod::orderBy('name','asc')->get();
        return view('console.paymentmethods.index',compact('paymentmethods'));
    }
    
    public function show(Paymentmethod $paymentmethod)
    {
        return view('console.paymentmethods.show',compact('paymentmethod'));
    }
    
    public function create()
    {
        return view('console.paymentmethods.create');
    }
    
    public function store()
    {        
        $this->validate(request(),[
            'name' => 'required|max:255',      
        ]);
        Paymentmethod::create([
            'name'=>request('name'),
        ]);
        
        session()->flash('message', 'Método de pago agregado exitosamente!');
        session()->flash('message-type', 'success');
        return redirect('/console/paymentmethods');
    }
    
    public function showlistings(Paymentmethod $paymentmethod){
        $listings = $paymentmethod->listings;
        $filterTxt = "Método de pago ->".$paymentmethod->name;
        return view('console.listings.index',compact('listings','filterTxt'));
    }

    public function destroy(Paymentmethod $paymentmethod){
       // cant delete if it has Listings associated
        if (count($paymentmethod->listings) > 0){
            session()->flash('message', 'No se puede eliminar el método de pago si tiene Lotes asociados');
            session()->flash('message-type', 'danger');
            return redirect()->back();
        }
        else{
            $paymentmethod->delete();
            session()->flash('message', 'Método de pago eliminado exitosamente.');
            session()->flash('message-type', 'success');
            return redirect('/console/paymentmethods');
        }
        
        
        
    }
    
}
