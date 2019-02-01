<?php
    $this->load->view('search_nav');

?>
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
            <div class="col-sm-12">
                <h2 class="text-center">Booking Result</h2>
            </div>
            <div class="col-sm-12">
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
                        <div class="col-md-6 col-md-offset-3 errormsg text-center">
                            <img src="themes/images/sucessfulmsg.png">
                            <p>
                                <?php echo $message; ?>
                            </p>


<!--                            <p>-->
<!--                                <label>Are you sure to continue the Payment Process?</label>-->
<!---->
<!--                            </p>-->

<!--                            <div class="row form-group booking-form-button">-->
<!---->
<!---->
<!--                                <div class="col-md-5 col-md-offset-1">-->
<!--                                    <a href="--><?php //echo site_url('payment/index/'.$booking_code);?><!--" class="form-control btn btn-login">Continue</a>-->
<!---->
<!--                                </div>-->
<!--                                <div class="col-md-5">-->
<!--                                    <a href="--><?php //echo site_url('booking/send_payment_link_mail/'.$booking_code);?><!--" class="btn btn-danger btn-cancel">Cancel</a>-->
<!---->
<!--                                </div>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--                            </div>-->

                        </div>
                    </div>
                    <?php

                }
                ?>
            </div>
        </div>
    </div>
</section>

