

@include ('layouts.nav')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif 

<section class="welcome_area bg-img background-overlay" style="background-image: url(images/maki.jpg);">
        <div class="container h-10">
            <div class="row h-50 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6></h6>
                        <h2 style="color:#FF4500;">Kiyoshi Bai Sushi</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/suchi.jpg);">
                        <div class="catagory-content">
                            <a href="/sushi">Sushi</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/soup.jpeg);">
                        <div class="catagory-content">
                            <a href="/sushi">Soups & Appetizers</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/drinks.jpg);">
                        <div class="catagory-content">
                            <a href="/drinks">Drinks</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <!-- <h2>Today's Specials</h2> -->
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- ##### New Arrivals Area End ##### -->


    <!-- ##### Footer Area Start ##### -->
    @include ('layouts.foot')
    <!-- ##### Footer Area End ##### -->




