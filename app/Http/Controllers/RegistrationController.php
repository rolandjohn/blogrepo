<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()

    {
    	return view('registration.create');
    }

    public function store(RegistrationForm $form)

    {

        $form->persist();

        session()->flash('message', 'Thank you so much for signing up!');


    	//Validate the form
    	// $this->validate(request(), [
    	// 	'name' => 'required',
    	// 	'email' => 'required|email',
    	// 	'password' => 'required|confirmed',
    	// ]);
    	//create and save the user
    	// $user = User::create([

     //        'name' => request('name'),
     //        'email' => request('email'),
     //        'password' => bcrypt(request('password'))

     //    ]);

     //    //email a welcome message
     //    \Mail::to($user)->send(new Welcome($user));

    	//Sign them in
    	// \Auth::login($user);

    	//Redirect to home page
    	//dd(home());
    	return redirect()->home();

    }

}
