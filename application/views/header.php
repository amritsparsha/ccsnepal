<?php
$settings = $this->site_settings_model->get_site_settings();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="<?php echo strip_tags((isset($meta_title) && $meta_title !="")? $meta_title: $settings['meta_title']) ;?>">
    <meta name="description" content="<?php echo strip_tags((isset($meta_description) && $meta_description !="")? $meta_description:$settings['meta_description'] );?>">
    <meta name="keywords" content="<?php echo strip_tags((isset($meta_keywords) && $meta_keywords !="")? $meta_keywords:$settings['meta_keywords']) ;?>">
    <title><?php echo strip_tags((isset($meta_title) && $meta_title !="")? $meta_title:$settings['meta_title']);?></title>
    <meta property="og:url"           content="<?php echo base_url();?><?php echo (isset($og_url) && $og_url !="") ? $og_url:"" ;?>"/>
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php echo strip_tags((isset($og_title) && $og_title !="") ? $og_title:"") ;?>" />
    <meta property="og:description"   content="<?php echo strip_tags((isset($og_description) && $og_description !="") ? $og_description:"") ;?>" />
    <meta property="og:image"         content="<?php echo base_url();?><?php echo (isset($og_image) && $og_image !="") ? $og_image:"" ;?>" />
    <!-- PAGE TITLE -->
    <title><?php echo strip_tags((isset($meta_title) && $meta_title !="")? $meta_title:$settings['meta_title']);?></title>
    <base href="<?php echo base_url(); ?>" />
    <!-- Bootstrap stylesheet -->
    <link href="<?php echo base_url(); ?>themes/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700%7CSource+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- stylesheet -->
    <link href="<?php echo base_url(); ?>themes/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>themes/css/style_cyan.css" title="style_cyan" rel="alternate stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>themes/css/style_red.css" title="style_red" rel="alternate stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>themes/css/style_green.css" title="style_green" rel="alternate stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>themes/css/style_blue.css" title="style_blue" rel="alternate stylesheet" type="text/css"/>
    <!-- font-awesome -->
    <link href="<?php echo base_url(); ?>themes/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- crousel css -->
    <link href="<?php echo base_url(); ?>themes/js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <!--bootstrap select-->
    <link href="<?php echo base_url(); ?>themes/js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <script src="themes/script/js/jquery-1.11.1.min.js"></script>
    <?php
    if(isset($scripts))
    {
        foreach($scripts as $script =>$sc)
        {
            ?>
            <script src="<?php echo $sc;?>.js" type="text/javascript"></script>

            <?php
        }
    }
    ?>
</head>
<body>
<!-- top start here -->
<div id="top">
    <!-- top container start here-->
    <div class="container">
        <div id="top-links">
            <ul class="list-inline pull-left button">
                <li>
                    <span><i class="fa fa-envelope"></i> info@ccsnepal.com</span>
                </li>
                <li>
                    <span><i class="fa fa-phone"></i> +9779807555929</span>
                </li>

            </ul>
            <ul class="list-inline pull-right icon">
                <li>
                    <a href="#" target="_blank" class="notification-icon"><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>employer/registration" class="recruiters-icon">Recruiter's Login</a>
                </li>
                <li>
                    <a href="https://www.facebook.com/" target="_blank"><img src="themes/images/social/facebook.png" /> </a>
                </li>
                <li>
                    <a href="https://twitter.com/" target="_blank"><img src="themes/images/social/twitter.png" /> </a>
                </li>
                <li>
                    <a href="https://plus.google.com/" target="_blank"><img src="themes/images/social/youtube.png" /> </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank"><img src="themes/images/social/linkedin.png" /> </a>
                </li>
                <li>
                    <a href="https://in.pinterest.com/" target="_blank"><img src="themes/images/social/instagram.png" /> </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- top container end here-->
</div>
<!-- top end here -->

