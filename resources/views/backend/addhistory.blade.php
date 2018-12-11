<!doctype html>
<html class="no-js" lang="en">

@include('backend.backhead')



    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">


        <div class="header-advance-area">






            <!-- Mobile Menu end-->
 <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
                                            <div >
                                            <i class="fas fa-plus fa-2x fa-border" style="background:MistyRose"></i>
                                            </div>
                                            <div class="breadcomb-ctn">
                                                <h2>Vendor Records</h2>

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



  <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('/backend/addhistory') }}" name="insertHistory" id="insertIngredient" novalidate="novalidate"> {{ csrf_field() }}

      <input type="hidden" name="_token" value="{{csrf_token()}}">
            
            
 
            <div class="cust-con">

               <label class="control-label">Vendor</label>
              <select name="vendor" id="vendor" class="control-group">
                <?php
                    for ($i = 0; $i <= count($vendor)-1; $i++)
                    {             
                ?>
                  <placeholder> Select One Value Only</placeholder>
               
                  <option value= {{ $vendor[$i]->vendor_id }}>{{$vendor[$i]->vendor_name }}</option>
                    <?php }?>
              </select>

            <label class="control-label">Ingredient</label>
              <select name="inventory" id="inventory" class="control-group">
                <?php
                    for ($i = 0; $i <= count($inventory)-1; $i++)
                    {             
                ?>
                  <placeholder> Select One Value Only</placeholder>
               
                  <option value= {{ $inventory[$i]->ing_id }}>{{$inventory[$i]->ing_name }}</option>
                    <?php }?>
              </select>

              <label class="control-label">Product</label>
              <select name="product" id="product" class="control-group">
                <?php
                    for ($i = 0; $i <= count($products)-1; $i++)
                    {             
                ?>
                  <placeholder> Select One Value Only</placeholder>
               
                  <option value= {{ $products[$i]->product_id }}>{{$products[$i]->product_name }}</option>
                    <?php }?>
              </select>

                            <div class="control-group">
                <label class="control-label">Vendor Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>

                            <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="text" name="ing_quantity" id="ing_quantity"><span> 
                    <select name="ing_units" id="ing_units" class="control-group">
                        <placeholder> Select One Value Only</placeholder>
                        <option value="0">tsp</option>
                        <option value="1">tbsp</option>
                        <option value="2">ml</option>
                        <option value="3">L</option>
                        <option value="4">lb</option>
                        <option value="5">g</option>
                        <option value="6">kg</option>
                        <option value="7">units</option>
                    </select> </span>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add" class="btn btn-success">
              </div>



               @include('errors')

            </form>

        </div>
    </div>

@include ('backend.backfooter')















