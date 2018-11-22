<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Support\Facades\DB;
use Session;

class VendorsController extends Controller
{
    public function addVendor(Request $request){
        if($request-> isMethod('post')){

            $this->validate(request(), [
            'vendor_name' => 'required|unique:vendors',
            'vendor_phone' => 'required|unique:vendors,phone_number',

             
            ]);


           $data = $request->all();
           $vendor = new vendor;

           //$product = product::all();
           $vendor->vendor_name = $data['vendor_name'];
           $vendor->phone_number = $data['vendor_phone'];

           $vendor->save();
            //dd($vendor->vendor_name);
             return back();
         };

   }

   public function index()
   {
        $vendors = DB::table('vendors')->get();
        

                return view('/backend/viewvendors',compact('vendors'));
   }
   
   public function destroy($vendor_id) {
    //DB::table('vendors')->where('vendor_name', '=' , $vendor_id)->delete();
    DB::delete('delete from vendors where vendor_id = ?',[$vendor_id]);

   // DB::delete('delete from vendors where vendor_id = ?',[$vendor_id]);
    //DB::table('users')->where('votes', '>', 100)->delete();


    return back();
 }
   

}
