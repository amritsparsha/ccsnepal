
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo (isset($title) && $title !="") ? $title:""; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
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
                <?php if ($this->session->flashdata('error') != "") {

                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">POST JOB</h4>

                        <!-- Nav tabs -->
                        <div class="vtabs">
                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#job1" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-account-card-details"></i></span> <span class="hidden-xs-down"> Basic Job Information </span> </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-airplay"></i></span> <span class="hidden-xs-down"> Job Specification </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-altimeter"></i></span> <span class="hidden-xs-down"> Job Description </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-settings"></i></span> <span class="hidden-xs-down"> Vacancy Settings </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-brightness-auto"></i></span> <span class="hidden-xs-down"> Set AutoResponder </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job7" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Publish Job </span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            <div class="tab-content">
                                <div class="tab-pane active p-20" id="job1" role="tabpanel">
                                    <div class="card ">

                                        <div class="card-body">

                                                <div class="form-body">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Title<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="job_title"  size="50" data-validation="required" value="<?php echo (isset($jobs['job_title']) && $jobs['job_title'] !="") ? $jobs['job_title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">

                                                            <div class="col-md-12">
                                                                <label for="organization_size">Job Types<span class="asteriskField">*</span></label>
                                                                <select name="job_type" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            <?php foreach ($job_types as $key => $job_type): ?>
                                                                    <option value="<?php echo $job_type['comem_id']; ?>">
                                                                        <?php echo $job_type['jobtype']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                    </div>
                                                </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">No. of Vacancy<span class="asteriskField">*</span></label>
                                                                    <input type="number" name="No_vacancy"  size="50" data-validation="required" value="<?php echo (isset($jobs['No_vacancy']) && $jobs['No_vacancy'] !="") ? $jobs['No_vacancy']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Level<span class="asteriskField">*</span></label>
                                                                    <select name="job_level" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            <?php foreach ($job_levels as $key => $job_level): ?>
                                                                    <option value="<?php echo $job_level['joblevel_id']; ?>">
                                                                        <?php echo $job_level['joblevel']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Category(Industry)<span class="asteriskField">*</span></label>
                                                                        <select name="job_category" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <?php foreach ($job_category as $key => $job_cat): ?>
                                                                            <option value="<?php echo $job_cat['comc_id']; ?>">
                                                                                <?php echo $job_cat['company_category']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Sub Category</label>
                                                                    <input type="text" name="job_sub_category"  size="50"value="<?php echo (isset($jobs['job_sub_category']) && $jobs['job_sub_category'] !="") ? $jobs['job_sub_category']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Available For<span class="asteriskField">*</span></label>
                                                                    <select name="availability_for" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="full_time">Full Time</option>
                                                                        <option value="part_time">Part Time</option>
                                                                        <option value="contract">Contract</option>         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Deadline<span class="asteriskField">*</span></label>
                                                                    <input type="date" name="deadline"  size="50" data-validation="required" value="<?php echo (isset($jobs['deadline']) && $jobs['deadline'] !="") ? $jobs['deadline']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">

                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Location<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="job_location"  size="50" value="<?php echo (isset($jobs['job_location']) && $jobs['job_location'] !="") ? $jobs['job_location']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Salary Type:</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Fixed:
                                                                    <input type="radio" name="salary_type" id="salary_type_fixed" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['salary_type']) && $jobs['salary_type'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Range:
                                                                    <input type="radio" name="salary_type" id="salary_type_range" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['salary_type']) && $jobs['salary_type'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                           
                                                            <!--/span-->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Min offered Salary</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <select name="min_currency_type" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <?php foreach ($currencies as $key => $currency): ?>
                                                                            <option value="<?php echo $currency['currency_id']; ?>">
                                                                                <?php echo $currency['symbol']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="min_amount"  size="50" data-validation="required" value="<?php echo (isset($jobs['min_amount']) && $jobs['min_amount'] !="") ? $jobs['min_amount']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="salary_basis" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="daily" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "daily")?"selected":"";?>>
                                                                            Daily
                                                                        </option>
                                                                        <option value="weekly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "weekly")?"selected":"";?>>
                                                                            Weekly
                                                                        </option>
                                                                        <option value="monthly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "monthly")?"selected":"";?>>
                                                                            Monthly
                                                                        </option>
                                                                        <option value="yearly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "yearly")?"selected":"";?>>
                                                                            Annual
                                                                        </option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                    </div>
                                                </div>
                                                 <div class="row" id="range_salary">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Max offered Salary</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <select name="max_currency_type" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <?php foreach ($currencies as $key => $currency): ?>
                                                                            <option value="<?php echo $currency['currency_id']; ?>">
                                                                                <?php echo $currency['symbol']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="max_amount"  size="50" value="<?php echo (isset($jobs['max_amount']) && $jobs['max_amount'] !="") ? $jobs['max_amount']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="salary_basis"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="daily" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "daily")?"selected":"";?>>
                                                                            Daily
                                                                        </option>
                                                                        <option value="weekly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "weekly")?"selected":"";?>>
                                                                            Weekly
                                                                        </option>
                                                                        <option value="monthly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "monthly")?"selected":"";?>>
                                                                            Monthly
                                                                        </option>
                                                                        <option value="yearly" <?php echo (isset($jobs['salary_basis']) && $jobs['salary_basis'] == "yearly")?"selected":"";?>>
                                                                            Annual
                                                                        </option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next </span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-20" id="job2" role="tabpanel">
                                    <div class="card ">

                                        <div class="card-body">

                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Required Education</h4>
                                                        <hr>
                                                        <div class="form-group row">

                                                            <div class="col-md-12">
                                                                <label for="organization_size">Preferred Education<span class="asteriskField">*</span></label>
                                                                  <select name="pref_edu" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="0">Others</option>
                                                                    <?php foreach ($education_levels as $key => $education_level): ?>
                                                                            <option value="<?php echo $education_level['education_level_id']; ?>">
                                                                                <?php echo $education_level['education_level']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">

                                                            <div class="col-md-12">
                                                                <label for="organization_size">Education Program</label>
                                                                <input type="text" name="edu_program"  size="50" data-validation="required" value="<?php echo (isset($jobs['edu_program']) && $jobs['edu_program'] !="") ? $jobs['edu_program']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Required Education:</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="require_edu" id="require_edu" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['require_edu']) && $jobs['require_edu'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="require_edu" id="require_edu" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['require_edu']) && $jobs['require_edu'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                           
                                                            <!--/span-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                <h4>Required Work Experience</h4>
                                                    <hr>
                                               <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Required Experience:</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="require_exp" id="require_exp" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['require_exp']) && $jobs['require_exp'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="require_exp" id="require_exp" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['require_exp']) && $jobs['require_exp'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                           
                                                            <!--/span-->
                                                            </div>
                                                         </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="organization_size">Experience (in Years)</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-5">
                                                                 <select name="exp_lt"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="mtoet" <?php echo (isset($jobs['exp_lt']) && $jobs['exp_lt'] == "mtoet")?"selected":"";?>>
                                                                            More Than Or Equals To
                                                                        </option>
                                                                        <option value="ltoet" <?php echo (isset($jobs['exp_lt']) && $jobs['exp_lt'] == "ltoet")?"selected":"";?>>
                                                                            Less Than Or Equals To
                                                                        </option>
                                                                        <option value="mt" <?php echo (isset($jobs['exp_lt']) && $jobs['exp_lt'] == "mt")?"selected":"";?>>
                                                                            More Than
                                                                        </option>
                                                                        <option value="lt" <?php echo (isset($jobs['exp_lt']) && $jobs['exp_lt'] == "lt")?"selected":"";?>>
                                                                            Less Than
                                                                        </option>
                                                                        <option value="equal" <?php echo (isset($jobs['exp_lt']) && $jobs['exp_lt'] == "equal")?"selected":"";?>>
                                                                            Equals To
                                                                        </option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <select name="exp_year"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">  Year </option>
                                                            <?php 
                                                                for($i=1;$i<=50;$i++)
                                                                {
                                                            ?>
                                                                        <option value="<?php echo $i ?>" <?php echo (isset($jobs['exp_year']) && $jobs['exp_year'] == "$i")?"selected":"";?>>
                                                                            <?php echo "$i"." "."Years" ?>
                                                                        </option>

                                                            <?php
                                                                } 
                                                            ?>     
                                                                </select>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div> 
                                                <h4>Required Skills</h4>
                                                    <hr>
                                               <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Required Skills:</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="require_skill" id="require_skill" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['require_skill']) && $jobs['require_skill'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="require_skill" id="require_skill" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['require_skill']) && $jobs['require_skill'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                           
                                                            <!--/span-->
                                                            </div>
                                                         </div>
                                                </div>
                                               <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <label for="organization_size">Skills Required</label>
                                                            <input type="text" name="skill_req_set"  size="50" value="<?php echo (isset($jobs['skill_req_set']) && $jobs['skill_req_set'] !="") ? $jobs['skill_req_set']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                 </div>
                                                </div>
                                               <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <label for="organization_size">Other Job Specification</label>
                                                             <textarea id="job_specification" rows="5" cols="10" class="regular-text form-control required valid" name="job_specification" id="job_specification"><?php echo (isset($jobs['job_specification']) && $jobs['job_specification'] != "") ? $jobs['job_specification'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                 </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#job1" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                        </li>
                                        <li>
                                    <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                        </li>
                                    </ul>
                                </div>
                            <div class="tab-pane p-20" id="job3" role="tabpanel">
                                <div class="card ">

                                    <div class="card-body">

                                        <div class="form-body">

                                            <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Customize Job Details</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="customize_jd" id="customize_jd" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['customize_jd']) && $jobs['customize_jd'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="customize_jd" id="customize_jd" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['customize_jd']) && $jobs['customize_jd'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                           
                                                            <!--/span-->
                                                            </div>
                                                         </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <label for="organization_size">Description:</label>
                                                             <textarea id="description" rows="5" cols="10" class="regular-text form-control required valid" name="description" ><?php echo (isset($jobs['description']) && $jobs['description'] != "") ? $jobs['description'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                 </div>
                                                </div>

                                        </div>

                                    </div>

                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li >
                                </ul>
                            </div>
                            <div class="tab-pane p-20" id="job4" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">   
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Apply Online</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="apply_online" id="apply_online_yes" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['apply_online']) && $jobs['apply_online'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="apply_online" id="apply_online_no" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['apply_online']) && $jobs['apply_online'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                         
                                                </div>
                                            </div>
                                        </div>

                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row" id="apply_alt">
                                                        <div class="col-md-12">
                                                            <label for="organization_size">Apply Alternative:</label>
                                                             <textarea id="apply_alternative" rows="5" cols="10" class="regular-text form-control required valid" name="apply_alternative"><?php echo (isset($jobs['apply_alternative']) && $jobs['apply_alternative'] != "") ? $jobs['apply_alternative'] : ""; ?></textarea>
                                                        </div>
                                                </div>
                                              </div>
                                            </div>

                                          <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Is Gender Specific ?</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="gender_sp" id="gender_yes" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['gender_sp']) && $jobs['gender_sp'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="gender_sp" id="gender_no" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['gender_sp']) && $jobs['gender_sp'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                            </div>  
                                            </div>
                                            </div>

                                          <div class="row">
                                            <div class="col-md-12">   
                                            <div class="form-group row" id="gender">
                                                <div class="col-md-4">
                                                     <label for="organization_size">Gender </label>
                                                </div>
                                                <div class="col-md-8">
                                                                <select name="gender"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="male">Male</option> 
                                                                    <option value="female">Female</option> 
                                                                    <option value="other">Other</option>  
                                                                </select>
                                                  </div>
                                            </div>   
                                            </div></div>

                                          <div class="row">
                                            <div class="col-md-12">                                        
                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Is Age Specific ?</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="age_sp" id="age_sp_yes" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['age_sp']) && $jobs['age_sp'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="age_sp" id="age_sp_no" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['age_sp']) && $jobs['age_sp'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                </div>
                                            </div></div>
                                            
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row" id="age">
                                                            <div class="col-md-4">
                                                                    <label for="organization_size">Age ?</label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                 <select name="age_lt"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="mtoet" <?php echo (isset($jobs['age_lt']) && $jobs['age_lt'] == "mtoet")?"selected":"";?>>
                                                                            More Than Or Equals To
                                                                        </option>
                                                                        <option value="ltoet" <?php echo (isset($jobs['age_lt']) && $jobs['age_lt'] == "ltoet")?"selected":"";?>>
                                                                            Less Than Or Equals To
                                                                        </option>
                                                                        <option value="mt" <?php echo (isset($jobs['age_lt']) && $jobs['age_lt'] == "mt")?"selected":"";?>>
                                                                            More Than
                                                                        </option>
                                                                        <option value="lt" <?php echo (isset($jobs['age_lt']) && $jobs['age_lt'] == "lt")?"selected":"";?>>
                                                                            Less Than
                                                                        </option>
                                                                        <option value="equal" <?php echo (isset($jobs['age_lt']) && $jobs['age_lt'] == "equal")?"selected":"";?>>
                                                                            Equals To
                                                                        </option>

                                                                </select>
                                                            </div> 
                                                            <div class="col-md-4">
                                                            <input type="number" name="age_group"  size="50" value="<?php echo (isset($jobs['age_group']) && $jobs['age_group'] !="") ? $jobs['age_group']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                                <hr>

                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Show Organization Name: ?</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    Yes:
                                                                    <input type="radio" name="show_og_name" id="show_og_name_yes" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['show_og_name']) && $jobs['show_og_name'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    No:
                                                                    <input type="radio" name="show_og_name" id="show_og_name_no" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['show_og_name']) && $jobs['show_og_name'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div id="show_og_div" class="row">

                                          <div class="row">
                                            <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Organization Alternative Name:</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="og_alt_name"  size="50" value="<?php echo (isset($jobs['og_alt_name']) && $jobs['og_alt_name'] !="") ? $jobs['og_alt_name']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>

                                          <div class="row">
                                                <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Organization Alternative Description:</label>
                                                                   <textarea id="og_alt_description" rows="5" cols="10" class="regular-text form-control required valid" name="og_alt_description"><?php echo (isset($jobs['og_alt_description']) && $jobs['og_alt_description'] != "") ? $jobs['og_alt_description'] : ""; ?></textarea>
                                                               </div>
                                                            </div>
                                            </div>
                                        </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
                           
                            <div class="tab-pane p-20" id="job6" role="tabpanel">

                                <div class="card ">

                                    <div class="card-body">

                                        <div class="form-body">

                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                                <div class="col-md-8">
                                                                    <label for="organization_size">Do You want to Enable Auto Responder For Senior Developer ?</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    Yes:
                                                                    <input type="radio" name="auto_res_status" id="auto_res_status" size="50"  value="1" autocomplete="off" <?php echo (isset($jobs['auto_res_status']) && $jobs['auto_res_status'] =="1")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    No:
                                                                    <input type="radio" name="auto_res_status" id="auto_res_status" size="50"  value="0" autocomplete="off" <?php echo (isset($jobs['auto_res_status']) && $jobs['auto_res_status'] =="0")?"checked=\"checked\"":""; ?>>
                                                                </div>
                                                </div>
                                        </div>
                                    </div>

                                           <div class="row">
                                                <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Email Template</label>
                                                                   <textarea id="email_template" rows="5" cols="10" class="regular-text form-control required valid" name="email_template"><?php echo (isset($jobs['email_template']) && $jobs['email_template'] != "") ? $jobs['email_template'] : ""; ?></textarea>
                                                               </div>
                                                            </div>
                                            </div>
                                        </div>

                                        </div>

                                    </div>

                                </div>


                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job5" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                <a class="nav-link" data-toggle="tab" href="#job7" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>

                            </div>
                            <div class="tab-pane p-20" id="job7" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label for="PageType">Publish Status<span class="asterisk">*</span></label>
                                            <select name="publish_status" class="publish_status form-control">

                                                <option value="1"  <?php echo (isset($jobs['publish_status']) && $jobs['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                                <option value="0"  <?php echo (isset($jobs['publish_status']) && $jobs['publish_status'] =="0")?"selected":"";?>>No</option>



                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" name="job_id" value="<?php echo (isset($jobs['job_id']) && $jobs['job_id'] !="") ? $jobs['job_id']:""; ?>">
                                                    <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">


                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                <li>
                                        <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-airplay"></i></span> <span class="hidden-xs-down"> Submit</span></a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



    </div>
</div>


<script>
    $.validate();
</script>
<script>
    $(document).ready(function(){
        $("#salary_type_fixed").click(function(){
            $("#range_salary").hide();
        });
        $("#salary_type_range").click(function(){
            $("#range_salary").show();
        });
       $("#salary_type_range").each(function(){
            if($(this).is(":checked")) 
            {
                 $("#range_salary").show();
            }
            else
            {
                 $("#range_salary").hide();
            }
         });

       $("#gender_no").click(function(){
            $("#gender").hide();
        });
        $("#gender_yes").click(function(){
            $("#gender").show();
        });
       $("#gender_yes").each(function(){
            if($(this).is(":checked")) 
            {
                 $("#gender").show();
            }
            else
            {
                 $("#gender").hide();
            }
         });

       $("#age_sp_no").click(function(){
            $("#age").hide();
        });
        $("#age_sp_yes").click(function(){
            $("#age").show();
        });
       $("#age_sp_yes").each(function(){
            if($(this).is(":checked")) 
            {
                 $("#age").show();
            }
            else
            {
                 $("#age").hide();
            }
         });

       $("#apply_online_yes").click(function(){
            $("#apply_alt").hide();
        });
        $("#apply_online_no").click(function(){
            $("#apply_alt").show();
        });
       $("#apply_online_no").each(function(){
            if($(this).is(":checked")) 
            {
                 $("#apply_alt").show();
            }
            else
            {
                 $("#apply_alt").hide();
            }
         });

        $("#show_og_name_yes").click(function(){
            $("#show_og_div").hide();
        });
        $("#show_og_name_no").click(function(){
            $("#show_og_div").show();
        });
       $("#show_og_name_no").each(function(){
            if($(this).is(":checked")) 
            {
                 $("#show_og_div").show();
            }
            else
            {
                 $("#show_og_div").hide();
            }
         });
    });    
</script>
<script>

    CKEDITOR.replace( 'job_specification'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
     CKEDITOR.replace( 'description'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
     CKEDITOR.replace( 'apply_alternative'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
     CKEDITOR.replace( 'og_alt_description'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
     CKEDITOR.replace( 'email_template'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    CKEDITOR.replace( 'jobs_detail',{
    filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",
    filebrowserWindowWidth  : 800,
    filebrowserWindowHeight : 500
    });

</script>

<script>
    $('.add-tag').click(function(){
        var value = $(this).attr("id");
        $('#new_tags').val($('#new_tags').val() + value);
    });
</script>
<!-- script to remove tags-->
<script>
    $('.remtag').click(function(){

        var term = $(this).attr("id");
        var content = $('#content_id').val();

        var postData = {
            'term_id' : term,
            'content_id' : content
        };


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/rmv_content_tag',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>
<script>
    $(document).ready(function(e){

        var  value = $('.page_type').val();

        if(value == "Page")
        {

            $('#multi_tab').show();

        }

        else
        {

            $('#multi_tab').hide();


        }

        $('.page_type').change(function(){
            var  value = $('.page_type').val();
            if(value == "Page")
            {

                $('#multi_tab').show();

            }
            else
            {

                $('#multi_tab').hide();


            }
        })
    })
</script>

<script>

    $('#save_content').click(function(e)
    {

        $("#type_error").text("");
        var a=0;

        var ext1 =  $('#featuredimg').val().split('.').pop().toLowerCase();


        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
            {
                a = 0
            }
            else
            {

                a = 1;
            }
        }

        if(a != "1")
        {
            $("#type_error").text("Invalid Featured Image");
            $("#type_error").css("color", "red");

            e.preventDefault();
        }

        else{

            e.submit;

        }



    });
</script>


