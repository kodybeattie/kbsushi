<!doctype html>
<html class="no-js" lang="en">
<?php
use App\User;
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
											<div >
                                            <i class="fas fa-tasks fa-3x fa-border" style="background:MistyRose"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Orders</h2>
												
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



   <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">
                                            <table>
                                                <tr>
                                                  
                                                    <th>Order By</th>
                                                 
                                                    <th>Order Time</th>
                                                    <th>Number</th>
                                                    <th>Action</th>
                                                </tr>

                                                
                                                <?php
                                                $cust= null;
                                                   for ($i = 0; $i <= count($users)-1; $i++)
                                               
                                                   { ?>   <?php //dd(count($users));
                                                       if (!isset($cust))
                                                       {
                                                           $cust = $users[$i]->first_name;
                                                           ?><tr> <td>
                                                           <h3> {{ $cust}} </h3>  <ol>
                                                           <?php 
                                                            
                                                            
                                                            for($b = 0; $b<=count($products)-1;$b++)
                                                            {
                                                                if($cust == $users[$b]->first_name)
                                                                { ?> <li>
                                                                    {{ $products[$b]->product_name}}
                                                                    </li> <span> x {{$users[$b]->quantity}} </span> 
                                                                    
                                                                <?php
                                                                }
                                                            }?> </ol>
                                                            </td>
                                                            <td>{{ Carbon::parse($users[$i]->datetime_ordered)->format('g: i A')}}</td>
                                                          
                                                            <td>{{User::phoneNumber($users[$i]->phone_number)}}</td>
                                                            <td>                                                        
                                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                             </td>
                                                            </tr> <?php
                                                                

                                                       }
                                                       elseif ($cust !=$users[$i]->first_name )
                                                        //else    
                                                       {
                                                           $cust= $users[$i]->first_name;?> 
                                                           <tr> <td>
                                                           <h3> {{ $cust}} </h3>  <ol>
                                                           <?php 
                                                            
                                                            
                                                            for($b = 0; $b<=count($products)-1;$b++)
                                                            {
                                                                if($cust == $users[$b]->first_name)
                                                                { ?> <li>
                                                                    {{ $products[$b]->product_name}}
                                                                    </li> <span> x {{$users[$b]->quantity}} </span> 
                                                                    
                                                                <?php
                                                                }
                                                            }?> </ol>
                                                            </td>
                                                            <td>{{ Carbon::parse($users[$i]->datetime_ordered)->format('g:i A')}}</td>
                                                            <td>{{User::phoneNumber($users[$i]->phone_number)}}</td>
                                                            <td>                                                        
                                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                             </td>
                                                            </tr> <?php
                                                       } 
                                                      
                                                      
                                                         
                                                       ?>  <?php
                                                   }
                                              ?>
                
                                                    
                                              
                                                <tr>

                                                    <td>
                                                        <h3>Jacob</h3>
                                                        <ol><li> Maguro Nigiri x 3
                                                         </li>
                                                         <li> Coke x 2
                                                         </li>
                                                           <li> Sprite x 1
                                                         </li>
                                                       
                                                      </ol>
                                                    </td>
                                              
                                                    <td>9:45PM</td>

                                                      <td>647-968-9399</td>
                                                    <td>
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>

                                                 <tr>
                                                 
                                                    <td>
                                                        <h3>Dion James</h3>
                                                        <ol><li> Hamachi x 1
                                                         </li>
                                                         <li> Coke x 1
                                                         </li>
                                                        
                                                       
                                                      </ol>
                                                    </td>
                                              
                                                    <td>9:00PM</td>

                                                      <td>416-592-9399</td>
                                                    <td>
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>                                               
                                               
                                             
                                            </table>
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