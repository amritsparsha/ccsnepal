
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo (isset($title) && $title !="") ? $title:""; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/pictures" > Pictures</a> </li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                if ($this->session->flashdata('success') != "") {
                    ?>
                    <div class="alert alert-success alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>.
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
            <div class="col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" name="pictures_title" data-validation-allowing="float"
                                                        data-validation="required" placeholder="Pictures Title"
                                                       value="<?php echo (isset($detail['pictures_title']) && $detail['pictures_title'] != "") ? $detail['pictures_title'] : ""; ?>"
                                                       autocomplete="off" class="regular-text form-control required valid"
                                                       kl_virtual_keyboard_secure_input="on">
                                            </div>

                                            <div class="col-sm-6">

                                                <input type="text" name="pictures_caption" data-validation-allowing="float"
                                                        data-validation="required" placeholder="Picutre Caption"
                                                       value="<?php echo (isset($detail['pictures_caption']) && $detail['pictures_caption'] != "") ? $detail['pictures_caption'] : ""; ?>"
                                                       autocomplete="off" class="regular-text form-control required valid"
                                                       kl_virtual_keyboard_secure_input="on">
                                            </div>

                                            <div class="col-sm-12">
                                                <label>Picture For <span class="asterisk">*</span>
                                                </label>
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "1") ?"checked":""; ?> value="1"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Logo
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "2") ?"checked":""; ?> value="2"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Free Zone
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "3") ?"checked":""; ?> value="3"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Title Bar
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "4") ?"checked":""; ?> value="4"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Payment
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "5") ?"checked":""; ?> value="5"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Counter
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "6") ?"checked":""; ?> value="6"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Header Background
                                                <input type="radio" name="locate" <?php echo (isset($detail['locate']) && $detail['locate'] == "7") ?"checked":""; ?> value="7"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Footer Background

                                            </div>
                                            <div class="col-sm-6">
                                                <?php
                                                $path  =  '../uploads/pictures/';
                                                if(isset($detail['pictures_image']) && file_exists($path.$detail['pictures_image']))
                                                {

                                                    ?>
                                                    <div class="remove_option">


                                                        <img src="<?php echo $path. $detail['pictures_image'];?>"  style="max-width: 940px; max-height: 360px;">

                                                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                                    </div>
                                                    <input type="hidden" name="pre_pictures_image" value="<?php echo $detail['pictures_image']; ?>">
                                                    <div id="image_input">
                                                        <input type="file" class="form-control" name="pictures_image" id="pictures_image">(Image Dimension 853*405 px)
                                                        <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
                                                        <p id="sig_error2" style="display:none; color:#FF0000;">Max file size should be 20.</p>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>

                                                    <span>(Image Dimension 853*405 px)</span>
                                                    <input type="file" class="form-control" name="pictures_image"  id="pictures_image">
                                                    <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
                                                    <p id="sig_error2" style="display:none; color:#FF0000;">Max file size should be 20MB.</p>
                                                    <?php
                                                }
                                                ?>
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="radio" name="publish_status" <?php echo (isset($detail['publish_status']) && $detail['publish_status'] == "1") ?"checked":""; ?> value="1"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Active
                                                <input type="radio" name="publish_status" <?php echo (isset($detail['publish_status']) && $detail['publish_status'] == "0") ?"checked":""; ?> value="0"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Inactive
                                            </div>

                                            <div class="col-sm-12">

                                                    <input type="hidden" name="pictures_id"
                                                           value="<?php echo (isset($detail['pictures_id']) && $detail['pictures_id'] != "") ? $detail['pictures_id'] : ""; ?>">
                                                    <input type="submit" name="Setting Btn" id="pictures_btn" class="btn btn-primary" value="Save">

                                            </div>


                                        </div>
                                        <!--/span-->

                                    </div>
                                </div>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<script>
    $.validate();
</script>
<script>

    $('#pictures_btn').click(function(e)
    {

        var a=0;

        var ext1 =  $('#pictures_image').val().split('.').pop().toLowerCase();


        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
            {
                a = 0
            }
            else
            {

                a = 1;
            }
        }

        if(a != "1")
        {
            alert('Invalid pictures Image');
            e.preventDefault();
        }

        else{

            e.submit;

        }


    });
</script>