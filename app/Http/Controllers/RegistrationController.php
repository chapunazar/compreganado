<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\Welcome;
use App\User;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('sessions.register');
    }
    
    public function store(RegistrationRequest $request)
    {
        //the validation is done in the RegistrationRequest instance $request when constructed.
   
        
        //create
       $user = User::create([
           'name'=>request('name'),
           'email'=>request('email'),
           'password'=>bcrypt(request('password'))
            
        ]);

        
        //sign in
        auth()->login($user);
        
        //send welcome email
        //\Mail::to($user)->send(new Welcome($user));
        
        session()->flash('message', 'Muchas gracias por registrarse!');
        
        return redirect()->home();
    }

}
