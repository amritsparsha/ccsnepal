 
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $detail['package_name'];?> Review</h2>

            </div>
        </div>
    </div>


</section>

<section class="content cart-body">
    <div class="container">
        <div class="col-md-9">

            <div class="main-container blog-listing">
                <div class="row blog-post">
                    <!-- First Blog Post -->
                    <?php if (validation_errors()) {


                        ?>
                        <div class="alert alert-danger alert_box">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <?php echo validation_errors()?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($success) && $success != "") {
                        ?>
                        <div class="alert alert-success alert_box">
                            <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <strong>Success !</strong> <?php echo $success; ?>.
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($error) && $error != "") {
                        ?>
                        <div class="alert alert-danger alert_box">
                            <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <strong>Error !</strong> <?php echo $error; ?>.
                        </div>
                        <?php
                    }
                    ?>




                    <div class="leavecomment-blog">
                        <h4>Write A Review:</h4>
                        <form role="form" method="post" action="">
                            <div class="form-group">
                                <input type="text" name="review_title" placeholder="Title" data-validation="required length custom" data-validation-length="max200" data-validation-regexp="^([\w\s]+)$" class="form-control" kl_virtual_keyboard_secure_input="on">
                            </div>
                            <div class="form-group">
                                <input type="text" name="review_by" placeholder="Full Name" data-validation="required length custom" data-validation-length="max100" data-validation-regexp="^([\w\s]+)$" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Description" name="review_text" id="review" class="form-control" rows="3" data-validation="required length custom" data-validation-length="max2000" data-validation-regexp="^([\w\s,:=.?']+)$"></textarea>

                            </div>
                            <div class="form-group">
                                <p><b>Please Enter Captcha</b></p>
                                <span class="review_captcha_img captcha-word"></span>
                                <span style="cursor: pointer;" id="review_refresh"><i class="fa fa-refresh" style="font-size: 24px;"></i></span>

                            </div>
                            <div class="form-group">
                                <input type="text" name="captcha_code" placeholder="Captcha Code Here.." data-validation="required length custom" data-validation-length="max10" data-validation-regexp="^([\w\s,:=.,']+)$" class="form-control">
                            </div>
                            <div class="row form-group"><div class="col-md-3 clear-padding">
                                    <input type="hidden" name="package_id" value="<?php echo $detail['package_id'];?>">
                                    <button class="subscribe" type="submit">Submit</button>
                                </div> </div>
                        </form>
                        <hr>


                    </div>




                </div>





            </div>



        </div>
    </div>

</section>
<script>
    $.validate();
</script>

<script>
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>index.php/review/captcha_setting',
        dataType: "html",

        //data: postData, // appears as $_GET['id'] @ your backend side
        success: function(data) {

            $('.review_captcha_img').html(data);

        }

    });

    $('#review_refresh').click(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/review/captcha_setting',
            dataType: "html",

            //data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                $('.review_captcha_img').html(data);

            }

        });
    });
</script>

