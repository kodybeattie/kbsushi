@include ('layouts.nav')
<?php
 $favourites = App\Favourite::getByUserId(auth()->user()->user_id);
 ?>

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <div class="limiter background-display">
        <div class="container-login100">
            <div class="wrap-login100">
            	This is where favourites will be listed depending on the users id. refer to how COMMENTS are listed.

            	<div class="card">
                
                 <div class ="card-block"> 
                    @foreach ($favourites as $fave)
                        <div class="layout-inline row row-bg2">
                <div class="col col-pro layout-inline">
                <p>{{ $fave['user_id'] }}</p>
                </div>

                <div class="col col-price col-numeric align-center ">
                <p>{{ $fave['product_id'] }}</p>
                </div>
                        </div>
                    @endforeach

                 </div>  
                 


                </div>
            	
            </div>
        </div>
    </div>
@include ('layouts.foot')