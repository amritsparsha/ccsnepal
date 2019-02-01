<?php

$this->load->view('search_nav');

?>
<section>
	<?php
                        if(! empty($packages)) {


                            ?>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					
					<p><?php echo (isset($description) && $description !="")? $description:"";?></p>
				</div>
				
				
				
				<?php
                                foreach ($packages as $row) {
                                    ?>
				<!--===== PLACES ======-->
				<div class="rows p2_2">
					<div class="col-md-6 col-sm-6 col-xs-12 p2_1"> 
					<?php
                                                    if($row['featuredimg'] !="")
                                                    {
                                                        $path =  'uploads/package/'.$row['package_id'].'/';

                                                        ?>
                                                        <a href="<?php echo site_url('packages/detail/'.$slug.'/'.$row['package_url']);?>">
                                                        <img src="<?php echo $path.$row['featuredimg'];?>" alt="<?php echo $row['package_name'] ;?>"
                                                             class="scale-height">
                                                             </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo '<img src="themes/images/packagecategory/package1.jpg" alt="Rupakot Tours and Travels"
                                                 class="scale-height">';
                                                    }
                                                    ?>
					
					
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 p2">
						<h3><?php echo $row['package_name'] ;?><span>
						
						<?php
                                                    $total= $row['rating'];
                                                    $remaining = 5 - $total;
                                                    for($i=0; $i<$total; $i++)
                                                    {
                                                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                                    }
                                                    for($j=0; $j<$remaining; $j++)
                                                    {

                                                        echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                                                    }
                                                    ?>
						
						</span></h3>
						<?php 
                                                    $amko = mb_substr($row["description"] , 0,520 ,'UTF-8');
                                                    $amko = preg_replace("/<img[^>]+\>/i", "", $amko);
                                                    echo $amko;
                                                    ?>
						<div class="ticket">
							<ul>
								<li>Package Duration: <?php echo $row['package_duration'];?></li>
							
								
							</ul>
						</div>
						
						<div class="p2_book">
							<ul>
								<li><a href="<?php echo site_url('packages/detail/'.$slug.'/'.$row['package_url']);?>" class="link-btn">Book Now</a> </li>
								<li><a href="<?php echo site_url('packages/detail/'.$slug.'/'.$row['package_url']);?>" class="link-btn">View Package</a> </li>
							</ul>
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
		
	</section>







<style>
    .pagination .active {
        background-color:#2E608A;
        color:#FFF;
    }

</style>











