
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('input[type="checkbox"]').click(function(){
                                var inputValue = $(this).attr("value");
                                $("." + inputValue).toggle();
                            });
                        });
                    </script>
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
                        <h4 class="card-title">Biodata</h4>

                        <!-- Nav tabs -->
                        <div class="vtabs">
                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#job1" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-account-card-details"></i></span> <span class="hidden-xs-down"> Job Preference </span> </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-airplay"></i></span> <span class="hidden-xs-down"> Basic Information </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-altimeter"></i></span> <span class="hidden-xs-down"> Education </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-settings"></i></span> <span class="hidden-xs-down"> Training </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job5" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-brightness-auto"></i></span> <span class="hidden-xs-down"> Work Experience </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Language </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job7" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-settings"></i></span> <span class="hidden-xs-down"> Social Account </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job8" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-brightness-auto"></i></span> <span class="hidden-xs-down"> Reference </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job9" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Other Information </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job10" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Publish </span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
<!-- ========================================================================================================================= -->
<!-- ================Job Preference========================1111============================================================= -->
                            <div class="tab-content">
                                <div class="tab-pane active p-20" id="job1" role="tabpanel">
                                    <div class="card ">
                                        <div class="card-body">
                                                <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <label for="organization_size">Job Categories<span class="asteriskField">*</span></label>
                                                                <select name="job_category" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">Job categories</option>
                                                            <?php foreach ($job_categories as $key => $job_category): ?>
                                                                    <option value="<?php echo $job_category['comc_id']; ?>" <?php echo (isset($jobs['job_category']) && $jobs['job_category'] == $job_category['comc_id'])?"selected":""; ?>>
                                                                        <?php echo $job_category['company_category']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Looking For:<span class="asteriskField">*</span></label>
                                                                    <select name="job_level" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">Job Level</option>
                                                            <?php foreach ($job_levels as $key => $job_level): ?>
                                                                    <option value="<?php echo $job_level['joblevel_id']; ?>" <?php echo (isset($jobs['job_level']) && $jobs['job_level'] == $job_level['joblevel_id'])?"selected":""; ?>>
                                                                        <?php echo $job_level['joblevel']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-12">
                                                                    <label for="organization_size">Available For<span class="asteriskField">*</span></label>
                                                                    <select name="availability_for" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="full_time" <?php echo (isset($jobs['availability_for']) && $jobs['availability_for']=="full_time")?"selected":""; ?>>
                                                                            Full Time
                                                                        </option>
                                                                        <option value="part_time" <?php echo (isset($jobs['availability_for']) && $jobs['availability_for']=="part_time")?"selected":""; ?>>
                                                                            Part Time
                                                                        </option>
                                                                        <option value="contract" <?php echo (isset($jobs['availability_for']) && $jobs['availability_for']=="contract")?"selected":""; ?>>
                                                                            Contract
                                                                        </option>         
                                                                    </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Specializations</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="specialization" data-role="tagsinput" size="50" value="<?php echo (isset($jobs['specialization']) && $jobs['specialization'] !="") ? $jobs['specialization']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Skills</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="skill" data-role="tagsinput" size="50" value="<?php echo (isset($jobs['skill']) && $jobs['skill'] !="") ? $jobs['skill']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Expected Salary</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div calss="col-md-2">
                                                                    <select name="exp_currency_type" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <?php foreach ($currencies as $key => $currency): ?>
                                                                            <option value="<?php echo $currency['currency_id']; ?>" <?php echo (isset($jobs['exp_currency_type']) && $jobs['exp_currency_type'] ==$currency['currency_id'])?"selected":""; ?>>
                                                                                <?php echo $currency['symbol']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                                </div>
                                                                <div calss="col-md-3">
                                                                    <select name="exp_ref" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="above" <?php echo (isset($jobs['exp_ref']) && $jobs['exp_ref']=="above")?"selected":""; ?>>Above</option>
                                                                        <option value="below" <?php echo (isset($jobs['exp_ref']) && $jobs['exp_ref']=="below")?"selected":""; ?>>Below</option>
                                                                        <option value="equal" <?php echo (isset($jobs['exp_ref']) && $jobs['exp_ref']=="equal")?"selected":""; ?>>Equal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="exp_amount"  size="50" data-validation="required" value="<?php echo (isset($jobs['exp_amount']) && $jobs['exp_amount'] !="") ? $jobs['exp_amount']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                                <div calss="col-md-3">
                                                                    <select name="exp_salary_basis" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="daily" <?php echo (isset($jobs['exp_salary_basis']) && $jobs['exp_salary_basis'] == "daily")?"selected":"";?>>
                                                                            Daily
                                                                        </option>
                                                                        <option value="weekly" <?php echo (isset($jobs['exp_salary_basis']) && $jobs['exp_salary_basis'] == "weekly")?"selected":"";?>>
                                                                            Weekly
                                                                        </option>
                                                                        <option value="monthly" <?php echo (isset($jobs['exp_salary_basis']) && $jobs['exp_salary_basis'] == "monthly")?"selected":"";?>>
                                                                            Monthly
                                                                        </option>
                                                                        <option value="yearly" <?php echo (isset($jobs['exp_salary_basis']) && $jobs['exp_salary_basis'] == "yearly")?"selected":"";?>>
                                                                            Annual
                                                                        </option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Current Salary</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div calss="col-md-2">
                                                                    <select name="cur_currency_type" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <?php foreach ($currencies as $key => $currency): ?>
                                                                            <option value="<?php echo $currency['currency_id']; ?>" <?php echo (isset($jobs['cur_currency_type']) && $jobs['cur_currency_type'] ==$currency['currency_id'])?"selected":""; ?>>
                                                                                <?php echo $currency['symbol']; ?>
                                                                            </option>
                                                                    <?php endforeach ?>    
                                                                        </select>
                                                                </div>
                                                                <div calss="col-md-3">
                                                                    <select name="cur_ref" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="above" <?php echo (isset($jobs['cur_ref']) && $jobs['cur_ref']=="above")?"selected":""; ?>>Above</option>
                                                                        <option value="below" <?php echo (isset($jobs['cur_ref']) && $jobs['cur_ref']=="below")?"selected":""; ?>>Below</option>
                                                                        <option value="equal" <?php echo (isset($jobs['cur_ref']) && $jobs['cur_ref']=="equal")?"selected":""; ?>>Equal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="cur_amount"  size="50" data-validation="required" value="<?php echo (isset($jobs['cur_amount']) && $jobs['cur_amount'] !="") ? $jobs['cur_amount']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                                <div calss="col-md-3">
                                                                    <select name="cur_salary_basis" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="daily" <?php echo (isset($jobs['cur_salary_basis']) && $jobs['cur_salary_basis'] == "daily")?"selected":"";?>>
                                                                            Daily
                                                                        </option>
                                                                        <option value="weekly" <?php echo (isset($jobs['cur_salary_basis']) && $jobs['cur_salary_basis'] == "weekly")?"selected":"";?>>
                                                                            Weekly
                                                                        </option>
                                                                        <option value="monthly" <?php echo (isset($jobs['cur_salary_basis']) && $jobs['cur_salary_basis'] == "monthly")?"selected":"";?>>
                                                                            Monthly
                                                                        </option>
                                                                        <option value="yearly" <?php echo (isset($jobs['cur_salary_basis']) && $jobs['cur_salary_basis'] == "yearly")?"selected":"";?>>
                                                                            Annual
                                                                        </option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="organization_size">Career Objective Summary</label>
                                                             <textarea rows="5" cols="10" class="regular-text form-control required valid" name="career_obj_summary" id="career_obj_summary"><?php echo (isset($jobs['career_obj_summary']) && $jobs['career_obj_summary'] != "") ? $jobs['career_obj_summary'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                 </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Preference Location<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="job_location"  size="50" value="<?php echo (isset($jobs['job_location']) && $jobs['job_location'] !="") ? $jobs['job_location']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <!-- ------------- -->
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next </span></a>
                                        </li>
                                    </ul>
                                </div>
<!-- ========================================================================================================================= -->
<!-- ================Basic Information========================222222============================================================= -->
                                <div class="tab-pane p-20" id="job2" role="tabpanel">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="form-body">

                                                 <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Name</label>
                                                                    <input type="text" name="name"  size="50" value="<?php echo (isset($jobs['name']) && $jobs['name'] !="") ? $jobs['name']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-12">
                                                                    <label for="organization_size">Gender<span class="asteriskField">*</span></label>
                                                                    <select name="gender" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="">-----gender-----</option>
                                                                        <option value="1" <?php echo (isset($jobs['gender']) && $jobs['gender']=="1")?"selected":""; ?>>Male</option>
                                                                        <option value="0" <?php echo (isset($jobs['gender']) && $jobs['gender']=="0")?"selected":""; ?>>Female</option>
                                                                        <option value="2" <?php echo (isset($jobs['gender']) && $jobs['gender']=="2")?"selected":""; ?>>Others</option>         
                                                                    </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Date Of Birth<span class="asteriskField">*</span></label>
                                                                    <input type="date" data-validation="required" name="dob"  size="50" value="<?php echo (isset($jobs['dob']) && $jobs['dob'] !="") ? $jobs['dob']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-12">
                                                                    <label for="organization_size">Marital Status<span class="asteriskField">*</span></label>
                                                                    <select name="marital_status" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="">-----Marital Status----</option>
                                                                        <option value="1" <?php echo (isset($jobs['marital_status']) && $jobs['marital_status']=="1")?"selected":""; ?>>Married</option>
                                                                        <option value="0" <?php echo (isset($jobs['marital_status']) && $jobs['marital_status']=="0")?"selected":""; ?>>Unmarried</option>       
                                                                    </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <label for="organization_size">Religions<span class="asteriskField">*</span></label>
                                                                <select name="religion" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            <?php foreach ($religions as $key => $religion): ?>
                                                                    <option value="<?php echo $religion['religion_id']; ?>" <?php echo (isset($jobs['religion']) && $jobs['religion']==$religion['religion_id'])?"selected":""; ?>>
                                                                        <?php echo $religion['religion_name']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <label for="organization_size">Nationality<span class="asteriskField">*</span></label>
                                                                <select name="country" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                            <?php foreach ($countries as $key => $country): ?>
                                                                    <option value="<?php echo $country['id']; ?>" <?php echo (isset($jobs['country']) && $jobs['country']==$country['id'])?"selected":""; ?>>
                                                                        <?php echo $country['name']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Current Address<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="cur_address" data-validation="required" size="50" value="<?php echo (isset($jobs['cur_address']) && $jobs['cur_address'] !="") ? $jobs['cur_address']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Permanent Address<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="per_address" data-validation="required" size="50" value="<?php echo (isset($jobs['per_address']) && $jobs['per_address'] !="") ? $jobs['per_address']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Contact Number</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <select name="ref_number" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="">--------</option>
                                                                        <option value="home" <?php echo (isset($jobs['ref_number']) && $jobs['ref_number']=="home")?"selected":""; ?>>Home</option>
                                                                        <option value="work" <?php echo (isset($jobs['ref_number']) && $jobs['ref_number']=="work")?"selected":""; ?>>Work</option>
                                                                        <option value="mobile" <?php echo (isset($jobs['ref_number']) && $jobs['ref_number']=="mobile")?"selected":""; ?>>Mobile</option>         
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="contact_number"  size="50" data-validation="required" value="<?php echo (isset($jobs['contact_number']) && $jobs['contact_number'] !="") ? $jobs['contact_number']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                            <!-- -------- -->
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
<!-- ========================================================================================================================= -->
<!-- ================Education========================33333333333============================================================= -->
                            <div class="tab-pane p-20" id="job3" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div  id="education">
                                <?php 
                                    if (isset($jobs['education_level']) && $jobs['education_level'] !=""): 
                                        $education_levels=explode("***",$jobs['education_level']); 
                                        $edu_program=explode("***",$jobs['edu_program']);
                                        $edu_board=explode("***",$jobs['edu_board']);
                                        $edu_institute=explode("***",$jobs['edu_institute']);
                                        $edu_cur_std=explode("***",$jobs['edu_cur_std']);
                                        $marks_ref=explode("***",$jobs['marks_ref']);
                                        $marks=explode("***",$jobs['marks']);
                                        $grad_year=explode("***",$jobs['grad_year']);
                                        $grad_month=explode("***",$jobs['grad_month']);
                                        $start_year=explode("***",$jobs['start_year']);
                                        $start_month=explode("***",$jobs['start_month']);

                                ?>
                                    <?php foreach ($education_levels as $key => $education_level): ?>
                                            <div class="row" id="education_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size"> Education Level</label>
                                                                    <select name="education_level[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">----------</option>
                                                            <?php foreach ($educations as $education): ?>
                                                                    <option value="<?php echo $education['education_level_id']; ?>" <?php echo ($education_levels[$key] == $education['education_level_id'])?"selected":""; ?> >
                                                                        <?php echo $education['education_level']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Education Program</label>
                                                                    <input type="text" name="edu_program[]" id="edu_program" size="50" value="<?php echo $edu_program[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Education Board</label>
                                                                    <input type="text" name="edu_board[]"  size="50" value="<?php echo $edu_board[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Name Of Institute</label>
                                                                    <input type="text" name="edu_institute[]"  size="50" value="<?php echo $edu_institute[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="edu_cur_std[]" id="edu_cur_std_h" value="0"/>
                                                                    <input type="checkbox" class="edu_cur_std_cl" name="edu_cur_std[]" id="edu_cur_std" size="50" <?php echo ($edu_cur_std[$key]=="1")?"checked=\"checked\"":""; ?> value="1" /> &nbsp;&nbsp; Currenty Studying here ?
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div id="edu_cur_std_no">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Marks Secured</label>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <select name="marks_ref[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                            <option value="">--Marks In--</option>
                                                                            <option value="percentage" <?php echo ($marks_ref[$key] == "percentage")?"selected":"";?>>
                                                                                Percentage
                                                                            </option>
                                                                            <option value="gpa" <?php echo ($marks_ref[$key] == "gpa")?"selected":"";?>>
                                                                                GPA
                                                                            </option>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="marks[]" id="marks" size="50" value="<?php echo $marks[$key]; ?>" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Graduation Year</label>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <div class="col-md-6">
                                                        <?php $year=date('Y'); ?>
                                                                        <select name="grad_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                        <?php 
                                                            for ($y=$year; $y >=1950 ; $y--) 
                                                            {
                                                        ?>
                                                                            <option value="<?php echo $y ?>" <?php echo ($grad_year[$key] == $y)?"selected":"";?>>
                                                                                <?php echo $y; ?>
                                                                            </option>
                                                        <?php
                                                            }
                                                        ?>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select name="grad_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                                <?php foreach ($months as $month): ?>
                                                                        <option value="<?php echo $month['month_name']; ?>" <?php echo ($grad_month[$key] == $month['month_name'])?"selected":""; ?> >
                                                                            <?php echo $month['month_name']; ?>
                                                                        </option>
                                                                <?php endforeach ?>    
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div id="edu_cur_std_yes">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Start Year</label>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <div class="col-md-6">
                                                        <?php $year=date('Y'); ?>
                                                                        <select name="start_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                        <?php 
                                                            for ($y=$year; $y >=1950 ; $y--) 
                                                            {
                                                        ?>
                                                                            <option value="<?php echo $y ?>" <?php echo ($start_year[$key] == $y)?"selected":"";?>>
                                                                                <?php echo $y; ?>
                                                                            </option>
                                                        <?php
                                                            }
                                                        ?>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select name="start_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                                <?php foreach ($months as $month): ?>
                                                                        <option value="<?php echo $month['month_name']; ?>" <?php echo ($start_month[$key] == $month['month_name'])?"selected":""; ?> >
                                                                            <?php echo $month['month_name']; ?>
                                                                        </option>
                                                                <?php endforeach ?>    
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="education_add">Add Education</button>
                                                </div>
                                            </div>
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ========================================================================================================================= -->
<!-- ================Training========================444444444444============================================================= -->
                            <div class="tab-pane p-20" id="job4" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div  id="training">
                                <?php 
                                    if (isset($jobs['training_name']) && $jobs['training_name'] !=""): 
                                        $training_names=explode("***",$jobs['training_name']); 
                                        $institution_names=explode("***",$jobs['institution_name']);
                                        $duration=explode("***",$jobs['duration']);
                                        $duration_basis=explode("***",$jobs['duration_basis']);
                                        $comp_year=explode("***",$jobs['comp_year']);
                                        $comp_month=explode("***",$jobs['comp_month']);
                                ?>
                                    <?php foreach ($training_names as $key => $training_name): ?>
                                            <div class="row" id="training_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size"> Training Name</label>
                                                                    <input type="text" name="training_name[]" id="training_name" size="50" value="<?php echo $training_name; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Institution Name</label>
                                                                    <input type="text" name="institution_name[]" id="institution_name" size="50" value="<?php echo $institution_names[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Duration</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div class="cold-md-6">
                                                                    <input type="text" name="duration[]"  size="50" data-validation="required" value="<?php echo $duration[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                                <div calss="col-md-6">
                                                                    <select name="duration_basis[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="day" <?php echo ($duration_basis[$key] == "day")?"selected":"";?>>
                                                                            Day
                                                                        </option>
                                                                        <option value="week" <?php echo ($duration_basis[$key] == "week")?"selected":"";?>>
                                                                            Week
                                                                        </option>
                                                                        <option value="month" <?php echo ($duration_basis[$key] == "month")?"selected":"";?>>
                                                                            Month
                                                                        </option>
                                                                        <option value="year" <?php echo ($duration_basis[$key] == "year")?"selected":"";?>>
                                                                            Year
                                                                        </option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Completion</label>
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <div class="col-md-6">
                                                    <?php $year=date('Y'); ?>
                                                                    <select name="comp_year[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="">---year----</option>
                                                    <?php 
                                                        for ($y=$year; $y >=1950 ; $y--) 
                                                        {
                                                    ?>
                                                                        <option value="<?php echo $y ?>" <?php echo ($comp_year[$key] == $y)?"selected":"";?>>
                                                                            <?php echo $y; ?>
                                                                        </option>
                                                    <?php
                                                        }
                                                    ?>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="comp_month[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                        <option value="">---month----</option>
                                                            <?php foreach ($months as $month): ?>
                                                                    <option value="<?php echo $month['month_name']; ?>" <?php echo ($comp_month[$key] == $month['month_name'])?"selected":""; ?> >
                                                                        <?php echo $month['month_name']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="training_add">Add Training</button>
                                                </div>
                                            </div>
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job5" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ========================================================================================================================= -->
<!-- ================Work Experience========================555555555555============================================================= -->
                            <div class="tab-pane p-20" id="job5" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div  id="work_experience">
                                <?php 
                                    if (isset($jobs['org_name']) && $jobs['org_name'] !=""): 
                                        $org_names=explode("***",$jobs['org_name']); 
                                        $org_nature=explode("***",$jobs['org_nature']);
                                        $exp_job_location=explode("***",$jobs['exp_job_location']);
                                        $exp_job_title=explode("***",$jobs['exp_job_title']);
                                        $exp_job_category=explode("***",$jobs['exp_job_category']);
                                        $exp_job_level=explode("***",$jobs['exp_job_level']);
                                        $exp_cur_work=explode("***",$jobs['exp_cur_work']);
                                        $exp_start_year=explode("***",$jobs['exp_start_year']);
                                        $exp_start_month=explode("***",$jobs['exp_start_month']);
                                        $exp_end_year=explode("***",$jobs['exp_end_year']);
                                        $exp_end_month=explode("***",$jobs['exp_end_month']);
                                        $exp_duties=explode("***",$jobs['exp_duties']);

                                ?>
                                    <?php foreach ($org_names as $key => $org_name): ?>
                                            <div class="row" id="work_experience_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Organization Name<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="org_name[]" id="org_name" data-validation="required" size="50" value="<?php echo $org_name; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Nature Of Organization</label>
                                                                    <select name="org_nature[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">----------</option>
                                                            <?php foreach ($org_natures as $rows): ?>
                                                                    <option value="<?php echo $rows['org_nature_id']; ?>" <?php echo ($org_nature[$key] == $rows['org_nature_id'])?"selected":""; ?> >
                                                                        <?php echo $rows['org_nature_title']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Location<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="exp_job_location[]" id="exp_job_location" data-validation="required" size="50" value="<?php echo $exp_job_location[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Title<span class="asteriskField">*</span></label>
                                                                    <input type="text" name="exp_job_title[]" id="exp_job_title" data-validation="required" size="50" value="<?php echo $exp_job_title[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Category</label>
                                                                    <select name="exp_job_category[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">----------</option>
                                                            <?php foreach ($job_categories as $rows): ?>
                                                                    <option value="<?php echo $rows['comc_id']; ?>" <?php echo ($exp_job_category[$key] == $rows['comc_id'])?"selected":""; ?> >
                                                                        <?php echo $rows['company_category']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Job Level</label>
                                                                    <select name="exp_job_level[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">----------</option>
                                                            <?php foreach ($job_levels as $rows): ?>
                                                                    <option value="<?php echo $rows['joblevel_id']; ?>" <?php echo ($exp_job_level[$key] == $rows['joblevel_id'])?"selected":""; ?> >
                                                                        <?php echo $rows['joblevel']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="exp_cur_work[]" id="exp_cur_work_h" value="0"/>
                                                                    <input type="checkbox" class="exp_cur_work_cl" name="exp_cur_work[]" id="exp_cur_work" size="50" <?php echo ($exp_cur_work[$key]=="1")?"checked=\"checked\"":""; ?> value="1" /> &nbsp;&nbsp; Currenty Studying here ?
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                 <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size">Start Date</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                        <?php $year=date('Y'); ?>
                                                                        <select name="exp_start_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                        <?php 
                                                            for ($y=$year; $y >=1950 ; $y--) 
                                                            {
                                                        ?>
                                                                            <option value="<?php echo $y ?>" <?php echo ($exp_start_year[$key] == $y)?"selected":"";?>>
                                                                                <?php echo $y; ?>
                                                                            </option>
                                                        <?php
                                                            }
                                                        ?>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select name="exp_start_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                                <?php foreach ($months as $month): ?>
                                                                        <option value="<?php echo $month['month_name']; ?>" <?php echo ($exp_start_month[$key] == $month['month_name'])?"selected":""; ?> >
                                                                            <?php echo $month['month_name']; ?>
                                                                        </option>
                                                                <?php endforeach ?>    
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    <div id="exp_cur_work_no">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                 <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size">End Date</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                        <?php $year=date('Y'); ?>
                                                                        <select name="exp_end_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                        <?php 
                                                            for ($y=$year; $y >=1950 ; $y--) 
                                                            {
                                                        ?>
                                                                            <option value="<?php echo $y ?>" <?php echo ($exp_end_year[$key] == $y)?"selected":"";?>>
                                                                                <?php echo $y; ?>
                                                                            </option>
                                                        <?php
                                                            }
                                                        ?>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select name="exp_end_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>
                                                                <?php foreach ($months as $month): ?>
                                                                        <option value="<?php echo $month['month_name']; ?>" <?php echo ($exp_end_month[$key] == $month['month_name'])?"selected":""; ?> >
                                                                            <?php echo $month['month_name']; ?>
                                                                        </option>
                                                                <?php endforeach ?>    
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Duties And Responsibility</label>
                                                                    <textarea rows="5" cols="10" class="regular-text form-control required valid" name="exp_duties[]" id="exp_duties[]"><?php echo $exp_duties[$key]; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                             
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="work_experience_add">Add Work Experience</button>
                                                </div>
                                            </div>    
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ========================================================================================================================= -->
<!-- ================Language========================66666666666============================================================= -->
                            <div class="tab-pane p-20" id="job6" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                             <div  id="language">
                                <?php 
                                     if (isset($jobs['language']) && $jobs['language'] !=""): 
                                         $langs=explode("***",$jobs['language']); 
                                         $read_rating=explode("***",$jobs['read_rating']);
                                         $write_rating=explode("***",$jobs['write_rating']);
                                         $speak_rating=explode("***",$jobs['speak_rating']); 
                                         $listen_rating=explode("***",$jobs['listen_rating']); 
                                         

                                ?>
                                    <?php foreach ($langs as $key => $lang): ?>
                                            <div class="row" id="language_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Languages<span class="asteriskField">*</span></label>
                                                                    <select name="language[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    <option value="">----------</option>
                                                            <?php foreach ($languages as $rows): ?>
                                                                    <option value="<?php echo $rows['language_id']; ?>" <?php echo ($lang == $rows['language_id'])?"selected":""; ?> >
                                                                        <?php echo $rows['language']; ?>
                                                                    </option>
                                                            <?php endforeach ?>    
                                                                </select>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label style="margin-left: 42px">Reading</label>
                                                                </div>
                                                            </div>
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                    <ul class="rate-area">
                                                                          <input type="radio" id="5-star<?php echo $key; ?>" name="read_rating<?php echo $key; ?>" value="5" <?php echo ($read_rating[$key]=="5")?"checked=\"checked\"":""; ?> /><label for="5-star<?php echo $key; ?>" title="Amazing">5 stars</label>
                                                                          <input type="radio" id="4-star<?php echo $key; ?>" name="read_rating<?php echo $key; ?>" value="4" <?php echo ($read_rating[$key]=="4")?"checked=\"checked\"":""; ?>/><label for="4-star<?php echo $key; ?>" title="Good">4 stars</label>
                                                                          <input type="radio" id="3-star<?php echo $key; ?>" name="read_rating<?php echo $key; ?>" value="3" <?php echo ($read_rating[$key]=="3")?"checked=\"checked\"":""; ?>/><label for="3-star<?php echo $key; ?>" title="Average">3 stars</label>
                                                                          <input type="radio" id="2-star<?php echo $key; ?>" name="read_rating<?php echo $key; ?>" value="2" <?php echo ($read_rating[$key]=="2")?"checked=\"checked\"":""; ?>/><label for="2-star<?php echo $key; ?>" title="Not Good">2 stars</label>
                                                                          <input type="radio" id="1-star<?php echo $key; ?>" name="read_rating<?php echo $key; ?>" value="1" <?php echo ($read_rating[$key]=="1")?"checked=\"checked\"":""; ?>/><label for="1-star<?php echo $key; ?>" title="Bad">1 star</label>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label style="margin-left: 42px">Writing</label>
                                                                </div>
                                                            </div>
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                    <ul class="rate-area">
                                                                          <input type="radio" id="write_5-star<?php echo $key; ?>" name="write_rating<?php echo $key; ?>" value="5" <?php echo ($write_rating[$key]=="5")?"checked=\"checked\"":""; ?>/><label for="write_5-star<?php echo $key; ?>" title="Amazing">5 stars</label>
                                                                          <input type="radio" id="write_4-star<?php echo $key; ?>" name="write_rating<?php echo $key; ?>" value="4" <?php echo ($write_rating[$key]=="4")?"checked=\"checked\"":""; ?>/><label for="write_4-star<?php echo $key; ?>" title="Good">4 stars</label>
                                                                          <input type="radio" id="write_3-star<?php echo $key; ?>" name="write_rating<?php echo $key; ?>" value="3" <?php echo ($write_rating[$key]=="3")?"checked=\"checked\"":""; ?>/><label for="write_3-star<?php echo $key; ?>" title="Average">3 stars</label>
                                                                          <input type="radio" id="write_2-star<?php echo $key; ?>" name="write_rating<?php echo $key; ?>" value="2" <?php echo ($write_rating[$key]=="2")?"checked=\"checked\"":""; ?>/><label for="write_2-star<?php echo $key; ?>" title="Not Good">2 stars</label>
                                                                          <input type="radio" id="write_1-star<?php echo $key; ?>" name="write_rating<?php echo $key; ?>" value="1" <?php echo ($write_rating[$key]=="1")?"checked=\"checked\"":""; ?>/><label for="write_1-star<?php echo $key; ?>" title="Bad">1 star</label>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label style="margin-left: 42px">Speaking</label>
                                                                </div>
                                                            </div>
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                    <ul class="rate-area">
                                                                          <input type="radio" id="speak_5-star<?php echo $key; ?>" name="speak_rating<?php echo $key; ?>" value="5" <?php echo ($speak_rating[$key]=="5")?"checked=\"checked\"":""; ?>/><label for="speak_5-star<?php echo $key; ?>" title="Amazing">5 stars</label>
                                                                          <input type="radio" id="speak_4-star<?php echo $key; ?>" name="speak_rating<?php echo $key; ?>" value="4" <?php echo ($speak_rating[$key]=="4")?"checked=\"checked\"":""; ?>/><label for="speak_4-star<?php echo $key; ?>" title="Good">4 stars</label>
                                                                          <input type="radio" id="speak_3-star<?php echo $key; ?>" name="speak_rating<?php echo $key; ?>" value="3" <?php echo ($speak_rating[$key]=="3")?"checked=\"checked\"":""; ?>/><label for="speak_3-star<?php echo $key; ?>" title="Average">3 stars</label>
                                                                          <input type="radio" id="speak_2-star<?php echo $key; ?>" name="speak_rating<?php echo $key; ?>" value="2" <?php echo ($speak_rating[$key]=="2")?"checked=\"checked\"":""; ?>/><label for="speak_2-star<?php echo $key; ?>" title="Not Good">2 stars</label>
                                                                          <input type="radio" id="speak_1-star<?php echo $key; ?>" name="speak_rating<?php echo $key; ?>" value="1" <?php echo ($speak_rating[$key]=="1")?"checked=\"checked\"":""; ?>/><label for="speak_1-star<?php echo $key; ?>" title="Bad">1 star</label>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label style="margin-left: 42px">Listening</label>
                                                                </div>
                                                            </div>
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                    <ul class="rate-area">
                                                                          <input type="radio" id="lt_5-star<?php echo $key; ?>" name="listen_rating<?php echo $key; ?>" value="5" <?php echo ($listen_rating[$key]=="5")?"checked=\"checked\"":""; ?>/><label for="lt_5-star<?php echo $key; ?>" title="Amazing">5 stars</label>
                                                                          <input type="radio" id="lt_4-star<?php echo $key; ?>" name="listen_rating<?php echo $key; ?>" value="4"  <?php echo ($listen_rating[$key]=="4")?"checked=\"checked\"":""; ?>/><label for="lt_4-star<?php echo $key; ?>" title="Good">4 stars</label>
                                                                          <input type="radio" id="lt_3-star<?php echo $key; ?>" name="listen_rating<?php echo $key; ?>" value="3"  <?php echo ($listen_rating[$key]=="3")?"checked=\"checked\"":""; ?>/><label for="lt_3-star<?php echo $key; ?>" title="Average">3 stars</label>
                                                                          <input type="radio" id="lt_2-star<?php echo $key; ?>" name="listen_rating<?php echo $key; ?>" value="2"  <?php echo ($listen_rating[$key]=="2")?"checked=\"checked\"":""; ?>/><label for="lt_2-star<?php echo $key; ?>" title="Not Good">2 stars</label>
                                                                          <input type="radio" id="lt_1-star<?php echo $key; ?>" name="listen_rating<?php echo $key; ?>" value="1"  <?php echo ($listen_rating[$key]=="1")?"checked=\"checked\"":""; ?>/><label for="lt_1-star<?php echo $key; ?>" title="Bad">1 star</label>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>                           
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="language_add">Add Language</button>
                                                </div>
                                            </div>                        
                                           <!-- ================= -->
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
<!-- ========================================================================================================================= -->
<!-- ================Social Acoount========================7777777777777============================================================= -->
                            <div class="tab-pane p-20" id="job7" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                        <!-- append from the  Js after adding -->
                                        <div  id="social_account">
                                <?php 
                                    if (isset($jobs['account_name']) && $jobs['account_name'] !=""): 
                                        $account_names=explode("***",$jobs['account_name']); 
                                        $account_urls=explode("***",$jobs['account_url']);
                                ?>
                                    <?php foreach ($account_names as $key => $account_name): ?>
                                            <div class="row" id="social_account_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size"> Account Name:</label>
                                                                    <input type="text" name="account_name[]" id="account_name" size="50" value="<?php echo $account_name; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="organization_size">Account URL:</label>
                                                                    <input type="text" name="account_url[]" id="account_url" size="50" value="<?php echo $account_urls[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="social_account_add">Add Social Network</button>
                                                </div>
                                            </div>
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job8" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ========================================================================================================================= -->
<!-- ================Reference========================88888888888888============================================================= -->
                            <div class="tab-pane p-20" id="job8" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div  id="reference">
                                <?php 
                                    if (isset($jobs['reference_name']) && $jobs['reference_name'] !=""): 
                                        $reference_names=explode("***",$jobs['reference_name']); 
                                        $ref_job_title=explode("***",$jobs['ref_job_title']);
                                        $ref_org_name=explode("***",$jobs['ref_org_name']);
                                        $ref_email=explode("***",$jobs['ref_email']);
                                        $ref_cont_place1=explode("***",$jobs['ref_cont_place1']);
                                        $ref_contact1=explode("***",$jobs['ref_contact1']);
                                        $ref_cont_place2=explode("***",$jobs['ref_cont_place2']);
                                        $ref_contact2=explode("***",$jobs['ref_contact2']);
                                        $ref_cont_place3=explode("***",$jobs['ref_cont_place3']);
                                        $ref_contact3=explode("***",$jobs['ref_contact3']);

                                ?>
                                    <?php foreach ($reference_names as $key => $reference_name): ?>
                                            <div class="row" id="reference_child">
                                                <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Reference Name<span class="asteriskField">*</span></label>
                                                                        <input type="text" name="reference_name[]" id="reference_name" data-validation="required" size="50" value="<?php echo $reference_name; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Job Title</label>
                                                                        <input type="text" name="ref_job_title[]" id="ref_job_title" size="50" value="<?php echo $ref_job_title[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Organization Name</label>
                                                                        <input type="text" name="ref_org_name[]" id="ref_org_name" size="50" value="<?php echo $ref_org_name[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Email</label>
                                                                        <input type="text" name="ref_email[]"  size="50" value="<?php echo $ref_email[$key]; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="organization_size">Contact Numbers</label>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <select name="ref_cont_place1[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                            <option value="">--Place--</option>
                                                                            <option value="mobile" <?php echo ($ref_cont_place1[$key]=="mobile")?"selected":""; ?>>
                                                                                Mobile
                                                                            </option>
                                                                            <option value="home" <?php echo ($ref_cont_place1[$key]=="home")?"selected":""; ?>>
                                                                                Home
                                                                            </option>
                                                                            <option value="work" <?php echo ($ref_cont_place1[$key]=="work")?"selected":""; ?>>
                                                                                Work
                                                                            </option>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="ref_contact1[]" id="ref_contact1" size="50" value="<?php echo $ref_contact1[$key]; ?>" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <select name="ref_cont_place2[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                            <option value="">--Place--</option>
                                                                            <option value="mobile" <?php echo ($ref_cont_place2[$key]=="mobile")?"selected":""; ?>>
                                                                                Mobile
                                                                            </option>
                                                                            <option value="home" <?php echo ($ref_cont_place2[$key]=="home")?"selected":""; ?>>
                                                                                Home
                                                                            </option>
                                                                            <option value="work" <?php echo ($ref_cont_place2[$key]=="work")?"selected":""; ?>>
                                                                                Work
                                                                            </option>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="ref_contact2[]" id="ref_contact2" size="50" value="<?php echo $ref_contact2[$key]; ?>" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <select name="ref_cont_place3[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                            <option value="">--Place--</option>
                                                                            <option value="mobile" <?php echo ($ref_cont_place3[$key]=="mobile")?"selected":""; ?>>
                                                                                Mobile
                                                                            </option>
                                                                            <option value="home" <?php echo ($ref_cont_place3[$key]=="home")?"selected":""; ?>>
                                                                                Home
                                                                            </option>
                                                                            <option value="work" <?php echo ($ref_cont_place3[$key]=="work")?"selected":""; ?>>
                                                                                Work
                                                                            </option>
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="ref_contact3[]" id="ref_contact3" size="50" value="<?php echo $ref_contact3[$key]; ?>" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-link" id="remove">
                                                                            <i class="fa fa-times-circle"></i>Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-success" id="reference_add">Add Reference</button>
                                                </div>
                                            </div>
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job7" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job9" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ========================================================================================================================= -->
<!-- ================Other Information========================99999999999999============================================================= -->
                            <div class="tab-pane p-20" id="job9" role="tabpanel">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Are you willing to travel outside of your residing location during the job?<span class="asteriskField">*</span></label>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="t_out_location" class="js-switch" data-color="#00c292" data-size="small" <?php echo (isset($jobs['t_out_location']) && $jobs['t_out_location'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Are you willing to temporarily relocate outside of your residing location during the job period?<span class="asteriskField">*</span></label>
                                                            </div>
                                                             <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="relocate_out_location" class="js-switch other-info" data-color="#00c292" data-size="small" <?php echo (isset($jobs['relocate_out_location']) && $jobs['relocate_out_location'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Do you have a two-wheeler riding license?<span class="asteriskField">*</span></label>
                                                            </div>
                                                           <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="license_w2" class="js-switch other-info" data-color="#00c292" data-size="small" <?php echo (isset($jobs['license_w2']) && $jobs['license_w2'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Do you have a four-wheeler driving license?<span class="asteriskField">*</span></label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="license_w4" class="js-switch other-info" data-color="#00c292" data-size="small" <?php echo (isset($jobs['license_w4']) && $jobs['license_w4'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Do you own two-wheeler vehicle?<span class="asteriskField">*</span></label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="own_w2" class="js-switch other-info" data-color="#00c292" data-size="small" <?php echo (isset($jobs['own_w2']) && $jobs['own_w2'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Do you own four-wheeler vehicle?<span class="asteriskField">*</span></label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" name="own_w4" class="js-switch other-info" data-color="#00c292" data-size="small" <?php echo (isset($jobs['own_w4']) && $jobs['own_w4'] =="1")?"checked=\"checked\"":"";?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                           <!-- ================= -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job8" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#job10" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                    </li>
                                </ul>
                            </div>
<!-- ====================================================================================================================================== -->
<!-- ================Publish========================10101010101010101010101010============================================================= -->
                            <div class="tab-pane p-20" id="job10" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <label for="category_image">Featured Image</label>
                                                <?php
                                                if(isset($detail['featured_img']))
                                                {

                                                    ?>
                                                    <div class="remove_option">

                                                        <?php
                                                        $path  =  '../uploads/biodata/';
                                                        ?>
                                                        <img src="<?php echo $path. $detail['featured_img'];?>" alt="featured_image" style="width: 20%;">

                                                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                                    </div>
                                                    <input type="hidden" name="pre_featuredimg" value="<?php echo $detail['featured_img']; ?>">
                                                    <div id="image_input">
                                                        <input type="file" name="featured_img" class="form-control" id="featuredimg">
                                                        <span id="type_error"></span>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <input type="file" name="featured_img" class="form-control"  id="featuredimg">
                                                    <span id="type_error"></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
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
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" name="biodata_id" value="<?php echo (isset($jobs['biodata_id']) && $jobs['biodata_id'] !="") ? $jobs['biodata_id']:""; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job9" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Previous </span></a>
                                    </li>
                                <li>
                                        <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">
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
//============to add dynamic form field============================================================

////===========================================for Education===========333333333333333=================================
    //variable
        var max_education=3;
    <?php 
        if (isset($jobs['education_level']) && $jobs['education_level'] !=""){ 
            $education_level=explode("***",$jobs['education_level']);
            echo "var edu=".count($education_level).";";
        }
        else
        {
            echo "var edu=0;";
        }
    ?>
        var education_html1='<div class="row" id="education_child"><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size"> Education Level</label><select name="education_level[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body1='';
            foreach ($educations as $education)
            {
                $body1 .='<option value="'.$education['education_level_id'].'">'.$education['education_level'].'</option>';
            }
            echo "var education_html2='".$body1."';";
    ?>
        var education_html3='</select></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Education Program</label><input type="text" name="edu_program[]" id="edu_program" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Education Board</label><input type="text" name="edu_board[]"  size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Name Of Institute</label><input type="text" name="edu_institute[]"  size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><input type="hidden" name="edu_cur_std[]" id="edu_cur_std_h" value="0" size="50" /><input type="checkbox" name="edu_cur_std[]" id="edu_cur_std" value="1" size="50" /> &nbsp;&nbsp; Currenty Studying here ?</div></div></div></div><div id="edu_cur_std_no"><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Marks Secured</label></div></div><div class="form-group row"><div class="col-md-6"><select name="marks_ref[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">--Marks In--</option><option value="percentage">Percentage</option><option value="gpa">GPA</option></select></div><div class="col-md-6"><input type="text" name="marks[]" id="marks" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Graduation Year</label></div></div><div class="form-group row"><div class="col-md-6"><select name="grad_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
        $year=date('Y');
        $body2='';
        for ($y=$year; $y >=1950 ; $y--) 
        {
            $body2 .='<option value="'.$y.'">'.$y.'</option>'; //for year
        }
        echo "var education_html4='".$body2."';";              
    ?>
        var education_html5='</select></div><div class="col-md-6"><select name="grad_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body3='';
            foreach ($months as $key => $month)
            {
                $body3 .='<option value="'.$month['month_name'].'">'.$month['month_name'].'</option>';
            }
            echo "var education_html6='".$body3."';";
    ?>    
        var education_html7='</select></div></div></div></div></div><div id="edu_cur_std_yes"><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Start Year</label></div></div><div class="form-group row"><div class="col-md-6"><select name="start_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';

    <?php echo "var education_html8='".$body2."';"; ?>

         var education_html9='</select></div><div class="col-md-6"><select name="start_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';

    <?php echo "var education_html10='".$body3."';"; ?>

        var education_html11='</select></div></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div><hr></div></div>';

        var education_html = education_html1 + education_html2 + education_html3 + education_html4 + education_html5 + education_html6 + education_html7 + education_html8 + education_html9 + education_html10 + education_html11;
    //add
        $("#education_add").click(function(e){
            if(edu < max_education)
            {
                 $("#education").append(education_html);
                 edu++;
                 return false;
            }
            else
            {
                alert("You cannot add more Education Field");
                return false;
            }
        });
    //remove 
        $("#education").on('click', '#remove', function(e){
            $(this).parents('#education_child').remove();
            edu--;
        }); 

        $("#education").on('change', '#edu_cur_std', function(e){
            if($(this).is(":checked"))
            {
                $(this).parents('#education_child').find("#edu_cur_std_yes").show();
                $(this).parents('#education_child').find("#edu_cur_std_no").hide();
                $(this).parents('#education_child').find("#edu_cur_std_h").prop("disabled",true);
            }
            else
            {
                 $(this).parents('#education_child').find("#edu_cur_std_yes").hide();
                $(this).parents('#education_child').find("#edu_cur_std_no").show(); 
                $(this).parents('#education_child').find("#edu_cur_std_h").prop("disabled",false);
            }
        }); 
        $(".edu_cur_std_cl").each(function(e){
            if($(this).is(":checked")){
                $(this).parents('#education_child').find("#edu_cur_std_yes").show();
                $(this).parents('#education_child').find("#edu_cur_std_no").hide();
                $(this).parents('#education_child').find("#edu_cur_std_h").prop("disabled",true);
            }
            else
            {
                $(this).parents('#education_child').find("#edu_cur_std_yes").hide();
                $(this).parents('#education_child').find("#edu_cur_std_no").show();
                $(this).parents('#education_child').find("#edu_cur_std_h").prop("disabled",false);

            }
        });


    //***======================================================================================================
////===========================================for Training============444444444444================================
    //variable
        var max_training=3;
    <?php 
        if (isset($jobs['training_name']) && $jobs['training_name'] !=""){ 
            $training_names=explode("***",$jobs['training_name']);
            echo "var trn=".count($training_names).";";
        }
        else
        {
            echo "var trn=0;";
        }
    ?>
        var training_html1='<div class="row" id="training_child"><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size"> Training Name</label><input type="text" name="training_name[]" id="training_name" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Institution Name</label><input type="text" name="institution_name[]" id="institution_name" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Duration</label></div></div><div class="form-group row"><div class="cold-md-6"><input type="text" name="duration[]" size="50" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div><div calss="col-md-6"><select name="duration_basis[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="day">Day</option><option value="week">Week</option><option value="month">Month</option><option value="year">Year</option></select></div></div></div></div><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Completion</label></div></div><div class="form-group row"><div class="col-md-6"><select name="comp_year[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----Year----</option>';
    <?php 
        $year=date('Y');
        $body='';
        for ($y=$year; $y >=1950 ; $y--) 
        {
            $body .='<option value="'.$y.'">'.$y.'</option>'; //for year
        }
        echo "var training_html2='".$body."';";               //for month
    ?>
        var training_html3='</select></div><div class="col-md-6"><select name="comp_month[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----Month----</option>';
    <?php 
            $body1='';
            foreach ($months as $key => $month)
            {
                $body1 .='<option value="'.$month['month_name'].'">'.$month['month_name'].'</option>';
            }
            echo "var training_html4='".$body1."';";
    ?>    
        var training_html5='</select></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div></div><hr></div>';
        var training_html = training_html1 + training_html2 + training_html3 + training_html4 + training_html5;
    //add
        $("#training_add").click(function(e){
            if(trn < max_training)
            {
                 $("#training").append(training_html);
                 trn++;
                 return false;
            }
            else
            {
                alert("You cannot add more Training Field");
                return false;
            }
        });
    //remove 
        $("#training").on('click', '#remove', function(e){
            $(this).parents('#training_child').remove();
            trn--;
        }); 
    //to check whether scocial acoount is added or not and customize button   
    //***================================================================================================================
////===========================================for Work Experience===========555555555555555=================================
    //variable
        var max_experience=3;

        <?php $max_experience=3; ?>
    <?php 
        if (isset($jobs['org_name']) && $jobs['org_name'] !=""){ 
            $org_name=explode("***",$jobs['org_name']);
            echo "var exp=".count($org_name).";";
        }
        else
        {
            echo "var exp=0;";
        }
    ?>
        var experience_html1='<div class="row" id="work_experience_child"><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Organization Name<span class="asteriskField">*</span></label><input type="text" name="org_name[]" id="org_name" data-validation="required" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Nature Of Organization</label><select name="org_nature[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body1='';
            foreach ($org_natures as $rows)
            {
                $body1 .='<option value="'.$rows['org_nature_id'].'">'.$rows['org_nature_title'].'</option>';
            }
            echo "var experience_html2='".$body1."';";
    ?>
        var experience_html3='</select></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Job Location<span class="asteriskField">*</span></label><input type="text" name="exp_job_location[]" id="exp_job_location" data-validation="required" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Job Title<span class="asteriskField">*</span></label><input type="text" name="exp_job_title[]" id="exp_job_title" data-validation="required" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Job Category</label><select name="exp_job_category[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body2='';
            foreach ($job_categories as $rows)
            {
                $body2 .='<option value="'.$rows['comc_id'].'">'.$rows['company_category'].'</option>';
            }
            echo "var experience_html4='".$body2."';";
    ?>
        var experience_html5='</select></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Job Level</label><select name="exp_job_level[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body3='';
            foreach ($job_levels as $rows)
            {
                $body3 .='<option value="'.$rows['joblevel_id'].'">'.$rows['joblevel'].'</option>';
            }
            echo "var experience_html6='".$body3."';";
    ?>
        var experience_html7='</select></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><input type="hidden" name="exp_cur_work[]" id="exp_cur_work_h" value="0"/><input type="checkbox" class="exp_cur_work_cl" name="exp_cur_work[]" id="exp_cur_work" size="50"value="1" /> &nbsp;&nbsp; Currenty Studying here ?</div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-4"><label for="organization_size">Start Date</label></div><div class="col-md-4"><select name="exp_start_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
        $year=date('Y');
        $body4='';
        for ($y=$year; $y >=1950 ; $y--) 
        {
            $body4 .='<option value="'.$y.'">'.$y.'</option>'; //for year
        }
        echo "var experience_html8='".$body4."';";              
    ?>
        var experience_html9='</select></div><div class="col-md-4"><select name="exp_start_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body5='';
            foreach ($months as $key => $month)
            {
                $body5 .='<option value="'.$month['month_name'].'">'.$month['month_name'].'</option>';
            }
            echo "var experience_html10='".$body5."';";
    ?>    
        var experience_html11='</select></div></div></div></div><div id="exp_cur_work_no"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-4"><label for="organization_size">End Date</label></div><div class="col-md-4"><select name="exp_end_year[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';

    <?php echo "var experience_html12='".$body4."';"; ?>

         var experience_html13='</select></div><div class="col-md-4"><select name="exp_end_month[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';

    <?php echo "var experience_html14='".$body5."';"; ?>

        
    //add
        $("#work_experience_add").click(function(e){
            if(exp < max_experience)
            {
                var experience_html15='</select></div></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Duties And Responsibility</label><textarea rows="5" cols="10" class="regular-text form-control required valid" name="exp_duties[]" id="exp_duties_'+exp+'"></textarea></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div><hr></div></div>';

                var experience_html = experience_html1 + experience_html2 + experience_html3 + experience_html4 + experience_html5 + experience_html6 + experience_html7 + experience_html8 + experience_html9 + experience_html10 + experience_html11 + experience_html12 + experience_html13 +experience_html14 + experience_html15 ;

                 $("#work_experience").append(experience_html);
                 exp++;
                 return false;
            }
            else
            {
                alert("You cannot add more Work Experience Field");
                return false;
            }
        });
    //remove 
        $("#work_experience").on('click', '#remove', function(e){
            $(this).parents('#work_experience_child').remove();
            exp--;
        }); 

        $("#work_experience").on('change', '#exp_cur_work', function(e){
            if($(this).is(":checked"))
            {
                $(this).parents('#work_experience_child').find("#exp_cur_work_no").hide();
                $(this).parents('#work_experience_child').find("#exp_cur_work_h").prop("disabled",true);
            }
            else
            {
                $(this).parents('#work_experience_child').find("#exp_cur_work_no").show(); 
                $(this).parents('#work_experience_child').find("#exp_cur_work_h").prop("disabled",false);
            }
        }); 
        $(".exp_cur_work_cl").each(function(e){
            if($(this).is(":checked")){
                $(this).parents('#work_experience_child').find("#exp_cur_work_no").hide();
                $(this).parents('#work_experience_child').find("#exp_cur_work_h").prop("disabled",true);
            }
            else
            {
                $(this).parents('#work_experience_child').find("#exp_cur_work_no").show();
                $(this).parents('#work_experience_child').find("#exp_cur_work_h").prop("disabled",false);

            }
        });
         


    //***======================================================================================================
    //
////===========================================for Language===========6666666666666=================================
    //variable
        var max_language=3;
    <?php 
        if (isset($jobs['language']) && $jobs['language'] !=""){ 
            $language=explode("***",$jobs['language']);
            echo "var lang=".count($language).";";
        }
        else
        {
            echo "var lang=0;";
        }
    ?>
        var language_html1='<div class="row" id="language_child"><div class="col-md-12"><div class="row"><div class="col-md-4"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Languages<span class="asteriskField">*</span></label><select name="language[]" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">----------</option>';
    <?php 
            $body_lan_1='';
            foreach ($languages as $rows)
            {
                $body_lan_1 .='<option value="'.$rows['language_id'].'">'.$rows['language'].'</option>';
            }
            echo "var language_html2='".$body_lan_1."';";
    ?>
        
    //add
        $("#language_add").click(function(e){
            if(lang < max_language)
            {

        var language_html3='</select></div></div> </div> <div class="col-md-4"><div class="row"><div class="col-md-12"><label style="margin-left: 42px">Reading</label></div></div><div class="row"><div class="col-md-12"><ul class="rate-area"><input type="radio" id="5-star'+lang+'" name="read_rating'+lang+'" value="5" /><label for="5-star'+lang+'" title="Amazing">5 stars</label><input type="radio" id="4-star'+lang+'" name="read_rating'+lang+'" value="4" /><label for="4-star'+lang+'" title="Good">4 stars</label><input type="radio" id="3-star'+lang+'" name="read_rating'+lang+'" value="3" /><label for="3-star'+lang+'" title="Average">3 stars</label><input type="radio" id="2-star'+lang+'" name="read_rating'+lang+'" value="2" /><label for="2-star'+lang+'" title="Not Good">2 stars</label><input type="radio" id="1-star'+lang+'" name="read_rating'+lang+'" value="1" /><label for="1-star'+lang+'" title="Bad">1 star</label></ul></div></div> </div><div class="col-md-4"><div class="row"><div class="col-md-12"><label style="margin-left: 42px">Writing</label></div></div><div class="row"><div class="col-md-12"><ul class="rate-area"><input type="radio" id="write_5-star'+lang+'" name="write_rating'+lang+'" value="5" /><label for="write_5-star'+lang+'" title="Amazing">5 stars</label><input type="radio" id="write_4-star'+lang+'" name="write_rating'+lang+'" value="4" /><label for="write_4-star'+lang+'" title="Good">4 stars</label><input type="radio" id="write_3-star'+lang+'" name="write_rating'+lang+'" value="3" /><label for="write_3-star'+lang+'" title="Average">3 stars</label><input type="radio" id="write_2-star'+lang+'" name="write_rating'+lang+'" value="2" /><label for="write_2-star'+lang+'" title="Not Good">2 stars</label><input type="radio" id="write_1-star'+lang+'" name="write_rating'+lang+'" value="1" /><label for="write_1-star'+lang+'" title="Bad">1 star</label></ul></div></div> </div> </div><div class="row"><div class="col-md-4"></div> <div class="col-md-4"><div class="row"><div class="col-md-12"><label style="margin-left: 42px">Speaking</label></div></div><div class="row"><div class="col-md-12"><ul class="rate-area"><input type="radio" id="speak_5-star'+lang+'" name="speak_rating'+lang+'" value="5" /><label for="speak_5-star'+lang+'" title="Amazing">5 stars</label><input type="radio" id="speak_4-star'+lang+'" name="speak_rating'+lang+'" value="4" /><label for="speak_4-star'+lang+'" title="Good">4 stars</label><input type="radio" id="speak_3-star'+lang+'" name="speak_rating'+lang+'" value="3" /><label for="speak_3-star'+lang+'" title="Average">3 stars</label><input type="radio" id="speak_2-star'+lang+'" name="speak_rating'+lang+'" value="2" /><label for="speak_2-star'+lang+'" title="Not Good">2 stars</label><input type="radio" id="speak_1-star'+lang+'" name="speak_rating'+lang+'" value="1" /><label for="speak_1-star'+lang+'" title="Bad">1 star</label></ul></div></div> </div><div class="col-md-4"><div class="row"><div class="col-md-12"><label style="margin-left: 42px">Listening</label></div></div><div class="row"><div class="col-md-12"><ul class="rate-area"><input type="radio" id="lt_5-star'+lang+'" name="listen_rating'+lang+'" value="5" /><label for="lt_5-star'+lang+'" title="Amazing">5 stars</label><input type="radio" id="lt_4-star'+lang+'" name="listen_rating'+lang+'" value="4" /><label for="lt_4-star'+lang+'" title="Good">4 stars</label><input type="radio" id="lt_3-star'+lang+'" name="listen_rating'+lang+'" value="3" /><label for="lt_3-star'+lang+'" title="Average">3 stars</label><input type="radio" id="lt_2-star'+lang+'" name="listen_rating'+lang+'" value="2" /><label for="lt_2-star'+lang+'" title="Not Good">2 stars</label><input type="radio" id="lt_1-star'+lang+'" name="listen_rating'+lang+'" value="1" /><label for="lt_1-star'+lang+'" title="Bad">1 star</label></ul></div></div> </div> </div>                           <div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div><hr></div></div>';

         var language_html = language_html1 + language_html2 + language_html3 ;
                 $("#language").append(language_html);
                 lang++;
                 return false;
            }
            else
            {
                alert("You cannot add more Language Field");
                return false;
            }
        });
    //remove 
        $("#language").on('click', '#remove', function(e){
            $(this).parents('#language_child').remove();
            lang--;
        });
         


    //***======================================================================================================
  //===========================================for Socail Account=============777777777777777777===============================
    //variable
        var max_account=3;
    <?php 
        if (isset($jobs['account_name']) && $jobs['account_name'] !=""){ 
            $account_names=explode("***",$jobs['account_name']);
            echo "var acc=".count($account_names).";";
        }
        else
        {
            echo "var acc=0;";
        }
    ?>
        var account_html='<div class="row" id="social_account_child"><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size"> Account Name:</label><input type="text" name="account_name[]" id="account_name" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div> </div> </div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Account URL:<span class="asteriskField">*</span></label><input type="text" name="account_url[]" id="account_url" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div></div><hr></div>';
    //add
        $("#social_account_add").click(function(e){
            if(acc < max_account)
            {
                 $("#social_account").append(account_html);
                 acc++;
                 return false;
            }
            else
            {
                alert("You cannot add more Social Account");
                return false;
            }
        });
    //remove 
        $("#social_account").on('click', '#remove', function(e){
            $(this).parents('#social_account_child').remove();
            acc--;
        }); 
    //to check whether scocial acoount is added or not and customize button   
    //=================================================================================================================

////===========================================for Reference==================88888888888888888==========================
    //variable
        var max_reference=3;
    <?php 
        if (isset($jobs['reference_name']) && $jobs['reference_name'] !=""){ 
            $reference_name=explode("***",$jobs['reference_name']);
            echo "var ref=".count($reference_name).";";
        }
        else
        {
            echo "var ref=0;";
        }
    ?>
        var reference_html='<div class="row" id="reference_child"><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Reference Name<span class="asteriskField">*</span></label><input type="text" name="reference_name[]" id="reference_name" data-validation="required" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Job Title</label><input type="text" name="ref_job_title[]" id="ref_job_title" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Education Program</label><input type="text" name="edu_program[]" id="edu_program" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Organization Name</label><input type="text" name="ref_org_name[]" id="ref_org_name" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><label for="organization_size">Email</label><input type="text" name="ref_email[]"  size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="row"><div class="col-md-12"><label for="organization_size">Contact Numbers</label></div></div><div class="form-group row"><div class="col-md-4"><select name="ref_cont_place1[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">--Place--</option><option value="mobile">Mobile</option><option value="home">Home</option><option value="work">Work</option></select></div><div class="col-md-8"><input type="text" name="ref_contact1[]" id="ref_contact1" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div><div class="form-group row"><div class="col-md-4"><select name="ref_cont_place2[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">--Place--</option><option value="mobile">Mobile</option><option value="home">Home</option><option value="work">Work</option></select></div><div class="col-md-8"><input type="text" name="ref_contact2[]" id="ref_contact2" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div><div class="form-group row"><div class="col-md-4"><select name="ref_cont_place3[]" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"><option value="">--Place--</option><option value="mobile">Mobile</option><option value="home">Home</option><option value="work">Work</option></select></div><div class="col-md-8"><input type="text" name="ref_contact3[]" id="ref_contact3" size="50" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group row"><div class="col-md-12"><button class="btn btn-link" id="remove"><i class="fa fa-times-circle"></i>Remove</button></div></div></div></div><hr></div></div>';

    //add
        $("#reference_add").click(function(e){
            if(ref < max_reference)
            {
                 $("#reference").append(reference_html);
                 ref++;
                 return false;
            }
            else
            {
                alert("You cannot add more Reference Field");
                return false;
            }
        });
    //remove 
        $("#reference").on('click', '#remove', function(e){
            $(this).parents('#reference_child').remove();
            ref--;
        }); 

    //***=====================================================================================================================
 
//========================================end of dynamic form field===========================================================



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

    });    
</script>
<script>

    CKEDITOR.replace( 'career_obj_summary'  ,{
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


