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
      $this->middleware('admin');

    }

 public function addProduct(Request $request){
        if($request-> isMethod('post')){

            $this->validate(request(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'category' => 'required',
             'price' => 'integer|max:100',

            
        ]);


         $data = $request->all();
         $product = new product;
         
         //$product = product::all();
         $product->category = $data['category'];
         $product->product_name = $data['product_name'];
         $product->product_description = $data['product_description'];
         $product->price = $data['price'];
         $product->save();
        dd($product->product_name);
           return back();
         };
  
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

    public function cart()
    {
      return view('sushi');
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
      return redirect()->route('cart');
    }

/*

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
