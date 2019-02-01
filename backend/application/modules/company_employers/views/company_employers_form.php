
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
                <h4 class="text-themecolor"><?php echo (isset($title) && $title !="") ? $title:""; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

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
            <div class="col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-body">
                                <h4 class="info-seperator">General Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Organization Name</label>
                                                <input type="text" name="company_employers"  size="50" data-validation="required" value="<?php echo (isset($company_employers['company_employers']) && $company_employers['company_employers'] !="") ? $company_employers['company_employers']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Organization Address</label>
                                                <input type="text" name="employer_address"  size="50" data-validation="required" value="<?php echo (isset($company_employers['employer_address']) && $company_employers['employer_address'] !="") ? $company_employers['employer_address']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Email</label>
                                                <input type="text" name="employer_email"  size="50" data-validation="required" value="<?php echo (isset($company_employers['employer_email']) && $company_employers['employer_email'] !="") ? $company_employers['employer_email']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Phone Number</label>
                                                <input type="text" name="employer_contact"  size="50" data-validation="required" value="<?php echo (isset($company_employers['employer_contact']) && $company_employers['employer_contact'] !="") ? $company_employers['employer_contact']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Ownership Type</label>
                                                <select name="como_id" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                    <option value="">-------Ownership Type-----------</option>
                                                    <?php foreach ($ownership_types as $key => $ownership_type): ?>
                                                        <option value="<?php echo $ownership_type['como_id']; ?>" <?php echo (isset($company_employers['como_id']) && $company_employers['como_id'] ==$ownership_type['como_id']) ? "selected":""; ?> >
                                                            <?php echo $ownership_type['company_ownership']; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Category (Industry)</label>
                                               <select name="comc_id" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                    <option value="">-------Categories-----------</option>
                                                    <?php foreach ($categories as $key => $category): ?>
                                                        <option value="<?php echo $category['comc_id']; ?>" <?php echo (isset($company_employers['comc_id']) && $company_employers['comc_id'] ==$category['comc_id']) ? "selected":""; ?> >
                                                            <?php echo $category['company_category']; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Organization Size</label>
                                                 <select name="comem_id" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                    <option value="">-------Organization Size-----------</option>
                                                    <?php foreach ($company_sizes as $key => $company_size): ?>
                                                        <option value="<?php echo $company_size['comem_id']; ?>" <?php echo (isset($company_employers['comem_id']) && $company_employers['comem_id'] ==$company_size['comem_id']) ? "selected":""; ?> >
                                                            <?php echo $company_size['company_size']; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Website URL</label>
                                                <input type="text" name="employer_website"  size="50" data-validation="required" value="<?php echo (isset($company_employers['employer_website']) && $company_employers['employer_website'] !="") ? $company_employers['employer_website']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>

                                <h4 class="info-seperator">Contact Person Details</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Contact Person</label>
                                                <input type="text" name="em_contact_person"  size="50" data-validation="required" value="<?php echo (isset($company_employers['em_contact_person']) && $company_employers['em_contact_person'] !="") ? $company_employers['em_contact_person']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Designation</label>
                                                <input type="text" name="em_contact_designation"  size="50" data-validation="required" value="<?php echo (isset($company_employers['em_contact_designation']) && $company_employers['em_contact_designation'] !="") ? $company_employers['em_contact_designation']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Email</label>
                                                <input type="text" name="em_contact_email"  size="50" data-validation="required" value="<?php echo (isset($company_employers['em_contact_email']) && $company_employers['em_contact_email'] !="") ? $company_employers['em_contact_email']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Address</label>
                                                <input type="text" name="em_contact_address"  size="50" data-validation="required" value="<?php echo (isset($company_employers['em_contact_address']) && $company_employers['em_contact_address'] !="") ? $company_employers['em_contact_address']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>


                                </div>







                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="category_details">Ownership Details</label>
                                                <textarea rows="5" cols="10" name="company_employers_detail" id="company_employers_detail"><?php echo (isset($company_employers['company_employers_detail']) && $company_employers['company_employers_detail'] !="") ? $company_employers['company_employers_detail']:""; ?></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-danger row">

                                            <div class="col-md-12">
                                                <label for="category_image">Organization Logo</label>
                                                <?php
                                                if(isset($company_employers['featured_img']))
                                                {

                                                    ?>
                                                    <div class="remove_option">

                                                        <?php
                                                        $path  =  '../uploads/company_employers/';
                                                        ?>
                                                        <img src="<?php echo $path. $company_employers['featured_img'];?>" alt="featured_image" style="width: 20%;">

                                                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                                    </div>
                                                    <input type="hidden" name="pre_featuredimg" value="<?php echo $company_employers['featured_img']; ?>">
                                                    <div id="image_input">

                                                        <span>(Image Dimension 853*405 px)</span>
                                                        <input type="file" name="featured_img" class="form-control" id="featuredimg">
                                                        <span id="type_error"></span>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>

                                                    <span>(Logo Dimension 853*405 px)</span>
                                                    <input type="file" name="featured_img" class="form-control"  id="featuredimg">
                                                    <span id="type_error"></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <!--/row-->

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="PageType">Company Type<span class="asterisk">*</span></label>
                                            <select name="company_type" class="publish_status form-control" id="company_type">
                                                <option value="">Select Company Type</option>
                                                <option value="0"  <?php echo (isset($company_employers['company_type']) && $company_employers['company_type'] =="0")?"selected":"";?>>Contact</option>
                                                <option value="1"  <?php echo (isset($company_employers['company_type']) && $company_employers['company_type'] =="1")?"selected":"";?>>Customers</option>
                                                <option value="2"  <?php echo (isset($company_employers['company_type']) && $company_employers['company_type'] =="2")?"selected":"";?>>Employers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" >
                                        <div class="form-group" id="lead_type_parent">
                                            <label for="PageType">Lead Type<span class="asterisk">*</span></label>
                                            <select name="lead_type" class="publish_status form-control" id="lead_type">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label for="PageType">Publish Status<span class="asterisk">*</span></label>
                                            <select name="publish_status" class="publish_status form-control">

                                                <option value="1"  <?php echo (isset($company_employers['publish_status']) && $company_employers['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                                <option value="0"  <?php echo (isset($company_employers['publish_status']) && $company_employers['publish_status'] =="0")?"selected":"";?>>No</option>



                                            </select>
                                        </div>

                                    </div>
                                </div>

                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" name="come_id" value="<?php echo (isset($company_employers['come_id']) && $company_employers['come_id'] !="") ? $company_employers['come_id']:""; ?>">
                                                <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">


                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $.validate();
</script>
<script>
    CKEDITOR.replace( 'company_employers_detail',{
    filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",
    filebrowserWindowWidth  : 800,
    filebrowserWindowHeight : 500
});

</script>
<script>
    $('.add-tag').click(function(){
        var value = $(this).attr("id");
        $('#new_tags').val($('#new_tags').val() + value);
    });
</script>
<!-- script to remove tags-->
<script>
    $('.remtag').click(function(){

        var term = $(this).attr("id");
        var content = $('#content_id').val();

        var postData = {
            'term_id' : term,
            'content_id' : content
        };


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/rmv_content_tag',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>
<script>
    $(document).ready(function(e){

        // =================
        $("#lead_type_parent").hide();
        $("#company_type").change(function(e){
            var comp_type = $("#company_type").val();
            if( comp_type != 2)
            { 
                $("#lead_type_parent").show();
                $.post('<?php echo site_url('company_employers/ajax_company_lead'); ?>',{comp_type:comp_type},function(data){
                    $("#lead_type").html(data);
                });
            }
            else
            {
                $("#lead_type_parent").hide();
            }
        });        
        // ================

        var  value = $('.page_type').val();

        if(value == "Page")
        {

            $('#multi_tab').show();

        }

        else
        {

            $('#multi_tab').hide();


        }

        $('.page_type').change(function(){
            var  value = $('.page_type').val();
            if(value == "Page")
            {

                $('#multi_tab').show();

            }
            else
            {

                $('#multi_tab').hide();


            }
        });
    });
</script>

<script>

    $('#save_content').click(function(e)
    {

        $("#type_error").text("");
        var a=0;

        var ext1 =  $('#featuredimg').val().split('.').pop().toLowerCase();


        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
            {
                a = 0
            }
            else
            {

                a = 1;
            }
        }

        if(a != "1")
        {
            $("#type_error").text("Invalid Featured Image");
            $("#type_error").css("color", "red");

            e.preventDefault();
        }

        else{

            e.submit;

        }



    });
</script>


