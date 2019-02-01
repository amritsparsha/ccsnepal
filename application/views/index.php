<style type="text/css" media="screen">
#search_job_result{
        opacity: 0.95;
        position: absolute;
        margin-top: -123px;
        margin-left: 34px;
        z-index: 2;
        width: 381px;
}    
</style>
<!-- slider start here -->
<div class="slideshow owl-carousel">
    <div class="item">
        <img src="themes/images/slider-1.jpg" alt="slider" title="slider" class="img-responsive"/>
        <div class="slide-detail">
            <div class="container">
                <div class="row">
                    <div class="slider-caption">

                        <div class="col-md-6 col-sm-6 col-xs-12 paddright pad-am">
                            <form class="am-form">
                                <div class="input-group">
                                    <input name="search_job" id="search_job" class="form-control" value="" autocomplete="off" placeholder="Job Search" type="text">
                                    <span>
									<button type="submit" class="btnsrch" onclick="location.href='jobs.html'"><i class="fa fa-search"></i> </button>
								</span>
                                </div>
                            </form> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-top-am">
                            <div class="col-sm-6">
                                <div class="reg-up-bg">
                                    <div class="am-rgb">
                                    <p>NEW TO CCSNEPAL</p>
                                        <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-user" aria-hidden="true"></i> Register with us</button>
                                    <h4>
                         <form method="post" action="<?php echo site_url('user_biodata/upload_cv'); ?>" enctype="multipart/form-data" id="upload_cv_form">
                                <input type="file" id="upload_cv" name="upload_cv" value="Upload CV" style="display: none">

                                <input type="button" style="border: none;background: none;color: #D92827"  value="Upload CV" onclick="document.getElementById('upload_cv').click();">
                         </form>
<script>
    $(document).ready(function(e){
        $('#upload_cv').change(function(e){
            //e.preventDefault();
            //var myForm = document.getElementById('upload_cv_form');
            if($('#upload_cv').val() != '')
            {
                $('#upload_cv_form').submit();
            }
            else
            {
                 document.getElementById('upload_cv_form').preventDefault();
            }
        });
    });
</script>

            
<!-- <script>
    $(document).ready(function(e){
        $('#upload_cv').change(function(e){
            e.preventDefault();
            var myForm = document.getElementById('upload_cv_form');
            if($('#upload_cv').val() != '')
            {
                $.ajax({
                    url:"<?php echo site_url('user_biodata/upload_cv'); ?>",
                    method : "POST",
                    data : new FormData(myForm),
                    contentType : false,
                    cache : false,
                    processData : false,
                    success : function(data){
                        console.log(data.email);
                        console.log(data.file_name);
                        document.getElementById('register_upload').click();
                        $('#register_email').val(data.email);
                    }
                });
            }
        });
    });
</script> -->
                                    </h4>
                                    <p class="am-p">Max 2 MB, doc, docx, rtf, pdf<br/>
                                        We will fill your details</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="reg-up-bg">
                                    <div class="am-rgb">


                                        <p class="amp-hi">
                                            Get best matched Jobs on your Email.<br />
                                            No Registration needed
                                        </p>
                                    <h4><a href="#" >CREATE JOB ALERT</a></h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- slider end here -->

