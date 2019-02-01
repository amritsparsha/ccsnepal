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
            <div class="login-box">



                <div class="col-md-12 login-container">

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
                                    <form id="login-form" action="<?php echo $PGRequestURL ;?>" method="post" role="form" style="display: block;">
                                        <div class="col-md-4">
                                            <INPUT type="hidden" name="Data" value="<?php echo $PGData; ?>" />
                                            <INPUT type="hidden" name="InterfaceVersion" value="HP_1.0" />
                                            <INPUT type="hidden" name="Seal" value="<?php echo $PGMessageSeal ; ?>" />
                                            <input type="submit" name="login-submit" id="reset-submit" tabindex="4" class="form-control btn btn-login" value="Continue">

                                        </div>

                                    </form>

                                    <div class="col-md-4">

                                        <a href="<?php echo site_url('hotel/send_payment_link_mail/'.$booking_code);?>" class="btn btn-danger btn-cancel">Cancel</a>
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


