<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
	//needs a store and create
    public function create()
    {
    	return view('register');
    }

    public function store()
    {

      $this->validate(request(),[
          'first_name' => 'required',
          'last_name' => 'required',
          'email_address' => 'required|email',
          'phone_number' => 'required',
          'password' => 'required|confirmed']);
      $user = User::create([
          'use_type' => request('user_type'),
          'first_name' => request('first_name'),
          'last_name' => request('last_name'),
          'email_address' => request('email_address'),
          'phone_number' => request('phone_number'),
          'password' => request('password')]);

      auth()->login($user);
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
