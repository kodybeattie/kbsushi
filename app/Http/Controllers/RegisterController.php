<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
	//needs a store and create
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//On account creation then..
    	$form->persist();
    	session()->flash('message', 'Thanks for signing up!')
    	return redirect()->home();
    }

}
