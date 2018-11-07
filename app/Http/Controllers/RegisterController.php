<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\RegistrationForm;

class RegisterController extends Controller
{
	//needs a store and create
    public function create()
    {
    	return view('register');
    }

    public function store(RegistrationForm $form)
    {

        $form->persist();

        return redirect()->home();
    }

    // public function store()
    // {
    // 	//On account creation then..
    // 	$form->persist();
    // 	session()->flash('message', 'Thanks for signing up!')
    //     return redirect()->home();
    // }

}