<!-- header start here-->
<header>
    <!-- header container start here-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
                <!-- logo start here-->
                <div id="logo">
                    <a href="<?php echo base_url(); ?>">
                        <?php

                        $logo = $this->db->query("SELECT * FROM igc_pictures WHERE locate ='1' AND delete_status ='0'");
                        $logors = $logo->result_array();
                        ?>
                        <?php
                        foreach($logors  as $logos ){

                            ?>
                            <?php
                            $path = 'uploads/pictures/';
                            if (file_exists($path.$logos['pictures_image']) && $logos['pictures_image'] !="")
                            {
                                ?>
                                <img src="<?php echo $path.$logos['pictures_image'];?>" class="img-responsive logochange" alt="<?php echo $logos['pictures_title']; ?>" title="<?php echo $logos['pictures_title']; ?>"  />

                                <?php
                            }

                            ?>

                            <?php
                        }
                        ?>



                    </a>
                </div>
                <!-- logo end here-->
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 visible-xs paddleft">
                <!-- button-login start here -->
                <div class="button-login pull-right">
                    <button type="button" class="btn btn-default btn-lg" onclick="location.href='login.html'">Login</button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='submit-job.html'">Submit Job</button>
                </div>
                <!-- button-login end here -->
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12 padd0">
                <!-- menu start here-->
                <nav class="navbar" id="menu">
                    <div class="navbar-header">
                        <span class="menutext visible-xs">Menu</span>
                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse padd0">
                        <ul class="nav navbar-nav pull-left">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#">HOME</a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">JOBS</a>
                                <div class="dropdown-menu animated fadeInDown">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="jobs.html">job grid view</a>
                                            </li>
                                            <li>
                                                <a href="jobs-list-view.html">Job List view</a>
                                            </li>
                                            <li>
                                                <a href="jobs-detail.html">job detail</a>
                                            </li>
                                            <li>
                                                <a href="apply-job-form.html">apply job form</a>
                                            </li>
                                            <li>
                                                <a href="jobs-search.html">Search job</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">CANDIDATES</a>
                                <div class="dropdown-menu animated fadeInDown">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="candidate-grid-view.html">candidate grid view</a>
                                            </li>
                                            <li>
                                                <a href="candidate-list-view.html">candidate list view</a>
                                            </li>
                                            <li>
                                                <a href="candidate-single-view.html">candidate single view</a>
                                            </li>
                                            <li>
                                                <a href="my-profile.html">my profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">EMPLOYERS</a>
                                <div class="dropdown-menu animated fadeInDown">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="employers.html">employers</a>
                                            </li>
                                            <li>
                                                <a href="employer-detail.html">employer detail</a>
                                            </li>
                                            <li>
                                                <a href="submit-job.html">Submit Job</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">BLOG</a>
                                <div class="dropdown-menu animated fadeInDown">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="blog.html">blog</a>
                                            </li>
                                            <li>
                                                <a href="blog-detail.html">blog detail</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">PAGES
                                    <span class="fa fa-angle-down"></span>
                                </a>
                                <div class="dropdown-menu animated fadeInDown">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="about.html">About Us</a>
                                            </li>
                                            <li>
                                                <a href="login.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- menu end here -->
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 hidden-xs">
                <!-- button-login start here -->
                <div class="button-login pull-right">
                    <?php
                    $session = $this->session->userdata('customer_id');
                    if($session =="")
                    {
                        ?>
                        <button type="button" class="btn btn-default btn-lg" onclick="location.href='<?php echo base_url(); ?>login'">Login</button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?php echo base_url(); ?>login/register'">Register</button>

                        <?php
                    }
                    else{
                        ?>
                        <button type="button" class="btn btn-default btn-lg" onclick="location.href='<?php echo site_url('login/logout');?>'">Logout</button>


                        <?php
                    }
                    ?>





                </div>
                <!-- button-login end here -->
            </div>
        </div>
    </div>
    <!-- header container end here -->
</header>
<!-- header end here -->

