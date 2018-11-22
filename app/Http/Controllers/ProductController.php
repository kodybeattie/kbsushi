<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
             'price' => 'integer|max:100',]);


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

    public function addSushiToCart(Request $request)
    {
      $products = Product::getByCategory(0);
      $quantities = $request->input('quantities.*');
      $cart = Session::get('cart')[0];
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
      return redirect('/cart');
    }


}
