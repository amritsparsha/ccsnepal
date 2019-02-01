<section class="product-details">
    <div class="container">
        <div class="col-md-12">
            <div class="blocgalerieslider">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php

                        if(! empty($albums)) {
                            $i=0;
                            foreach ($albums as $row) {
                                $active = ($i == 0) ? "active" : "";
                                ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>"
                                    class="<?php echo $active; ?>"></li>
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
                    <div class="carousel-inner" role="listbox">
                        <?php
                        if(! empty($albums)) {


                            $j=0;
                            foreach ($albums as $rows) {
                                $actives = ($j == 0) ? "active" : "";
                                $path  =  'uploads/album/'.$rows['path_id'].'/';
                                ?>
                                <div class="item <?php echo $actives; ?>">
                                    <img src="<?php echo $path.$rows['name'];?>"
                                         alt="">
                                    <div class="carousel-caption">
                                        <?php echo $rows['caption'];?>
                                    </div>
                                </div>
                                <?php
                                $j++;
                            }
                        }
                        else
                        {
                            ?>
                            <div class="item active">
                                <?php
                                $path = 'uploads/package/'.$detail['package_id'].'/';
                                ?>
                                <img src="<?php echo $path.$detail['packageimg'];?>"
                                     alt="Package Banner">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <?php
                        }
                        ?>


                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>

                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>    <span class="sr-only">Next</span>
                    </a>
                </div>



            </div>



        </div>
        <div class="col-md-8">
            <div class="TitreProduit">
                <h2><?php echo $detail['package_name'];?></h2>

            </div>

        </div>
        <div class="col-md-4">
            <div class="asset_links pull-right">
<span>
    Tell A Friend
</span>


                <div class="fb-share-button" data-href="<?php echo base_url(). $og_url;?>" data-layout="button_count" style="border:none;overflow:hidden"></div>
                <a href="https://twitter.com/share" class="twitter-share-button"{count} data-via="incentivehldys">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


            </div>
        </div>
        <div class="col-md-12 price-detail">
            <div class="row">
                <?php if(validation_errors()) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <?php echo validation_errors() ?>
                    </div>
                    <?php
                }
                ?>
                <form method="post" action="">
                    <div class="col-md-4">
                        <span class="bookdetail">
                 Price based on 2 PAX. Cost per person:<br>
                            <small>For bigger group, contact us for better price. </small>
                        </span>
                    </div>
                    <div class="col-md-4"><div class="row choose-trip text-center">

                                <div class="pull-left">

                                    <div class="form-group">
                                        <?php
                                        $dprices =  $this->package->get_departure_price($departure_id);
                                       $acco = $this->crud->get_detail($departure_detail['accommodation_id'],'accommodation_id','igc_accommodation_setting');
                                        if ($acco == "Budget") {
                                            $price_class = "budget-trip";
                                        } else if ($acco == "Standard") {
                                            $price_class = "standard-trip";
                                        } else {
                                            $price_class = "deluxe-trip";
                                        }
                                        foreach ($dprices as $price) {
                                            ?>
<!--                                            <input type="radio" data-validation="required" class="accommodation"-->
<!--                                                   name="currency_id"-->
<!--                                                   value="--><?php //echo $price['currency_id']; ?><!--">-->
<!--                                            <label>--><?php //echo $price['price']. " ". $price['code'];?><!--</label>-->
                                            <span
                                                class="price-trip <?php echo $price_class; ?>"><?php echo $price['symbol'] . $price['price']; ?></span>
                                            <input type="hidden" value="<?php echo $price['currency_id']; ?>"
                                                   name="currency[<?php echo $departure_detail['accommodation_id']; ?>]]">
                                            <?php
                                        }
                                        ?>


                                        <input type="radio" class="accommodation"
                                               name="accommodation_id" value="<?php echo $departure_detail['accommodation_id']; ?>"
                                               required="required">
                                        <label><?php echo $acco['name']; ?></label>


                                    </div>




                                </div>








                        </div></div>
                    <div class="col-md-4">
                        <span>Departure Date:</span>
                        <label><?php echo  date_convert($departure_detail['departure_date']);?></label>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" name="departure_id" value="<?php echo $departure_id;?>">
                        <input type="hidden" name="package_type" value="Fixed Departure">
                        <input type="hidden" name="package_id" value="<?php echo $detail['package_id'];?>">
                        <button type="submit" class="btn btn-primary book_now-inner">
                            Book Now

                        </button>

                    </div>
                </form>

            </div>


        </div>


        <div class="row">

            <div class="col-md-8">


                <h3>
                    Trip Descriptions</h3>
                <?php echo $detail['description'];?>
            </div>
            <div class="col-md-4">
                <div class="trip-factor">
                    <h3>
                        Trip Factors</h3>
                    <?php echo $detail['summary'];?>
                </div>



            </div>



        </div>


    </div>
</section>

<section >
    <div class="container">

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
            <div class="tab-content">
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

</section>

<script>
    $.validate();
</script>