<div id="partner">
    <div class="container">
        <!-- to show search results ===================================================================-->
        <ul class="list-group" id="search_job_result" style="">
            
        </ul>
       <!--  <button type="button" id="register_upload" class="btn btn-success" data-toggle="modal" data-target="#login_no" style="display: none;"></button>

                <div class="modal fade" id="login_no" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                     <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                     <h4 class="modal-title" id="exampleModalLabel1">Register</h4>
                                </div>
                        <form id="register-form" action="" method="post" role="form" style="display: block;">
                        <div class="modal-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select data-validation="required" id="selectbasic" class="form-control" name="customer_title" autocomplete="off" >
                                        <option >Title *</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Ms">Ms.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="first_name" class="form-control" id="first_name" data-validation="required length custom" data-validation-length="max50" data-validation-regexp="^([\w\s]+)$"  placeholder="First Name *" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="middle_name" class="form-control" id="middle_name" data-validation="length custom" data-validation-optional="true"  data-validation-length="max50" data-validation-regexp="^([\w\s]+)$" placeholder="Middle Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="last_name" class="form-control" data-validation="required length custom" data-validation-length="max50" autocomplete="off" data-validation-regexp="^([\w\s]+)$"  placeholder="Last Name *" ">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="text" name="email" class="form-control"  id="register_email" autocomplete="off" placeholder="Email Address *" data-validation="required email">

                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="text" name="country" class="form-control"  data-validation="country"  id="country-suggestions"  placeholder="Your Country *" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="city" class="form-control"  placeholder="City *" data-validation="required length custom"  data-validation-length="max150" data-validation-regexp="^([\w\s]+)$" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="contact_number" class="form-control"  data-validation="required length alphanumeric" data-validation-length="max50"   data-validation-allowing="-+ " placeholder="Contact Number *" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="password" name="password" class="form-control" data-validation="required length" id="password"  data-validation-length="max50" tabindex="2"   placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="password" name="confirm_password" class="form-control" data-validation="required length"  id="confirm_password" data-validation-length="max50"  placeholder="Password">
                                    <span id="retype_error"></span>
                                </div>
                            </div>
                        <p>Are you a already member ? <a href="<?php echo base_url(); ?>login">Click to Login</a>
                        </p>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <input type="submit" name="login-submit" id="register_submit" tabindex="4" class="waves-effect waves-light btn btn-danger btn-large full-btn" value="Sign Up">
                              </div>
                        </form>
                        </div>
                   </div>
                 </div>
                       </div>
                 </div>
<script>
    $('#register_submit').click(function (e){

        $('#retype_error').text('');
        var password= $('#password').val();
        var confirmpassword= $('#confirm_password').val();

        if(password == confirmpassword)
        {
            e.submit();
        }
        else 
        {

            $('#retype_error').text("Password Confirmation Can't Match");
            $("#retype_error").css("color","red");
            return false;
            //$('#register_upload').trigger('click');
            //$('#register_upload').click();
            $('#retype_error').text("Password Confirmation Can't Match");
            $("#retype_error").css("color","red");
            e.preventDefault();
        }


    });

</script> -->
        <!-- ==================================================================================== -->
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="partners" class="owl-carousel">
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/1.gif" class="img-responsive" alt="l1" title="l1" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/2.gif" class="img-responsive" alt="l2" title="l2" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/3.gif" class="img-responsive" alt="l3" title="l3" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/4.gif" class="img-responsive" alt="l4" title="l4" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/5.gif" class="img-responsive" alt="l5" title="l5" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/1.gif" class="img-responsive" alt="l1" title="l1" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 image">
                            <img src="themes/images/client/2.gif" class="img-responsive" alt="l2" title="l2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">

            </div>
        </div>
    </div>
</div>


<!-- Recent Jobs start here -->
<div class="browse">
    <div class="container" style="overflow: hidden">
        <div class="row">
            <!-- featured-jobs start here -->
            <div class="browse-jobs">
                <h1 class="job-title">Browse <span>Recent Jobs</span> Opportunities</h1>
                <div class="border"></div>
                <div class="border1"></div>
            </div>
            <!-- featured-jobs end here -->
            <?php foreach ($recent_jobs as $recent_job): ?>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="matter">
                        <a href="<?php echo site_url('jobs/'.$recent_job['job_id']); ?>">
                            <h4><?php echo $recent_job['job_title'] ?></h4>
                        </a>
                        <div class="boxbor">
                            <i class="fa fa-suitcase" aria-hidden="true"></i><?php echo ($recent_job['require_exp']=='0')?"Not Required":$recent_job['exp_year']; ?>
                            <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $recent_job['job_location']; ?>
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <?php 
                            if ($recent_job['salary_type']=='0'){
                                $currency=$this->crud->get_currency_symbol($recent_job['min_currency_type']);
                                echo $currency." ".$recent_job['min_amount']." ".$recent_job['salary_basis'];
                            }
                            else{
                                $currency=$this->crud->get_currency_symbol($recent_job['min_currency_type']);
                                echo $currency." ".$recent_job['min_amount']."-".$recent_job['max_amount']." ".$recent_job['salary_basis'];
                            }
                            ?>

                            <?php if ($recent_job['require_skill']): ?>
                                 <h5><span class="job-key">Key Skills:</span> <?php echo $recent_job['skill_req_set'];?></h5>   
                            <?php endif ?>
                        </div>

                    </div>
                </div>

            <?php endforeach ?>

            <div class="col-sm-12">
                <div class="view-more">
                    <a href="<?php echo site_url('jobs-list'); ?>">View All Jobs <i class="fa fa-chevron-right am-right"></i> </a>
                </div>
            </div>




        </div>
    </div>
