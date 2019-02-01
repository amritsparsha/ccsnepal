<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="themes/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="themes/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="themes/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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

</head>
<body>
<div class="container">
    <div class="row text-center  ">
        <div class="col-md-12">
            <br /><br />

            <br />
        </div>
    </div>
    <div class="row">

        <div class="col-md-6  col-sm-6  col-xs-12">
            <h2> Create your free Employer Account</h2>

            <h5>Fill the basic information and start recruiting now!</h5>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>  New Employer ? Register Yourself </strong>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                            <input type="text" name="company_employers" class="form-control" placeholder="Organization Name" />

                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-columns"  ></i></span>
                            <select name="comc_id" class="form-control">
                                <option >Select organization industry type</option>
                                <?php
                                foreach($category as $cats){

                                    ?>
                                    <option value="<?php echo $cats['comc_id'] ?>" ><?php echo $cats['company_category']; ?></option>
                                    <?php

                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                            <input type="text"  name="employer_contact" class="form-control" placeholder="Organization contact number" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                            <input type="text" name="employer_email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Retype Password" />
                        </div>
                        <div class="form-group input-group">

                            <input type="checkbox" required class="accept"  />
                            I accept the terms and privacy of CCS Nepal !
                        </div>

                        <button type="submit" name="submit" class="btn btn-success btn-block">Create an Employer Account</button>


                        <hr />
                        Already Registered ?  <a href="<?php echo base_url(); ?>login" >Login here</a>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-6  col-sm-6  col-xs-12 ">
            <div class="media">

                <div class="media-body">
                    <h3><i class="fa fa-check-circle"></i> #1 Job Site of Nepal</h3>
                    <small class="text-muted">Alexa Ranking, Google Analytics, Social Medias, Jobseeker and Employer have always put us on top!</small>
                </div>
            </div>
            <div class="media mt-3">

                <div class="media-body">
                    <h3><i class="fa fa-check-circle"></i> Most Trusted Job Portal in Nepal</h3>
                    <small class="text-muted">Over 120 million + page views since the inception year 2009 over 2.5 million monthly visitors and it's growing everyday.</small>
                </div>
            </div>
            <div class="media mt-3">

                <div class="media-body">
                    <h3> <i class="fa fa-check-circle"></i> Your Confidentiality is Assured</h3>
                    <small class="text-muted">We understand your professional goals are yours and yours only. So you can be confident that searching and applying for your next career opportunity is 100% confidential and secure.</small>
                </div>
            </div>
            <div class="media mt-3">

                <div class="media-body">
                    <h3><i class="fa fa-check-circle"></i> 450,000+ Aspiring Jobseekers Registered</h3>
                    <small class="text-muted">We connect you with wide range of applicants looking for opportunities from entry to top level positions in all industries throughout Nepal and abroad.</small>
                </div>
            </div>
            <div class="media mt-3">

                <div class="media-body">
                    <h3><i class="fa fa-check-circle"></i> 28,000+ Satisfied Clients</h3>
                    <small class="text-muted">We love to create a community of happy clients. Our 80+ full-time employees are successful in helping over 28,000+ brands hire the best through merojob.</small>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="themes/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="themes/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="themes/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="themes/js/custom.js"></script>

</body>
</html>
