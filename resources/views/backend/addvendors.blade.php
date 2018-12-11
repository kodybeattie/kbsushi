<!doctype html>
<html class="no-js" lang="en">

@include('backend.backhead')

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
                                                <h2>Add A Vendor</h2>

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



  <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('/backend/addvendors') }}" name="addVendors" id="addVendors" novalidate="novalidate"> {{ csrf_field() }}

      <input type="hidden" name="_token" value="{{csrf_token()}}">




              <div class="control-group cust-con">
                <label class="control-label ">Vendor Name</label>
                <div class="controls">
                  <input type="text" name="vendor_name" id="vendor_name" required
                       
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Vendor Phone Number</label>
                <div class="controls">
                  <input type="text" name="vendor_phone" id="vendor_phone">
                </div>
              </div>


              <div class="form-actions ch-btn">
                <input type="submit" value="Add Vendor" class="btn btn-success">
              </div>



               @include('errors')

            </form>

            </div>
        </div>

@include ('backend.backfooter')
