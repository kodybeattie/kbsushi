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

        <?php
          //Gets test (The array for favourites)
          $test = DB::table('products')
          ->join('favourites', 'products.product_id', '=', 'favourites.product_id')
          ->select('products.product_name', 'products.product_description', 'products.price')
          ->where('favourites.user_id', '=', Auth::id())
          ->get();


          ?>

      </div>


      <?php
          //Displays the lines from the array
          for($i = 0; $i<count($test); $i++){
            ?>
            <div class="layout-inline row row-bg2">
            <div class="col col-pro layout-inline " >
                <?php echo $test[$i]->product_name; ?>
                </div>
              <div class="col col-price col-numeric align-center">
                <?php echo $test[$i]->product_description; ?>
              </div>
              <div class="col col-price col-numeric align-center">
                <?php echo $test[$i]->price; ?>
              </div>

            </div>
            <?php
          }

          ?>

      </div>




      </div>



    </div>
