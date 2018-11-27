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
                                                <h2>Add Ingredient</h2>

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



  <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('/backend/addInventory') }}" name="addInventory" id="addInventory" novalidate="novalidate"> {{ csrf_field() }}

      <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="cust-con">
             

              <div class="control-group ">
                <label class="control-label">Ingredient Name</label>
                <div class="controls">
                  <input type="text" name="ing_name" id="ing_name" required
                       value="{{ old('product_name') }}">>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="text" name="quantity" id="quantity"><span> 
                    <select name="units" id="units" class="control-group">
                        <placeholder> Select One Value Only</placeholder>
                        <option value="0">mg</option>
                        <option value="1">g</option>
                        <option value="2">kg</option>
                        <option value="3">ml</option>
                        <option value="4">l</option>
                    </select> </span>
                </div>
              </div>
              

             



              <div class="form-actions">
                <input type="submit" value="Add Inventory" class="btn btn-success">
              </div>



               @include('errors')

            </form>

        </div>
    </div>

@include ('backend.backfooter')















