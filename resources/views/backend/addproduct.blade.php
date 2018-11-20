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
                                                <h2>Add A Product</h2>
                                        
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



  <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('/backend/addproduct') }}" name="addProduct" id="addProduct" novalidate="novalidate"> {{ csrf_field() }}

      <input type="hidden" name="_token" value="{{csrf_token()}}">
                 

              <select name="category" id="category" class="control-group">
                  <placeholder> Select One Value Only</placeholder>
                  <option value="1">Sushi</option>
                  <option value="2">Drinks</option>
              </select>


     
          
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" required
                       value="{{ old('product_name') }}">>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>
           
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="product_description" id="product_description"></textarea>
                </div>
              </div>
        

             
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>


     
               @include('errors')

            </form>






   
            </div>
        </div>





















        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>