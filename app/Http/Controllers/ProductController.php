<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function show($id)
    {
    	$product = Product::find($id);
    	return view('product.show', compact('product'));
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
}
