                
<!-- job start here -->
    <div id="blogs">
        <div class="container">
            <div class="row">
                <!-- FB comment -->
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <!-- ============= -->

                <div class="col-md-9 col-sm-9 col-xs-12 padd0">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-detail">
                                <?php 
                                    $path="uploads/content/"; 
                                    if(file_exists($path.$content['featured_img']) && $content['featured_img'] !=""){
                                ?>
                                    <div class="image">
                                        <img src="<?php echo $path.$content['featured_img']; ?>" title="blog-big" alt="blog-big" class="img-responsive">
                                    </div>
                                <?php
                                    }
                                ?>
                            <div class="content">
                                <h1><?php echo $menu; ?></h1>
                                <p><?php echo $content['content_body']; ?></p>
                            </div>
                            <div class="comment col-md-12 col-sm-12 col-xs-12">
                                <ul class="list-inline pull-left">
                                    <li><a href="#">By Admin</a></li>
                                    <li><a href="#">By <?php echo date_convert($content['created']); ?></a></li>
                                </ul>
                                <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="5"></div>
                               <!--  <ul class="list-inline pull-right">
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 632 Views</a></li>
                                </ul> -->
                            </div>
                            <!-- ============== -->
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-12 hidden-xs">
                    <div class="rightside">
                        <div class="border"></div>
                        <div class="search">
                            <input name="s" value="" placeholder="Search" type="text">
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="latest-post">
                            <h1>LATEST JOBS</h1>
                            <div class="border"></div>
                            <div class="border1"></div>
                        </div>
                        <?php foreach ($recent_jobs as $key => $recent_job): ?>
                             <div class="job-content">
                                <img src="<?php echo $employer_image[$key]; ?>" alt="<?php echo $recent_job['job_title']; ?>" title="<?php echo $recent_job['job_title']; ?>">
                                <h1>
                                    <a href="<?php echo site_url('jobs/'.$recent_job['job_id']); ?>">
                                        <?php echo $recent_job['job_title']; ?>
                                    </a>
                                </h1>
                                <ul class="list-inline">
                                    <li>
                                        <a href="<?php echo site_url('jobs-availability/'.$recent_job['availability_for']); ?>"><i class="fa fa-bookmark" aria-hidden="true"></i> 
                                            <?php 
                                                if($recent_job['availability_for'] =="full_time"){
                                                    echo "Full time";
                                                }
                                                elseif($recent_job['availability_for'] =="part_time")
                                                {
                                                    echo "Part Time";
                                                }
                                                else
                                                {
                                                    echo "Contract";
                                                }
                                            ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('jobs-location/'.$recent_job['job_location']); ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $recent_job['job_location']; ?></a>
                                    </li>
                                </ul>
                                <a href="apply-job-form.html">Apply Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        <?php endforeach ?>
                        <div class="career">
                            <img src="images/blog-banner.jpg" title="blog-banner" alt="blog-banner" class="img-responsive bannerchange">
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
