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
                <h4 class="text-themecolor"><?php echo (!empty($title))?$title:"CCS Nepal"; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo (!empty($title))?$title:"CCS Nepal"; ?></li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('content/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
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
                                    <th>Title</th>
                                    <th>Publish Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $path="../uploads/content/";
                                $i = 1;
                                foreach($records as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['content_title']; ?></td>
                                        <td>
                                          <button type="button" class="btn btn-<?php echo ($row['publish_status'] == '1')?"success":"warning"; ?>">
                                            <?php echo ($row['publish_status'] =='1')?"Yes":"No" ?>
                                          </button>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning btn-xs" data-target="#myModal_view<?php echo $row['content_id'];?>" data-toggle="modal" title="View"><i class="fa fa-eye" ></i></a>

                                                <a href="<?php echo site_url('content/form/'. $row['content_id']);?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                                 <a href="<?php echo site_url('content/comment/'. $row['content_id']);?>" class="btn btn-primary btn-xs" title="Comments"><i class="fa fa-commenting-o"></i></a>

                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $row['content_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['content_id'];?>" class="modal fade" role="dialog">
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
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('content/delete/'. $row['content_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
<!--                                                            <a href="--><?php //echo site_url('contact/contact_delete/'. $row['contact_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <!-- Modal for booking delete -->
                                            <div id="myModal_view<?php echo $row['content_id'];?>" class="modal fade"  role="dialog">
                                                <div class="modal-dialog modal-lg">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Content Details</strong> </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">

                                                            <table class="table table-bordered">
                                                              <tbody>
                                                                <tr>
                                                                  <th>Image</th>
                                                                  <td>
                                                                    <img src="<?php echo $path.$row['featured_img']; ?>" alt="<?php echo $row['content_title'];?>" style="width:50px;height: 50px">
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Content Title</th>
                                                                    <td><?php echo $row['content_title'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Content Page Title</th>
                                                                    <td><?php echo $row['content_page_title'];?></td>

                                                                </tr>
                                                    <?php if ($row['content_ext_url'] != ""): ?>
                                                                <tr>
                                                                    <th scope="row">Content External Url</th>
                                                                    <td><?php echo $row['content_ext_url'];?></td>

                                                                </tr>
                                                    <?php endif ?>
                                                                <tr>
                                                                    <th scope="row">Content Body</th>
                                                                    <td><?php echo $row['content_body'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Show on Menu</th>
                                                                    <td>
                                                                        <?php 
                                                                          if($row['show_on_menu'] =="T"){
                                                                            echo "Top";
                                                                          }
                                                                          elseif($row['show_on_menu'] == "F"){
                                                                            echo "Footer";
                                                                          }
                                                                          else
                                                                          {
                                                                            echo "None";
                                                                          }
                                                                        ?>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Meta Title</th>
                                                                    <td><?php echo $row['meta_title'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Meta KeyWord</th>
                                                                    <td><?php echo $row['meta_keywords'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Meta Description</th>
                                                                    <td><?php echo $row['meta_description'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Date</th>
                                                                    <td><?php echo date_converter1($row['created']);?></td>
                                                                </tr>
                                                          <?php 
                                                            $check_tab=$this->crud->get_detail($row['content_id'],"content_id","igc_content_tabs");
                                                            if(count($check_tab) > 0 )
                                                            {
                                                              for($c=1 ; $c<=5 ; $c++) 
                                                              {
                                                                if($check_tab['tab'.$c] != '')
                                                                {
                                                          ?>
                                                                  <tr>
                                                                      <th scope="row">Tab Name</th>
                                                                      <td><?php echo $check_tab['tab'.$c];?></td>
                                                                  </tr>
                                                                  <tr>
                                                                      <th scope="row">Tab Description</th>
                                                                      <td><?php echo $check_tab['tab_description'.$c];?></td>
                                                                  </tr>
                                                          <?php  
                                                                }
                                                              }
                                                            }
                                                          ?>
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
