<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2>Booking Result</h2>

            </div>
        </div>
    </div>
</section>
<section class="content"><div class="container">

        <?php

        if($status == "error") {
            ?>


            <div class="row">
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1> Error !!!</h1>

                    <p><?php echo $message; ?></p>

                    <img src="themes/images/error.png">
                    <a href="#" class="btn btn-primary">Back To Home</a>


                </div>

            </div>
            <?php
        }
        ?>

        <?php

        if($status == "success")
        {
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 errormsg text-center">
                    <img src="themes/images/sucessfulmsg.png">
                    <p>
                        <?php echo $message; ?>
                    </p>


                    <p>
                        <label>Are you sure to continue the Payment Process?</label>

                    </p>

                    <div class="row form-group">


                        <div class="col-md-4 payment_option">
                            <a href="<?php echo site_url('payment/hotel/'.$booking_code);?>" class="form-control btn btn-login">Continue</a>

                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo site_url('hotel/send_payment_link_mail/'.$booking_code);?>" class="btn btn-danger btn-cancel">Cancel</a>

                        </div>





                    </div>

                </div>
            </div>
            <?php

        }
        ?>


</section>


