<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    // only admin may execute these
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    { 
        $users = User::orderBy('name','asc')->get();
        return view('console.users.index',compact('users'));
    }
    
    public function show(User $user)
    {
        return view('console.users.show',compact('user'));
    }

    public function toggleAdmin(User $user)
    {
    	if ($user->isAdmin())
    		$user->admin = false;
    	else
    		$user->admin = true;
    	
    	$user->save();

    	session()->flash('message', 'Usuario convertido!');
        return redirect('/console/users');

    }
}
