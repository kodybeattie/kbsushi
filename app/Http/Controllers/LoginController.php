<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['except' => 'destroy']);
  }
  public function create()
  {
    return view('login');
  }

  public function store()
  {
    Session::flush();
    $this->validate(request(),[
        'email_address' => 'required|email',
        'password' => 'required']);
    $user = array(
        'email_address' => request('email_address'),
        'password' => request('password'));

    if (Auth::attempt($user)) {
        //return Redirect::intended('dashboard');
        return redirect()->home();
    }

  }

  public function destroy()
  {
    auth()->logout();
    Session::flush();
    return redirect()->home();
  }
}
