
 @include ('layouts.nav')
 <?php
 $products = App\Product::getByCategory(1);
 $user_id = auth()->user()->user_id ;
 //$user = Auth::User()->user_id;
 //$currentUser = User::find($user);
 //<button type="button" class="qty qty-plus" id="Favourite" onclick="addToFavourites({{ $user['user_id'], $drink['product_id'] }})">+</button>
 ?>

 <link rel="stylesheet" href="css/product.css">


       <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">

 <form action="{{route('drinks')}}" method="post">
  <div class="container">

    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center ">
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>

      </div>

    @foreach ($products as $drink)
      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
          <p>{{ $drink['product_name'] }}</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>${{ $drink['price'] }}</p>
        </div>

        <div class="col col-qty layout-inline">
          <div>
            <button type="button" class="qty qty-minus" id="decrease" onclick="decreaseValue({{ $drink['product_id'] }})">-</button>
          </div>
            <input type="numeric" id="{{ $drink['product_id'] }}" value="0" readonly />
          <div>
            <button type="button" class="qty qty-plus" id="increase" onclick="increaseValue({{ $drink['product_id'] }})">+</button>
          </div>

          <div>        
            <button type="button" class="qty qty-plus" id="favourite" onclick="addToFavourites({{ $user_id, $drink['product_id'] }})"> FAVE </button>
          </div>

        </div>

      </div>
    @endforeach

    <a href="#" class="btn btn-update">Update cart</a>

</div>
</div>
</form>
@include ('layouts.foot')
