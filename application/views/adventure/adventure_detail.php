<style>
	.tab-paneol { margin-left: 20%; }
</style>

<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span> <?php echo $detail['activity_name'];?> </span></h2>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti"> <?php echo $detail['activity_name'];?></a> 
					</li>
				</ul>
				
			</div>
		</div>
	</section>


<section class="product-details" style="margin-top: 2%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $path = 'uploads/activity/';
                if($detail['banner_img']) {
                    ?>
                    <img src="<?php echo $path.$detail['banner_img'];?>" alt="Adventure" class="img-responsive">
                    <?php
                }
                ?>
            </div>
            




        <div class="row">

            <div class="col-md-8">


                <h3>
                    <?php echo $detail['activity_name'];?></h3>
               <?php echo $detail['description'];?>

            </div>




        </div>


    </div>
</section>


    <div class="container">

        <div class="package-details" >

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php
                if($detail['tab'] !="") {
                    ?>
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                              data-toggle="tab">Information</a></li>
                    <?php
                }
                if(!empty($packages)) {
                    ?>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Related
                            Packages</a></li>
                    <?php

                }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                if($detail['tab'] !="") {
                    ?>
                    <div role="tabpanel" class="tab-pane active" id="home">
                      <?php echo $detail['tab'];?>
                    </div>
                    <?php
                }
                if(!empty($packages)) {
                    ?>


                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="related-listing">
                            <?php
                            foreach ($packages as $row) {

                                ?>



                                <div class="col-md-4">
                                    <div class="listing-item">
                                        <div class="listing-item-background">
                                            <div class="listing-item-background-image">
                                                <?php
                                                if($row['featuredimg'] !="")
                                                {
                                                    $path =  'uploads/package/'.$row['package_id'].'/';

                                                    ?>
                                                    <img class="scale-height" alt="product" src="<?php echo $path.$row['featuredimg'];?>">
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo '<img src="themes/images/packagecategory/package1.jpg" alt="product"
                                                 class="scale-height">';
                                                }
                                                ?>
                                            </div>

                                            <div class=" pricetag ">
                                                <div class="price text-white"> <?php echo $row['code'] . " " . $row['pprice'];?></div>
                                            </div>

                                        </div>
                                        <div class="product-list">

                                            <h3><?php echo $row['package_name'];?></h3>
                                            <div class="button">
                                            </div>
                                            <div class="col-md-4 rating-box">
                                                <?php
                                                $total= $row['rating'];
                                                $remaining = 5 - $total;
                                                for($i=0; $i<$total; $i++)
                                                {
                                                    echo '<i class="fa fa-star"></i>';
                                                }
                                                for($j=0; $j<$remaining; $j++)
                                                {

                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                                ?>      </div>
                                            <div class="col-md-8 bookingbuttons no-padding">
                               <span class="lft">
                                   <a href="<?php echo site_url('packages/details/'.$row['package_url']);?>">View Details</a>
                               </span>
                                <span class="rt">
                                   <a href="<?php echo site_url('packages/details/'.$row['package_url']);?>">Book Now</a>
                               </span>
                                            </div>

                                        </div>

                                    </div>


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

        </div>



    </div>

    </section>