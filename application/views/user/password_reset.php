<section class="blank"></section>
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2>Reset Your Password</h2>

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
                        <?php
                        if(validation_errors())
                        {
                            ?>
                            <div class="alert  alert-danger alert_box">
                                <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                        class="fa fa-times"></i></a>
                                <?php echo validation_errors();?>
                            </div>

                            <?php
                        }
                        ?>

                        <?php if (isset($error)) {


                            ?>
                            <div class="alert alert-danger alert_box">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                        class="fa fa-times"></i></a>
                                <strong>Error!</strong>  <?php echo isset($error)?$error:"" ; ?>.
                            </div>
                            <?php
                        }
                        ?>



                        <h3 class="text-center login-heading">Reset Here</h3>


                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="string optional">New Password</label>
                                    <input type="password" name="password" data-validation="required length" id="password"  data-validation-length="max50" tabindex="2" class="form-control"  placeholder="Password" value="<?php echo set_value('password');?>">
                                </div>
                                <div class="form-group">
                                    <label class="string optional">Retype Password</label>
                                    <input type="password" name="confirm_password" data-validation="required length"  id="confirm-password" data-validation-length="max50" class="form-control" placeholder="Password" value="<?php echo set_value('confirm_password');?>">
                                    <span id="retype_error"></span>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="hidden" name="activation_code" value="<?php echo $activation_code;?>">
                                            <input type="submit" name="login-submit" id="reset-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 login-main">

                                <h3> Welcome to Rupakot Tours and Travels Pvt. Ltd.</h3>
                                <ul class="yt-list">
                                    <li><i class="ico ico-book-large"></i>   Traditional Nepali Hospitality  "Our Guest is Our God"</li>
                                    <li><i class="ico ico-clock-large"></i> An experience filled with adventure and good times</li>
                                    <li><i class="ico ico-manage-large"></i>  Dedicated team of trained multi-lingual tour and trekking guides</li>
                                    <li><i class="ico ico-print-large"></i>  Reliability and Quality Service</li>
                                </ul>

                            </div>




                        </form>




                    </div>
                </div>
                <!-- END: SEARCH SECTION -->
</section>

<script>
   $.validate();
</script>
<script type="text/javascript">

    $('#confirm-password').bind("cut copy paste",function(e) {
        e.preventDefault();
    });

</script>
<script>
    $('#reset-submit').click(function (e){

        $('#retype_error').text('');
        var password= $('#password').val();
        var confirmpassword= $('#confirm-password').val();

        if(password == confirmpassword)
        {
            e.submit();
        }
        else {

            $('#retype_error').text("Password Confirmation Can't Match");
            $("#retype_error").css("color","red");
            e.preventDefault();
        }


    });

</script>
