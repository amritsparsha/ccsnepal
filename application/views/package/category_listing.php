<!--====== BANNER ==========-->
<section>
    <div class="rows inner_banner inner_banner_1">
        <div class="container">
            <h2><span><?php echo $sub_title;?> </span> </h2>
            <ul>
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="<?php echo current_url(); ?>" class="bread-acti"><?php echo $sub_title;?></a>
                </li>
            </ul>
            <p><?php echo (isset($description) && $description !="")? $description:"";?></p>
        </div>
    </div>
</section>
<!--====== PLACES ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
            <!-- TITLE & DESCRIPTION -->

            <div>


                <?php
                $path = 'uploads/package_category/';
                foreach ($categories as $row) {
                    ?>
                    <!--====== PACKAGE ==========-->
                    <div class="col-md-4 col-sm-6 col-xs-12 b_packages">
                        <div class="band-srart-from">
                            <?php
                            $minimum_detail =  $this->package->minimum_active_price($row['category_id']);

                            ?>
                            <?php
                            if(!empty($minimum_detail)) {
                                ?>

                                 <?php
                                echo  (isset($minimum_detail['symbol']) && $minimum_detail['symbol'] !="")?
                                    $minimum_detail['symbol']:"";?><?php echo (isset($minimum_detail['minimum_price']) && $minimum_detail['minimum_price'] !="")?
                                    $minimum_detail['minimum_price']:"" ." ";?>

                                <?php
                            }
                            ?>




                        </div>
                        <div class="v_place_img">
                            <a href="<?php echo site_url('packages/index/'. $row['category_url']);?>">
                            <img src="<?php echo $path.$row['featured_img'];?>" alt="<?php echo $row['category_name'];?>" title="<?php echo $row['category_name'];?>" /> 
                            </a>
                            </div>
                        <div class="b_pack rows">
                            <div class="col-md-8 col-sm-8">
                                <?php
                                $count =  $this->package->count_active_packages($row['category_id']);

                                ?>
                                <h4><a href="<?php echo site_url('packages/index/'. $row['category_url']);?>"><?php echo $row['category_name'];?><span class="v_pl_name">(<?php echo (isset($count) && $count !="")? $count:"";?>)</span></a></h4> </div>
                            <div class="col-md-4 col-sm-4 pack_icon">
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('packages/index/'. $row['category_url']);?>"><img src="<?php echo base_url(); ?>templates/images/clock.png" alt="Date" title="Tour Timing" /> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('packages/index/'. $row['category_url']);?>"><img src="<?php echo base_url(); ?>templates/images/info.png" alt="Details" title="View more details" /> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('packages/index/'. $row['category_url']);?>"><img src="<?php echo base_url(); ?>templates/images/price.png" alt="Price" title="Price" /> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('packages/index/'. $row['category_url']);?>"><img src="<?php echo base_url(); ?>templates/images/map.png" alt="Location" title="Location" /> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <?php
                }
                ?>





            </div>
        </div>
    </div>
</section>

