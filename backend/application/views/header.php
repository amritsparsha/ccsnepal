<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="templates/assets/images/favicon.png">
    <title>CCS Nepal | <?php echo $title;?></title>
    <base href="<?php echo base_url() ?>" />
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="templates/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="templates/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="templates/material/dist/css/style.min.css" rel="stylesheet">
    <link href="templates/material/dist/css/pages/tab-page.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="templates/material/dist/css/pages/dashboard1.css" rel="stylesheet">
    
    <link href="templates/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="templates/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="themes/plugins/ckeditor/ckeditor.js"></script>
    <script src="themes/js/jquery.min.js"></script>
    <script src="themes/js/jquery-ui.min.js"></script>
    <script src="templates/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
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
    <script>
        var BASE_URL = "<?php echo base_url(); ?>";
        var LIST_MAX_LEVELS = "<?php echo $this->config->item('max_levels', 'adjacency_list');?>";
    </script>



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





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-default fixed-layout">
<?php
$user_id= $this->session->userdata('admin_id');
$this->db->where('user_id', $user_id);
$detail = $this->db->get('igc_users')->row_array();


?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">CCS Nepal</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                        <!-- Light Logo icon -->
                        <img src="templates/assets/images/logo-light-icon.png" alt="homepage"  class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="templates/assets/images/logo-text.png" width="75%" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="templates/assets/images/logo-light-text.png" width="75%" class="light-logo" alt="homepage" /></span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item">
                        <form class="app-search d-none d-md-block d-lg-block">
                            <input type="text" class="form-control" placeholder="Search & enter">
                        </form>
                    </li>

                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">

                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="templates/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="templates/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="templates/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="templates/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>
                        <div class="dropdown-menu animated bounceInDown">
                            <ul class="mega-dropdown-menu row">
                                <li class="col-lg-3 col-xlg-2 m-b-30">
                                    <h4 class="m-b-20">CAROUSEL</h4>
                                    <!-- CAROUSEL -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <div class="container"> <img class="d-block img-fluid" src="templates/assets/images/big/img1.jpg" alt="First slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container"><img class="d-block img-fluid" src="templates/assets/images/big/img2.jpg" alt="Second slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container"><img class="d-block img-fluid" src="templates/assets/images/big/img3.jpg" alt="Third slide"></div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                    </div>
                                    <!-- End CAROUSEL -->
                                </li>
                                <li class="col-lg-3 m-b-30">
                                    <h4 class="m-b-20">ACCORDION</h4>
                                    <!-- Accordian -->
                                    <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Collapsible Group Item #1
                                                    </a>
                                                </h5> </div>
                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Collapsible Group Item #2
                                                    </a>
                                                </h5> </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Collapsible Group Item #3
                                                    </a>
                                                </h5> </div>
                                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-lg-3  m-b-30">
                                    <h4 class="m-b-20">CONTACT US</h4>
                                    <!-- Contact -->
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter email"> </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </form>
                                </li>
                                <li class="col-lg-3 col-xlg-4 m-b-30">
                                    <h4 class="m-b-20">List style</h4>
                                    <!-- List style -->
                                    <ul class="list-style-none">
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- User Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="templates/assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->session->userdata('username');?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?php echo site_url('profile');?>" class="dropdown-item"><i class="ti-key"></i> Password</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?php echo site_url('login/logout');?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End User Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="templates/assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $this->session->userdata('username');?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="<?php echo site_url('profile');?>"><i class="ti-key"></i> Password</a></li>
                            <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>



                    <li class="nav-small-cap"><span class="side_shift_am">REPORT MANAGEMENT</span></li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-list"></i><span class="hide-menu">To Do </span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="<?php echo site_url(); ?>/todo/form">Add To Do</a></li>
                            <li><a href="<?php echo site_url(); ?>/todo">My todo </a></li>
                            <li><a href="<?php echo site_url(); ?>/todo/todo_today">Today Todo </a></li>
                            <li><a href="<?php echo site_url(); ?>/todo/todo_upcomings">Upcomings Todo </a></li>
                            <li><a href="<?php echo site_url(); ?>/todo/todo_completed">Completed todo </a></li>
                            <li><a href="<?php echo site_url(); ?>/todo/todo_pending">Pending todo </a></li>
                            <?php
                            if($detail['permission'] == '0'){

                                ?>
                                <li><a href="<?php echo site_url(); ?>/todo/todo_all">All Todo </a></li>
                            <?php

                            }


                            ?>



                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-th-large"></i><span class="hide-menu">Task </span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="<?php echo site_url(); ?>/tasks/form">Add New Task</a></li>
                            <?php
                            if($detail['permission'] == '0'){

                                ?>
                                <li><a href="<?php echo site_url(); ?>/tasks">All Tasks</a></li>
                                <?php

                            }


                            ?>


                            <li><a href="<?php echo site_url(); ?>/tasks/assigned_by_me">Assigned Tasks</a></li>
                            <li><a href="<?php echo site_url(); ?>/tasks/assignment">Assignment</a></li>
                            <li><a href="<?php echo site_url(); ?>/tasks/assignment_today">Today Assignment</a></li>
                            <li><a href="<?php echo site_url(); ?>/tasks/assignment_upcomings">Upcomings Assignment</a></li>
                            <!-- <li><a href="<?php echo site_url(); ?>/tasks/assignment_completed">Completed Assignment</a></li> -->


                        </ul>
                    </li>

                    <li class="nav-small-cap"><span class="side_shift_am">CONTACT MANAGEMENT</span></li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Leads </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>contact">Contact </a></li>

                            <li><a href="<?php echo base_url(); ?>contact/new_leads">New Leads</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/cold_leads">Cold Leads</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/warm_leads">Warm Leads</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/hot_leads">Hot Leads</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/nlwc_leads">NLWC (No Longerr with Company)</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/inactive_leads">InActive</a></li>
                            <li><a href="<?php echo base_url(); ?>contact/active_leads">Active</a></li>

                            <li><a href="<?php echo base_url(); ?>company_employers/customer">Customers</a></li>

                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid4"></i><span class="hide-menu">Companies </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>company_employers/form">Add Company </a></li>
                            <li><a href="<?php echo base_url(); ?>company_category">Category (Industry) </a></li>
                            <li><a href="<?php echo base_url(); ?>company_size">Organization Size</a></li>
                            <li><a href="<?php echo base_url(); ?>company_ownership">Ownership Type</a></li>
                            <li><a href="<?php echo base_url(); ?>company_employers">Employers</a></li>


                        </ul>
                    </li>
    
                    
