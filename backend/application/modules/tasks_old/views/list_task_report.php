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
                <h4 class="text-themecolor">Task Report</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Task Report</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="javascript:void(0);" class="add_am"  data-toggle="modal" data-target="#addFeatureImage"><i class="fa fa-plus-circle"></i>  Add New Report </a></button>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">


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

            <div class="col-sm-12">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="btn btn-info">
                        <i class="fa fa-plus-square-o"></i><a href="javascript:void(0);" class="add_am"  data-toggle="modal" data-target="#addFeatureImage"> Add New Report </a>
                        </span>
                            <!-- ------------------ Model For Add Images ------------------  -->
                        <div id="addFeatureImage" class="modal fade" role="dialog">
                            <div class="modal-dialog  modal-lg">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Your Task Report</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" action="<?php echo site_url('tasks/add_task_report'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="tasks_id" value="<?php echo $service_id; ?>" />
                                            <div class="form-group">
                                                <label>Report Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Report Title" required />

                                            </div>

                                            <div class="form-group">
                                                <label>Report Photo</label>
                                                <input type="file" name="image" class="form-control" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Report Detail</label>
                                                <textarea name="description" placeholder="Report" id="contact_detail" rows="5" class="form-control"></textarea>

                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg"> Save Report </button>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ------------------ Model For Add Images ------------------  -->
                    </div>
                    <div class="panel-body">
                        <?php
                        //print_r($records);
                        ?>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>

                                    <th>Task Title</th>
                                    <th>Report Title </th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($records as $row){
                                    $serviceDetail = $this->crud->get_detail($row['tasks_id'],"tasks_id","igc_tasks");
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>

                                        <td>
                                            <?php echo $serviceDetail['title'];?>

                                        </td>
                                        <td>
                                            <?php echo $row['title'];?>

                                        </td>
                                        <td>
                                            <?php echo $row['description']; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $row['id'];?>"><i class="fa fa-eye" ></i></button>
                                                <a class="btn btn-success btn-xs" href="javascript:void(0);" data-toggle="modal" data-target="#editFeatureImage_<?php echo $row['id']; ?>"  title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $row['id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div class="modal fade bs-example-modal-lg<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><strong>Task Title: </strong><?php echo $serviceDetail['title'];?> </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>


                                                            <div class="modal-body">


                                                                <table class="table table-bordered">

                                                                    <tbody>

                                                                    <tr>
                                                                        <th scope="row">Report Title </th>
                                                                        <td><?php echo $row['title'];?></td>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">Report Detail </th>
                                                                        <td><?php echo $row['description'];?></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">File </th>
                                                                        <td><?php
                                                                            if(strlen($row['image']) > 0){
                                                                                ?>
                                                                                <img src="../uploads/tasks_image/<?php echo $row['image']; ?>" height="100" />

                                                                                <a href="../uploads/tasks_image/<?php echo $row['image']; ?>" class="btn btn-info" download><i class="fa fa-download"></i> Download</a>
                                                                                <?php
                                                                            }else{
                                                                                echo "<em>No Preview</em>";
                                                                            }
                                                                            ?>

                                                                        </td>

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

                                        <!--modal-->





                                        <!-- ------------------ Model For Edit Images ------------------  -->
                                        <div id="editFeatureImage_<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog  modal-lg">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Report</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="POST" action="<?php echo site_url('tasks/add_task_report/'.$row['id']); ?>" enctype="multipart/form-data">
                                                            <input type="hidden" name="tasks_id" value="<?php echo $service_id; ?>" />
                                                            <div class="form-group">
                                                                <label>Report Title</label>
                                                                <input type="text" name="title" class="form-control" placeholder="Image Title" value="<?php echo $row['title'];?>" />

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Report File</label>
                                                                <input type="file" name="image" class="form-control"/>
                                                                <input type="hidden" name="image_img" value="<?php echo $row['image']; ?>">
                                                                <div>
                                                                    <?php
                                                                    if(strlen($row['image']) > 0){
                                                                        ?>
                                                                        <img src="../uploads/tasks_image/<?php echo $row['image']; ?>" height="100" />
                                                                        <?php
                                                                    }else{
                                                                        echo "<em>No Preview</em>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Details</label>
                                                                <textarea name="description" placeholder="Report" rows="5" id="contact_detail1" class="form-control"><?php echo $row['description'];?></textarea>

                                                            </div>

                                                            <div class="form-group">
                                                                <button class="btn btn-primary btn-lg"> Update your report </button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- ------------------ Model For Edit Images ------------------  -->

                                        <!-- ------------------ Modal for  delete ------------------- -->
                                        <div id="myModal_delete<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <form method="POST" action="<?php echo site_url('tasks/delete_photo/'. $row['id']); ?>">
                                                        <input type="hidden" name="tasks_id" value="<?php echo $service_id; ?>" />
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Content Delete Confirmation </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this Information</p>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-default delete">Yes, Delete This </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- ------------------ Modal for  delete ------------------- -->
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
            <!-- /.col -->
        </div>

    </div>
</div>

  <!-- Content Wrapper. Contains page content -->
<script>
    CKEDITOR.replace( 'contact_detail',{
        filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500
    });

    CKEDITOR.replace( 'contact_detail1',{
        filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500
    });

</script>