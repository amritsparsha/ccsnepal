<section>
    <div class="tr-register">
        <div class="tr-regi-form">
            <?php if (isset($error)) {

                ?>
                <div class="alert alert-danger alert_box">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                    <strong>Error!</strong>  <?php  echo $error;?>
                </div>
                <?php
            }
            ?>
            <h3><?php echo $name;?>  Booking</h3>
            <p>Choose Booking Options</p>
            <hr />
            <form method="post" name="package_frm" id="package_frm" action="">



                <div class="row form-group">
                    <div class="col-md-6">
                        <h5>As Registered User</h5>
                        <input type="radio"  value="register" name="booking_type"  required="required"> &nbsp;   &nbsp;
                    </div>
                    <div class="col-md-6">
                        <h5>As Guest User</h5>
                        <input type="radio"   value="guest" name="booking_type" required="required">


                    </div>
                </div>


<hr />


                <div class="row form-group">

                    <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                        <button type="submit" class="subscribe hovereffect btn btn-success text-white">Continue Booking</button>
                    </div>


                </div>

            </form>


        </div>
    </div>
</section>




