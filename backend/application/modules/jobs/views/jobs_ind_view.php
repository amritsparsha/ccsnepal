<div class="page-wrapper">
    <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Jobs</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Jobs Detail</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="add_am"><i class="fa fa-arrow-left"></i> Back </a></button>
                    </div>
                </div>
            </div>

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
                <td><?php echo $this->crud->get_detail($row['job_level'],'joblevel_id','tbl_joblevel')['joblevel']; ?></td>
            </tr>
            <tr>
            <th scope="row">Job Category</th>
            <td> <?php echo $this->crud->get_detail($row['job_category'],'comc_id','tbl_company_category')['company_category']; ?></td>
            </tr><!--  <tr><th scope="row">Job Sub Category</th><td><?php //echo $row['joblevel'];?></td></tr> -->
            <tr>
                <th scope="row">Available For:</th>
                <td><?php if($row['availability_for'] =="full_time"){echo "Full Time";}elseif($row['availability_for'] =="part_time"){echo "Part Time";}else{echo "Contract";}?></td>
            </tr>
            <tr>
                <th scope="row">Deadline</th>
                <td><?php echo date_converter1($row['deadline']); ?></td>
            </tr>
            <tr>
                <th scope="row">Job Location</th>
                <td><?php echo $row['job_location']; ?></td>
            </tr>
            <tr>
                <th scope="row">Prefered Education</th>
                <td><?php echo $this->crud->get_detail($row['pref_edu'],'education_level_id','igc_education_level')['education_level']; ?></td>
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
                <td><?php echo $this->crud->get_exp_comparision($row['exp_year'])." ".$row['exp_year'];?> year </td>
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
                <td><?php echo ($row['customize_jd'] =="0")?"No":"Yes"; ?></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><?php echo $row['description'];?></td>
            </tr>
            <tr>
                <th scope="row">Apply Online ?</th>
                <td><?php echo ($row['apply_online'] =="1")?"Yes":"NO"."<br>".$row['apply_alternative']; ?></td>
            </tr>
            <tr>
                <th scope="row">Gender Specification ?</th>
                <td><?php echo ($row['gender_sp'] =="0")?"No Gender Specific":$row['gender']; ?></td>
            </tr>
            <tr>
                <th scope="row">Age Specification ?</th>
                <td><?php echo ($row['age_sp'] =="0")?"No Gender Specific":$this->crud->get_exp_comparision($row['age_lt'])." ".$row['age_group']; ?></td>
            </tr>
            <tr>
                <th scope="row">Show Oganization Name ?</th>
                <td><?php echo ($row['show_og_name'] =="1")?"Yes":"NO"."<br>"."Alternative Name: ".$row['og_alt_name']."<br>".$row['og_alt_description']; ?></td>
            </tr>
            <tr>
                <th scope="row">Employer Reference</th>
                <td><?php echo ($row['employer_ref'] > 0)?$this->crud->get_detail($row['employer_ref'],'come_id',"tbl_company_employers")['company_employers']:"Admin"; ?></td>
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
<!-- =============== -->
    </div>
</div>