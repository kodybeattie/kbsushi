<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

    //  This works 
     public function update(Request $request){ 
        
        $user = Auth::user();
        $pass = $request->get('password');
        
        if(Hash::check($pass, $user->password)) {

           
         $user->first_name = $request->get('first_name');
         $user->last_name = $request->get('last_name');
         $user->email_address = $request->get('email_address');
         $user->phone_number = $request->get('phone_number');
         if (!empty($request->input('new_password')))
         {
            $new_password = bcrypt($request->input('new_password'));
            $user->password = $new_password;

         }
         
         $user->save();
         return redirect()->home();

        }
        else
        {
            session()->flash('message','hello');
            return redirect()->home();
            //Session::flash('flash_message', 'User error!');
            //return redirect()->home->with('message', 'error|There was an error...');
        }
        //$hashedPassword = Auth::user()->getAuthPassword();

        // //$user->first_name = 
        //   if ($user->password == $pass)
        //  {
        //   dd($user->password);
        // // // //$user->save();
        //     //return redirect()->home();
        //   }
        // else
        // {
        //     //dd($user->password);
        //     $password = 
        //     dd($request->get(bcrypt('password')));
        // }
         //$user->first_name = $request->get('first_name');
         //$user->last_name = $request->get('last_name');


     }
     //public function update($user_id){ 
        //$user = User::find($user_id);
        //$user = Auth::user();
        //dd($user);
        //$user->first_name = 
        //  $user->first_name = $request->get('first_name');
        //  $user->last_name = $request->get('last_name');
        //  $user->update([
        //     'first_name' => $request->first_name,
            
        // ]);
        //return redirect()->home();

     //}
  
}
