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
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>.
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
                <?php echo (isset($title) && $title != "") ? $title : ""; ?>
            </div>

            <div class="panel-body">

                <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="home">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Full Name<span class="asterisk">*</span></label>
                                        <input type="text" name="full_name" size="50" data-validation="required"
                                               value="<?php echo (isset($User['full_name']) && $User['full_name'] != "") ? $User['full_name'] : ""; ?>"
                                               autocomplete="off" class="form-control required valid"
                                               kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>User Name<span class="asterisk">*</span></label>
                                        <input type="text" name="username" size="50" data-validation="required"
                                               value="<?php echo (isset($User['username']) && $User['username'] != "") ? $User['username'] : ""; ?>"
                                               autocomplete="off" class="form-control required valid"
                                               kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email<span class="asterisk">*</span></label>
                                        <input type="text" name="email" size="50" data-validation="required"
                                               value="<?php echo (isset($User['email']) && $User['email'] != "") ? $User['email'] : ""; ?>"
                                               autocomplete="off" class="form-control required valid"
                                               kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <?php
                                        if (!isset($User['password'])) {


                                        ?>

                                            <label>Password<span class="asterisk">*</span></label>

                                            <input type="password" name="password" size="50" data-validation="required"
                                                   autocomplete="off" class="form-control required valid"
                                                   kl_virtual_keyboard_secure_input="on">

                                            <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>User Type <span class="asterisk">*</span></label>
                                        <input type="radio" name="permission"
                                               value="0" data-validation=""
                                               autocomplete="off" class="regular-text required valid"
                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['permission'])&&$User['permission']=='0') echo 'checked="checked"'?> >Admin


                                        <input type="radio" name="permission"
                                               value="1" data-validation="required"
                                               autocomplete="off" class="regular-text required valid"
                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['permission'])&&$User['permission']=='1') echo 'checked="checked"'?>>Normal

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="radio" name="status"
                                               value="0" data-validation=""
                                               autocomplete="off" class="regular-text required valid"
                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['status'])&&$User['status']=='0') echo 'checked="checked"'?> >Inactive


                                        <input type="radio" name="status"
                                               value="1" data-validation="required"
                                               autocomplete="off" class="regular-text required valid"
                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['status'])&&$User['status']=='1') echo 'checked="checked"'?>>Active

                                    </div>
                                </div>
                            </div>




                        </div>




                        <p class="submit">
                            <input type="hidden" name="user_id"
                                   value="<?php echo (isset($User['user_id']) && $User['user_id'] != "") ? $User['user_id'] : ""; ?>">
                            <input type="submit" name="Setting Btn" class="btn btn-danger" value="Save">
                        </p>


                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
