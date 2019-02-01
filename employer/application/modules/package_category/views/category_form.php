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
                <?php echo (isset($title) && $title !="") ? $title:""; ?>
            </div>

            <div class="panel-body">

                <form class="tab_form" id="form-a" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Category Name <span class="asterisk">*</span></label>
                                    <input type="text" name="category_name"  data-validation="required"  value="<?php echo (isset($setting['category_name']) && $setting['category_name'] !="") ? $setting['category_name']:""; ?>"  autocomplete="off" class="form-control required valid" kl_virtual_keyboard_secure_input="on">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="slogan">Category Code<span class="asterisk">*</span> </label>
                                    <select name="category_code"  data-validation="required" class="form-control">
                                        <option <?php echo (isset($setting['category_code']) && $setting['category_code'] =="HM") ? "selected":"";?> value="HM">Home</option>
                                        <option <?php echo (isset($setting['category_code']) && $setting['category_code'] =="LS") ? "selected":"";?> value="LS">Listing</option>
                                        <option <?php echo (isset($setting['category_code']) && $setting['category_code'] =="OT") ? "selected":"";?> value="OT">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <?php
                                    if(isset($setting['featured_img']))
                                    {

                                        ?>
                                        <div class="remove_option">

                                            <?php
                                            $path  = '../uploads/package_category/';
                                            ?>
                                            <img src="<?php echo $path. $setting['featured_img'];?>" alt="featured_image" style="50%">

                                            <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                        </div>
                                        <input type="hidden" class="form-control" name="pre_featuredimg" value="<?php echo $setting['featured_img']; ?>">
                                        <div id="image_input">


                                            <input type="file" class="form-control" name="featured_img" id="featuredimg">
                                            <span id="type_error"></span>

                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>


                                        <input type="file" class="form-control" name="featured_img"  id="featuredimg" >
                                        <span id="type_error" style="padding-left: 33px;"></span>


                                        <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <textarea name="meta_keywords" class="form-control" ><?php echo (isset($setting['meta_keywords']) !="") ? $setting['meta_keywords']:""; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" ><?php echo (isset($setting['meta_description']) !="") ? $setting['meta_description']:""; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <textarea name="meta_title" class="form-control"  ><?php echo (isset($setting['meta_title']) !="") ? $setting['meta_title']:""; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="radio" name="publish_status" <?php echo (isset($setting['publish_status']) && $setting['publish_status'] =="1")?"checked":"";?> class="regular-text" data-validation="required" value="1">Active
                                    <input type="radio" name="publish_status" <?php echo (isset($setting['publish_status']) && $setting['publish_status'] =="0")?"checked":"";?> class="regular-text" data-validation="required" value="0">Inactive

                                </div>
                                <div class="form-group">
                                    <label>Show On Mobile</label>
                                    <input type="radio" name="show_mobile" <?php echo (isset($setting['show_mobile']) && $setting['show_mobile'] =="Y")?"checked":"";?> class="regular-text" data-validation="required" value="Y">Yes
                                    <input type="radio" name="show_mobile" <?php echo (isset($setting['show_mobile']) && $setting['show_mobile'] =="N")?"checked":"";?> class="regular-text" data-validation="required" value="N">No

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" id="description"><?php echo (isset($setting['description']) && $setting['description'] !="") ? $setting['description']:""; ?></textarea>

                                </div>

                            </div>
                        </div>


                        <p class="submit">
                            <input type="hidden" name="category_id" value="<?php echo (isset($setting['category_id']) && $setting['category_id'] !="") ? $setting['category_id']:""; ?>">
                            <input type="submit" name="Setting Btn" id="btn_category" class="btn btn-danger btn-sm" value="Save">
                        </p>



                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<script>
    $.validate();
</script>
<script>
    CKEDITOR.replace('description');
</script>
<script>

    $('#btn_category').click(function(e)
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
