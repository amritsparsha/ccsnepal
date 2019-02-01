<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $title;?></h2>

            </div>
        </div>
    </div>
</section>
<section class="content">
    <!-- BEGIN: SEARCH SECTION -->
    <div class="row full-width-search">
        <div class="container clear-padding">
            <?php
            if(isset($payment_status) && $payment_status == "success")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 sucessmessage text-center">

                    <h1>Thank You !!!</h1>

                    <p> <?php echo $result_message; ?>.</p>

                    <img src="themes/images/icons/sucessfulmsg.png">
                    <a href="<?php echo site_url('home');?>" class="btn btn-primary" >Back To Home</a>

                </div>
                <?php

            }
            ?>

            <?php
            if(isset($payment_status) && $payment_status == "pending")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 sucessmessage text-center">

                    <h1>Thank You !!!</h1>

                    <p> <?php echo $result_message; ?>.</p>

                    <img src="themes/images/icons/sucessfulmsg.png">
                    <a href="<?php echo site_url('home');?>" class="btn btn-primary" >Back To Home</a>

                </div>
                <?php

            }
            ?>


            <?php
            if(isset($payment_status) && $payment_status == "undefined")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 sucessmessage text-center">

                    <h1>Thank You !!!</h1>

                    <p> <?php echo $result_message; ?>.</p>

                    <img src="themes/images/icons/sucessfulmsg.png">
                    <a href="<?php echo site_url('home');?>" class="btn btn-primary" >Back To Home</a>

                </div>
                <?php

            }
            ?>


            <?php
            if(isset($payment_status) && $payment_status == "error")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1>Sorry !!!</h1>
                    <p> <?php echo $result_message; ?>.</p>
                    <img src="themes/images/icons/error.png">
                    <a href="<?php echo site_url('home');?>" class="btn btn-primary" >Back To Home</a>

                </div>
                <?php

            }
            ?>

        </div>
    </div>



    <!-- END: SEARCH SECTION -->
</section>


