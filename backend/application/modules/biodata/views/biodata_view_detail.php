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
    <link href="static/css/style.css" rel="stylesheet">
    
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-default fixed-layout">
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
   
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->



<!-- <div class="page-wrapper"> -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       

       

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 pull-right">
                            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="add_am">
                                <i class="fa fa-arrow-left"></i> Back 
                            </a>
                        </button>
                        
                        <?php $path="../uploads/biodata/"; ?>      

                        <img src="<?php echo $path.$biodata['featured_img']; ?>" class="img-responsive employee-img" width="10%" style="margin-left: 18px; border-radius: 100%;margin-top: 30px">

                        <h4 class="card-title"><?php echo $biodata['name']; ?></h4>

                        <!-- Nav tabs -->
                        <div class="vtabs" >
                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#job1" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-account-card-details"></i></span> <span class="hidden-xs-down"> Job Perference</span> </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job2" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-airplay"></i></span> <span class="hidden-xs-down"> Basic Information </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job3" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-altimeter"></i></span> <span class="hidden-xs-down"> Education </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-settings"></i></span> <span class="hidden-xs-down"> Training </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job5" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-brightness-auto"></i></span> <span class="hidden-xs-down"> Work Experience </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job6" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Language </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job7" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-settings"></i></span> <span class="hidden-xs-down"> Social Account </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job8" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-brightness-auto"></i></span> <span class="hidden-xs-down"> Reference </span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#job9" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-publish"></i></span> <span class="hidden-xs-down"> Other Information </span></a> </li>
                            </ul>
                            <!-- Tab panes -->
<!-- ========================================================================================================================= -->
                            <div class="tab-content" style="width: 850px">
                                
<!-- ================Job Preference========================1111============================================================= -->
                                <div class="tab-pane active p-20" id="job1" role="tabpanel">
                                    <div class="card ">
                                        <div class="card-body">
                                                <div class="form-body">
                                                            <!--  -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="organization_size">Job Category:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <span class=""><?php echo $this->crud->get_detail($biodata['job_category'],'comc_id','tbl_company_category')['company_category']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Looking For:</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                     <span class="">
                                                                        <?php echo $this->crud->get_detail($biodata['job_level'],'joblevel_id','tbl_joblevel')['joblevel']; ?>
                                                                     </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Available For:</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                     <span class="">
                                                                        <?php 
                                                                            if($biodata['availability_for'] == "full_time")
                                                                            {
                                                                                echo "Full Time";
                                                                            }
                                                                            elseif($biodata['availability_for'] == "part_time")
                                                                            {
                                                                                echo "Part Time";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "Contract";
                                                                            }
                                                                        ?>
                                                                     </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Specialization:</label>
                                                                     
                                                                </div>
                                                                 <div class="col-md-8">
                                                                    <?php $specializations=explode(',',$biodata['specialization']) ?>
                                                                    <?php foreach ($specializations as $key => $specialization): ?>
                                                                        <span class="label label-info"><?php echo $specialization; ?></span>
                                                                    <?php endforeach ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                    $skills=explode(',',$biodata['skill']);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Skills:</label>
                                                                     
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php foreach ($skills as $key => $skill): ?>
                                                                        <span class="label label-info"><?php echo $skill; ?></span>
                                                                    <?php endforeach ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Expected Salary:</label>
                                                                     
                                                                </div>
                                                                <div class="col-md-8">
                                                                <?php 
                                                                    $currency=$this->crud->get_currency_symbol($biodata['exp_currency_type']);
                                                                    $ref=$this->crud->get_cur_ref($biodata['exp_ref']);
                                                                    $amount=$biodata['exp_amount'];
                                                                    $basis=ucfirst($biodata['exp_salary_basis']);
                                                                ?>
                                                                     <span class="">
                                                                         <?php echo $ref." ".$currency." ".$amount." ".$basis; ?>
                                                                     </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Current Salary:</label>
                                                                     
                                                                </div>
                                                                <div class="col-md-8">
                                                                <?php 
                                                                    $currency=$this->crud->get_currency_symbol($biodata['cur_currency_type']);
                                                                    $ref=$this->crud->get_cur_ref($biodata['cur_ref']);
                                                                    $amount=$biodata['cur_amount'];
                                                                    $basis=ucfirst($biodata['cur_salary_basis']);
                                                                ?>
                                                                     <span class="">
                                                                         <?php echo $ref." ".$currency." ".$amount." ".$basis; ?>
                                                                     </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Carrer Objective Summary:</label>
                                                                     
                                                                </div>
                                                                <div class="col-md-8">
                                                                   
                                                                     <span class=""><?php echo $biodata['career_obj_summary']; ?></span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Job Preffered Location:</label>
                                                                     
                                                                </div>
                                                                <div class="col-md-8">
                                                                   
                                                                     <span class=""><?php echo $biodata['job_location']; ?></span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <!--  -->                                                                                  
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
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-body">
                                                        <!--  -->
                                                 <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Name</label>
                                                                    
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $biodata['name']; ?>
                                                                </div>
                                                            </div>
                                                       </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Gender</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php 
                                                                        if($biodata['gender']==0)
                                                                        {
                                                                            echo "Female";
                                                                        }
                                                                        elseif($biodata['gender']==1)
                                                                        {
                                                                            echo "Male";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Others";
                                                                        }
                                                                    ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">DOB</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo date_converter1($biodata['dob']); ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                  <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Maritial Status</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo ($biodata['marital_status']==0)?"Unmarried":"Married"; ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Religion</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $this->crud->get_detail($biodata['religion'],"religion_id","igc_religion")['religion_name']; ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                  <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Nationality</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                     <?php echo $this->crud->get_detail($biodata['country'],"id","igc_country")['name']; ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Current Address</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $biodata['cur_address']; ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Permanent Address</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $biodata['per_address']; ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="form-group row">
                                                                 <div class="col-md-4">
                                                                    <label for="organization_size">Contact Number</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $biodata['contact_number']; ?>
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
                                    <a class="nav-link" data-toggle="tab" href="#job4" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></span> <span class="hidden-xs-down"> Next</span></a>
                                        </li>
                                    </ul>
                                </div>
