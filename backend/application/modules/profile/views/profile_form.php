
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>contact" >Contact</a> </li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php if(validation_errors()) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <?php echo validation_errors() ?>
                    </div>
                    <?php
                }
                ?>
                <?php if(isset($error) && $error !="") {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <?php echo $error ; ?>
                    </div>
                    <?php
                }
                ?>
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
                        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Old Password <span class="asterisk">*</span></label>

                                                <input type="password" name="old_password" placeholder="Old Password"   data-validation="required" value="<?php echo set_value('old_password');?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>New Password <span class="asterisk">*</span></label>

                                                <input type="password" name="password" placeholder="New Password"   data-validation="required" value="<?php echo set_value('password');?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>ReType Password <span class="asterisk">*</span></label>

                                                <input type="password" name="passconf" placeholder="ReType Password"   data-validation="required" value="<?php echo set_value('passconf');?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                    <!--/span-->

                                    </div>
                                </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="submit" name="Setting Btn" id="btn_news" class="btn btn-success" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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