<!-- ====================JOB management======================================== -->
                    <li class="nav-small-cap"><span class="side_shift_am">JOB MANAGEMENT</span></li>
                    <!-- Jobs -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-bag"></i><span class="hide-menu">Jobs </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>jobs">All Jobs </a></li>
                            <li><a href="<?php echo base_url(); ?>jobs/expired">Expired</a></li>
                            <li><a href="<?php echo base_url(); ?>jobs/pending">Pending</a></li>
                            <li><a href="<?php echo base_url(); ?>jobs/draft">Draft</a></li>
                        </ul>
                    </li>
                    <!--Employer  -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" ti-briefcase"></i><span class="hide-menu">Employer Jobs </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>jobs_employeer">All Employeer Job </a></li>
                            <li><a href="<?php echo base_url(); ?>jobs_employeer/permitted/0">Not Permitted</a></li>
                            <li><a href="<?php echo base_url(); ?>jobs_employeer/permitted/1">Permitted</a></li>
                        </ul>
                    </li>
                    <!--Newspaper  -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">Newspaper Jobs </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>jobs_newspaper">All Newspaper Jobs </a></li>
                            <li><a href="<?php echo base_url(); ?>newspaper">News Paper</a></li>
                        </ul>
                    </li>
                    <!--Jobs Content Settings  -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">Jobs Content</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>jobtype">Job Types</a></li>
                            <li><a href="<?php echo base_url(); ?>joblevel">Job Level</a></li>
                            <li><a href="<?php echo base_url(); ?>education_level">Education Level</a></li>
                            <li><a href="<?php echo base_url(); ?>organization_nature">Organization Nature</a></li>
                        </ul>
                    </li>
<!-- ============================================================================ -->
<!-- ====================Biodata Management======================================== -->
                    <li class="nav-small-cap"><span class="side_shift_am">Biodata MANAGEMENT</span></li>
                    <!-- Jobs -->
                   <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-address-book-o"></i><span class="hide-menu">Biodata </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>biodata">All Biodata </a></li>
                        </ul>
                    </li>
                    <!-- -------- -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-share-square-o"></i><span class="hide-menu">CV to Employer</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>biodata_forward">CV To Employers</a></li>
                        </ul>
                    </li>
<!-- ============================================================================ -->
<!-- ========================site users========================================== -->
                    <li class="nav-small-cap"><span class="side_shift_am">SITE USERS</span></li>
                        <li>
                            <a href="<?php echo base_url(); ?>site_users_uploaded_cv">
                                <i class="fa fa-file-pdf-o"></i>Uploaded CV
                            </a>
                        </li>
<!-- ============================================================================= -->
<!-- ============Settings========================================================= -->
                 <li class="nav-small-cap"><span class="side_shift_am">SETTINGS</span></li>
                    <!-- user management -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">User Management </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>user/form">Add New User </a></li>
                            <li><a href="<?php echo base_url(); ?>user">User List </a></li>
                        </ul>
                    </li>
                    <!-- settings -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Settings </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>site_settings">Site Setting </a></li>
                            <li><a href="<?php echo base_url(); ?>mail_setting">E-Mail Setting </a></li>
                            <li><a href="<?php echo base_url(); ?>content">Content Setting </a></li>
                        </ul>
                    </li>
                      <!--extra settings -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-gear"></i><span class="hide-menu">Extra Settings </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>currency">Currency Settings </a></li>
                            <li><a href="<?php echo base_url(); ?>language">Language Settings </a></li>
                            <li><a href="<?php echo base_url(); ?>state">State </a></li>
                            <li><a href="<?php echo base_url(); ?>city">City</a></li>
                        </ul>
                    </li>
<!-- ================================== -->
                    

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