</div>
<!-- Recent Jobs end here -->


<!-- featured start here -->
<div id="featured">
    <div class="container">
        <div class="row">
            <!-- featured-jobs start here -->
            <div class="featured-jobs">
                <h1>Find jobs by <span>Industry / Department / Cities </span></h1>
                <div class="border"></div>
                <div class="border1"></div>
            </div>
            <!-- featured-jobs end here -->
            <div class="col-md-12">

                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_default_1" data-toggle="tab">
                                    Industry </a>
                            </li>
                            <li>
                                <a href="#tab_default_2" data-toggle="tab">
                                    Department </a>
                            </li>
                            <li>
                                <a href="#tab_default_3" data-toggle="tab">
                                    Cities </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">

                                <ul class="job-list-cat">
                            <?php 
                                foreach ($comp_categories as $key => $comp_category):
                                $category_job = $this->crud->get_where_order('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_category'=>$comp_category['comc_id']),"created","DESC");
                            ?>
                                    <li><a href="<?php echo site_url('jobs-category/'.$comp_category['comc_id']); ?>"><?php echo $comp_category['company_category']; ?>  Jobs (<?php echo count($category_job); ?>)</a> </li>
                            <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <ul class="job-list-cat">
                                    <li><a href="#">Real Estate / Construction  Jobs  (89882)</a> </li>
                                    <li><a href="#">Hotel / Travel / Airlines  Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">Engineering / Technical / R&D  Jobs</span></a></li>
                                    <li><a href="#">Export - Import / Trading  Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">Advertising / MR / PR / Events  Jobs</span></a></li>
                                    <li><a href="#">Aviation / Airline / Aerospace  Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">Banking / Financial Services  Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">Medical / Healthcare  Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">IT Software - System Programming  Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">IT Software - Ecommerce / Internet Techn..   Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">Content Writing / Journalism / Editing  Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">IT Software - Telecom  Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">Cargo / Freight / Transportation / Packa..   Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">IT Hardware / Technical Support / Teleco..   Jobs  <span>(69021)</span></a></li>
                                    <li><a href="#">IT Software - Others  Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">Medical / Health Care / Hospitals  Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">Education / Teaching / Training / Counse..   Jobs<span>(69021)</span></a></li>
                                    <li><a href="#">Front Office / Executive Assistant / Dat..   Jobs <span>(69021)</span></a></li>
                                    <li><a href="#">Sales/Marketing  Jobs <span>(69021)</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <ul class="job-list-cat">
                                    <?php 
                                          foreach ($location_jobs as $key => $location):
                                    ?>
                                         <li>
                                            <a href="<?php echo site_url('jobs-location/'.$location['job_location']) ?>">
                                            <?php echo ucfirst($location['job_location']); ?> (<?php echo $location['total']; ?>)
                                             </a>
                                         </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured end here -->




