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
                <h4 class="text-themecolor">BioDatas</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Biodata</li>
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
                        <h4 class="card-title">Data Export</h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Sent Date</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($biodata as $row)
                                {
                                    $tog_biodata=explode(',',$row['bf_biodata']);
                                    foreach ($tog_biodata as $value) 
                                    {
                                        $cv=$this->crud->get_detail($value,"biodata_id","tbl_biodata_all");
                                ?>
                                        <tr>
                                        <td><?php echo $i++;?></td>

                                        <td><?php echo $cv['name'];?></td>

                                        <td>
                                            <?php
                                                echo date_converter($row['created']);
                                            ?>
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $row['biodata_forward_id'];?>"><i class="fa fa-eye" ></i></button>

                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $cv['biodata_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['biodata_forward_id'];?>" class="modal fade" role="dialog">
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
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('biodata/biodata_forward_delete/'. $row['biodata_forward_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
<!--                                                            <a href="--><?php //echo site_url('jobs/jobs_delete/'. $row['job_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <div class="modal fade bs-example-modal-lg<?php echo $cv['biodata_id'];?>"" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                                                                        <th scope="row">Name </th>
                                                                        <td><?php echo $cv['name'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Gender</th>
                                                                        <td>
                                                                            <?php 
                                                                                if($cv['gender']=='0'){echo "Female";}
                                                                                elseif($cv['gender']=='1'){echo "Male";}
                                                                                else{echo "Others";}
                                                                            ?>
                                                                        </td>

                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">Date Of Birth</th>
                                                                        <td><?php echo $cv['dob'];?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Marital Status</th>
                                                                        <td><?php echo ($cv['marital_status'] =="1")?"Yes":"No";?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Religions</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Nationality</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Current Address</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Permanent Address</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Contact Number</th>
                                                                        <td>home/work:no.<td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Job Categories</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Looking For</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Available For</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Specializations</th>
                                                                        <td><td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Religions</th>
                                                                        <td><td>
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
