<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tr-register">


                    <div class="tr-regi-form">
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
                        <?php
                        if ($this->session->flashdata('error') != "") {
                            ?>
                            <div class="alert alert-danger alert_box">
                                <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                            class="fa fa-times"></i></a>
                                <strong>Success !</strong> <?php echo $this->session->flashdata('error'); ?>.
                            </div>
                            <?php
                        }
                        ?>
                        <h4>Sign In</h4>
                        <p>It's free and always will be.</p>
                        <form id="login-form" action="<?php echo site_url('login/index');?>" method="post" role="form" style="display: block;">
                            <div class="col-md-12s">
                                <div class="form-group">


                                    <input type="text" name="email" data-validation="required email" class="form-control"  placeholder="Email" value="<?php echo (!empty($this->session->userdata('uc_email')))?$this->session->userdata('uc_email'):set_value('email'); ?>">


                                </div>
                                <div class="form-group">

                                    <input type="password" name="password" data-validation="required confirmation length"  data-validation-length="max50" tabindex="2" class="form-control"  placeholder="Password" value="<?php echo set_value('password');?>">
                                </div>
                                <div class="form-group">

                                    <input type="password" name="pass_confirmation" data-validation="required length"  data-validation-length="max50" class="form-control" placeholder="Retype Password" value="<?php echo set_value('pass_confirmation');?>">
                                    <span id="retype_error"></span>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="waves-effect btn btn-danger waves-light btn-large full-btn" value="Log In">
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </form>






                        <p><a href="#"  data-toggle="modal" data-target="#myModalforget">Forgot password</a> | Are you a new user ? <a href="<?php echo base_url(); ?>login/register">Register</a>
                        </p>
                        <!-- Modal to rest password -->
                        <form method="post" id="password-reset" action="<?php echo site_url('login/password_rest');?>" role="form">
                            <div class="modal fade" id="myModalforget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                                            <p>Enter the email address associated with CCS Nepal Pvt. Ltd. and click Submit</p>
                                        </div>
                                        <div class="modal-body">

                                            <label for="recipient-name" class="control-label">Email:</label>
                                            <div class="form-group">
                                                <input type="text" name="user_email" class="form-control" data-validation="required email">

                                            </div>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit"  class="form-control btn btn-login btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



</section>



<script>
    $.validate();
</script>
