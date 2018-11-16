<?php
    
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	//Check user for their functions. (Store)
    public function __construct()
    {
    	$this->middleware('auth')->except(['index', 'show']);
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
         $product = product::all();
         $product->category = $data['category'];
         $product->product_name = $data['product_name'];
         $product->product_description = $data['product_description'];
         $product->price = $data['price'];
         $product->save();
        
           return back();
         };
  
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
