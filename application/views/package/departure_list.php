<?php
/**
 * Created by PhpStorm.
 * User: ashok
 * Date: 4/17/2016
 * Time: 5:47 PM
 */
?>
<section class="search-pg">
    <div class="hero-container bg-black">
        <div class="container">
            <div class="col-md-12 hero-header"> <h1 class="stronger"><?php echo $sub_title;?>
</h1>
<?php echo (isset($description) && $description !="")? $description:"";?>
</div>


</div>
</div>

</section>
<section class="product-listing">

    <div class="container">

        <?php
        if(! empty($packages)) {


            ?>

            <div class="row">
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
                                            <img src="<?php echo $path.$row['featuredimg'];?>" alt="product"
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
                                    <div class=" pricetag ">
                                        <div class="price text-white"><?php echo $row['code'] . " " . $row['price'];?></div>
                                    </div>

                                </div>
                                <div class="product-list">

                                    <h3><?php echo $row['package_name'] ;?></h3>
                                    <h6 class="days"><?php echo $row['package_duration'];?></h6>
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
                                   <a href="<?php echo site_url('packages/fixed/'.$row['package_url'].'/'.$row['departure_id']);?>">View Details</a>
                               </span>
                                <span class="rt">
                                   <a href="<?php echo site_url('packages/fixed/'.$row['package_url'].'/'.$row['departure_id']);?>">Book Now</a>
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

        <nav>


            <?php
            if(! empty($packages))
            {
                $total_page = ceil($package_total/$per_page);

                if($total_page > 1)
                {


                    ?>
                    <ul class="pagination">
                        <?php for($i = 1; $i <= $total_page; $i++) { ?>
                            <li><a href="<?php echo $base_url."/" ?><?php echo $i ?>" class="links <?php echo ($i==$current_page)?"":"in"?>active"><?php echo $i ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
            }
            ?>

        </nav>
    </div>


</section>
<style>
    .pagination .active {
        background-color:#2E608A;
        color:#FFF;
    }

</style>