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
                <a class="btn btn-info" data-toggle="modal" data-target="#addModal" class="btn btn-success" title="Add Forex"><i class="fa fa-plus-square-o"></i> Add New Forex</a>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Currency</th>
                            <th>Currency Code</th>
                            <th>Show Front</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($currencies)){
                            foreach($currencies as $key=>$detail){
                                ?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $detail['currency']?></td>
                                    <td><?= $detail['currency_code']?></td>
                                    <td><?= ($detail['publish_status']=='1')?'<span class="glyphicon glyphicon-ok-sign" style="color:green"></span>':'<span class="glyphicon glyphicon-remove-sign" style="color:red"></span>'?></td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#editModal<?=$detail['currency_id']?>"><i class="glyphicon glyphicon-pencil"></i></a> <a data-toggle="modal" data-target="#deleteModal<?=$detail['currency_id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                        
                                    </td>

                                </tr>
                                <!-- Modal -->
                                        <div id="editModal<?=$detail['currency_id']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Currency</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="<?= base_url()?>forex/currency_form/<?= $detail['currency_id']?>">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3" for="currency">Currency:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="currency" placeholder="e.g. US Dollar" name="currency" value="<?= $detail['currency']?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3" for="currency_code">Currency Code:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="currency_code" placeholder="e.g. USD" name="currency_code" value="<?= $detail['currency_code']?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3" for="publish_status">Show Front</label>
                                                                <div class="col-sm-1">
                                                                    <input type="checkbox" class="form-control" id="publish_status"  name="publish_status" <?= ($detail['publish_status']=='1')?'checked':''?>>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit" class="btn btn-default">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div id="deleteModal<?=$detail['currency_id']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete Currency</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You are about to delete this currency.</p>
                                                        <p>Do you want to proceed?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="<?= base_url()?>forex/currency_delete/<?=$detail['currency_id']?>" id="btnYes" class="btn btn-success">Yes</a>
                                                        <a  data-dismiss="modal" aria-hidden="true" class="btn btn-danger">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                            }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
                <!-- Modal -->
                 <div id="addModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
            
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Currency </h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="<?= base_url()?>forex/currency_form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="currency">Currency:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="currency" placeholder="e.g. US Dollar" name="currency">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="currency_code">Currency Code:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="currency_code" placeholder="e.g. USD" name="currency_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="publish_status">Show Front</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" class="form-control" id="publish_status"  name="publish_status">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>

            </div>
        </div>


    </div>
</div>

