
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
      @foreach(Session::get('cart') as $product_id => $details)
      <div class="layout-inline row row-bg2">
        @foreach($details as $key => $value)
        <div class="col col-pro layout-inline">
          <p>{{ dd($details) }}</p>
          <!--<p>{{ $value["product_name"] }}</p>-->
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>${{ $value["price"] }}</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" value="{{ $value["quantity"] }}" />
          <a href="#" class="qty qty-plus">+</a>
        </div>

      </div>
      @endforeach
      @endforeach

    <a href="#" class="btn btn-update">Check out</a>

</div>
</div>
@include ('layouts.foot')
