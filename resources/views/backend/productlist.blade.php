<!doctype html>
<html class="no-js" lang="en">

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
                                                <h2>Product List</h2>
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
                            <h4>Products List</h4>
                            <div class="add-product">
                                <a href="/addproduct">Add Product</a>
                            </div>
                            <table>
                                <tr>

                                    <th>Product Title</th>

                                    <th>Price</th>
                                    <th>Catagory</th>

                                     <th>Product Description</th>
                                      <th>Delete</th>



                          </tr>

           @foreach($products as $product)
                <tr class="product">
                <td>{{ $product->product_name }}</td>

                <td>${{ $product->price }}</td>
                <?php 
                if ( $product->category == 0 )
                {
                    ?> <td> Food</td> <?php
                }
                elseif ($product->category ==1)
                {
                    ?><td> Drink</td> <?php
                }
                ?>

                

                <td>{{ $product->product_description }}</td>
                <td><a href = 'delete/{{ $product->product_id }}'><button type="button" class="btn btn-danger ">Delete</button></a></td>

                

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

