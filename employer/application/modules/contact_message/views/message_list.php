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
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>Quick Contact Messages</strong>
            </div>

            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Send Date</th>

                                            <th>Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach($records as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['phone'];?></td>

                                                <td><?php echo $row['created'];?></td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" data-target="#myModal_info<?php echo $row['cf_id'];?>" data-toggle="modal" title="Info"><i class="fa fa-info-circle"></i></a>
                                                        <a class="btn btn-danger" data-target="#myModal_delete<?php echo $row['cf_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                                    </div>

                                                    <!-- modal show detail data-->
                                                    <div class="modal fade" id="myModal_info<?php echo $row['cf_id'];?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Message Details</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="box">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Name :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['name'];?>
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
                                                                    <label>Country :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['country'];?>
                                                                </div>
                                                            </div>
                                                            <hr class="modal-hr">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Company :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['company'];?>
                                                                </div>
                                                            </div>
                                                            <hr class="modal-hr">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Industry :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['industry'];?>
                                                                </div>
                                                            </div>
                                                            <hr class="modal-hr">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Services/Technology :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['services'];?>
                                                                </div>
                                                            </div>
                                                            <hr class="modal-hr">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Solutions/Category :</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <?php echo $row['solution'];?>
                                                                </div>
                                                            </div>
                                                            <hr class="modal-hr">

                                                        </div>
                                                        <p class="modal_note">
                                                            <label>Message  :</label>   <?php echo $row['message'];?>
                                                        </p>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                    </div>
                                                    <!--end modal-->

                                                    <!-- Modal for booking delete -->
                                                    <div id="myModal_delete<?php echo $row['cf_id'];?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Quick Contact Delete Confirmation</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure to delete this Information</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('contact_message/delete/'. $row['cf_id']); ?>">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-default delete">Ok</button>
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
<script>
    $('.delete').click(function(){

        var values = $(this).parent() .find('.hidden_link_delete').val();
        window.location =  values;
    });


</script>