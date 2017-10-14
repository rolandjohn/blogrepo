<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()

    {
    	return view('registration.create');
    }

    public function store()

    {

    	//Validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed',
    	]);
    	//create and save the user
    	$user = User::create([

            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))

        ]);

    	//Sign them in
    	\Auth::login($user);

    	//Redirect to home page
    	//dd(home());
    	return redirect()->home();

    }

}
