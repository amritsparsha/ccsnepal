
<section class="product-listing search-list">

    <div class="container">

        <?php
        if(! empty($hotel)) {


            ?>

            <div class="row">
                <?php
                foreach ($hotel as $row) {

                    ?>
                    <div class="col-md-4">
                        <div class="listing-item">

                            <div class="listing-item-background">
                                <div class="listing-item-background-image">

                                           <?php
                                        if($row['hotelimg'] !="")
                                        {
                                            $path =  'uploads/hotel/';

                                            ?>
                                            <img src="<?php echo $path.$row['hotelimg'];?>" alt="product"
                                                 class="scale-height">
                                            <?php
                                        }
                                        else
                                        {
                                            
                                        $path =  'uploads/hotel/';

                                        ?>
                                        <img src="<?php echo $path.$row['featuredimg'];?>" alt="product" class="scale-height">
                                        <?php
                                    
                                        }
                                        ?>
                                </div>

                                <div class=" pricetag ">
                                    <div class="price text-white"><?php if(!empty($currency)){
                                                foreach($currency as $cur){ 
                                                if($cur['currency_id']!="" && ($cur['currency_id'] == $row['currency_id'])){
                                                    echo $cur['code']; 
                                                }
                                                }
                                                }?><br><?php echo $row['startingprice']; ?></div>
                                </div>

                            </div>
                            <div class="product-list">

                                <h3><?php echo $row['hotel_name'];?></h3>
                                            
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
                                    ?>

                                </div>


                                <div class="col-md-8 bookingbuttons">

                               <span class="lft">
                             <a href="<?php echo site_url('hotel/detail/'.$row['slug']);?>">  View Details</a>
                                   </span>


                                <span class="rt">
                                   <a href="<?php echo site_url('hotel/detail/'.$row['slug']);?>">Book Now</a>
                               </span>
                                </div>

                            </div>

                        </div>
                    </div>









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


</section>
<style>
    .pagination .active {
        background-color:#2E608A;
        color:#FFF;
    }

</style>