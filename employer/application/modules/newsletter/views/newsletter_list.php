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
                <a class="btn btn-info" data-rel="tooltip" href="<?php echo site_url('newsletter/form');?>" title="Add Newsletter Content"><i class="fa fa-plus-square-o"></i> Add Newsletter Content</a>
            </div>
            
            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Send Letter</th>
                                            <th>Action</th>
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
                                                <td><?php echo $row['title'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td>
                                                    <?php
                                                    echo(isset($row['status']) and $row['status'] == "1") ? "Active" : "Inactive";
                                                    ?>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form method="post" action="newsletter/submit_newsletter">
                                                            <select name="group_name" class="form-control" required>
                                                                <option value="">Choose Group</option>
                                                                <?php
                                                                if(count($all_groups) > 0): foreach($all_groups as $data):
                                                                ?>
                                                                <option value="<?php echo $data['id']; ?>"><?php echo ucfirst($data['group_name']); ?></option>
                                                                <?php
                                                                endforeach; endif;
                                                                ?>
                                                            </select>
                                                            <input type="hidden" name="content_id" value="<?php echo $row['id']; ?>" />
                                                            <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i>&nbsp; SEND</button>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong_<?php echo $row['id']; ?>"><i class="fa fa-search-plus"></i>&nbsp; Preview</button>
                                                        </form>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Preview For '<?php echo $row['name'];?>'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br clear="all"/>
        <div class="preview_area">
            <div class="logo_area">
                <img src="themes/img/find_user.png" class="user-image img-responsive" width="70%"/>
            </div>
            <hr/>
            <?php echo trim($row['description']); ?>
            <hr/>
            <div class="newsletter_footer text-center">
                <h2>Altoufiq Tyres</h2>
                <p style="font-size: 13px;">
                Address: Al Barsha - Umm Suqeim Road Dubai - UAE<br/>
                Telephone: 04-3889952<br/>
                Mobile: 050-8856077, 055-8811411<br/>
                Email: info@altoufiqtyres.com<Br/>
                Website: <a href="http://www.altoufiqtyres.com" target="_blank">www.altoufiqtyres.com</a>
                </p>
            </div>
        </div>
        <br clear="all"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Model -->
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo site_url('newsletter/form/'. $row['id']);?>" class="btn btn-success" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                        <a class="btn btn-danger" data-target="#myModal_delete<?php echo $row['id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                                    </div>



                                                    <!-- Modal for booking delete -->
                                                    <div id="myModal_delete<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Job Delete Confirmation</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure to delete this Information</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('newsletter/delete/'. $row['id']); ?>">
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
<style type="text/css">
    .preview_area{
        width: 100%;
        float: left;
        padding: 10px;
    }
    .preview_area img, .preview_area iframe{
        max-width: 100%;
    }
</style>



