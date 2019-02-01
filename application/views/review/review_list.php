 
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2>Welcome to our Testimonials!</h2>

            </div>
        </div>
    </div>


</section>

<section class="content cart-body">
    <div class="container">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Testimonianls</li>

            </ol>
            <div class="main-container blog-listing">
                <?php
                if(! empty($reviews))
                {
                    foreach($reviews as $rows)
                    {

                        ?>
                        <div class="row blog-post">
                            <!-- First Blog Post -->
                            <h3>
                                <a href="<?php echo site_url('review/detail/'.$rows['review_url']);?>"><?php echo $rows['review_title'] ;?></a>
                            </h3>

                            <div class="blog_info">
                                <span class="blog_posttype blog_slider text-center"> <i class="fa fa-picture-o"></i></span>

                                <div class="blog_info_block">
                                    <span class="author_name">Review by <?php echo $rows['review_by'];?></span>

                                    <span class="date"><i class="fa fa-calendar  "></i> &nbsp; <?php echo date_converter($rows['created']);?></span>



                        </span>

                                </div>
                            </div>





                            <?php
                            $path = 'uploads/package/'.$rows['package_id'].'/';

                            if (file_exists($path.$rows['packageimg']) && $rows['packageimg'] !="")
                            {
                                ?>
                                <div class="featured-wrapper"><img src="<?php echo $path.$rows['packageimg'];?>" class="img-responsive" ></div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="featured-wrapper"><img class="img-responsive" src="themes/images/innerimg.jpg"></div>
                                <?php
                            }
                            ?>
                          

                            <a href="<?php echo site_url('review/detail/'.$rows['review_url']);?>" class="read-more hovereffect text-center ">Read More <span class="fa fa-angle-right"></span></a>




                        </div>

                        <?php
                    }

                }
                ?>


                <nav>

                    <?php
                    if(!empty($reviews))
                    {


                        $total_page = ceil($total/$per_page);
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



        </div>
    </div>

</section>

<style>
    .pagination .active {
        background-color:#2E608A;
        color:#FFF;
    }

</style>