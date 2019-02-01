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
                <h4 class="text-themecolor">Biodata Forward</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Biodata Forward</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('biodata_forward/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Forward New Biodata </a></button>
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
                                    <th>Employer</th>
                                    <th>Sent Date</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($biodata_forward as $row)
                                {
                                     $employer=$this->crud->get_detail($row['bf_employer'],"come_id","tbl_company_employers");
                                     $biodatas=explode(",",$row['bf_biodata']);
                                ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>

                                        <td><?php echo $employer['company_employers'];?></td>

                                        <td>
                                            <?php
                                                echo date_converter1($row['created']);
                                            ?>
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $row['biodata_forward_id'];?>"><i class="fa fa-eye" ></i></button>


                                                <a href="<?php echo site_url('biodata_forward/form/'. $row['biodata_forward_id']);?>" class="btn btn-success" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                                <a class="btn btn-danger" data-target="#myModal_delete<?php echo $row['biodata_forward_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
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
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('biodata_forward/biodata_forward_delete/'. $row['biodata_forward_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <div class="modal fade bs-example-modal-lg<?php echo $row['biodata_forward_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                                                                        <th scope="row">Employee</th>
                                                                        <td><?php echo $employer['company_employers'];?> </td>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">Details</th>
                                                                        <td><?php echo $row['bf_detail'];?></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <th scope="row">CVs</th>
                                                                        <td>
                                                                            <?php 
                                                                                foreach ($biodatas as $biodata) 
                                                                                {
                                                                                    $cv=$this->crud->get_detail($biodata,"biodata_id","tbl_biodata_all");
                                                                                    echo $cv['name']."<br/>";
                                                                                }
                                                                            ?>                    
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
