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
            <div>



                <div class="col-md-12">

                    <div class="col-md-9 col-md-offset-1 login-form-box">

                        <h3 class="text-center login-heading">Payment Process Here...</h3>



                        <div class="col-md-8">

                            <div class="form-group">
                                <label class="string optional">
                                    Are you sure to continue the your transaction?
                                </label>

                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <form action="<?php echo $pg_request_url;?>" method="POST" name="authForm">
                                        <div class="col-md-4">
                                            <input type="hidden" id="version" name="version" value="<?php echo $version;?>">
                                            <input type="hidden" id="merchant_id" name="merchant_id" value="<?php echo $merchant_id;?>">
                                            <input type="hidden" id="payment_description" name="payment_description" value="<?php echo $payment_description;?>">
                                            <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
                                            <input type="hidden" id="invoice_no" name="invoice_no" value="<?php echo $invoice_no;?>">
                                            <input type="hidden" id="currency" name="currency" value="<?php echo $currency;?>">
                                            <input type="hidden" id="amount" name="amount" value="<?php echo $amount;?>">
                                            <input type="hidden" id="customer_email" name="customer_email" value="<?php echo $customer_email;?>">
                                            <input type="hidden" id="promotion" name="promotion" value="<?php echo $promotion;?>">
                                            <input type="hidden" id="user_defined_1" name="user_defined_1" value="<?php echo $user_defined_1;?>"> <!-- space in user defined-->
                                            <input type="hidden" id="user_defined_2" name="user_defined_2" value="<?php echo $user_defined_2;?>">
                                            <input type="hidden" id="result_url_1" name="result_url_1" value="<?php echo $result_url_1;?>">
                                            <input type="hidden" id="result_url_2" name="result_url_2" value="<?php echo $result_url_2;?>">
                                            <input type="hidden" id="request_3ds" name="request_3ds" value="<?php echo $request_3ds;?>">

                                            <input type="hidden" id="hash_value" name="hash_value" value="<?php echo $hash;?>">
                                            <input type="submit" name="login-submit" id="reset-submit" tabindex="4" class="form-control btn btn-login" value="Continue">

                                        </div>

                                    </form>

                                    <div class="col-md-4">

                                        <a href="<?php echo site_url('booking/send_payment_link_mail/'.$booking_code);?>" class="btn btn-danger btn-cancel">Cancel</a>
                                    </div>


                                </div>


                            </div>
                        </div>

                    </div>









                </div>
            </div>
        </div>
    </div>
    <!-- END: SEARCH SECTION -->
</section>


