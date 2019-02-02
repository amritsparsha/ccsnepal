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
                <h4 class="text-themecolor">Jobs</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Jobs</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('jobs/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
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
                        <h4 class="card-title">Data Export</h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Job Title</th>
                                    <th>Job Employeer</th>
                                    <th>Status</th>
                                    <th>Permission</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($jobs as $row)
                                {
                                    $employee=$this->crud->get_detail($row['employer_ref'],"come_id","tbl_company_employers");
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>

                                        <td><?php echo $row['job_title'];?></td>

                                        <td><?php echo $employee['company_employers'];?></td>

                                        <td>
                                            <?php
                                            if($row['publish_status'] == 1){
                                                ?>
                                                <span class="label label-success">Published</span>

                                            <?php

                                            }else{
                                                ?>
                                                <span class="label label-warning">Unpublished</span>
                                            <?php

                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                            <?php if ($row['super_publish_status']=='0'): ?>
                                                 <a href="<?php echo site_url('jobs_employeer/permission_yes/'.$row['job_id']);?>" class="btn btn-danger btn-xs" title="Permit to publish"><i class="fa fa-remove"></i></a>
                                            <?php else: ?>
                                                 <a href="<?php echo site_url('jobs_employeer/permission_no/'.$row['job_id']);?>" class="btn btn-success btn-xs" title="Permit to publish"><i class="fa fa-check"></i></a>
                                            <?php endif ?>
                                               
                                            </div>
                                            <!--modal-->
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?php //echo $row['job_id'];?>"><i class="fa fa-eye" ></i></button> -->
                                                
                                                <button type="button" class="btn btn-warning btn-xs" onclick="location.href='<?php echo site_url('jobs/job_detail/'.$row['job_id']); ?>'"><i class="fa fa-eye" ></i></button>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['job_id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Delete</strong> Confirmation</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this Information</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('jobs/jobs_delete/'. $row['job_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
<!--                                                            <a href="--><?php //echo site_url('jobs/jobs_delete/'. $row['job_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <div class="modal fade bs-example-modal-lg<?php echo $row['job_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><strong>Details</strong> </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>


                                                            <div class="modal-body">


                                                                <table class="table table-bordered">

                                                                    <tbody>

                                                                    <tr>
                                                                        <th scope="row">Job </th>
                                                                        <td><?php echo $row['job_title'];?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Job Types</th>
                                                                        <td> 
                                                                             <?php echo $this->crud->get_detail($row['job_type'],'comem_id','tbl_jobtype')['jobtype']; ?>
                                                                         </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Total Vacancy</th>
                                                                        <td><?php echo $row['No_vacancy']; ?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Job Level</th>
                                                                        <td><?php echo $this->crud->get_detail($row['job_level'],'joblevel_id','tbl_joblevel')['joblevel']; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Job Category</th>
                                                                        <td> 
                                                                            <?php echo $this->crud->get_detail($row['job_category'],'comc_id','tbl_company_category')['company_category']; ?>
                                                                         </td>

                                                                    </tr>
                                                                   <!--  <tr>
                                                                        <th scope="row">Job Sub Category</th>
                                                                        <td><?php //echo $row['joblevel'];?></td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <th scope="row">Available For:</th>
                                                                        <td>
                                                                              <?php 
                                                                                    if($row['availability_for'] =="full_time")
                                                                                    {
                                                                                        echo "Full Time";
                                                                                    }
                                                                                    elseif($row['availability_for'] =="part_time")
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
                                                                    <tr>
                                                                        <th scope="row">Deadline</th>
                                                                        <td><?php echo date_converter1($row['deadline']); ?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Job Location</th>
                                                                        <td>
                                                                            <?php echo $row['job_location']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Prefered Education</th>
                                                                        <td>
                                                                            <?php echo $this->crud->get_detail($row['pref_edu'],'education_level_id','igc_education_level')['education_level']; ?>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Education Programme</th>
                                                                        <td><?php echo $row['edu_program']; ?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Education Rquirement</th>
                                                                        <td><?php echo ($row['require_edu']=="0")?"No":"Yes";?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Experience Required </th>
                                                                        <td><?php echo ($row['require_exp']=="0")?"No":"Yes";?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Experience</th>
                                                                        <td>
                                                                            <?php echo $this->crud->get_exp_comparision($row['exp_year'])." ".$row['exp_year'];?> year 
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Skills Required ?</th>
                                                                        <td><?php echo ($row['require_skill']=="0")?"No":"Yes";?></td>

                                                                    </tr>
                                                                    <?php  $skills=explode(",",$row['skill_req_set']); ?>
                                                                    <tr>
                                                                        <th scope="row">Skills</th>
                                                                        <td>
                                                                            <ul>
                                                                                <?php foreach ($skills as $key => $skill): ?>
                                                                                    <li><?php echo $skill; ?></li>
                                                                                <?php endforeach ?>
                                                                            </ul>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Other Job Specification</th>
                                                                        <td><?php echo $row['job_specification']; ?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Customize Job Details ?</th>
                                                                        <td>
                                                                            <?php echo ($row['customize_jd'] =="0")?"No":"Yes"; ?>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Description</th>
                                                                        <td><?php echo $row['description'];?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Apply Online ?</th>
                                                                        <td>
                                                                            <?php echo ($row['apply_online'] =="1")?"Yes":"NO"."<br>".$row['apply_alternative']; ?>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Gender Specification ?</th>
                                                                        <td>
                                                                            <?php echo ($row['gender_sp'] =="0")?"No Gender Specific":$row['gender']; ?>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">Age Specification ?</th>
                                                                        <td>
                                                                            <?php echo ($row['age_sp'] =="0")?"No Gender Specific":$this->crud->get_exp_comparision($row['age_lt'])." ".$row['age_group']; ?>
                                                                        </td>

                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">Show Oganization Name ?</th>
                                                                        <td>
                                                                            <?php echo ($row['show_og_name'] =="1")?"Yes":"NO"."<br>"."Alternative Name: ".$row['og_alt_name']."<br>".$row['og_alt_description']; ?>
                                                                        </td>

                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">Employer Reference</th>
                                                                        <td>
                                                                            <?php echo ($row['employer_ref'] > 0)?$this->crud->get_detail($row['employer_ref'],'come_id',"tbl_company_employers")['company_employers']:"Admin"; ?>
                                                                        </td>

                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">Created</th>
                                                                        <td><?php echo $row['created'];?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Updated</th>
                                                                        <td><?php echo $row['updated'];?></td>

                                                                    </tr>



                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
</div>



<script>
    $('.delete').click(function(){

        var values = $(this).parent() .find('.hidden_link_delete').val();
        window.location =  values;
    });



</script>
