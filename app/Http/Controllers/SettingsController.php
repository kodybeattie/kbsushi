<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('settings');
    // }

    public function show() {
        // $users = Users::select('select * from users where id = ?',[]);
        //$value = $request->session()->get('key');        
       
        $user = Auth::user();
        //$users = User::all();
        
        return view('settings',compact('user'));
     }
  
}
