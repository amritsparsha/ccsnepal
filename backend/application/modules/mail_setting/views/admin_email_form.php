
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>contact" >Settings</a> </li>
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
            <div class="col-md-12">
                <div class="card">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-xs-down">General</span></a> </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-20 active" id="home2" role="tabpanel">
                            <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                                <div class="tab-content">

                                    <table class="form-table">
                                        <tbody>
                                        <tr valign="top">
                                            <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Full Name <span class="asterisk">*</span>
                                                </label></th>
                                            <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="full_name"  size="50" data-validation="required" value="<?php echo (isset($setting['full_name']) && $setting['full_name'] !="") ? $setting['full_name']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></td>
                                        </tr>

                                        <tr valign="top">
                                            <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="slogan">Host<span class="asterisk">*</span> </label></th>
                                            <td style="background: transparent none repeat scroll 0% 0%;"><input type="email" name="email" data-validation="required" class="regular-text form-control"   size="50" value="<?php echo (isset($setting['email']) && $setting['email'] !="") ? $setting['email']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on"></td>
                                        </tr>

                                        <tr valign="top">
                                            <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="slogan">Mail Sending Option<span class="asterisk">*</span> </label></th>
                                            <td style="background: transparent none repeat scroll 0% 0%;">

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


                                            </td>
                                        </tr>

                                        <tr valign="top" class="contact_detail">
                                            <th style="background: transparent none repeat scroll 0% 0%;" scope="row">
                                                <label>Status</label></th>
                                            <td style="background: transparent none repeat scroll 0% 0%; padding-top: 8px;">
                                                <input type="radio" name="active_status" <?php echo (isset($setting['active_status']) && $setting['active_status'] =="1")?"checked":"";?> class="regular-text" data-validation="required" value="1">Active
                                                <input type="radio" name="active_status" <?php echo (isset($setting['active_status']) && $setting['active_status'] =="0")?"checked":"";?> class="regular-text" data-validation="required" value="0">Inactive
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>


                                    <p class="submit">
                                        <input type="hidden" name="admin_id" value="<?php echo (isset($setting['admin_id']) && $setting['admin_id'] !="") ? $setting['admin_id']:""; ?>">
                                        <input type="submit" name="Setting Btn" class="button" value="Save Settings">
                                    </p>



                                </div>
                            </form>

                        </div>
                    </div>
                </div>





            </div>
        </div>


    </div>
</div>







<script>
    $.validate();
</script>