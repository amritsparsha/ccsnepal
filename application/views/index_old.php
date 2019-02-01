<?php
if(!empty($popup)){
    $image = $popup['popup_image'];
?>

<div id="example2" style="display:none; height:100%; ">
<a href= "<?php echo $popup['link']; ?>">
        <img src="uploads/popup/<?php echo $image; ?>" />
        </a>
    </div>
<?php
}
?>

<!-- Video -->
<section id="video" class="pattern-black relative">

<!-- Video Button -->
<div class="video-button t-center scroll">

<div class="tab-holder">
<ul class="nav nav-tabs">



<!--    <li class="active"><a href="#sectionB" data-toggle="tab" aria-expanded="true"><i class="fa fa-bed"></i>-->
<!--            Hotels</a></li>-->



    <li class="active"><a href="#dropdown1" data-toggle="tab" aria-expanded="false"><img src="themes/images/mobile-ico/tour-ico.png" />
            Tours </a></li>

    <li class=""><a href="#dropdown2" data-toggle="tab" aria-expanded="false"><img src="themes/images/mobile-ico/trek-ico.png" />
            Treks </a></li>
<!--    <li class=""><a href="--><?php //echo site_url('hotel');?><!--"><img src="themes/images/mobile-ico/hotel-ico.png" />-->
<!--            Hotel Booking </a></li>-->


</ul>

<div class="tab-content">



<div class="tab-pane fade active in" id="dropdown1">
    <form method="post" name = "form-1" action="<?php echo site_url('packages/search');?>" id="form-1">
    <div class="row form-row">
        <div class="col-md-5">

            <div class="label">Destination</div>

            <div class="input-group full-width">
                <!-- <span id="basic-addon1" class="input-group-addon"><i class="fa fa-map-marker"></i> </span> -->
                <input type="text" id="destination" name="destination" autocomplete="off" name="auto_name" aria-describedby="basic-addon1" placeholder="Destination" class="form-control" data-validation="alphanumeric" data-validation-allowing="-+,/& " data-validation-error-msg="Incorrect search value.">
                <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu" id="Dropdown">
                </ul>
            </div>

        </div>
        <div class="col-md-4">

            <div class="label">Trip Type</div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i> </span>
               <select name="trip_type" class="form-control">
                   <?php
                   $accommodations =  $this->crud_model->get_accommodation();
                   if(! empty($accommodations)) {
                   foreach ($accommodations as $accommodation)
                   {
                   ?>
                   <option value="<?php echo $accommodation['accommodation_id'];?>"><?php echo $accommodation['name'];?></option >
                       <?php
                           }
                   }
                   ?>
               </select>
            </div>

        </div>



        <div class="col-md-3 col-sm-6 col-xs-12">

            <input type="hidden" name="term" value="tour">
            <button type="submit" class="btn btn-primary btn-wid-100 search-now-banner">
                Search Now</button>


        </div>



    </div>

        </form>

