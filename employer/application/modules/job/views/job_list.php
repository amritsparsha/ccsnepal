

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
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
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                CV List

                                <!--<a class="btn btn-info" data-rel="tooltip" href="<?php echo site_url('job/form');?>" title="Add Package"><i class="fa fa-plus-square-o"></i> Add New Package</a>-->
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach($records as $row)
                                        {
                                            ?>

                                            <tr class="odd gradeX">
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php
                                                    echo(isset($row['publish_status']) and $row['publish_status'] == "1") ? "Active" : "Inactive";
                                                    ?></td>

                                                <td class="center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" data-target="#myModal_info<?php echo $row['job_id'];?>" data-toggle="modal" title="Info"><i class="fa fa-info-circle"></i></a>

                                                        <a href="<?php echo site_url('job/delete_package/'. $row['job_id']);?>" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                    <!-- Modal for detail -->
                                                    <div id="myModal_info<?php echo $row['job_id'];?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Detail</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                    $path  ='../uploads/package/'.$row['job_id']."/";

                                                                    ?>
                                                                    <img src="<?php echo $path.$row['image'];?>" width="15%" >



                                                                    <a href="<?php echo $path.$row['cv'];?>" download class="pull-right"><i class="fa fa-download" aria-hidden="true"></i> Download CV</a>
                                                                    <table class="table">

                                                                        <tbody>
                                                                        <tr>
                                                                            <th>Name </th>
                                                                            <td><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Email </th>
                                                                            <td><?php echo $row['email'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Phone </th>
                                                                            <td><?php echo $row['phone'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Country</th>
                                                                            <td><?php echo $row['country'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>City</th>
                                                                            <td><?php echo $row['city'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Address</th>
                                                                            <td><?php echo $row['address'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Job Location</th>
                                                                            <td><?php echo $row['joblocation'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Job Type</th>
                                                                            <td><?php echo $row['jobtype'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Job Role</th>
                                                                            <td><?php echo $row['jobrole'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Qualification</th>
                                                                            <td><?php echo $row['qualification'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Experience</th>
                                                                            <td><?php echo $row['experience'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Career Level</th>
                                                                            <td><?php echo $row['careerlevel'];?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Passport No.</th>
                                                                            <td><?php echo $row['passportno'];?></td>

                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                    <table>

                                                                    </table>

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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->







<script>
    $('.pkg_active').click(function(){

        var id = $(this).attr("id");


        var postData = {
            'active_id' : id,
            'inactive_id' : ''

        };

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/package/show_front',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>

<script>
    $('.pkg_inactive').click(function(){

        var id = $(this).attr("id");

        var postData = {
            'inactive_id' : id,
            'active_id' : ''

        };

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/package/show_front',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>