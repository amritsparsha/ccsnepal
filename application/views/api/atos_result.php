<?php
$settings = $this->site_settings_model->get_site_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?php echo strip_tags((isset($meta_title) && $meta_title !="")? $meta_title: $settings['site_name']) ;?>">
    <meta name="description" content="<?php echo strip_tags((isset($meta_description) && $meta_description !="")? $meta_description:$settings['meta_description'] );?>">
    <meta name="keywords" content="<?php echo strip_tags((isset($meta_keywords) && $meta_keywords !="")? $meta_keywords:$settings['meta_keywords']) ;?>">
    <title><?php echo strip_tags((isset($sub_title) && $sub_title !="")? $sub_title." ". "|" ." ":"" ) ;?><?php echo strip_tags((isset($settings['site_name']) && $settings['site_name'] !="")? $settings['site_name']:"Rupakot Tours and Travels Pvt. Ltd." );?></title>
    <meta property="og:url"           content="<?php echo site_url().'/'?><?php echo (isset($og_url) && $og_url !="") ? $og_url:"" ;?>"/>
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php echo strip_tags((isset($og_title) && $og_title !="") ? $og_title:"") ;?>" />
    <meta property="og:description"   content="<?php echo strip_tags((isset($og_description) && $og_description !="") ? $og_description:"") ;?>" />
    <meta property="og:image"         content="<?php echo base_url();?><?php echo (isset($og_image) && $og_image !="") ? $og_image:"" ;?>" />
    <!-- PAGE TITLE -->
    <title><?php echo strip_tags((isset($settings['site_name']) && $settings['site_name'] !="")? $settings['site_name']:"Rupakot Tours and Travels Pvt. Ltd." );?></title>
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
<body class="with-preloader">
<!--
=================================
PRELOADER
=================================
-->


<div id="document" class="document">
    <div id="preloader" class="preloader">
        <div class="preloader-inner">
				<span class="preloader-logo">
					<img src="themes/images/logos/preloader-logo.png" alt="EOS"/>
					<strong>Loading</strong>
				</span>
        </div>
    </div>
    <!--
    =================================
    HEADER
    =================================
    -->


    <section id="inner-page-search">
        <div class="row top-offer blue-bg">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo $title;?></h2>

                </div>
            </div>
        </div>
    </section>
    <section class="content">
    <!-- BEGIN: SEARCH SECTION -->
    <div class="row full-width-search">
        <div class="container clear-padding">
            <?php
            if(isset($response_code) && $response_code == "00")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 sucessmessage text-center">

                    <h1>Thank You !!!</h1>

                    <p> <?php echo $transaction_msg; ?>.</p>

                    <img src="themes/images/icons/sucessfulmsg.png">


                </div>
                <?php

            }
            ?>


            <?php
            if(isset($response_code) && $response_code != "00")
            {
                ?>
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1>Sorry !!!</h1>
                    <p> <?php echo $transaction_msg; ?>.</p>
                    <img src="themes/images/icons/error.png">


                </div>
                <?php

            }
            ?>

        </div>
    </div>



    <!-- END: SEARCH SECTION -->
</section>



</div>

<!--
=================================
JAVASCRIPTS
=================================
-->
<script src="themes/js/bootstrap.min.js"></script>
<script src="themes/js/retina.min.js"></script>
<script src="themes/js/smoothscroll.min.js"></script>
<script src="themes/js/wow.min.js"></script>
<script src="themes/js/jquery.nav.min.js"></script>
<script src="themes/js/nivo-lightbox.min.js"></script>
<script src="themes/js/jquery.stellar.min.js"></script>
<script src="themes/js/owl.carousel.min.js"></script>
<script src="themes/js/script.js"></script>
<script src="themes/js/jquery.mb.YTPlayer.js"></script>
<script src="themes/js/jquery.mb.browser.min.js"></script>

</body>
</html>
