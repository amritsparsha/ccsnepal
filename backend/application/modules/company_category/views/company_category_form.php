
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="Category_name">Category Name</label>
                                                <input type="text" name="company_category"  size="50" data-validation="required" value="<?php echo (isset($company_category['company_category']) && $company_category['company_category'] !="") ? $company_category['company_category']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="category_details">Category Details</label>
                                                <textarea rows="5" cols="10" name="company_category_detail" id="company_category_detail"><?php echo (isset($company_category['company_category_detail']) && $company_category['company_category_detail'] !="") ? $company_category['company_category_detail']:""; ?></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-danger row">

                                            <div class="col-md-12">
                                                <label for="category_image">Category Image</label>
                                                <?php
                                                if(isset($company_category['featured_img']))
                                                {

                                                    ?>
                                                    <div class="remove_option">

                                                        <?php
                                                        $path  =  '../uploads/company_category/';
                                                        ?>
                                                        <img src="<?php echo $path. $company_category['featured_img'];?>" alt="featured_image" style="width: 20%;">

                                                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                                    </div>
                                                    <input type="hidden" name="pre_featuredimg" value="<?php echo $company_category['featured_img']; ?>">
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

                                                    <span>(Image Dimension 853*405 px)</span>
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
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label for="PageType">Publish Status<span class="asterisk">*</span></label>
                                            <select name="publish_status" class="publish_status form-control">

                                                <option value="1"  <?php echo (isset($company_category['publish_status']) && $company_category['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                                <option value="0"  <?php echo (isset($company_category['publish_status']) && $company_category['publish_status'] =="0")?"selected":"";?>>No</option>



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
                                                <input type="hidden" name="comc_id" value="<?php echo (isset($company_category['comc_id']) && $company_category['comc_id'] !="") ? $company_category['comc_id']:""; ?>">
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
    CKEDITOR.replace( 'company_category_detail',{
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
        })
    })
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

