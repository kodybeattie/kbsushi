 @include ('layouts.nav')

 <link rel="stylesheet" href="css/product.css">


       <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">


  <div class="container">

    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center ">
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>

      </div>
      <?php
        $products = Session::get('cart')[0];
      ?>
        @foreach($products as $product)
        <div class="layout-inline row row-bg2">
          <div class="col col-pro layout-inline">
            <p> {{ $product['product_name'] }} </p>
          </div>

            <div class="col col-price col-numeric align-center ">
              <p> ${{ $product['price'] }} </p>
            </div>

            <div class="col col-qty layout-inline">
              <input type="numeric" value="{{ $product['quantity'] }}" readonly/>
            </div>
          </div>
        @endforeach
      <div class="layout-inline row row-bg2">
        <div class="col col-pro layout-inline">
          <a href="{{route('home')}}" class="btn btn-update">Continue Shopping</a>
        </div>

        <div class="col col-qty layout-inline">
          <a type="submit" href="{{route('checkout')}}" class="btn btn-update">Check out</a>
        </div>
      </div>

</div>
</div>
@include ('layouts.foot')
