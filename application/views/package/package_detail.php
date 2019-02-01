<?php
$settings = $this->site_settings_model->get_site_settings();
?>

<!--====== BANNER ==========-->
<section>
<?php
                                $path_banner = 'uploads/package/'.$detail['package_id'].'/';
                                ?>
    <div class="rows inner_banner inner_banner_4" style="background-image:url(<?php echo $path_banner.$detail['featuredimg']; ?>);">
        <div class="container">
            <h2><span><?php echo $detail['package_name'];?></span> </h2>
            <ul>
                <?php
                if($breadcrumb_label !="") {
                    ?>
                    <li><a href="<?php echo site_url('packages/related/'.$breadcrumb_link);?>"><?php echo $breadcrumb_label;?></a></li>
                    <?php
                }
                ?>

                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="<?php echo current_url(); ?>" class="bread-acti"><?php echo $detail['package_name'];?></a>
                </li>
            </ul>

        </div>
    </div>
</section>
<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
    <div class="rows banner_book" id="inner-page-title">
        <div class="container">






                    <?php if(validation_errors()) {


                        ?>
                        <div class="alert alert-danger alert_box">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                        class="fa fa-times"></i></a>
                            <?php echo validation_errors() ?>.
                        </div>
                        <?php
                    }
                    ?>
                    <form method="post" action="">
                        <div class="col-sm-4">
                          <p class="bookdetail" >
                 Price based on 2 PAX. Cost per person:
             </p>
                        </div>

                        <div class="col-md-6">
                            <div class="amrit-price">
                                <?php
                                $accommodation = $this->package->get_package_accommodation($detail['package_id']);
                                $i=1;
                                foreach($accommodation as $row) {
                                    $pprice = $this->package->get_package_price($detail['package_id'], $row['accommodation_id']);
                                    if(!empty($pprice)) {
                                        ?>
                                        <div class="col-sm-4">

                                            <label class="span-amrit">&nbsp;</label>
                                            <?php

                                            if ($i == "1") {
                                                $price_class = "budget-trip";
                                            } else if ($i == "2") {
                                                $price_class = "standard-trip";
                                            } else {
                                                $price_class = "deluxe-trip";
                                            }

                                            foreach ($pprice as $data) {

                                                //if($data['pprice'] !="0.00") {


                                                ?>
                                                <span
                                                        class="price-trip <?php echo $price_class; ?>">&nbsp;</span>
                                                <input type="hidden" value="<?php echo $data['currency_id']; ?>"
                                                       name="currency[<?php echo $row['accommodation_id']; ?>]]">
                                                <?php
                                                //}

                                            }
                                            ?>
                                            <input type="hidden" class="accommodation"
                                                   name="accommodation_id" value="<?php echo $row['accommodation_id']; ?>"
                                                   >






                                        </div>

                                        <?php
                                    }
                                    $i++;

                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2 amrit-submit-button">
                            <input type="hidden" name="departure_id" value="0">
                            <input type="hidden" name="package_type" value="Normal">
                            <input type="hidden" name="package_id" value="<?php echo $detail['package_id'];?>">
                            <button type="submit" class="btn btn-danger book_now-inner pull-right">
                                Book Now

                            </button>

                        </div>
                    </form>



        </div>
    </div>
</section>
<!--====== TOUR DETAILS ==========-->
<!--====== TOUR DETAILS ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space">
            <div class="col-md-9">

                <div class="tour_head1 hotel-book-room">

                      <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators carousel-indicators-1">
                            <?php

                            if(! empty($albums)) {
                                $i=0;
                                foreach ($albums as $row) {
                                    $active = ($i == 0) ? "active" : "";
                                    $ol_path  =  'uploads/album/'.$row['path_id'].'/';
                                    ?>
                                    <li data-target="#myCarousel1" data-slide-to="<?php echo $i; ?>">
                                        <img src="<?php echo $ol_path.$row['name']; ?>" alt="<?php echo $row['caption'];?>">
                                    </li>

                                    <?php
                                    $i++;
                                }
                            }
                            else
                            {
                                echo ' <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                            }
                            ?>


                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner carousel-inner1" role="listbox">
                            <?php
                            if(! empty($albums)) {


                                $j=0;
                                foreach ($albums as $rows) {
                                    $actives = ($j == 0) ? "active" : "";
                                    $path  =  'uploads/album/'.$rows['path_id'].'/';
                                    ?>
                                    <div class="item <?php echo $actives; ?>">
                                        <img src="<?php echo $path.$rows['name'];?>" alt="<?php echo $rows['caption'];?>" width="460" height="345">
                                    </div>

                                    <?php
                                    $j++;
                                }
                            }
                            else
                            {
                                ?>
                                <?php
                                $path = 'uploads/package/'.$detail['package_id'].'/';
                                ?>
                                <div class="item active">
                                    <img src="<?php echo $path.$detail['packageimg'];?>" alt="<?php echo $detail['package_name']; ?>" width="460" height="345">
                                </div>

                                <?php
                            }
                            ?>


                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
                        <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
                    </div>
                </div>
                <!--====== TOUR LOCATION ==========-->
                <div class="tour_head1 tout-map map-container">
                    <h3>Description</h3>
                    <?php echo $detail['description'];?>

                </div>
                <!--====== ABOUT THE TOUR ==========-->

                <!--====== DURATION ==========-->
                <div class="package-details" >

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        if($detail['tab1'] !="")
                        {
                            echo  ' <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">'.$detail['tab1'].'</a></li>';
                        }
                        if($detail['tab2'] !="")
                        {
                            echo ' <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">'.$detail['tab2'].'</a></li>';
                        }
                        if($detail['tab3'] !="")
                        {
                            echo ' <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">'.$detail['tab3'].'</a></li>';
                        }
                        if($detail['tab4'] !="")
                        {
                            echo '<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">'.$detail['tab4'].'</a></li>';
                        }
                        if($detail['tab5'] !="")
                        {
                            echo '<li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">'.$detail['tab5'].'</a></li>';
                        }
                        ?>




                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content tab-rp-tour">
                        <?php
                        if($detail['tab1'] !="")
                        {
                            ?>

                            <div role="tabpanel" class="tab-pane active" id="home">
                                <?php echo $detail['description1'];?>
                            </div>
                            <?php
                        }
                        if($detail['tab2'] !="")
                        {
                            ?>

                            <div role = "tabpanel" class="tab-pane" id = "profile">
                                <?php echo  $detail['description2'];?>
                            </div >
                            <?php
                        }

                        if($detail['tab3'] !="") {
                            ?>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <?php echo  $detail['description3'];?>
                            </div>
                            <?php
                        }
                        if($detail['tab4'] !="") {
                            ?>
                            <div role="tabpanel" class="tab-pane" id="settings">
                                <?php echo $detail['description4']; ?>
                            </div>
                            <?php

                        }
                        if($detail['tab5'] !="") {
                            ?>
                            <div role="tabpanel" class="tab-pane" id="meta">
                                <?php echo $detail['description5']; ?>
                            </div>
                            <?php

                        }
                        ?>
                    </div>

                </div>

            </div>
            <div class="col-md-3 tour_r">

                <!--====== TRIP INFORMATION ==========-->
                <div class="tour_right tour_incl tour-ri-com rp-com-trip">
                    <h3>Trip Information</h3>
                    <?php echo $detail['summary'];?>
                </div>




                <!--====== PACKAGE SHARE ==========-->
                <div class="tour_right head_right tour_social tour-ri-com text-center">
                    <h3>Share This Package</h3>
                    <hr />
                    <div class="addthis_inline_share_toolbox_jhgp"></div>
                    <div class="clearfix"></div>

                    <div class="rate-star ">
                        <div class="inner-rate">
                            <div class="rating-box"> <i class="fa fa-users"></i>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>                    </div>
                        </div>
                    </div>

                    <a href="<?php echo site_url('review/index/'.$detail['package_url']);?>" class="btn btn-success">write a review</a>

                    <hr />
                </div>
                <!--====== HELP PACKAGE ==========-->
                <div class="tour_right head_right tour_help tour-ri-com">
                    <h3>Help & Support</h3>
                    <div class="tour_help_1">
                        <h4 class="tour_help_1_call">Call Us Now</h4>
                        <h4><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $settings['contact_number']; ?></h4> </div>
                </div>
                <!--====== PUPULAR TOUR PACKAGES ==========-->

            </div>
        </div>
    </div>
</section>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5aac1830c7a08b55"></script>