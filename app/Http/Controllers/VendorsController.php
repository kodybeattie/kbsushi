<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Vendor_Order;
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

   public function insertHistory(Request $request){
    if($request-> isMethod('post')){

        $this->validate(request(), [
            'price' => 'required|numeric',
             'ing_quantity' => 'required|numeric',
             
             ]);

       $data = $request->all();
       $ing = new vendor_order;
      //dd($data);
       //$product = product::all();
       $ing->vendor_id = $data['vendor'];
       $ing->ing_id = $data['inventory'];
       $ing->product_id = $data['product'];
       $ing->quantity = $data['ing_quantity'];
       $ing->units = $data['ing_units'];
       $ing->cost = $data['price'];
       $ing->date_ordered = date("Y-m-d H:i:s");
       $ing->save();
       
     // dd($product->product_name);
         return back();
     };

}

   public function index()
   {
        $vendors = DB::table('vendors')->get();
        

                return view('/backend/viewvendors',compact('vendors'));
   }

   public function viewhistory()
   {
        // $products = DB::table('products')
        // ->join('order_products','order_products.product_id', '=', 'products.product_id')
        // ->select('products.*')
        // ->get();
        $vendors = DB::table('vendor_order_history')
            ->join('vendors','vendors.vendor_id', '=', 'vendor_order_history.vendor_id')
            ->join('inventory','inventory.ing_id', '=', 'vendor_order_history.ing_id')
            ->join('products','products.product_id', '=', 'vendor_order_history.product_id')
            ->select('vendors.vendor_name','inventory.ing_name','products.product_name','vendor_order_history.*')
            ->get();
        
        //dd($vendors);
        return view('/backend/vendorhistory',compact('vendors'));
   }

   public function addHistory()
   {

     $vendor = DB::table('vendors')
     ->select('vendor_id','vendor_name')
     ->get();

     $inventory = DB::table('inventory')
     ->select('ing_id','ing_name')
     ->get();

     $products = DB::table('products')
     ->select('product_id','product_name')
     ->get();

    

     //dd($products);
     //this is just another way to return the array
     //return view('backend/productlist',['products'=>$products]);
     return view('backend/addhistory', compact('vendor','products','inventory'));
   }
   
   public function destroy($vendor_id) {
    //DB::table('vendors')->where('vendor_name', '=' , $vendor_id)->delete();
    DB::delete('delete from vendors where vendor_id = ?',[$vendor_id]);

   // DB::delete('delete from vendors where vendor_id = ?',[$vendor_id]);
    //DB::table('users')->where('votes', '>', 100)->delete();


    return back();
 }
   

}