</div>



    <div class="tab-pane fade" id="dropdown2">
        <form method="post" name= "form-2" action="<?php echo site_url('packages/search');?>" id="form-2">

        <div class="row form-row">
            <div class="col-md-5">

                <div class="label">Region</div>

                <div class="input-group full-width">
                   <!--  <span id="basic-addon1" class="input-group-addon"><i class="fa fa-map-marker"></i> </span> -->
                    <input type="text" id="region" name="destination" autocomplete="off" name="auto_name" aria-describedby="basic-addon1" placeholder="Region" class="form-control" data-validation="alphanumeric" data-validation-allowing="-+,/& " data-validation-error-msg="Incorrect search value.">
                    <ul class="dropdown-menu txtregion" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu" id="Dropdown1">
                </ul>
                </div>

            </div>
            <div class="col-md-4">

                <div class="label">Trip Type</div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i> </span>
                    <select name="trip_type" class="form-control">
                        <?php
                        $accommodations =  $this->crud_model->get_accommodation();
                        if(! empty($accommodations)) {
                            foreach ($accommodations as $accommodation)
                            {
                                ?>
                                <option value="<?php echo $accommodation['accommodation_id'];?>"><?php echo $accommodation['name'];?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>



            <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="hidden" name="term" value="trek">
                <button type="submit" class="btn btn-primary btn-wid-100 search-now-banner">
                    Search Now</button>

            </div>



        </div>

            
        </form>

    </div>

</div>

</div>
</div>


<!--7SnmCUwOsts-->
<div id="bgndVideo" class="player"
     data-property="{videoURL:'31ODzc8JD-g',containment:'#video', showControls:false, autoPlay:true, loop:true, vol:50, mute:true, startAt:2,stopAt:55,quality:'hd720', optimizeDisplay:true}"></div>
<!--BsekcY04xvQ-->

<div class="base"><img src="themes/images/backgrounds/video-bg.png" style="width: 100%;"></div>
</section>

<!-- Video -->


<!-- End Video Section -->
<?php
if(!empty($inbound_categories))
{
?>
<section id="home">


    <div class="container">


        <div class="row">
            <div class="col-md-12"><h2 data-wow-duration="1s" class=" wow fadeIn animated"
                                       style="visibility: visible; animation-duration: 1s; animation-name: fadeIn;">
                    Incentive Holidays Packages</h2></div>
        </div>

        <div class="row">
            <?php

              // print_r($inbound_categories);
           // exit;

            foreach($inbound_categories as $ib)
            {



            ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="package_item wow fadeInRight animated animated"
                         data-wow-duration="1s" data-wow-delay="0.5s">
                        <?php
                        $path = 'uploads/package_category/';
                        if (file_exists($path.$ib['featured_img']) && $ib['featured_img'] !="")
                        {
                            ?>
                            <a href="<?php echo site_url('packages/index/'.$ib['category_url']);?>" class="category-content"
                               style="background-image: url(<?php echo $path.$ib['featured_img'];?>)">

                                <div class="category-wrapper">
                                    <h3><?php echo $ib['category_name'];?></h3>
<!--                                    --><?php
//                                    $minimum_detail =  $this->package->minimum_active_price($ib['category_id']);
//                                    ?>
<!--                                    <h6> Starting from --><?php
//                                        echo  (isset($minimum_detail['symbol']) && $minimum_detail['symbol'] !="")?
//                                            $minimum_detail['symbol']:"";?><!-- --><?php //echo (isset($minimum_detail['minimum_price']) && $minimum_detail['minimum_price'] !="")?
//                                        $minimum_detail['minimum_price']:"";?><!----><?php //echo  " "?><!-- </h6>-->


                                </div>
                            </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="<?php echo site_url('packages/index/'.$ib['category_url']);?>" class="category-content"
                           style="background-image: url(themes/images/package-image/package-category/package1.png)">

                            <div class="category-wrapper">
                                <h3><?php echo $ib['category_name'];?></h3>


                            </div>
                            </a>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <a href="<?php echo site_url('home/all/ih');?>" class="read-more pull-right">
                    View All >>
                </a>
            </div>
        </div>



    </div>
</section>
<?php
}
if(!empty($other_categories))
{

?>
<section id="otherpackage">


    <div class="container">


        <div class="row">
            <div class="col-md-12"><h2 data-wow-duration="1s" class=" wow fadeIn animated"
                                       style="visibility: visible; animation-duration: 1s; animation-name: fadeIn;">
                    Other Packages</h2></div>
        </div>

        <div class="row">
            <?php

            foreach($other_categories as $oth)
            {


                ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="package_item wow fadeInRight animated animated"
                         data-wow-duration="1s" data-wow-delay="0.5s">
                        <?php
                        $path = 'uploads/package_category/';
                        if (file_exists($path.$oth['featured_img']) && $oth['featured_img'] !="")
                        {
                            ?>
                            <a href="<?php echo site_url('packages/index/'.$oth['category_url']);?>" class="category-content"
                               style="background-image: url(<?php echo $path.$oth['featured_img'];?>)">

                                <div class="category-wrapper">
                                    <h3><?php echo $oth['category_name'];?></h3>

                                </div>
                            </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="<?php echo site_url('packages/index/'.$oth['category_url']);?>" class="category-content"
                           style="background-image: url(themes/images/package-image/package-category/india.png)">

                            <div class="category-wrapper">
                                <h3><?php echo $oth['category_name'];?></h3>
                              
                            </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            <?php
            }
            ?>




        </div>

        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <a href="<?php echo site_url('home/all/oth');?>" class="read-more pull-right">
                    View All >>
                </a>
            </div>
        </div>
    </div>
</section>
<?php
}
?>

<?php
if(!empty($special_packages))
{
?>


<section class="about-content backgroundwhite-color">
<div class="specialpackages">


<div class="col-md-12  text-center about_container">
    <h2>Special Packages</h2>
</div>


<div class=" wow fadeInRight animated">


<div class="package-wrapper">


<div class="row">
    <?php
    foreach($special_packages as $sp)
    {
    ?>
<div class="col-md-3 col-sm-6 col-xs-12 no-padding">
    <a href="<?php echo site_url('packages/detail/'.'special/'.$sp['package_url']);?>">


    <div data-wow-delay="0.5s" data-wow-duration="1s"
         class="package_item wow fadeInRight animated">
        <div class="wrapper  package_image">
            <?php
            $path = 'uploads/package/'.$sp['package_id'].'/';
            if(file_exists($path.$sp['featuredimg']) && $sp['featuredimg'] !="")
            {
            ?>
            <img alt="incentive holiday"
                 src="<?php echo $path.$sp['featuredimg'];?>" class="special_pkg_img">
            <?php
            }
            else{
                ?>
                <img alt="incentive holiday"
                     src="themes/images/package-image/specialpackage/specialp1.png">
           <?php
            }
            ?>

            <div class=" pricetag ">
                <div class="price text-white"><span><?php echo $sp['code'];?></span><?php echo $sp['pprice'];?></div>
            </div>
        </div>
        <div class="package_details">
            <div class="col-md-12 col-xs-12">
                <h3><?php echo $sp['package_name'];?></h3>

            </div>

            <div class="col-md-6 col-xs-6">
                <h6 class="days"><?php echo $sp['package_duration'];?></h6>

            </div>
            <div class="col-md-6 col-xs-6">
                <div class="rating-box"> <?php
                    $total= $sp['rating'];
                    $remaining = 5 - $total;
                    for($i=0; $i<$total; $i++)
                    {
                        echo '<i class="fa fa-star"></i>';
                    }
                    for($j=0; $j<$remaining; $j++)
                    {

                        echo '<i class="fa fa-star-o"></i>';
                    }
                    ?>
                </div>


            </div>

            <div class="col-md-12 col-xs-12">


                <ul class="booking_buttons">
                    <li><a href="<?php echo site_url('packages/detail/'.'special/'.$sp['package_url']);?>" class="view-detail hovereffect" >View Details</a></li>
                    <li><a href="<?php echo site_url('packages/detail/'.'special/'.$sp['package_url']);?>" class="book_now hovereffect">Book Now</a></li>

                </ul>


            </div>

        </div>
    </div>
    </a>


</div>
    <?php
    }
    ?>



</div>


</div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <a href="<?php echo site_url('packages/special');?>" class="read-more pull-right">
            View All >>
        </a>
    </div>
</div>
</div>


</section>
<?php
}
?>


<section class="backgroundwhite-color">

<div class="container">


<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
    <div>
        <h3>Forex</h3>

        <div class="forex-table">

            <div class="row">
                <div class="col-sm-12">
                    <table width="100%" cellspacing="0"
                           class="table table-striped table-bordered dataTable" id="example" role="grid"
                           aria-describedby="example_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                colspan="1" style="width: 130px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Currency
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                colspan="1" style="width: 222px;"
                                aria-label="Position: activate to sort column ascending">Unit
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                colspan="1" style="width: 96px;"
                                aria-label="Office: activate to sort column ascending">Buying
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                colspan="1" style="width: 41px;"
                                aria-label="Age: activate to sort column ascending">Selling
                            </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th colspan="2"> As per [ <?php echo date_convert(date('Y-m-d')) ;?> ]</th>
                            <th colspan="2"><a href="<?php echo site_url('forex/'.date('Y-m-d'));?>" class="pull-right"> View All</a></th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <?php
                        if(!empty($forex_detail))
                        {
                        foreach($forex_detail as $forex)
                        {
                        ?>
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo $forex['currency']."(". $forex['currency_code'].")";?></td>
                            <td><?php echo $forex['unit'];?></td>
                            <td><?php echo $forex['buying_rate'];?></td>
                            <td><?php echo $forex['selling_rate'];?></td>

                        </tr>
                        <?php
                        }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>
</div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div>
            <h3>Traveller's Review</h3>

            <?php

            $latest_reviews =  $this->package->get_home_package_review(0,3);


            if(! empty($latest_reviews)) {
                ?>

                <div id="carousel" class="traveler-review">


                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel"
                         data-interval="3000">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            $i=0;
                            foreach($latest_reviews as $rows)
                            {
                                $actives =  (isset($i) && $i=="1") ? "active":"";
                                ?>
                                <li data-target="#fade-quote-carousel" data-slide-to="<?php echo $i;?>" class="<?php echo $actives;?>"></li>
                                <?php
                                $i++;
                            }
                            ?>
                            <!--                    <li data-target="#fade-quote-carousel" data-slide-to="1"></li>-->
                            <!--                     <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>-->
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php
                            // print_r($latest_reviews);
                            // exit;
                            //                    $j=0;
                            //                  foreach($latest_reviews as $reviews)
                            //                    {
                            //                   $active =  (isset($j) && $j=="1") ? "active":"";
                            //

                            ?>
                            <?php
                            $j=0;
                            foreach($latest_reviews as $rows)
                            {
                                $active =  (isset($j) && $j=="1") ? "active":"";
                                ?>

                                <div class="item <?php echo $active;?>">

                                    <div class="testimonials-blog">

                                        <?php
                                        $path = 'uploads/package/'.$rows['package_id'].'/';
                                        if (file_exists($path.$rows['featuredimg']) && $rows['featuredimg'] !="")
                                        {
                                            ?>
                                            <img src="<?php echo $path.$rows['featuredimg'];?>" class="img-responsive" >
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <img src="themes/images/travelreview/review1.jpg" class="img-responsive">
                                            <?php
                                        }
                                        ?>



                                        <h4><a href="<?php echo site_url('review/detail/'.$rows['review_url']);?>"><?php echo $rows['package_name'] ;?></a></h4>


                            <span class="travel-date">

<?php echo date_convert($rows['created']) ;?>  | <?php echo $rows['review_by'];?>
                            </span>

                                       <?php echo substr($rows['review_text'], 0,100);?>...


                                    </div>

                                </div>
                                <?php
                                $j++;
                            }
                            ?>


                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <a href="<?php echo site_url('review/all');?>" class="read-more pull-right">
                                        View All >>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <?php
            }
            ?>


        </div>
    </div>
<div class="col-md-4 col-sm-6 col-xs-12">
    <div>
        <h3 style="display: block; float: left;">Video Gallery</h3>


                <div class="travelers-blog">

                    <iframe width="100%" height="325" src="https://www.youtube.com/embed/GDo3eIues6w" frameborder="0" allowfullscreen></iframe>

                </div>



    </div>
</div>


</div>


</div>
</section>
<section class="advwrapper white-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div>
                    <h3>Services We Offer</h3>
                    <ul class="serviese-ul">
                        <?php
                        if(!empty($services_offers))
                        {
                            foreach ($services_offers as $service)
                            {
                                ?>
                                <li>
                                  <a href="<?php echo  site_url('service/'.$service['content_url']);?>"><?php echo  $service['content_page_title'];?></a>
                                </li>
                          <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div>
                    <h3>Adventure Sports</h3>

                    <div class="adventuresport">
                        <ul>
                            <?php
                          
                            if(! empty($adventures))
                            {


                            $path = 'uploads/activity/';

                                foreach($adventures as $adventure)
                                {
                            ?>
                            <li>
                                    <?php
                                    if ($adventure['featured_img'] !="")
                                    {
                                        ?>
                                <a href="<?php echo site_url('adventure/detail/'.$adventure['activity_url']);?>"><img src="<?php echo $path.$adventure['featured_img'];?>" class="activity_front">
                                    <span>
                                      <?php echo $adventure['activity_name'];?>
                                    </span>
                                </a>
                                        <?php
                                    }
                                    else
                                    {

                                        ?>
                                        <a href="<?php echo site_url('active/detail/'.$adventure['activity_url']);?>"><img src="themes/images/advsports/adventure1.png">
                                    <span>
                                        <?php echo $adventure['activity_name'];?>
                                    </span>
                                        </a>
                                        <?php
                                    }
                                        ?>
                            </li>
                            <?php
                                }
                            }

                            ?>

                        </ul>


                    </div>


                </div>
                <?php
                if(! empty($adventures))
                {
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <a href="<?php echo site_url('adventure/index');?>" class="read-more pull-right ad_view">
                            View All >>
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>


        </div>


    </div>


</section>




<section class="advwrapper backgroundwhite-color">


<div class="container">


<div class="row">
<div class="col-md-7 col-sm-7 col-xs-12">
    <div>
        <h3>Fixed Departure</h3>

        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs fixeddeparture" role="tablist">
                <?php
                if(! empty($tour_fixed_departure)) {
                    ?>
                    <li role="presentation" class="active"><a href="#tour" aria-controls="home" role="tab"
                                                              data-toggle="tab">Tour</a></li>
                    <?php
                }
                if(! empty($trek_fixed_departure)) {
                    ?>
                    <li role="presentation"><a href="#trek" aria-controls="profile" role="tab"
                                               data-toggle="tab">Trek</a></li>
                    <?php
                }
                ?>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                if(! empty($tour_fixed_departure)) {
                    ?>
                    <div role="tabpanel" class="tab-pane active" id="tour">
                        <table width="100%" cellspacing="0"
                               class="table table-striped table-bordered dataTable" id="example12" role="grid"
                               aria-describedby="example_info" style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 230px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Package Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 90px;"
                                    aria-label="Position: activate to sort column ascending">Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 83px;"
                                    aria-label="Office: activate to sort column ascending">Available
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 41px;"
                                    aria-label="Age: activate to sort column ascending">Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 120px;"
                                    aria-label="Age: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th colspan="5"><a href="<?php echo site_url('packages/fixed_departures/tour');?>" class="pull-right"> View All</a></th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            foreach ($tour_fixed_departure as $tour_fixed ) {
                                ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $tour_fixed['package_name'];?></td>
                                    <td><?php echo $tour_fixed['price']." ". $tour_fixed['code'];?></td>
                                    <td><?php echo $tour_fixed['available_no'];?></td>
                                    <td><?php echo  date_convert($tour_fixed['departure_date']);?></td>
                                    <td>
                                        <a href="<?php echo site_url('packages/fixed/'.$tour_fixed['package_url'].'/'.$tour_fixed['departure_id']);?>" class="booking"> Book Now</a>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                    <?php

                }
                if(! empty($trek_fixed_departure)) {
                    ?>

                    <div role="tabpanel" class="tab-pane" id="trek">
                        <table width="100%" cellspacing="0"
                               class="table table-striped table-bordered dataTable" id="example12" role="grid"
                               aria-describedby="example_info" style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 230px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Package Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 90px;"
                                    aria-label="Position: activate to sort column ascending">Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 83px;"
                                    aria-label="Office: activate to sort column ascending">Available
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 41px;"
                                    aria-label="Age: activate to sort column ascending">Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 120px;"
                                    aria-label="Age: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th colspan="5"><a href="<?php echo site_url('packages/fixed_departures/trek');?>" class="pull-right"> View All</a></th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            foreach ($trek_fixed_departure as $trek_fixed ) {
                                ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $trek_fixed['package_name'];?></td>
                                    <td><?php echo $trek_fixed['price']." ". $trek_fixed['code'];?></td>
                                    <td><?php echo $trek_fixed['available_no'];?></td>
                                    <td><?php echo  date_convert($trek_fixed['departure_date']);?></td>
                                    <td>
                                        <a href="<?php echo site_url('packages/fixed/'.$trek_fixed['package_url'].'/'.$trek_fixed['departure_id']);?>" class="booking"> Book Now</a>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>



                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>


    </div>
</div>



<div class="col-md-5 col-sm-5 col-xs-12">
    <div>
        <h3>Outbound Holidays</h3>
        <?php
        if(! empty($outbound_categories))
        {
            ?>
        <div class="row">
           <?php

                $path = 'uploads/package_category/';
                foreach($outbound_categories as $ob)
                {
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div data-wow-delay="0.5s" data-wow-duration="1s" class="package_item wow fadeInRight animated animated animated" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInRight;">

                    <?php

                    if (file_exists($path.$ob['featured_img']) && $ob['featured_img'] !="")
                    {
                        ?>
                        <a href="<?php echo site_url('packages/index/'.$ob['category_url']);?>" class="category-content"
                           style="background-image: url(<?php echo $path.$ob['featured_img'];?>)">

                            <div class="ohcategory-wrapper">
                                <h3><?php echo $ob['category_name'];?></h3>

                            </div>
                        </a>
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="<?php echo site_url('packages/index/'.$ob['category_url']);?>" class="category-content"
                           style="background-image: url(themes/images/package-image/package-category/package1.png)">

                            <div class="category-wrapper">
                                <h3><?php echo $ob['category_name'];?></h3>

                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <a href="<?php echo site_url('home/all/ob');?>" class="read-more pull-right outboundreadmore">
                    View All >>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>
</div>
</section>
<section class="about-footer">
    <div class="container">
        <div class="col-md-10 col-md-offset-1 about-content-inner txt-white">
            <h2 class="txt-white">About Incentive Holidays</h2>
            <?php
            $about_detail = $this->content->get_about_front_detail();
            if(! empty($about_detail))
            {
                echo substr($about_detail['content_body'],0, 500);
               ?>..
   <a href="<?php echo site_url('content/'.$about_detail['content_url']); ?>"> Read More >></a>
            <?php
}
            ?>
            <h2 class="txt-white">Incentive Holidays On Mobile</h2>
            <ul class="about-ul">
                <li>
                    <a target="_blank" href="http://gonepalholiday.com/">
                        <img src="themes/images/mobile-ico/gonepal.png" class="img-responsive">
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=shirantech.gonepal.app">
                        <img src="themes/images/mobile-ico/android.png" class="img-responsive">
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://itunes.apple.com/us/app/gonepal-holiday/id965142155?ls=1&amp;mt=8">
                        <img src="themes/images/mobile-ico/apple.png" class="img-responsive">
                    </a>
                </li>
            </ul>
        </div>
    </div>


</section>
<section id="subscribe" class="subscribe-section section section-inverse-color">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6"><h3 class="wow fadeIn" data-wow-duration="1s">Sign up for our latest email
                        news & offers.</h3></div>
                <div class="col-md-6">
                    <?php
                    if ($this->session->flashdata('success') != "") {
                        ?>
                        <div class="alert alert-success alert_box">
                            <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>.
                        </div>
                        <?php
                    }
                    ?>
                    <?php if ($this->session->flashdata('error') != "") {

                        ?>
                        <div class="alert alert-danger alert_box">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                        </div>
                        <?php
                    }
                    ?>
                    <form method="post" action="<?php echo site_url('home/subscribe');?>">

                        <div class="form-group subscribe-form-input">
                            <input type="text" name="email" id="subscribe-form-email" required="required"
                                   class="subscribe-form-email form-control form-control-lg"
                                   placeholder="Enter your email address" autocomplete="off"/>
                            <button type="submit" class="subscribe-form-submit btn">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <?php $pop_up =  $popup;?>

    </div>
</section>

<script>
$(document).ready(function () {
    $("#destination").keyup(function () {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>index.php/home/Getdestination',
            data: {
                keyword: $("#destination").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    
                    $('#Dropdown').empty();
                    $('#destination').attr("data-toggle", "dropdown");
                    $('#Dropdown').dropdown('toggle');
                }
                else if (data.length == 0) {
                   
                    $('#destination').attr("data-toggle", "");
                }

           
               $.each(data, function(index, element) {
                     $('#Dropdown').append('<li role="presentation" id="element.destination" value="element.auto_id"><a href="#">' + element.destination + '</a></li>');

                });              
            }
        });
    });
    $('ul.txtcountry').on('click', 'li', 'a', function() {
        $('#destination').val($(this).text());
     
    });

});
</script>

<script>
$(document).ready(function () {
    $("#region").keyup(function () {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>index.php/home/Getregion',
            data: {
                keyword: $("#region").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    
                    $('#Dropdown1').empty();
                    $('#region').attr("data-toggle", "dropdown");
                    $('#Dropdown1').dropdown('toggle');
                }
                else if (data.length == 0) {
                   
                    $('#region').attr("data-toggle", "");
                }

           
               $.each(data, function(index, element) {
                     $('#Dropdown1').append('<li role="presentation" id="element.region_name" value="element.auto_id" ><a href="#">' + element.region_name + '</a></li>');

                });              
            }
        });
    });
    $('ul.txtregion').on('click', 'li', 'a', function() {
        $('#region').val($(this).text());
     
    });

});
</script>
<script type="text/javascript">
    '<?php if(!empty($pop_up)){?>';
        $(document).ready(function() {
            $.fancybox("#example2");
            '<?php } ?>';
        });
    </script>

<!--<script>-->
<!--    (function($, window) {-->
<!--        // Add a new validator-->
<!--        $.formUtils.addValidator({-->
<!--            name : 'even_number',-->
<!--            validatorFunction : function(value, $el, config, language, $form) {-->
<!--                return parseInt(value, 10) % 2 === 0;-->
<!--            }-->
<!---->
<!--        });-->
<!---->
<!--        window.applyValidation = function(validateOnBlur, forms, messagePosition, xtraModule) {-->
<!--            $.validate({-->
<!---->
<!---->
<!--                lang : 'en',-->
<!--                //sanitizeAll : 'trim', // only used on form C-->
<!--                // borderColorOnError : 'purple',-->
<!--                modules : 'security, sanitize, location, sweden, file,' +-->
<!--                ' uk, brazil' +( xtraModule ? ','+xtraModule:''),-->
<!--                onModulesLoaded: function() {-->
<!--                    $('#country-suggestions').suggestCountry();-->
<!---->
<!--                    $('#password').displayPasswordStrength();-->
<!--                },-->
<!--                onValidate : function($f) {-->
<!---->
<!--                    console.log('about to validate form '+$f.attr('id'));-->
<!---->
<!--                    var $callbackInput = $('#callback');-->
<!--                    if( $callbackInput.val() == 1 ) {-->
<!--                        return {-->
<!--                            element : $callbackInput,-->
<!--                            message : 'This validation was made in a callback'-->
<!--                        };-->
<!--                    }-->
<!--                }-->
<!---->
<!--            });-->
<!--        };-->
<!---->
<!--        $('#text-area').restrictLength($('#max-len'));-->
<!---->
<!--        window.applyValidation(true, '#form-1', 'top');-->
<!--        window.applyValidation(true, '#form-2', 'top');-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--    })(jQuery, window);-->
<!--</script>-->


<script>
    $.validate();
</script>
