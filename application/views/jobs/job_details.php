<?php $site_settings=$this->site_settings_model->get_site_settings(); ?>
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
                                $logo_image=$path.$logos['pictures_image'];
                            }

                            ?>

                            <?php
                        }
                        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <div class="twPc-div">
                 <?php
                        if(validation_errors())
                        {
                            ?>
                            <div class="alert  alert-danger alert_box">
                                <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                            class="fa fa-times"></i></a>
                                <?php echo validation_errors();?>
                            </div>

                            <?php
                        }
                        ?>
                       
                        <?php if (isset($error)) {


                            ?>
                            <div class="alert alert-danger alert_box">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                            class="fa fa-times"></i></a>
                                <strong>Error!</strong>  <?php echo isset($error)?$error:"" ; ?>.
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->flashdata('success') != "") {
                            ?>
                            <div class="alert alert-success alert_box">
                                <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                            class="fa fa-times"></i></a>
                                <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>.
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->flashdata('error') != "") {
                            ?>
                            <div class="alert alert-danger alert_box">
                                <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                            class="fa fa-times"></i></a>
                                <strong>Error !</strong> <?php echo $this->session->flashdata('error'); ?>.
                            </div>
                            <?php
                        }
                        ?>
                <?php 
                    $path="uploads/jobs/"
                ?>
                <a class="twPc-bg twPc-block" style="background-image: url(<?php echo($jobs['featured_img'] !="" && file_exists($path.$jobs['featured_img']))?base_url().$path.$jobs['featured_img']:base_url()."themes/images/banner_am.png"; ?>)"></a>

                <div>
                    <div class="twPc-button">
                        <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                        <a href="https://twitter.com/ccs_nepal" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @ccs_nepal</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        <!-- Twitter Button -->
                    </div>
            <?php $emp_path="uploads/company_employers/";?>
                    <a title="Nectar Digit Pvt. Ltd." href="https://twitter.com/ccs_nepal" class="twPc-avatarLink">
                        <img alt="Nectar Digit Pvt. Ltd." src="<?php  echo(isset($publisher) && $publisher !="admin")?$emp_path.$publisher['featured_img']:$logo_image; ?>" class="twPc-avatarImg">
                    </a>

                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <a href="https://twitter.com/ccs_nepal">
                                <?php
                                    echo(isset($publisher) && $publisher !="admin")?$publisher['company_employers']:$site_settings['site_name'];
                                ?>
                            </a>
                        </div>
                        <span>
				<a href="https://twitter.com/ccs_nepal">@<span>ccsnepal</span></a>
			</span>
                    </div>

                    <div class="twPc-divStats">
                        <ul class="twPc-Arrange">
                            <li class="twPc-ArrangeSizeFit">
                                <a href="<?php echo site_url('jobs-employer/'.$jobs['job_id']); ?>">
                                    <span class="twPc-StatLabel twPc-block">Total Job Post</span>
                                    <span class="twPc-StatValue">
                                        <?php 
                                            $id=(isset($publisher) && $publisher !="admin")?$jobs['employer_ref']:$jobs['admin_ref'];
                                            $field=(isset($publisher) && $publisher !="admin")?"employer_ref":"admin_ref";
                                            echo $this->crud->get_total_job_post($field,$id)['total']; 
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/ccs_nepal/following" title="885 Following">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">885</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/ccs_nepal/followers" title="1.810 Followers">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">100</span>
                                </a>
                            </li>
                        </ul>
                        <p>
                             <?php
                                    echo(isset($publisher) && $publisher !="admin")?$publisher['company_employers_detail']:$site_settings['site_name'];
                                ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2><?php echo $jobs['job_title']; ?></h2>
                    </div>
                    <div class="float-right">
                        <div class="float-right font-sm">
                            <meta itemprop="datePosted" content="01/03/2019 1:25 p.m.">

                            <p data-toggle="tooltip" data-placement="bottom" title="Jan. 11, 2019" class="mb-0 pt-2">
                                <span class="text-success">Views: 64</span> |

                                <span>Apply Before: <?php echo $this->crud->countdown_date($jobs['deadline']); ?></span>

                                <meta itemprop="validThrough" content="Jan. 11, 2019, 11:55 p.m.">
                            </p>

                        </div>
                    </div>
                </div>
                <div class="card-block">



                    <!-- Basic Job Information Card -->
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-header"><h3 ><strong>Basic Job Information</strong></h3></div>
                            <div class="card-block p-0 table-responsive">
                                <table class="table table-hover table-no-border m-0">
                                    <tbody><tr>
                                        <td width="33%">Job Category</td>
                                        <td width="3%">:</td>
                                        <td width="64%">

                                            <a href="<?php echo site_url('jobs-category/'.$jobs['job_category']); ?>">
                                                <?php echo $this->crud->get_detail($jobs['job_category'],'comc_id','tbl_company_category')['company_category']; ?>
                                            </a>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Job Level</td>
                                        <td>:</td>
                                        <td><a href="<?php echo site_url('jobs-level/'.$jobs['job_level']); ?>">
                                               <?php echo $this->crud->get_detail($jobs['job_level'],'joblevel_id','tbl_joblevel')['joblevel']; ?>
                                            </a></td>
                                    </tr>
                                     <tr>
                                        <td>Job Type</td>
                                        <td>:</td>
                                        <td><a href="<?php echo site_url('jobs-type/'.$jobs['job_type']); ?>">
                                               <?php echo $this->crud->get_detail($jobs['job_type'],'comem_id','tbl_jobtype')['jobtype']; ?>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <td>No. of Vacancy/s</td>
                                        <td>:</td>
                                        <td>[ <strong><?php echo $jobs['No_vacancy']; ?></strong> ]</td>
                                    </tr>

                                    <tr>
                                        <td>Employment Type</td>
                                        <td>:</td>
                                        <td itemprop="employmentType">

                                            <?php 
                                                if($jobs['availability_for'] =="full_time")
                                                {
                                                    echo "Full Time";
                                                }
                                                elseif($jobs['availability_for'] =="part_time")
                                                {
                                                    echo "Part Time";
                                                }
                                                else
                                                {
                                                    echo "Contract";
                                                }

                                            ?>

                                        </td>
                                    </tr>


                                    <tr itemprop="jobLocation" itemscope="" itemtype="http://schema.org/Place">
                                        <td>
                                            Job Location
                                        </td>
                                        <td>:</td>
                                        <td itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">

                                            <span itemprop="addressLocality" class="clearfix"><?php echo $jobs['job_location']; ?></span>
                                            <meta itemprop="addressRegion" content="Shantinagar, Kathmandu">

                                        </td>
                                    </tr>



                                    <tr>
                                        <td>Offered Salary</td>
                                        <td>:</td>
                                        <td>
                                            <?php 
                                                if($jobs['salary_type']=="0")
                                                {
                                                    echo $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount'];
                                                }
                                                else
                                                {
                                                    echo $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount']."-".$this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['max_amount'];
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Apply Before<span class="font-xs mx-2">(Deadline)</span></td>
                                        <td>:</td>
                                        <td><?php echo date_convert($jobs['deadline']); ?>
                                            (<?php echo $this->crud->countdown_date($jobs['deadline']); ?>)
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 mb-4">
                    <!-- END: / Basic Job Information Card -->



                    <!-- Job Specification Card -->
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-header p-2"><h3 class="mb-1 h6"><strong>Job Specification</strong></h3></div>
                            <div class="card-block p-0 table-responsive">
                                <table class="table table-hover table-no-border m-0">

                                    <tbody>
                                    <tr>
                                        <td width="33%">Education Level</td>
                                        <td width="3%">:</td>
                                        <td width="64%">
                                            <span itemprop="educationRequirements"> <?php echo $this->crud->get_detail($jobs['pref_edu'],'education_level_id','igc_education_level')['education_level']; ?></span>
                                            <small><?php echo ($jobs['require_edu']=="0")?"(Not Compulsory)":"";?></small>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="33%">Education Programe</td>
                                        <td width="3%">:</td>
                                        <td width="64%">
                                            <span itemprop="educationRequirements"> <?php echo $jobs['edu_program']; ?> </span>
                                            <small><?php echo ($jobs['require_edu']=="0")?"(Not Compulsory)":"";?></small>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="33%">Experience Required</td>
                                        <td width="3%">:</td>
                                        <td width="64%">
                                            <span itemprop="experienceRequirements"><?php echo $this->crud->get_exp_comparision($jobs['exp_year'])." ".$jobs['exp_year'];?> year <?php echo ($jobs['require_exp']=="0")?"(Not Compulsory)":"";?></span>
                                        </td>
                                    </tr>
                                    <?php if (!empty($jobs['skill_req_set'])): ?>
                                        <tr>
                                            <td width="33%">Skill Required</td>
                                            <td width="3%">:</td>
                                            <td width="64%">
                                                <span itemprop="experienceRequirements">
                                                    <?php foreach ($skills as $key => $skill): ?>
                                                         <a href="<?php echo site_url('jobs-skill/'.$skill); ?>" class="btn btn-info btn-sm"><?php echo $skill; ?></a>
                                                    <?php endforeach ?>
                                                    <?php echo ($jobs['require_skill']=="0")?"(Not Compulsory)":"";?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                    </tbody>
                                </table>

                                <div class="card-group">
                                    <div class="card border-0">
                                        <div class="card-block p-2"><h6 class="mb-1"><strong>Other Specification</strong>
                                            </h6></div>
                                        <div class="card-text p-2">
                                            <?php echo $jobs['job_specification']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($jobs['gender_sp']=='1'): ?>
                                     <div class="card-group">
                                        <div class="card border-0">
                                            <div class="card-block p-2"><h6 class="mb-1"><strong>Gender Specific</strong>
                                                </h6></div>
                                            <div class="card-text p-2">
                                                <?php echo $jobs['gender']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if ($jobs['age_sp']=='1'): ?>
                                     <div class="card-group">
                                        <div class="card border-0">
                                            <div class="card-block p-2"><h6 class="mb-1"><strong>Age Specific</strong>
                                                </h6></div>
                                            <div class="card-text p-2">
                                               <?php echo $this->crud->get_exp_comparision($jobs['age_lt'])." ".$jobs['age_group'];?> year
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 mb-4">
                    <!-- END: / Job Specification Card -->


                    <!-- Job Description Card -->

                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-block p-2"><h3 class="mb-1 h6"><strong>Job Description</strong></h3></div>
                            <div class="card-text p-2" itemprop="description">
                                 <?php echo $jobs['description']; ?>
                                 <p><strong>Applying Procedure:</strong></p><p>Interested candidates are requested to send their updated <strong>CV</strong> with portfolio at&nbsp;<a href=""><strong><?php echo $email; ?></strong></a></p><p><strong>OR,</strong></p>
                            </div>
                        </div>
                    </div>


                    <!-- END: / Job Description Card -->


                    <!-- APPLY ONLINE OR APPLYING PROCEDURE CHECK -->


                    <div class="mt-3">
        <?php 
            if(!empty($this->session->userdata('customer_id')))
            {
        ?>
            <button type="button" class="btn btn-success" onclick="location.href='<?php echo site_url('jobs_apply/apply/'.$jobs['job_id']); ?>'">
                <span class="icon-circle-add mr-2"></span>APPLY NOW
            </button>
        <?php
            }
            else
            {
        ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#login_no" data-remote="/jobseeker/modal/login/?next=/electrical-engineer-80/" >
                    <span class="icon-circle-add mr-2"></span>APPLY NOW
             </button>     
        <?php       
            }
        ?>               
            <div class="modal fade" id="login_no" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                 <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                 <h4 class="modal-title" id="exampleModalLabel1">Login</h4>
                                  </div>
                         <form action="<?php echo site_url('jobs_apply/login');?>" method="post">
                             <div class="modal-body">
                                       <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" data-validation="required email" class="form-control"  placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" data-validation="required confirmation length"  data-validation-length="max50" tabindex="2" class="form-control"  placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="pass_confirmation" data-validation="required length"  data-validation-length="max50" class="form-control" placeholder="Retype Password">
                                            <span id="retype_error"></span>
                                        </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-success">Sing In</button>
                              </div>
                              <input type="hidden" name="job_id" value="<?php echo $jobs['job_id']; ?>">
                        </form>
                        </div>
                   </div>
                 </div>
            </div>
             <hr class="mt-0 mb-4">
                    <!-- END: / APPLY ONLINE OR APPLYING PROCEDURE CHECK -->
                </div>



            </div>




        </div>
        <div class="col-md-4">




            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0 h6"><strong>Job Action</strong></h1>
                </div>
                <div class="card-block">
                    <div class="mb-2">


                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#login_no" data-remote="/jobseeker/modal/login/?next=/electrical-engineer-80/">
                            <span class="icon-circle-add mr-2"></span>APPLY NOW
                        </button>
                        <a href="" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#generic-modal-box" data-remote="/jobseeker/modal/login/?next=/electrical-engineer-80/">
                            <span class="icon-star-job mr-2"></span>Save Job
                        </a>




                    </div>

                    <div class="text-center">


                        <p>Login to apply for this Job.</p>
                        <button type="button" class="btn btn-outline-info mr-1" data-toggle="modal" data-target="#generic-modal-box1" data-remote="/jobseeker/modal/login/?next=/electrical-engineer-80/">
                            <span class="icon-profile-edit mr-1"></span>Login
                        </button>
                        <a href="/jobseeker/register/" class="btn btn-info">
                            <span class="icon-profile-edit mr-1"></span>Register Now
                        </a>
                    </div>

                </div>
            </div>

            <div id="mj_JDP_RB1"></div>
            <div id="mj_JDP_RB2"></div>
            <div id="mj_JDP_RB3"></div>
            <div id="mj_JDP_RB4"></div>






<?php 
    if(count($company_jobs) >0)
    {
?>
        <div class="card mt-3">
                <div class="card-header">
                    <h1 class="mb-0 h6"><strong>More Jobs By this Company</strong></h1>
                </div>
                <div class="card-block p-2">
            <?php 
                foreach($company_jobs['records'] as $key => $company_job)
                {
                     // if($company_job['job_id'] == $jobs['job_id'])
                     // {
            ?>

                    <div class="card-group mb-3">
                        <div class="card">
                            <div class="card-block p-2">
                                <a class="ui right corner label">
                                    <i class="icon-top-job icon text-success"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-3 col-md-3">
                                        <img class="mr-3 thumbnail p-1 border-1" src="<?php echo ($company_jobs['admin']=="1")?$logo_image:$emp_path.$this->crud->get_detail($company_jobs['emps'][$key],"come_id","tbl_company_employers")['featured_img']; ?>" alt="hello">
                                    </div>
                                    <div class="col-sm-9 col-md-9">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="<?php echo site_url('jobs/'.$company_job['job_id']); ?>">
                                                    <?php echo $company_job['job_title']; ?>
                                                </a>
                                            </li>
                                            <li>
                                                <small>
                                                    <a href="<?php echo site_url('jobs-employer/'.$company_job['job_id']); ?>">
                                                         <?php
                                    echo(isset($publisher) && $publisher !="admin")?$publisher['company_employers']:$site_settings['site_name'];
                                ?>
                                                    </a>
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-1 px-2 text-center">
                        <span class="text-danger font-sm">
                            <?php echo $this->crud->countdown_date($company_job['deadline']); ?> | Views: 35</span>
                            </div>
                        </div>
                    </div>
            <?php  
                     //}
                }
            ?>

                </div>

            </div>
<?php
    }
?>

            <div class="card mt-3 mb-0">
                <div class="card-header">
                    <h1 class="h6 m-0">
                        <strong>

                            Similar Jobs

                        </strong>
                    </h1>
                </div>
                <div class="card-block mt-0 mb-0 p-2">
        <?php 
            foreach($similar_jobs as $key => $similar_job)
            {
                if($similar_job['job_id'] != $jobs['job_id']){
                    $emp_path="uploads/company_employers/";
        ?>
                <div class="card-group mb-3">
                        <div class="card">
                            <div class="card-block p-2">
                                <a class="ui right corner label">
                                    <i class="icon-circle icon text-primary"></i>
                                </a>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="mr-3 thumbnail p-1 border-1" src="<?php echo ($similar_jobs_emps[$key]==0)?$logo_image:$emp_path.$this->crud->get_detail($similar_jobs_emps[$key],"come_id","tbl_company_employers")['featured_img']; ?>" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="<?php echo site_url('jobs/'.$similar_job['job_id']); ?>">
                                                    <?php echo $similar_job['job_title']; ?>
                                                </a>
                                            </li>
                                            <li>
                                                <small>
                                                    <a href="<?php echo site_url('jobs-employer/'.$similar_job['job_id']); ?>">
                                                       <?php echo ($similar_jobs_emps[$key]==0)?$site_settings['site_name']:$this->crud->get_detail($similar_jobs_emps[$key],"come_id","tbl_company_employers")['company_employers']; ?>
                                                    </a>
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-1 px-2 text-center">
                        <span class="text-danger font-sm">
                            <?php echo $this->crud->countdown_date($similar_job['deadline']); ?> | Views: 225</span>
                            </div>
                        </div>
                    </div>
        <?php      
                }          
            }
        ?>
                </div>
            </div>



        </div>
    </div>
</div>