<!-- browse start here -->
<div class="browse">
    <div class="container">
        <div class="row">
            <!-- featured-jobs start here -->
            <div class="browse-jobs">
                <h1>GET MORE FROM OUR JOB PORTAL</h1>
                <div class="border"></div>
                <div class="border1"></div>
            </div>
            <!-- featured-jobs end here -->

            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="morebaram">
                    <h4>Career Resources</h4>
                </div>
                <div class="matters">
                    <?php foreach ($latest_resources as $key => $resource): ?>
                        <div class="title-update">
                            <img src="<?php echo "uploads/content/".$resource['featured_img']; ?>" class="img-responsive" alt="pic-2" title="<?php echo $resource['content_page_title']; ?>" width="60px" height="60px">
                            <h5><a href="<?php echo site_url('career-resources/'.$resource['content_ref_no']); ?>"><?php echo $resource['content_page_title']; ?></a></h5>
                            <p><?php echo substr($resource['content_body'],0,150)."...."; ?></p>
                        </div>                        
                    <?php endforeach ?>
                </div>
                <div class="morebaram-footer">

                    <a href="<?php echo site_url('career-resources-list') ?>" class="btn btn-warning ">View All</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="morebaram">
                    <h4>Resource Center - Loksewa</h4>
                </div>
                <div class="matters">
                    <?php foreach ($latest_loksewa as $key => $loksewa): ?>
                        <div class="title-update">
                            <img src="<?php echo "uploads/content/".$loksewa['featured_img']; ?>" class="img-responsive" alt="pic-2" title="<?php echo $loksewa['content_page_title']; ?>" width="60px" height="60px">
                            <h5><a href="<?php echo site_url('loksewa/'.$loksewa['content_ref_no']); ?>"><?php echo $loksewa['content_page_title']; ?></a></h5>
                            <p><?php echo substr($loksewa['content_body'],0,150)."...."; ?></p>
                        </div>                        
                    <?php endforeach ?>
                </div>
                <div class="morebaram-footer">

                    <a href="<?php echo site_url('loksewa-list') ?>" class="btn btn-warning ">View All</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="morebaram">
                    <h4>Lates News</h4>
                </div>
                <div class="matters">
                    <?php foreach ($latest_news as $key => $news): ?>
                        <div class="title-update">
                            <img src="<?php echo "uploads/content/".$news['featured_img']; ?>" class="img-responsive" alt="pic-2" title="pic-2" width="60px" height="60px">
                            <h5><a href="<?php echo site_url('news/'.$news['content_ref_no']); ?>"><?php echo $news['content_page_title']; ?></a></h5>
                            <p><?php echo substr($news['content_body'],0,170)."...."; ?></p>
                        </div>                        
                    <?php endforeach ?>
                </div>
                <div class="morebaram-footer">

                    <a href="<?php echo site_url('news-list'); ?>" class="btn btn-warning ">View All</a>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- browse end here -->
<!-- testimonial start here -->
<div id="testimonial">
    <div class="container">
        <div class="row">
            <!-- testimonial-jobs start here -->
            <div class="testimonial-jobs">
                <h1>TESTIMONIAL</h1>
                <div class="border"></div>
                <div class="border1"></div>
            </div>
            <!-- testimonial-jobs end here -->

            <div id="testimonials" class="col-md-12 col-sm-12 col-xs-12 owl-carousel">
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-1.png" class="img-responsive" alt="pic-1" title="pic-1" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-2.png" class="img-responsive" alt="pic-2" title="pic-2" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-3.png" class="img-responsive" alt="pic-3" title="pic-3" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-1.png" class="img-responsive" alt="pic-1" title="pic-1" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-2.png" class="img-responsive" alt="pic-2" title="pic-2" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="photo">
                            <img src="themes/images/pic-3.png" class="img-responsive" alt="pic-3" title="pic-3" />
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, temporary  type  words </p>
                            <span class="fa fa-quote-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial end here -->




<!-- latest start here -->
<div id="latest">
    <div class="container">
        <div class="row">
            <!-- latest-candidate start here -->
            <div class="latest-candidate">
                <h1>Recruit Smar, Recruit Right</h1>

            </div>
            <!-- latest-candidate end here -->
            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="recuiter-info">
                    <i class="fa fa-users"></i>
                    <h4>More than 2.5 crore candidates</h4>
                </div>

            </div>
            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="recuiter-info">
                    <i class="fa fa-suitcase"></i>
                    <h4>Get smart responses with unique two-way matching technology</h4>
                </div>

            </div>
            <div class="col-md-4 col-sm-4  col-xs-12">
                <div class="recuiter-info">
                    <i class="fa fa-thumbs-up"></i>
                    <h4>Highlight your company as a great place to work</h4>
                </div>

            </div>

            <div class="col-sm-12">
                <div class="post-a-job text-center">
                    <a href="#" class="btn btn-danger btn-md">Post a Job</a>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- latest end here -->

<script>
    $(document).ready(function(e){

        load_result();

        function load_result(search)
        {
            $.ajax({
                url: "<?php echo site_url('home/search_ajax') ?>",
                method: "post",
                data:{search:search},
                success:function(data){
                    $('#search_job_result').html(data);
                }
            });  
        }

        $("#search_job").keyup(function(){
            var search = $(this).val();
            if( search != '')
            {
               load_result(search);
            }
            else
            {
                load_result();
            }
        });
    });
</script>           
