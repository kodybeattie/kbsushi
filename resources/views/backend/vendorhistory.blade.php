<!doctype html>
<html class="no-js" lang="en">
<?php
use \App\Vendor;
use Carbon\Carbon;

?>
@include('backend.backhead')

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">


        <div class="header-advance-area">

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
                                            <div>
                                            <i class="fas fa-list-alt fa-3x fa-border" style="background:MistyRose"></i>
                                            </div>
                                            <div class="breadcomb-ctn">
                                                <h2>Vendor Order List</h2>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Records</h4>
                            <div class="add-product">
                                <a href="/addhistory">Add Vendor History</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Vendor Name</th>
                                    <th>Ingredient</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Units</th>
                                    <th>Cost</th>
                                    <th>Date Ordered</th>

                                      <th>Delete</th>



                          </tr>

           @foreach($vendors as $vendor)
                <tr class="product">
                <td>{{ $vendor->order_id }}</td>
                <td>{{ $vendor->vendor_name }}</td>
                <td>{{ $vendor->ing_name }}</td>
                <td>{{ $vendor->product_name }}</td>
                <td>{{ $vendor->quantity }}</td>
                <?php 
                    if ($vendor->units == 0)
                    {?>
                       <td> tsp</td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 1)
                    {?>
                       <td> tbsp </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 2)
                    {?>
                       <td> ml </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 3)
                    {?>
                       <td> L </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 4)
                    {?>
                       <td> lb </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 5)
                    {?>
                       <td> g </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 6)
                    {?>
                       <td> kg </td> <?php
                    }
                ?>
                <?php
                    if ($vendor->units == 7)
                    {?>
                       <td> units </td> <?php
                    }
                ?>
                
                <td>${{ $vendor->cost }}</td>
                <td>{{ Carbon::parse($vendor->date_ordered)->format('Y/m/d')  }}</td>

               
                <td>
                    <form action="/viewvendors/{{ $vendor->vendor_id }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
             
      
          


          @endforeach



                            </table>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include ('backend.backfooter')
