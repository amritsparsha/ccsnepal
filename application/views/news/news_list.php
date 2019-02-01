<!-- jobs start here -->
	<div id="jobs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- about-content start here -->
					<div class="jobs-content">
						<h1>News</h1>
						<ul class="list-inline">
							<li>
								<a href="#">Home</a>
							</li>
							<li>></li>
							<li>
								News
							</li>
						</ul>
					</div>
				<!-- jobs-content end here -->
				</div>
			</div>
		</div>
	</div>
<!-- jobs end here -->


<!-- job start here -->
	<div id="blogs">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12 padd0">
					<div id="bloggs">
						<?php foreach ($all_news as $key => $news): ?>						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<!-- box start here -->
								<div class="box">
									<a href="<?php echo site_url('news/latest_news/'.$news['content_ref_no']); ?>">
										<img src="<?php echo "uploads/content/".$news['featured_img']; ?>" alt="b8" title="b8" class="" height="221px" width="270px">
									</a>
									<div class="matter">
										<h1><a href="<?php echo site_url('news/latest_news/'.$news['content_ref_no']); ?>">
											<?php echo $news['content_page_title']; ?></a></h1>
										<p>
											<?php echo substr($news['content_body'],0,600); ?>...
										</p>
										<div class="pull-left">
											<ul class="list-inline">
												<li>
													<a href="#">By Admin</a>
												</li>
												<li>
													<a href="#">By <?php echo date_convert($news['created']); ?></a>
												</li>
											</ul>
										</div>
										<div class="pull-right">
											<a href="<?php echo site_url('news/latest_news/'.$news['content_ref_no']); ?>">Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
								<!-- box end here -->
							</div>
						<?php endforeach ?>
						
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
						<?php echo $this->pagination->create_links(); ?>
					</div>	
				
				</div>
				
				<div class="col-md-3 col-sm-3 col-xs-12 hidden-xs">
					<div class="rightside">
						<div class="border"></div>
						<div class="search">
							<input name="s" value="" placeholder="Search" type="text">
							<button type="button" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
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