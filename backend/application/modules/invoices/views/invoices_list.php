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
                <h4 class="text-themecolor">Invoices</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Invoices</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('invoices/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
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
                                    <th>Invoice Num.</th>
                                    <th>Contact Name</th>
                                    <!-- <th>Sub Total</th> -->
                                    <!-- <th>Discount</th> -->
                                    <!-- <th>Tax</th> -->
                                    <!-- <th>Total Amount</th> -->
                                     <th>Date</th>
                                    <th>Add Bill</th>
                                   
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach($invoices as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['invoice_number'];?></td>

                                        <td><?php echo $row['contact_id'];?></td>
                                        <!-- <td><?php echo $row['sub_total'];?>  </td> -->
                                        <!-- <td><?php echo $row['discount'];?></td> -->
                                        <!-- <td><?php echo $row['tax'];?> % </td> -->
                                        <!-- <td><?php echo $row['total_amount'];?></td> -->
                                        <td><?php echo $row['date'];?></td>
                                        <td><a href="<?php echo site_url('invoices/form/'. $row['invoices_id']);?>" class="btn btn-success btn-xs" title="Add Bill"><i class="fa fa-plus"></i></a></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning btn-xs" data-target="#myModal_view<?php echo $row['invoices_id'];?>" data-toggle="modal" title="View"><i class="fa fa-eye" ></i></a>
                                                <a href="<?php echo site_url('invoices/form/'. $row['invoices_id']);?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $row['invoices_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['invoices_id'];?>" class="modal fade" role="dialog">
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
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('invoices/invoices_delete/'. $row['invoices_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
<!--                                                            <a href="--><?php //echo site_url('invoices/invoices_delete/'. $row['invoices_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <!-- Modal for booking delete -->
                                            <div id="myModal_view<?php echo $row['invoices_id'];?>" class="modal fade"  role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Invoices Details</strong> </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">


                                                            <table class="table table-bordered">

                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Invoices Title</th>
                                                                    <td><?php echo $row['name'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Quote Status</th>
                                                                    <td><?php echo $row['quote_status'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Amount</th>
                                                                    <td><?php echo $row['amount'];?><?php echo $row['currency'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Responsible Person</th>
                                                                    <td><?php echo $row['res_person'];?></td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Lead</th>
                                                                    <td><?php echo $row['lead_id'];?></td>

                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th scope="row">Date</th>
                                                                    <td><?php echo $row['date'];?></td>

                                                                </tr>
                                                               
                                                                
                                                                <tr>
                                                                    <th scope="row">Details</th>
                                                                    <td><?php echo $row['invoices_detail'];?></td>

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
