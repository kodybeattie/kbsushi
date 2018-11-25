<?php
$subtotal = 0;
$tax = 0.13;
$total = 0;
?>
@include ('layouts.nav')

<link rel="stylesheet" href="css/product.css">


      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">


 <div class="container">

   <div class="table">

     <div class="layout-inline row th">
       <div class="col col-pro">Product</div>
       <div class="col col-price align-center ">Price</div>
       <div class="col col-qty align-center">QTY</div>

     </div>
     <?php
       $products = Session::get('cart')[0];
     ?>
     
   <form action="/checkout" method="post">
       {{ csrf_field() }}
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
        <?php $subtotal +=  $product['price'] * $product['quantity']; ?>
       @endforeach
       <?php $total = $subtotal + ($subtotal * $tax); ?>
       <div class="layout-inline row row-bg2">
         <div class="col col-qty layout-inline">
           <p> Subtotal: ${{ $subtotal }} </p>
         </div>
       </div>

       <div class="layout-inline row row-bg2">
         <div class="col col-qty layout-inline">
           <p> Tax Rate: {{ ($tax * 100) }}% </p>
         </div>
       </div>

       <div class="layout-inline row row-bg2">
         <div class="col col-qty layout-inline">
           <p> Total: ${{ $total }} </p>
         </div>
       </div>

     <div class="layout-inline row row-bg2">
       <input type="submit" class="btn btn-update" value="Submit Order">

     </div>
</form>
</div>
</div>
@include ('layouts.foot')
