<?php

namespace App\Http\Controllers;
use App\Product;
use App\Ingredient;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class ProductController extends Controller
{
	//Check user for their functions. (Store)
    public function __construct()
    {
      //$this->middleware('auth')->except(['index', 'show']);
      //$this->middleware('admin');
      $this->middleware('admin')->except(['addSushiToCart', 'addDrinkToCart']);
    }

    public function cart()
    {
      return view('sushi');
    }


    public function addProduct(Request $request){
        if($request-> isMethod('post')){

            $this->validate(request(), [
            'product_name' => 'required|unique:products',
            'product_description' => 'required',
            'category' => 'required',
             'price' => 'numeric|max:100',
             'ing_quantity' => 'required',

             ]);


           $data = $request->all();
           $product = new product;

           //$product = product::all();
           $product->category = $data['category'];
           $product->product_name = $data['product_name'];
           $product->product_description = $data['product_description'];
           $product->price = $data['price'];
           $product->save();

         // dd($product->product_name);
             return back();
         };

   }

   public function addIngredient(Request $request){
    if($request-> isMethod('post')){

      $this->validate(request(), [
        'product' => 'required',
        'inventory' => 'required',
         'ing_quantity' => 'required|numeric',
         
         ]);
       $data = $request->all();
       $ing = new ingredient;
      //dd($data);
       //$product = product::all();
       $ing->product_id = $data['product'];
       $ing->ing_id = $data['inventory'];
       $ing->quantity = $data['ing_quantity'];
       $ing->units = $data['ing_unit'];
       $ing->save();

     // dd($product->product_name);
         return back();
     };

}
   public function destroy($product_id) {
      DB::delete('delete from products where product_id = ?',[$product_id]);

      return back();
   }

   public function editshow($product_id) {
      $products = DB::select('select * from products where product_id = ?',[$product_id]);
      return view('backend.edit')->with('product',$products[0]);
   }

    public function edit(Request $request,$product_id) {
      $product_name = $request->input('product_name');
      DB::update('update products set product_name = ? where product_id = ?',[$product_name,$product_id]);


      $price= $request->input('price');
      DB::update('update products set price = ? where product_id = ?',[$price,$product_id]);

      $category= $request->input('category');
      DB::update('update products set category = ? where product_id = ?',[$category,$product_id]);

      $product_description = $request->input('product_description');
      DB::update('update products set product_description = ? where product_id = ?',[$product_description,$product_id]);


      return back();
   }

   public function viewIng()
   {

     $products = DB::table('products')
     ->select('product_id','product_name')
     ->get();

     $inventory = DB::table('inventory')
     ->select('ing_id','ing_name')
     ->get();



     //dd($products);
     //this is just another way to return the array
     //return view('backend/productlist',['products'=>$products]);
     return view('backend/addingredients', compact('products','inventory'));
   }

    public function index(Products $products)
    {
    	$products = $products->all();

    	//$products = Product::latest()->filter(request([The data to be displayed from products table]))->get();
    }

    public function show()
    {
      $products = DB::table('products')->get();

      //dd($products->product_name);
      //this is just another way to return the array
    	//return view('backend/productlist',['products'=>$products]);
    	return view('backend/productlist', compact('products'));
    }

    public function viewInventory()
    {
      $inventory = DB::table('inventory')->get();

      //dd($products->product_name);
      //this is just another way to return the array
    	//return view('backend/productlist',['products'=>$products]);
    	return view('backend/inventory', compact('inventory'));
    }

    public function addInventory(Request $request){
      if($request-> isMethod('post')){

          $this->validate(request(), [
          'ing_name' => 'required|unique:inventory',
          'quantity' => 'required',
          'units' => 'required',
           ]);


         $data = $request->all();
         $inventory = new inventory;

         //$product = product::all();
         $inventory->ing_name = $data['ing_name'];
         $inventory->quantity = $data['quantity'];
         $inventory->units = $data['units'];

         $inventory->save();
       // dd($product->product_name);
           return back();
       };

 }


    public function addSushiToCart(Request $request)
    {
      $products = Product::getByCategory(0);
      $quantities = $request->input('quantities.*');
      $faves = $request->input('faves.*');
      $cart = Session::get('cart')[0];
      //if not then add these to favourites.
      //Maybe add flash message for each outcome
      if (isset($faves))
      {
        for ($i=0; $i<=count($faves)-1; $i++)
        {
          DB::table('favourites')->insert([
              'user_id' => Auth::id(),
              'product_id' => $faves[$i]
          ]);
        }
      }

      if (!$cart)
      {
        $cart= array();
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if ((int)($quantities[$i]) != 0)
          {
            $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
            $cart += $newProduct;
          }
        }
      }
      else
      {
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if (array_key_exists($products[$i]['product_id'], $cart))
          {
            unset($cart[$products[$i]['product_id']]);
            if ((int)($quantities[$i]) != 0)
            {
              $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
              $cart += $newProduct;
            }
          }
          else
          {
            $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
            $cart += $newProduct;
          }
        }
      }
      Session::forget('cart');
      Session::push('cart', $cart);

      return redirect()->route('cart');

    }

    public function addDrinkToCart(Request $request)
    {
      $products = Product::getByCategory(1);
      $quantities = $request->input('quantities.*');
      $faves = $request->input('faves.*');
      if (isset($faves))
      {
        for ($i=0; $i<=count($faves)-1; $i++)
        {
          DB::table('favourites')->insert([
              'user_id' => Auth::id(),
              'product_id' => $faves[$i]
          ]);
        }
      }

      $cart = Session::get('cart')[0];
      // if cart empty ****** this works fine **********
      if (!$cart)
      {
        $cart= array();
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if ((int)($quantities[$i]) != 0)
          {
            $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
            $cart += $newProduct;
          }
        }
      }
      else
      {
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if (array_key_exists($products[$i]['product_id'], $cart))
          {
            unset($cart[$products[$i]['product_id']]);
            if ((int)($quantities[$i]) != 0)
            {
              $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
              $cart += $newProduct;
            }
          }
          else
          {
            $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
            $cart += $newProduct;
          }
        }
      }
      Session::forget('cart');
      Session::push('cart', $cart);
      return redirect()->route('cart');
    }

/*
    public function show($id)
    {
    	$product = Product::find($id);
    	return view('product.show', compact('product'));

      return redirect('/cart');

    }
*/

}
