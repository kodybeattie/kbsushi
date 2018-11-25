
 @include ('layouts.nav')

 <?php
 use App\Product;
 use App\Http\Controllers;
 $products = Product::getByCategory(0);
 $user_id = auth()->user()->user_id ;
 ?>

 <link rel="stylesheet" href="css/product.css">


       <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">

  <form action="{{route('sushi')}}" method="post">
      {{ csrf_field() }}
  <div class="container">

    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center ">
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>

      </div>

    @foreach ($products as $sushi)
      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
          <p>{{ $sushi['product_name'] }}</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>${{ $sushi['price'] }}</p>
        </div>

        <div class="col col-qty layout-inline">
          <div>
            <button type="button" class="qty qty-minus" id="decrease" onclick="decreaseValue({{ $sushi['product_id'] }})">-</button>
          </div>
            <input type="numeric" name="quantities[]" id="{{ $sushi['product_id'] }}" value="0" readonly />
          <div>
            <button type="button" class="qty qty-plus" id="increase" onclick="increaseValue({{ $sushi['product_id'] }})">+</button>
          </div>
        </div>

        <div>        
            <button type="button" class="qty qty-plus" id="favourite" onclick="addToFavourites({{ $user_id, $sushi['product_id'] }})"> FAVE </button>
          </div>

      </div>
    @endforeach

    <input type="submit" class="btn btn-update" value="Update Cart">

    </div>
    </div>
  </form>
@include ('layouts.foot')
