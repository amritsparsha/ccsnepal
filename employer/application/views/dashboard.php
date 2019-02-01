<?php
$settings = $this->crud->get_site_settings();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Dashboard</h2>
        <h5>Welcome to <?php echo $settings['site_name']; ?> <?php echo $this->session->userdata('username');?> , Love to see you back. </h5>
    </div>
</div>
<!-- /. ROW  -->
<hr/>
<div class="row">





<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('content');?>">
        <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">All Content</p>

            </div>
        </div>
    </a>
</div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('package_category');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Category</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('services');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Services</p>

                </div>
            </div>
        </a>
    </div>

<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('news');?>">
        <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">News</p>

            </div>
        </div>
    </a>
</div>

<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('popup');?>">
        <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Popup</p>

            </div>
        </div>
    </a>
</div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('tutorials');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Tutorials</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('whychoose');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Why Choose us</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('themes');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Themes</p>

                </div>
            </div>
        </a>
    </div>



    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('single');?>">
            <div class="panel panel-back sub_panel_menu bg_25">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Normal Pages</p>

                </div>
            </div>
        </a>
    </div>

<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('portfolio');?>">
        <div class="panel panel-back sub_panel_menu bg_22">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-smile-o" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Portfolio</p>

            </div>
        </div>
    </a>
</div>


<!--<div class="col-md-2 col-sm-6 col-xs-6 ">-->
<!--    <a href="--><?php //echo site_url('customers');?><!--">-->
<!--        <div class="panel panel-back sub_panel_menu bg_22">-->
<!--                <span class="icon-box bg-color-brown set-icon">-->
<!--                     <i class="fa fa-puzzle-piece" aria-hidden="true"></i>-->
<!--                </span>-->
<!--            <div class="text-box">-->
<!--                <p class="main-text">Customers</p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </a>-->
<!--</div>-->

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('team');?>">
            <div class="panel panel-back sub_panel_menu bg_21">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Team</p>

                </div>
            </div>
        </a>
    </div>

<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('blog');?>">
        <div class="panel panel-back sub_panel_menu bg_19">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-bell-o" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Blog</p>

            </div>
        </div>
    </a>
</div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('gallery');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-image" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Gallery</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('mail_setting');?>">
            <div class="panel panel-back sub_panel_menu bg_12">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Email Setting</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('contact_message');?>">
            <div class="panel panel-back sub_panel_menu bg_16">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-commenting-o" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Feedback</p>

                </div>
            </div>
        </a>
    </div>



    



<!--    <div class="col-md-2 col-sm-6 col-xs-6 ">-->
<!--        <a href="--><?php //echo site_url('gallery');?><!--">-->
<!--            <div class="panel panel-back sub_panel_menu bg_18">-->
<!--                <span class="icon-box bg-color-brown set-icon">-->
<!--                   <i class="fa fa-file-image-o" aria-hidden="true"></i>-->
<!--                </span>-->
<!--                <div class="text-box">-->
<!--                    <p class="main-text">Free Zone Facilities</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </div>-->


    



<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('log');?>">
        <div class="panel panel-back sub_panel_menu bg_19">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-bell-o" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Log Report</p>

            </div>
        </div>
    </a>
</div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('career');?>">
            <div class="panel panel-back sub_panel_menu bg_24">
                <span class="icon-box bg-color-brown set-icon">
                      <i class="fa fa-comments-o" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Career</p>

                </div>
            </div>
        </a>
    </div>




<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('job');?>">
        <div class="panel panel-back sub_panel_menu bg_21">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Career Applications</p>

            </div>
        </div>
    </a>
</div>
<!--<div class="col-md-2 col-sm-6 col-xs-6 ">-->
<!--    <a href="--><?php //echo site_url('package_booking');?><!--">-->
<!--        <div class="panel panel-back sub_panel_menu bg_22">-->
<!--                <span class="icon-box bg-color-brown set-icon">-->
<!--                     <i class="fa fa-comment-o" aria-hidden="true"></i>-->
<!--                </span>-->
<!--            <div class="text-box">-->
<!--                <p class="main-text">Enquiry</p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </a>-->
<!--</div>-->



<!--    <div class="col-md-2 col-sm-6 col-xs-6 ">-->
<!--        <a href="--><?php //echo site_url('package_category');?><!--">-->
<!--            <div class="panel panel-back sub_panel_menu bg_11">-->
<!--               <span class="icon-box bg-color-brown set-icon">-->
<!--                  <i class="fa fa-list-ul" aria-hidden="true"></i>-->
<!---->
<!--               </span>-->
<!--                <div class="text-box">-->
<!--                    <p class="main-text">Products Category</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </div>-->


<!--    <div class="col-md-2 col-sm-6 col-xs-6 ">-->
<!--        <a href="--><?php //echo site_url('package');?><!--">-->
<!--            <div class="panel panel-back sub_panel_menu bg_11">-->
<!--               <span class="icon-box bg-color-brown set-icon">-->
<!--                  <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>-->
<!---->
<!--               </span>-->
<!--                <div class="text-box">-->
<!--                    <p class="main-text">Products</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </div>-->




<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('slider');?> ">
        <div class="panel panel-back sub_panel_menu bg_23">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-sliders" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Slider</p>

            </div>
        </div>
    </a>
</div>

<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('subscribers');?>">
        <div class="panel panel-back sub_panel_menu bg_14">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Subscribers</p>

            </div>
        </div>
    </a>
</div>




<div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('package_review');?>">
        <div class="panel panel-back sub_panel_menu bg_24">
                <span class="icon-box bg-color-brown set-icon">
                      <i class="fa fa-comments-o" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Testimonials</p>

            </div>
        </div>
    </a>
</div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('media');?>">
            <div class="panel panel-back sub_panel_menu bg_24">
                <span class="icon-box bg-color-brown set-icon">
                      <i class="fa fa-medium" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Media</p>

                </div>
            </div>
        </a>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('clients');?>">
            <div class="panel panel-back sub_panel_menu bg_24">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-user-plus" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Clients</p>

                </div>
            </div>
        </a>
    </div>
    
    
    
    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('pictures');?>">
            <div class="panel panel-back sub_panel_menu bg_18">
                <span class="icon-box bg-color-brown set-icon">
                   <i class="fa fa-image" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Basic Pictures</p>

                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6 ">
        <a href="<?php echo site_url('newsletter');?>">
            <div class="panel panel-back sub_panel_menu bg_22">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Newsletter</p>

                </div>
            </div>
        </a>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6 ">
    <a href="<?php echo site_url('newsletter/groups');?>">
        <div class="panel panel-back sub_panel_menu bg_22">
                <span class="icon-box bg-color-brown set-icon">
                     <i class="fa fa-users" aria-hidden="true"></i>
                </span>
            <div class="text-box">
                <p class="main-text">Create Group / Campaign</p>
            </div>
        </div>
    </a>
</div>






</div>

<!-- /. ROW  -->
<hr/>