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
                                    <input name="s" class="form-control" value="" placeholder="Job Search" type="text">
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
                                        <h4><a href="#">Upload CV</a> </h4>
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

<div class="browse">
    <div class="container">
        <div class="row">
            <!-- featured-jobs start here -->
            <div class="browse-jobs">
                <h1 class="job-title"><?php echo $title_main; ?> <span> <?php echo $title_second; ?></span> </h1>
                <div class="border"></div>
                <div class="border1"></div>
            </div>
            <!-- featured-jobs end here -->
<?php foreach ($all_jobs as $key => $all_job): ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="matter">
                    <a href="<?php echo site_url('jobs/'.$all_job['job_id']); ?>">
                        <h4><?php echo $all_job['job_title']; ?></h4>
                    </a>
                    <div class="boxbor">
                        <i class="fa fa-suitcase" aria-hidden="true"></i><?php echo ($all_job['require_exp']=='0')?"Not Required":$all_job['exp_year']; ?>
                        <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $all_job['job_location']; ?>
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <?php 
                            if ($all_job['salary_type']=='0'){
                                $currency=$this->crud->get_currency_symbol($all_job['min_currency_type']);
                                echo $currency." ".$all_job['min_amount']." ".$all_job['salary_basis'];
                            }
                            else{
                                $currency=$this->crud->get_currency_symbol($all_job['min_currency_type']);
                                echo $currency." ".$all_job['min_amount']."-".$all_job['max_amount']." ".$all_job['salary_basis'];
                            }
                            ?>
                       <?php if ($all_job['require_skill']): ?>
                                 <h5><span class="job-key">Key Skills:</span> <?php echo $all_job['skill_req_set'];?></h5>   
                        <?php endif ?>
                    </div>

                </div>
            </div>
<?php endforeach ?>

            <div class="col-sm-12">
                    <?php echo $this->pagination->create_links(); ?>
            </div>





        </div>
    </div>
</div>
<!-- Recent Jobs end here -->