<!-- ========================================================================================================================= -->
<!-- ================Education========================33333333333============================================================= -->
                            <div class="tab-pane p-20" id="job3" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-body">
                                        <?php 
                                                $education_levels=explode("***",$biodata['education_level']);
                                                $edu_program=explode("***",$biodata['edu_program']);
                                                $edu_board=explode("***",$biodata['edu_board']);
                                                $edu_institute=explode("***",$biodata['edu_institute']);
                                                $edu_cur_std=explode("***",$biodata['edu_cur_std']);
                                                $marks_ref=explode("***",$biodata['marks_ref']);
                                                $marks=explode("***",$biodata['marks']);
                                                $grad_year=explode("***",$biodata['grad_year']);
                                                $grad_month=explode("***",$biodata['grad_month']);
                                                $start_year=explode("***",$biodata['start_year']);
                                                $start_month=explode("***",$biodata['start_month']);
                                        ?>
                                        <?php foreach ($education_levels as $key => $rows): ?>
                                                
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Education Level</label>
                                                                </div>
                                                                 <div class="col-md-8">
                                                                    <span class="">
                                                                        <?php echo $this->crud->get_detail($rows,"education_level_id","igc_education_level")['education_level'];?>
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Education Program</label>
                                                                </div>
                                                                 <div class="col-md-8">
                                                                    <span class="">
                                                                        <?php echo $edu_program[$key]; ?>
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Education Board</label>
                                                                   
                                                                </div>
                                                                 <div class="col-md-8">
                                                                    <span class="">
                                                                        <?php echo $edu_board[$key]; ?>
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Name of Institute</label>
                                                                </div>
                                                                 <div class="col-md-8">
                                                                    <span class="">
                                                                        <?php echo $edu_institute[$key]; ?>
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <?php if ($edu_cur_std[$key] == "0"): ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size"> Marks Secured</label>
                                                                    </div>
                                                                     <div class="col-md-8">
                                                                        <span class="">
                                                                            <?php echo $marks[$key]." ".$marks_ref[$key]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size">Graduation Year</label>
                                                                    </div>
                                                                     <div class="col-md-8">
                                                                        <span class="">
                                                                            <?php echo $grad_month[$key].", ".$grad_year[$key]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size">Start Year</label>
                                                                    </div>
                                                                     <div class="col-md-8">
                                                                        <span class="">
                                                                            <?php echo $start_month[$key].", ".$start_year[$key]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                        
                                                    <?php endif ?>
                                                    <hr>
                                        <?php endforeach ?>
                                           <!--  -->
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
                                                        $training_names=explode("***",$biodata['training_name']); 
                                                        $institution_names=explode("***",$biodata['institution_name']);
                                                        $duration=explode("***",$biodata['duration']);
                                                        $duration_basis=explode("***",$biodata['duration_basis']);
                                                        $comp_year=explode("***",$biodata['comp_year']);
                                                        $comp_month=explode("***",$biodata['comp_month']);
                                                ?>
                                        <?php foreach ($training_names as $key => $value): ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Training Name</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $value; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Institution Name</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $institution_names[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Duration</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $duration[$key]." ".$duration_basis[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Completion Year</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                     <?php echo $comp_month[$key].", ".$comp_year[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <hr>
                                        <?php endforeach ?>
                                              </div>
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div  id="work_experience">
                                <?php 
                                        $org_names=explode("***",$biodata['org_name']); 
                                        $org_nature=explode("***",$biodata['org_nature']);
                                        $exp_job_location=explode("***",$biodata['exp_job_location']);
                                        $exp_job_title=explode("***",$biodata['exp_job_title']);
                                        $exp_job_category=explode("***",$biodata['exp_job_category']);
                                        $exp_job_level=explode("***",$biodata['exp_job_level']);
                                        $exp_cur_work=explode("***",$biodata['exp_cur_work']);
                                        $exp_start_year=explode("***",$biodata['exp_start_year']);
                                        $exp_start_month=explode("***",$biodata['exp_start_month']);
                                        $exp_end_year=explode("***",$biodata['exp_end_year']);
                                        $exp_end_month=explode("***",$biodata['exp_end_month']);
                                        $exp_duties=explode("***",$biodata['exp_duties']);
                                ?>
                                <?php foreach ($org_names as $key => $org_name): ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Organization Name</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php echo $org_name; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Nature Of Organization</label>
                                                                </div>
                                                                 <div class="col-md-9">
                                                                    <?php echo $this->crud->get_detail($org_nature[$key],"org_nature_id","tbl_org_nature")['org_nature_title']; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Job Location</label>
                                                                   
                                                                </div>

                                                                 <div class="col-md-9">
                                                                    <?php echo $exp_job_location[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                   <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Job Title</label>
                                                                   
                                                                </div>

                                                                 <div class="col-md-9">
                                                                   <?php echo $exp_job_title[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Job categeory</label>
                                                                   
                                                                </div>

                                                                 <div class="col-md-9">
                                                                    <?php echo $this->crud->get_detail($exp_job_category[$key],"comc_id","tbl_company_category")['company_category']; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Job Level</label>
                                                                </div>
                                                                 <div class="col-md-9">
                                                                     <?php echo $this->crud->get_detail($exp_job_level[$key],"joblevel_id","tbl_joblevel")['joblevel']; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Start Date</label>
                                                                   
                                                                </div>
                                                                 <div class="col-md-9">
                                                                   <?php echo $exp_start_month[$key].", ".$exp_start_year[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                <?php if ($exp_cur_work[$key] == "0"): ?>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">End Date</label>
                                                                </div>
                                                                 <div class="col-md-9">
                                                                     <?php echo $exp_end_month[$key].", ".$exp_end_year[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    
                                                <?php endif ?>

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <label for="organization_size">Duties and Responsibbilities</label>
                                                                   
                                                                </div>

                                                                 <div class="col-md-9">
                                                                   <?php echo $exp_duties[$key]; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                <?php endforeach ?>
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
                                         $langs=explode("***",$biodata['language']); 
                                         $read_rating=explode("***",$biodata['read_rating']);
                                         $write_rating=explode("***",$biodata['write_rating']);
                                         $speak_rating=explode("***",$biodata['speak_rating']); 
                                         $listen_rating=explode("***",$biodata['listen_rating']); 
                                         

                                ?>
                                    <?php foreach ($langs as $key => $lang): ?>
                                            <div class="row" id="language_child">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <span>
                                                                        <?php echo $this->crud->get_detail($lang,"language_id","igc_language")['language']; ?>
                                                                    </span>
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
                                                                          <?php echo $this->crud->get_star_rating($read_rating[$key]); ?>
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
                                                                          <?php echo $this->crud->get_star_rating($write_rating[$key]); ?>
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
                                                                           <?php echo $this->crud->get_star_rating($speak_rating[$key]); ?>
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
                                                                          <?php echo $this->crud->get_star_rating($listen_rating[$key]); ?>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                   
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
                                             $account_names=explode("***",$biodata['account_name']); 
                                             $account_urls=explode("***",$biodata['account_url']);
                                        ?>
                                        <?php foreach ($account_names as $key => $account_name): ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size"> Account Name:</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $account_name; ?>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Account URL:</label>
                                                                    
                                                                </div>
                                                                <div class="col-md-8">
                                                                   <?php echo $account_urls[$key]; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                        <?php endforeach ?>
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
                                        $reference_names=explode("***",$biodata['reference_name']); 
                                        $ref_job_title=explode("***",$biodata['ref_job_title']);
                                        $ref_org_name=explode("***",$biodata['ref_org_name']);
                                        $ref_email=explode("***",$biodata['ref_email']);
                                        $ref_cont_place1=explode("***",$biodata['ref_cont_place1']);
                                        $ref_contact1=explode("***",$biodata['ref_contact1']);
                                        $ref_cont_place2=explode("***",$biodata['ref_cont_place2']);
                                        $ref_contact2=explode("***",$biodata['ref_contact2']);
                                        $ref_cont_place3=explode("***",$biodata['ref_cont_place3']);
                                        $ref_contact3=explode("***",$biodata['ref_contact3']);
                                ?>
                                <?php foreach ($reference_names as $key => $reference_name): ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Reference Name</label>
                                                                    
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label for="organization_size"><?php echo $reference_name; ?></label>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Job Title</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $ref_job_title[$key]; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Organization Name</label>
                                                                   
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $ref_org_name[$key]; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="organization_size">Email</label>
                                                                  
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $ref_email[$key]; ?>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="organization_size">Contact Numbers</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <?php echo (!empty($ref_contact1[$key]))?$ref_contact1[$key]." ( ".$ref_cont_place1[$key]." )":""; ?><br>
                                                                         <?php echo (!empty($ref_contact2[$key]))?$ref_contact2[$key]." ( ".$ref_cont_place2[$key]." )":""; ?><br>
                                                                         <?php echo (!empty($ref_contact3[$key]))?$ref_contact3[$key]." ( ".$ref_cont_place3[$key]." )":""; ?><br>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                <?php endforeach ?>
                                                </div>
                                            <!--  -->
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
                                                                <label for="organization_size">Willing to travel outside of your residing location during the job?</label>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <?php echo ($biodata['t_out_location'] =="")?"No":"Yes"; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Willing to temporarily relocate outside of your residing location during the job period?</label>
                                                            </div>
                                                             <div class="col-md-2">
                                                                <?php echo ($biodata['relocate_out_location'] =="")?"No":"Yes"; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Two-wheeler riding license?</label>
                                                            </div>
                                                           <div class="col-md-2">
                                                                 <?php echo ($biodata['license_w2'] =="")?"No":"Yes"; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Four-wheeler driving license?</label>
                                                            </div>
                                                            <div class="col-md-2">
                                                               <?php echo ($biodata['license_w4'] =="")?"No":"Yes"; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Own two-wheeler vehicle?</label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                 <?php echo ($biodata['own_w2'] =="")?"No":"Yes"; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for="organization_size">Own four-wheeler vehicle?</label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?php echo ($biodata['own_w4'] =="")?"No":"Yes"; ?>
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
                                </ul>
                            </div>
<!-- ====================================================================================================================================== -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>



    </div>
</div>



<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="templates/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="templates/assets/node_modules/popper/popper.min.js"></script>
<script src="templates/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="templates/material/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="templates/material/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="templates/material/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="templates/material/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="templates/assets/node_modules/raphael/raphael-min.js"></script>
<script src="templates/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="templates/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="templates/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="templates/material/dist/js/dashboard1.js"></script>
<script src="templates/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<script src="templates/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="templates/assets/node_modules/switchery/dist/switchery.min.js"></script>
<script src="templates/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="templates/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="templates/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script type="text/javascript" src="templates/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<script src="templates/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>

</body>

</html>

