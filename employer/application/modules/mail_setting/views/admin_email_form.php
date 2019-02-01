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
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo (isset($title) && $title !="") ? $title:""; ?>
            </div>

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">General</a>
                    </li>
                </ul>
                <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="home">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name <span class="asterisk">*</span></label>
                                        <input type="text" name="full_name"  data-validation="required" value="<?php echo (isset($setting['full_name']) && $setting['full_name'] !="") ? $setting['full_name']:""; ?>"  autocomplete="off" class="form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slogan">Host<span class="asterisk">*</span> </label>
                                        <input type="email" name="email" data-validation="required" class="form-control"    value="<?php echo (isset($setting['email']) && $setting['email'] !="") ? $setting['email']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="slogan">Mail Sending Option<span class="asterisk">*</span> </label>
                                        <?php
                                        $mailing_types =  $this->setting->get_mailing_types();
                                        foreach($mailing_types as $row)
                                        {
                                            $admin_id = (isset($setting['admin_id']) !="") ? $setting['admin_id'] : "0";

                                            $type_id = $row['type_id'];

                                            $mail_setting = $this->setting->get_mail_setting($admin_id, $type_id);

                                            $chk = (isset($mail_setting) and (!empty($mail_setting))) ? "checked" : "";
                                            ?>

                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="mailing_type[]" <?php echo $chk;?> class="mail_type" value="<?php echo $row['type_id'].$admin_id;?>"> <?php echo $row['type_name'];?>
                                                <input type="hidden" name="mtype[<?php echo $type_id.$admin_id;?>]"
                                                       value="<?php echo (isset($row['type_id']) != "") ? $row['type_id']:""; ?>">

                                                <input type="hidden" name="admin[<?php echo $row['type_id'].$admin_id;?>]" value="<?php echo $admin_id;?>">
                                            </label>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Status</label>
                                    <input type="radio" name="active_status" <?php echo (isset($setting['active_status']) && $setting['active_status'] =="1")?"checked":"";?> class="regular-text" data-validation="required" value="1">Active
                                    <input type="radio" name="active_status" <?php echo (isset($setting['active_status']) && $setting['active_status'] =="0")?"checked":"";?> class="regular-text" data-validation="required" value="0">Inactive

                                </div>
                            </div>




                        </div>



                        <p class="submit">
                            <input type="hidden" name="admin_id" value="<?php echo (isset($setting['admin_id']) && $setting['admin_id'] !="") ? $setting['admin_id']:""; ?>">
                            <input type="submit" name="Setting Btn" class="btn btn-danger" value="Save Settings">
                        </p>



                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<script>
    $.validate();
</script>