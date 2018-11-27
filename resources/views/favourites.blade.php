@include ('layouts.nav')
<?php
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Http\Controllers;
$favourites = App\Favourite::getByUserId(Auth::id());
$fproducts = Product::getByCategory(0);
$dproducts = Product::getByCategory(1);
?>

<link rel="stylesheet" href="css/product.css">


       <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">

       <div class="container">

    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center ">
          Description
        </div>
        <div class="col col-qty align-center">Price</div>

      </div>
      
      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
          <p></p>
          <?php
          //$test = DB::table('products')->where('product_id', '=', $fave['product_id']);
          $test = DB::table('products')
          ->join('favourites', 'products.product_id', '=', 'favourites.product_id')
          ->select('products.product_name', 'products.product_description', 'products.price')
          ->get();
          //dd($test);
          for($i = 0; $i<count($test); $i++){
            
            ?> <ol> <li> {{ $test[$i]->product_name}} </li> </ol> <?php 
          } ?>
          
          

        </div>

        <div class="col col-price col-numeric align-center ">
         
        </div>

      </div>
    

    <input type="submit" class="btn btn-update" value="Update Cart">

    </div>
    </div>
@include ('layouts.foot')
