

<section class="search-pg"  >
    <div class="hero-container bg-black">
    <div class="container">
        <div class="col-md-12 hero-header"> <h1 class="stronger">32 Hotel
        </h1>


            <div class="row form-row ">

                 <form method="post" action="<?php echo site_url('hotel/search');?>" id="form-2">
                <div class="col-md-3 col-sm-3 col-xs-12 hotel-search">

                    <div class="label" name="country">Select Country</div>

                    <div class="inputgrp">

                        <select class="selectpicker" name="country">
                            <optgroup>
                            <?php foreach($country as $countries){ ?>
                                <option name="country"><?php echo $countries['name']; ?></option>
                            <?php } ?>
                            </optgroup>

                        </select>

                    </div>

                </div>

                <div class="col-md-2 col-sm-2 col-xs-12 hotel-search">

                    <div class="label" name="city">City</div>
                    <div class="input-group">

                        <input type="text" class="form-control" name= "city" placeholder="City" aria-describedby="basic-addon1">
                    </div>

                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 hotel-search">

                    <div class="label" name="rating">Ratings</div>
                    <div class="inputgrp">

                        <select class="selectpicker" name="rating">
                            <optgroup>
                            <?php foreach ($category as $rating) {
                               
                            ?>
                                <option name="rating"><?php echo $rating['name']; ?></option>
                                <?php } ?>
                            </optgroup>

                        </select>

                    </div>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 hotel-search">

                    <div class="label" name="price">Price Range</div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">    <div class="input-group">

                            <input type="text" class="form-control" placeholder="From" aria-describedby="basic-addon1" name="price_from">
                        </div>
                            </div>
                        <div class="col-md-6 col-sm-6 col-xs-12"><div class="input-group">

                            <input type="text" class="form-control" placeholder="To" aria-describedby="basic-addon1" name="price_to">
                        </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 hotel-search">


                    <button type="submit" class="btn btn-primary btn-wid-100 search-now-banner">
                    Search Now</button>

                </div>

            </div>
            </form>
          </div>
    </div>
    </div>

</section>
    <section class="product-listing">
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

                                <h3><?php echo $row['name']; ?> </h3>
                                <!--                                        -->                                        <div class="button">
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
                             <a href="<?php echo site_url('hotel/detail').'/'.$row['slug'];?>">  View Details</a>
                                   </span>
                                   
                                   
                                <span class="rt">
                                   <a href="<?php echo site_url('hotel/detail').'/'.$row['slug'];?>">Book Now</a>
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
                
            ?>
        </div>


    </section>
