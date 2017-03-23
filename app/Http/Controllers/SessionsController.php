<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
    
    public function create()        
    {
        return view('sessions.create');
    }
    
    public function store(Request $request)
    {
        $this->validate(request(),[
            'email' => 'required|max:255',
            'password' => 'required'            
        ]);
        
        if(!auth()->attempt(['email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]))
        {
            return back()->withErrors([
                'message'=>'Email o contraseña incorrecta'
            ]);
        }
        
        return redirect()->home();
    }
    
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
