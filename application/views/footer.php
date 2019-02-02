<?php
$settings = $this->site_settings_model->get_site_settings();
?>



<!-- Footer start here -->
<footer>
    <div class="container">
        <div class="bor col-md-12 col-sm-12 col-xs-12 padd0">
            <div class="col-sm-5 col-md-5 col-xs-12 subscribe">

                <form name="subscribe">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" placeholder="Enter your Email Address" id="subscribe_email1" name="subscribe_email" value="" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 follow">

                <ul class="list-inline socialicon">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/" target="_blank">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.linkedin.com/" target="_blank">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 need">

                <h6><i class="fa fa-phone" aria-hidden="true"></i> CALL US : <span>9807555929</span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12 matter">
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
                        <img src="<?php echo $path.$logos['pictures_image'];?>" class="img-responsive footerlogochange" alt="<?php echo $logos['pictures_title']; ?>" title="<?php echo $logos['pictures_title']; ?>"  />


                        <?php
                    }

                    ?>

                    <?php
                }
                ?>



                <p>Aliquam hendrit rutrum iaculis nullam ondimentum mal uada velit beum donec sit amet tristique erosam amet risus mollis malesuada quis quis nulla.</p>

            </div>
<!-- Dynamic Footer Menu -->
<?php 
    $parent_footer=$this->crud->get_parent_footer_menu();
    if(!empty($parent_footer))
    {
        $i=1;
        if($i<=3)
        {
            foreach ($parent_footer as $key => $parent) 
            {
?>
                <div class="col-sm-3 col-md-3 col-xs-12 info">
                    <h5><?php echo $parent['content_page_title']; ?></h5>
            <?php 
                $child_footer=$this->crud->get_parent_footer_sub_menu($parent['content_id']);
                if(!empty($child_footer))
                {
            ?>
                <ul class="list-unstyled">
                    <?php foreach ($child_footer as $key => $child): ?> 
                        <li>
                            <a href="about.html">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                <?php echo $child['content_page_title']; ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php
                }
            ?>  
                </div>
<?php
            }
        }   
        $i++;
    }
?>
<!-- =================================================================================== -->
            <div class="col-sm-12">
                <ul class="footer-down-menu">
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="#">Help Desk</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="#">Help Desk</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="#">Help Desk</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="powered">
    <div class="container">
        <p>&copy; 2018 Copyright, Complete Corporate Solution Nepal Pvt. Ltd. All Rights Reserved</p>
    </div>
</div>
<!-- Footer end here -->
<!-- jquery -->
<script src="<?php echo base_url(); ?>themes/js/jquery.2.1.1.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url(); ?>themes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--bootstrap select-->
<script src="<?php echo base_url(); ?>themes/js/dist/js/bootstrap-select.js" type="text/javascript"></script>
<!-- owlcarousel js -->
<script src="<?php echo base_url(); ?>themes/js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<!--internal js-->
<script src="<?php echo base_url(); ?>themes/js/internal.js" type="text/javascript"></script>

</body>

</html>

