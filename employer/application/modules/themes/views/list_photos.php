

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
                        <i class="fa fa-plus-square-o"></i><a href="javascript:void(0);" data-toggle="modal" data-target="#addFeatureImage"> Add New Image & Caption </a>
<!-- ------------------ Model For Add Images ------------------  -->
<div id="addFeatureImage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Photos & Caption For Your Service</h4>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="<?php echo site_url('themes/add_photo'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="content_id" value="<?php echo $service_id; ?>" />
            <div class="form-group">
                <label>Image Title</label>
                <input type="text" name="title" class="form-control" placeholder="Image Title" required />
               
            </div>
            
            <div class="form-group">
                <label>Image Photo</label>
                <input type="file" name="image" class="form-control" required />
            </div>
            
            <div class="form-group">
                <label>Image Caption</label>
                <textarea name="description" placeholder="Image Caption" rows="5" class="form-control"></textarea>
               
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-lg"> SAVE </button>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S.N</th>
                   <th>Image</th>
                   <th>Service Title</th>
                   <th>Image Title </th>
                   <th>Caption</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach($records as $row){
                    $serviceDetail = $this->crud->get_detail($row['content_id'],"content_id","igc_content");
                ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td>
                            <?php
                            if(strlen($row['image']) > 0){
                            ?>
                                <img src="../uploads/service_image/<?php echo $row['image']; ?>" height="100" />
                            <?php
                            }else{
                                echo "<em>No Preview</em>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $serviceDetail['content_title'];?>
                            
                        </td>
                        <td>
                            <?php echo $row['title'];?>
                            
                        </td>
                        <td>
                            <?php echo $row['description']; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="javascript:void(0);" data-toggle="modal" data-target="#editFeatureImage_<?php echo $row['id']; ?>"  title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                <a class="btn btn-danger" data-target="#myModal_delete<?php echo $row['id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </td>
<!-- ------------------ Model For Edit Images ------------------  -->
<div id="editFeatureImage_<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Photos & Caption For Your Service</h4>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="<?php echo site_url('themes/add_photo/'.$row['id']); ?>" enctype="multipart/form-data">
            <input type="hidden" name="content_id" value="<?php echo $service_id; ?>" />
            <div class="form-group">
                <label>Image Title</label>
                <input type="text" name="title" class="form-control" placeholder="Image Title" value="<?php echo $row['title'];?>" />
                
            </div>
            
            <div class="form-group">
                <label>Image Photo</label>
                <input type="file" name="image" class="form-control"/>
                <input type="hidden" name="image_img" value="<?php echo $row['image']; ?>">
                <div>
                    <?php
                    if(strlen($row['image']) > 0){
                    ?>
                        <img src="../uploads/service_image/<?php echo $row['image']; ?>" height="100" />
                    <?php
                    }else{
                        echo "<em>No Preview</em>";
                    }
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label>Image Caption</label>
                <textarea name="description" placeholder="Image Caption" rows="5" class="form-control"><?php echo $row['description'];?></textarea>
               
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-lg"> SAVE </button>
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
        <form method="POST" action="<?php echo site_url('themes/delete_photo/'. $row['id']); ?>">
            <input type="hidden" name="content_id" value="<?php echo $service_id; ?>" />
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
  

<!-- /. ROW  -->