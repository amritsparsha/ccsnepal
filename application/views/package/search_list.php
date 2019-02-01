<style>
 .hot-list-p3-2 {
  font-size: 14px !important;
  padding: 0px 0px !important; 
   } 
   .hot-page2-alp-ri-p2 h3 {font-size: 13px !important; }
</style>

<?php

$this->load->view('search_nav');

?>

<!--====== HOTELS LIST ==========-->
	<section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg">
		<div class="container">
			<div class="row inner_banner inner_banner_3 bg-none">
				<div class="hot-page2-alp-tit">
					<h1>Search Reasult</h1>
					<ul>
						<li><a href="#inner-page-title">Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#inner-page-title" class="bread-acti">Search Result</a> </li>
					</ul>
					
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					
					<!--RIGHT LISTINGS-->
					<div class="col-md-12 hot-page2-alp-con-right">
						<div class="hot-page2-alp-con-right-1">
							<!--LISTINGS-->
							<div class="row">
								<?php
        if(! empty($packages)) {

            ?>

            <div class="row">
                <?php
                foreach ($packages as $row) {
                    ?>
                    <!--LISTINGS START-->
                    <div class="col-sm-6">
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>">
											
											<div class="hot-page2-hli-1"> 
											 <?php
                                        if($row['featuredimg'] !="")
                                        {
                                            $path =  'uploads/package/'.$row['package_id'].'/';

                                            ?>
                                            <img src="<?php echo $path.$row['featuredimg'];?>" alt="product"
                                                >
                                            <?php
                                        }
                                        else
                                        {
                                            echo '<img src="themes/images/packagecategory/package1.jpg" alt="product"
                                                 >';
                                        }
                                        ?>
											
											
											</div>
											
										</a>
									</div>
									<div class="col-md-6">
										<div class="hot-page2-alp-ri-p2"> <a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>"><h3><?php echo $row['package_name'] ;?></h3></a>
											<ul>
												
												<li><?php
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
                                        ?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3">
											<div class="hot-page2-alp-r-hot-page-rat"><?php echo $row['package_duration'];?></div> 
											
											<span class="hot-list-p3-2"><?php echo $row['code'];?> <?php echo $row['pprice'];?></span><span class="hot-list-p3-4">
											<a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> 
											</div>
									</div>
								</div>
								</div>
								<!--END LISTINGS-->
								
                    
                    <?php
                }
                ?>

            </div>
            <?php
        }
        else if(empty($packages)){
            if(!empty($search)){
            ?>
             <div class="row">
                <?php
                foreach ($search as $row) {
                    ?>
                     <!--LISTINGS START-->
                      <div class="col-sm-6">
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>">
											
											<div class="hot-page2-hli-1"> 
											 <?php
                                        if($row['featuredimg'] !="")
                                        {
                                            $path =  'uploads/package/'.$row['package_id'].'/';

                                            ?>
                                            <img src="<?php echo $path.$row['featuredimg'];?>" alt="product"
                                                >
                                            <?php
                                        }
                                        else
                                        {
                                            echo '<img src="themes/images/packagecategory/package1.jpg" alt="product"
                                                 >';
                                        }
                                        ?>
											
											
											</div>
											
										</a>
									</div>
									<div class="col-md-6">
										<div class="hot-page2-alp-ri-p2"> <a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>"><h3><?php echo $row['package_name'] ;?></h3></a>
											<ul>
												
												<li><?php
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
                                        ?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3">
											<div class="hot-page2-alp-r-hot-page-rat"><?php echo $row['package_duration'];?></div> 
											 
											<span class="hot-list-p3-2">&nbsp;</span><span class="hot-list-p3-4">
											<a href="<?php echo site_url('packages/detail/'.'search'.'/'.$row['package_url']);?>" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> 
											</div>
									</div>
								</div>
								</div>
								<!--END LISTINGS-->
                    
                    
                    
                    
                    
                    
                    <?php
                }

                ?>

            </div>
            <?php
        }
    
        else if(empty($search))
        {
            ?>
            <div class="row">
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1>Sorry !!!</h1>

                    <p>No Records Found.</p>

                </div>

            </div>
            <?php
        }
        }
        ?>
								
								
								
								
								
								
																
							</div>
						</div>
					</div>
					<!--END RIGHT LISTINGS-->
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