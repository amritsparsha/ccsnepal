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
        <!-- Advanced Tables -->
        <div class="panel panel-info">
            <div class="panel-heading">

                <strong> Enquiry List</strong>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>

                            <th>Email</th>
                            <th>Phone</th>
                            <th>Enquiry Date</th>

                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach($booking as $row)
                        {
                            $id = $row['booking_id'];
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['fullname'];?></td>

                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo date("d-M-Y, hi:A", strtotime($row['created'])) ;?></td>

                                <td class="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info" data-target="#modalNew<?php echo $id;?>" data-toggle="modal" title="Detail"><i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn-danger" data-target="#myModal_delete<?php echo $row['booking_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                    </div>
                                    <!-- modal show detail data-->
                                    <div class="modal fade" id="modalNew<?php echo $id;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title text-center">Enquirey Details</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="box">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Full Name :</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php echo $row['fullname'];?>
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">




                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Email :</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php echo $row['email'];?>
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Phone :</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php echo $row['phone'];?>
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Phone :</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php echo $row['country'];?>
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">



                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Enquiry :</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php echo $row['query'];?>
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                    <!-- Modal for booking delete -->
                                    <div id="myModal_delete<?php echo $row['booking_id'];?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Query Delete Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete this Query</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('package_booking/delete/'. $row['booking_id']); ?>">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-default delete">Ok</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--modal-->


                                </td>





                                <!--end modal-->
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->

<script>
    $('.accept').click(function(){

        var values = $(this).parent() .find('.hidden_link_accept').val();
        window.location =  values;
    });
    $('.cancel').click(function(){

        var values = $(this).parent() .find('.hidden_link_cancel').val();
        window.location =  values;
    });
    $('.delete').click(function(){

        var values = $(this).parent() .find('.hidden_link_delete').val();
        window.location =  values;
    });
</script>