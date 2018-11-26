<!doctype html>
<html class="no-js" lang="en">
<?php
use \App\Vendor;
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
                                                <h2>Vendor List</h2>
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
                            <h4>Vendors</h4>
                            <div class="add-product">
                                <a href="/addvendors">Add Vendor</a>
                            </div>
                            <table>
                                <tr>

                                    <th>Vendor Name</th>

                                    <th>Phone Number</th>

                                      <th>Delete/Edit</th>



                          </tr>

           @foreach($vendors as $vendor)
                <tr class="product">
                <td>{{ $vendor->vendor_name }}</td>
                <td>{{ Vendor::phoneNumber($vendor->phone_number) }}</td>
               
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
