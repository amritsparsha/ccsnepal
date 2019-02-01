<?php
$settings = $this->site_settings_model->get_site_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <base href="<?php echo base_url() ?>" />
    <!-- FAVICON -->
    <link rel="icon" href="themes/images/favicons/favicon.png"/>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="themes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="themes/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="themes/css/simple-line-icons.min.css"/>
    <!-- OTHER STYLES -->
    <link rel="stylesheet" href="themes/css/animate.min.css"/>
    <link rel="stylesheet" href="themes/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="themes/css/nivo-lightbox.min.css"/>
    <link rel="stylesheet" href="themes/css/nivo-lightbox/default.min.css"/>
    <link rel="stylesheet" href="themes/css/player/YTPlayer.css">
    <!-- MAIN STYLES -->
    <link rel="stylesheet" href="themes/css/style.css"/>
    <link rel="stylesheet" href="themes/css/styles.css"/>
    <!-- COLORS -->
    <link id="color-css" rel="stylesheet" href="themes/css/colors/color.css"/>
    <?php
    if(isset($styles))
    {
        foreach($styles as $style =>$st)
        {
            ?>
            <link href="<?php echo $st;?>.css" rel="stylesheet" media="screen">


            <?php
        }
    }
    ?>

    <!-- JQUERY -->
    <script src="themes/js/jquery-1.11.1.min.js"></script>
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
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<body class="with-preloader">
<!--
=================================
PRELOADER
=================================
-->
<div id="preloader" class="preloader">
    <div class="preloader-inner">
				<span class="preloader-logo">
					<img src="themes/images/logos/preloader-logo.png" alt="EOS"/>
					<strong>Loading</strong>
				</span>
    </div>
</div>

<div id="document" class="document">

    <!--
    =================================
    HEADER
    =================================
    -->
    <header class="header-section navbar navbar-fix ed-top navbar-default header-floating">
        <div class="container">

            <div class="navbar-header">

                <!-- RESPONSIVE MENU BUTTON -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- NAVBAR LOGO -->
                <a class="navbar-brand navbar-logo" href="<?php echo site_url('home');?>"><img src="themes/images/logos/navbar-logo.png" class="desktop"
                                                                      alt="GO NEPAL GUIDE"/><img
                        src="themes/images/logos/navbar-logo-mobile.png" class="mobile"> </a>


            </div>

            <div id="navigation" class="navbar-collapse collapse">

                <!-- NAVIGATION LINKS -->

                <ul class="nav navbar-nav navbar-right top_nav_bar">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-phone"></i> Explore
                            All Packages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            $IH_parent =  $this->crud_model->get_parent_header_menu('IH');
                            if(!empty($IH_parent)) {
                                foreach ($IH_parent as $IHP) {
                                    ?>
                                    <li><a href="<?php echo site_url('packages/index/'.$IHP['category_url']);?>"><?php echo $IHP['category_name'];?></a></li>

                                    <?php
                                }
                            }
                            ?>

                            <li class="divider"></li>
                            <?php
                            $OB_parent =  $this->crud_model->get_parent_header_menu('OB');
                            if(!empty($OB_parent)) {
                                foreach ($OB_parent as $OBP) {
                                    ?>
                                    <li><a href="<?php echo site_url('packages/index/'.$OBP['category_url']);?>"><?php echo $OBP['category_name'];?></a></li>

                                    <?php
                                }
                            }
                            ?>
                            <li class="divider"></li>
                            <?php
                            $OIH_parent =  $this->crud_model->get_parent_header_menu('OTH');
                            if(!empty($OIH_parent)) {
                                foreach ($OIH_parent as $OTHP) {
                                    ?>
                                    <li><a href="<?php echo site_url('packages/index/'.$OTHP['category_url']);?>"><?php echo $OTHP['category_name'];?></a></li>

                                    <?php
                                }
                            }
                            ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('content/plan');?>">Plan Your Holiday</a></li>
                        </ul>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        Call Us
                        <span>+977 01 4437892</span>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        Mail US
                        <span><a target="_blank" href="mailto:info@rupakottravels.com?Subject=Enquiry">info@rupakottravels.com</a></span>


                        <?php
                        $session = $this->session->userdata('customer_id');
                        if($session =="")
                        {
                            ?>
                    <li class="login-register">
                        <a href="<?php echo site_url('login');?>" class="transition-effect">
                            <i class="fa fa-key"></i>
                            LOGIN
                        </a>
                            <a href="<?php echo site_url('login/register');?>" class="transition-effect ">
                                <i class="fa fa-plus"></i>

                                REGISTER
                            </a>
                        </li>

                            <?php
                        }
                        else{
                            ?>
                            <li class="login-register">
                            <a href="<?php echo site_url('login/logout');?>" class="transition-effect">
                                <i class="fa fa-lock"></i>
                                LOGOUT
                            </a>
                                </li>
                            <?php
                        }
                        ?>

                    <li class="multi-lang">
                        <span><a href="<?php echo $settings['site_url'];?>" class="flag">
                                <img src="<?php echo $settings['site_url'];?>/themes/images/icons/multi/usa.jpg">
                            </a>
                        </span>
                        <span><a href="<?php echo $settings['site_url'];?>/jp" class="flag">
                                <img src="<?php echo $settings['site_url'];?>/themes/images/icons/multi/jpn.jpg">
                            </a>
                        </span>

                    </li>

                </ul>
            </div>
        </div>
    </header>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82140450-1', 'auto');
  ga('send', 'pageview');

</script>
