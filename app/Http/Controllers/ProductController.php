<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{
	//Check user for their functions. (Store)
    public function __construct()
    {
    	$this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Products $products)
    {
    	$products = $products->all();

    	//$products = Product::latest()->filter(request([The data to be displayed from products table]))->get();
    }

    public function cart()
    {
      return view('sushi');
    }

  //  public static function addToCart($product_id, $quantity, Request $request)
    public function addToCart(Request $request)
    {
      $products = Product::getByCategory(0);
      $quantities = $request->input('quantities.*');
      $cart = Session::get('cart');
      // if cart empty
      if (!$cart)
      {
        $cart= array();
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if ((int)($quantities[$i]) != 0)
          {
            $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
            array_push($cart, $newProduct);
          }
        }
      }
      else
      {
        for ($i=0; $i<=count($quantities)-1; $i++)
        {
          if(isset($cart[$products[$i]['product_id']]))
          {
            if ($quantities[$i] == 0)
            {
              unset($cart[$products[$i]['product_id']]);
            }
            else
            {
              foreach($cart as $product_id => $details)
              {
                foreach($details as $key => $value)
                {
                  $value['quantity'] = $quantities[$i];
                }
              }
            }
          }
          else
          {
            if ((int)($quantities[$i]) != 0)
            {
              $newProduct = [$products[$i]['product_id'] => ["product_name" => $products[$i]['product_name'],"quantity" => (int)($quantities[$i]),"price" => $products[$i]['price']]];
              array_push($cart, $newProduct);
            }
          }
        }
      }
      Session::push('cart', $cart);
      //return redirect()->route('cart');
    }

/*
    public function show($id)
    {
    	$product = Product::find($id);
    	return view('product.show', compact('product'));
    }


   public function addProduct(Request $request){
   return view('backend/addproduct');
   }

    public function create()
    {
    	return view('products.create');
    }

    public function store()
    {
    	$this->validate(request), [
    	]);
		//The required fields ^^

		auth()->user()->publish(//The new Poduct to add into the database with fields
		);
		session()->flash('message', 'New product has been added!');
		return redirect('/');
    }
    */
}
