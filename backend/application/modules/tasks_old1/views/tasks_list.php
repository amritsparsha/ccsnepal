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
                <h4 class="text-themecolor">Deals</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Deals</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('tasks/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
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





                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Task Title</th>
                                    <th>Company</th>

                                    <th>Task Type</th>
                                    <th>Assign To</th>
                                    <th>Assign By</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($tasks as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['title'];?></td>

                                        <td><?=$this->crud->contact_name_by_id($row['contact_id'])?></td>

                                          <td>
                                              <?php



                                              if($row['task_type'] == '0'){
                                                  ?>
                                                  <button class="btn btn-success btn-xs">Urgent</button>

                                                  <?php
                                              }elseif ($row['task_type'] == '1'){

                                                  ?>
                                                  <button class="btn btn-warning btn-xs">Medium</button>

                                                  <?php

                                              }elseif ($row['task_type'] =='2'){
                                                  ?>
                                                  <button class="btn btn-dark btn-xs">Normal</button>
                                                  <?php

                                              }else{
                                                  ?>

                                                  <?php

                                              }

                                              ?>




                                          </td>
                                        <td><?php echo $row['assign_to'];?>
                                            <?php 
                                            $task=$row['tasks_id'];
                                                $sql   = "SELECT * FROM igc_tasks_assign WHERE tasks_id =$task";
                                                    $query = $this->db->query($sql);
                                                    $contacts= $query->result_array();
                                                    foreach ( $contacts as $cont){

                                                     ?>
                                                    <!-- <?php echo $cont['assign_to'] ?>  -->
                                                   <!--  <a class="btn btn-success btn-xs" ></i> <?php echo $cont['assign_to'] ?> </a> -->

        <a class="btn btn-success btn-xs" ></i><?=$this->crud->user_name_by_id($cont['assign_to'])?></a>


                                                <?php } ?>


                                        </td>
                    <td><a class="btn btn-info btn-xs" ></i><?=$this->crud->user_name_by_id($row['assign_by'])?>
                                           </a></td>
                                        
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning btn-xs" data-target="#myModal_view<?php echo $row['tasks_id'];?>" data-toggle="modal" title="View"><i class="fa fa-eye" ></i></a>
                                                <a href="<?php echo site_url('tasks/form/'. $row['tasks_id']);?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $row['tasks_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <?php if($row['shows_with'] == 'model'): ?>
                                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('tasks/list_task_report/'. $row['tasks_id']);?>" data-toggle="tooltip" title="Task Report"><i class="fa  fa-mail-forward"></i></a>
                                                <?php endif; ?>


                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['tasks_id'];?>" class="modal fade" role="dialog">
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
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('tasks/tasks_delete/'. $row['tasks_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
<!--                                                            <a href="--><?php //echo site_url('tasks/tasks_delete/'. $row['tasks_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <!-- Modal for booking delete -->
                                            <div id="myModal_view<?php echo $row['tasks_id'];?>" class="modal fade"  role="dialog">
                                                <div class="modal-dialog modal-lg">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Task Details</strong> </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">


                                                            <table class="table table-bordered">

                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row"> Title</th>
                                                                    <td><?php echo $row['title'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Company Name</th>
                                                                    <td><?=$this->crud->contact_name_by_id($row['contact_id'])?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Date</th>
                                                                    <td>
                                           <b> Assign Date: </b> <br><?php echo $row['assign_date'];?> <br>

                                          <b> End Date: </b><br><?php echo $row['end_date']?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Task Type</th>
                                                                    <td><?php echo $row['task_type'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Assign To</th>
                                                                    <td><?php echo $row['assign_to'];?>
                                            <?php 
                                            $task=$row['tasks_id'];
                                                $sql   = "SELECT * FROM igc_tasks_assign WHERE tasks_id =$task";
                                                    $query = $this->db->query($sql);
                                                    $contacts= $query->result_array();
                                                    foreach ( $contacts as $cont){

                                                     ?>
                                                    <!-- <?php echo $cont['assign_to'] ?>  -->
                                                   <!--  <a class="btn btn-success btn-xs" ></i> <?php echo $cont['assign_to'] ?> </a> -->

        <a class="btn btn-success btn-xs" ></i><?=$this->crud->user_name_by_id($cont['assign_to'])?></a>


                                                <?php } ?>


                                        </td>

                                                                </tr>

                                                                 <tr>
                                                                    <th scope="row">Assign By</th>
                                                                    
                                        </td>
                    <td><a class="btn btn-info btn-xs" ></i><?=$this->crud->user_name_by_id($row['assign_by'])?>
                                           </a></td>

                                                                </tr>


                                                               
                                                              <!--   <tr>
                                                                    <th scope="row">Lead Type</th>
                                                                    <td> <?php

                                                                        if($row['type'] == 0) {
                                                                            echo "<span class='btn btn-success btn-xs'>New</span>";

                                                                        }elseif ($row['type'] == 1){
                                                                            echo "<span class='btn btn-warning btn-xs'>Cold</span>";

                                                                        }elseif ($row['type'] == 2){
                                                                            echo "<span class='btn btn-primary btn-xs'>Warm</span>";

                                                                        }elseif ($row['type'] == 3){
                                                                            echo "<span class='btn btn-info btn-xs'>Hot</span>";

                                                                        }elseif ($row['type'] == 4){
                                                                            echo "<span class='btn btn-dark btn-xs'>NLWC (No Longerr with Company)</span>";

                                                                        }elseif ($row['type'] == 5){
                                                                            echo "<span class='btn btn-danger btn-xs'>InActive</span>";

                                                                        }elseif ($row['type'] == 6){
                                                                            echo "<span class='btn btn-success btn-xs'>Active</span>";

                                                                        }else{
                                                                            echo "<span class='btn btn-success btn-xs'>Not Defined</span>";

                                                                        }


                                                                        ?></td>

                                                                </tr> -->
                                                                <!-- <tr>
                                                                    <th scope="row">Image</th>
                                                                    <td><img src="../uploads/taskss/<?php echo $row['featured_img'];?>" width="40%" /> </td>

                                                                </tr> -->
                                                                <tr>
                                                                    <th scope="row">Details</th>
                                                                    <td><?php echo $row['tasks_detail'];?></td>

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
                                            <!--modal-->

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
