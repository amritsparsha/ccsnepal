<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $name;?>  Booking</h2>

            </div>
        </div>
    </div>

</section>

<section class="content"><div class="container">
        <div class="row">

            <div class="col-lg-12">
                <?php if (validation_errors()) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <?php echo validation_errors() ?>.
                    </div>
                    <?php
                }
                ?>

                <?php if ($this->session->flashdata('error') != "") {

                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">

            <div class="col-md-9 ">

                <div class="main-container">

                    <h3 class="trek-title">
                        Choose Booking Options
                    </h3>
                </div>


            </div>


        </div>
        <div class="row">


            <div class="col-md-9">

                <div class="book_con">
                    <form method="post" name="package_frm" id="package_frm" action="">



                        <div class="row form-group">
                            <div class="col-md-3">
                                <label class=" control-label">Password : </label> </div>
                            <div class="col-md-6">

                                <input type="password" class="form-control input-md" placeholder="" name="password" id=""  data-validation="required length" data-validation-length="max20">

                            </div>
                        </div>





                        <div class="row form-group">

                            <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                                <button type="submit" class="subscribe hovereffect text-white">Continue Booking</button>
                            </div>


                        </div>

                    </form>
                </div>

            </div></div>


    </div>


</section>
<script>
    $.validate();
</script>
