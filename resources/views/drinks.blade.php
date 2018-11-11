
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

      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
          <p>Coke</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>$3.95</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" value="0" />
          <a href="#" class="qty qty-plus">+</a>
        </div>

      </div>


    <a href="#" class="btn btn-update">Update cart</a>

</div>
</div>
@include ('layouts.foot')
