<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span> <?php echo $sub_title;?> </span></h2>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti"> <?php echo $sub_title;?></a> 
					</li>
				</ul>
				
			</div>
		</div>
	</section>

<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2><span></span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					
				</div>
				<div>
				
				
				<?php
        if(! empty($records)) {

            $path =  'uploads/activity/'.'/';
            ?>

            <div class="row">
                <?php
                foreach ($records as $row) {
                    ?>
                    <!--====== PACKAGE ==========-->
					<div class="col-md-4 col-sm-6 col-xs-12 b_packages">
						
						<div class="v_place_img">
						<?php
                                        if($row['featured_img'] !="")
                                        {


                                            ?>
                                            <img src="<?php echo $path.$row['featured_img'];?>" alt="adeveture"
                                                 class="scale-height">
                                            <?php
                                        }
                                        else
                                        {
                                            echo '<img src="themes/images/packagecategory/package1.jpg" alt="product"
                                                 class="scale-height">';
                                        }
                                        ?>
						
						
						
						</div>
						<div class="b_pack rows">
							<div class="col-md-8 col-sm-8">
								<h4><a href="<?php echo site_url('adventure/detail/'.$row['activity_url']);?>"><?php echo $row['activity_name'];?></a></h4> </div>
							<div class="col-md-4 col-sm-4 pack_icon">
								<ul>
									<li>
										<a href="<?php echo site_url('adventure/detail/'.$row['activity_url']);?>"><img src="<?php echo base_url(); ?>templates/images/clock.png" alt="Date" title="Tour Timing" /> </a>
									</li>
									<li>
										<a href="<?php echo site_url('adventure/detail/'.$row['activity_url']);?>"><img src="<?php echo base_url(); ?>templates/images/info.png" alt="Details" title="View more details" /> </a>
									</li>
									<li>
										<a href="<?php echo site_url('adventure/detail/'.$row['activity_url']);?>"><img src="<?php echo base_url(); ?>templates/images/price.png" alt="Price" title="Price" /> </a>
									</li>
									<li>
										<a href="<?php echo site_url('adventure/detail/'.$row['activity_url']);?>"><img src="<?php echo base_url(); ?>templates/images/map.png" alt="Location" title="Location" /> </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!--====== PACKAGE ==========-->
                    
                    
                    
                    <?php
                }
                ?>

            </div>
            <?php
        }
        else
        {
            ?>
            <div class="row">
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1>Sorry !!!</h1>

                    <p>No Records Founds.</p>

                    <img src="themes/images/error.png">
                    <a href="#" class="btn btn-primary" >Back To Home</a>




                </div>

            </div>
            <?php
        }
        ?>
					
					
					
				</div>
			</div>
		</div>
	</section>




<style>
    .pagination .active {
        background-color:#2E608A;
        color:#FFF;
    }

</style>