<div class="row">
    <div class="col-lg-12">
        <?php
           if(validation_errors())
           {
               ?>

               <div class="alert  alert-danger alert_box">
                   <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                           class="fa fa-times"></i></a>
                   <?php echo validation_errors();?>
               </div>
               <?php
           }
           ?>
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
<!-- Form Elements -->
<div class="panel panel-info">
<div class="panel-heading">
    Add/Edit Packages
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">

<form role="form" method="post" id="form-a" action="" enctype="multipart/form-data">
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">General</a></li>
    <li><a data-toggle="pill" href="#menu1">RPM/Series</a></li>
    <li><a data-toggle="pill" href="#menu3">Images & PDF</a></li>
    <!--            <li><a data-toggle="pill" href="#menu4">Destination & Activities</a></li>-->
<!--    <li><a data-toggle="pill" href="#menu5">Itinerary</a></li>-->
    <li><a data-toggle="pill" href="#menu6">Mounting</a></li>
    <li><a data-toggle="pill" href="#menu7">Meta Tags</a></li>

</ul>

<div class="tab-content package">
<div id="home" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-3"><label>First Name</label></div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="firstname" class="form-control" id="tour_code" value="<?php echo (isset($package['firstname']) !="") ? $package['firstname']:""; ?>" data-validation="required">

            </div>
        </div>
    </div><!--row-->

    <div class="row">
        <div class="col-md-3"><label>Last Name</label></div>
        <div class="col-md-6">
            <div class="form-group">

                <input type="text" name="lastnaem" class="form-control" id="package_name" value="<?php echo (isset($package['lastname']) !="") ? $package['lastname']:""; ?>"  data-validation="required">
                <span id="package_name_error"></span>
            </div>
        </div>
    </div><!--row-->


    <div class="row">
        <div class="col-md-3"><label>Country</label></div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="country" class="form-control" value="<?php echo (isset($package['country']) !="") ? $package['country']:""; ?>" data-validation="required">
            </div>
        </div>
    </div><!--row-->

    <div class="row">
        <div class="col-md-3"><label>Qualification</label></div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="qualification" class="form-control" value="<?php echo (isset($package['qualification']) !="") ? $package['qualification']:""; ?>"   data-validation="required">
            </div>
        </div>
    </div><!--row-->


    <div class="row">
        <div class="col-md-3"><label>Is Active</label></div>
        <div class="col-md-6">
            <div class="form-group">

                <div class="col-md-3"><input type="radio" <?php echo(isset($package['publish_status']) and $package['publish_status'] == "1")?"checked":"";?> value="1"  name="publish_status"  data-validation="required"><span style="padding-left: 11px;">Yes</span></div>
                <div class="col-md-2"><input type="radio" <?php echo(isset($package['publish_status']) and $package['publish_status'] == "0")?"checked":"";?> value="0" name="publish_status"  data-validation="required"><span style="padding-left: 11px;">No</span></div>
            </div>
        </div>
    </div><!--row-->









</div>
<div id="menu1" class="tab-pane fade">
    <div class="row">
        <div class="col-md-2"><label>Speed (RPM)</label></div>
        <div class="col-md-8">
            <div class="form-group">

                <textarea rows="3" class="form-control" name="summary" id ="txt-content"><?php echo (isset($package['summary']) !="") ? $package['summary']:""; ?></textarea>
            </div>
        </div>
    </div><!--row-->
    <div class="row">
        <div class="col-md-2"><label>Series</label></div>
        <div class="col-md-8">
            <div class="form-group">

                <textarea rows="3" class="form-control" name="description" id ="txt-content1"><?php echo (isset($package['description']) !="") ? $package['description']:""; ?></textarea>
            </div>
        </div>
    </div><!--row-->
</div>

<?php
$path  ='../uploads/package/'.$job_id."/";
?>
<div id="menu3" class="tab-pane fade">
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <?php

                if(! empty($package['image']))
                {

                    ?>
                    <div class="remove_option">


                        <img src="<?php echo $path. $package['image'];?>" alt="package_image" style="max-width: 940px; max-height: 360px;">

                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                    </div>
                    <input type="hidden" name="pre_image" value="<?php echo $package['image']; ?>">
                    <div id="image_input">
                        <label>Upload Featured Image</label>
                        <span>(Image Dimension 560*370 px)</span>
                        <input type="file" name="image" id="image">
                        <span id="featured_error"></span>
                    </div>
                <?php
                }
                else
                {
                    ?>
                    <label>Upload Featured Image</label>
                    <span>(Image Dimension 560*370 px)</span>
                    <input type="file" name="image" data-validation= "required" id="image">
                    <span id="featured_error"></span>

                <?php
                }
                ?>



            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <?php

                if(! empty($package['packageimg']))
                {

                    ?>
                    <div class="remove_option1">


                        <img src="<?php echo $path. $package['packageimg'];?>" alt="package_image" style="max-width: 940px; max-height: 360px;">

                        <span class="btn btn-info remove_btn" id="btn_remove1">Remove</span>
                    </div>
                    <input type="hidden" name="pre_packageimg" value="<?php echo $package['packageimg']; ?>">
                    <div id="image_input1">
                        <label>Upload Banner Image</label>
                        <span>(Image Dimension 1111*430 px)</span>

                        <input type="file" name="packageimg"  id="bannerimg">
                        <span id="banner_error"></span>
                    </div>
                <?php
                }
                else
                {
                    ?>
                    <label>Upload Banner Image</label>
                    <span>(Image Dimension 1111*430 px)</span>

                    <input type="file" name="packageimg" data-validation= "required" id="bannerimg">
                    <span id="banner_error"></span>
                <?php
                }
                ?>



            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group" style="padding-top: 10px;">
                <?php


                if(! empty($package['cv']))
                {

                    ?>
                    <div class="remove_option2">

                        <i class="fa fa-file-pdf-o" style="font-size: 50px;"></i>

                        <span class="btn btn-info remove_btn" id="btn_remove2">Remove</span>
                    </div>
                    <input type="hidden" name="pre_cv" value="<?php echo $package['cv']; ?>">
                    <div id="pdf_input">
                        <label>Upload PDF</label>
                        <input type="file" name="cv" id="cv">
                        <span id="pdf_error"></span>


                    </div>
                <?php
                }
                else
                {
                    ?>
                    <label>Upload PDF</label>
                    <input type="file" name="cv" id="cv">
                    <span id="pdf_error"></span>

                <?php
                }
                ?>



            </div>
        </div>


    </div>
</div>


<!---Tabs-->

<div id="menu6" class="tab-pane fade">
    <div class="row">
        <div class="col-md-2">
            <label>B3</label>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="tab1" value="<?php echo (isset($package['tab1']) !="") ? $package['tab1']:""; ?>" class="form-control">
            </div>
        </div>

    </div><!--row-->

    <div class="row">
        <div class="col-md-2">
            <label>B3 Description</label>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <textarea rows="3" name="description1" class="form-control" id ="tab1"><?php echo (isset($package['description1']) !="") ? $package['description1']:""; ?></textarea>
            </div>
        </div>



    </div><!--row-->
    <div class="row">
        <div class="col-md-2">
            <label>B5</label>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="tab2" value="<?php echo (isset($package['tab2']) !="") ? $package['tab2']:""; ?>" class="form-control">
            </div>
        </div>

    </div><!--row-->

    <div class="row">
        <div class="col-md-2">
            <label>B5 Description</label>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <textarea rows="3" name="description2" class="form-control" id ="tab2"><?php echo (isset($package['description2']) !="") ? $package['description2']:""; ?></textarea>
            </div>

        </div>

    </div><!--row-->

    <div class="row">
        <div class="col-md-2">
            <label>B14</label>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="tab3" value="<?php echo (isset($package['tab3']) !="") ? $package['tab3']:""; ?>" class="form-control">
            </div>
        </div>
    </div><!--row-->


    <div class="row">
        <div class="col-md-2">
            <label>B14 Description</label>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <textarea rows="3" name="description3" class="form-control" id ="tab3"><?php echo (isset($package['description3']) !="") ? $package['description3']:""; ?></textarea>
            </div>

        </div>

    </div><!--row-->

    <div class="row">
        <div class="col-md-2">
            <label>B34</label>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="tab4" value="<?php echo (isset($package['tab4']) !="") ? $package['tab4']:""; ?>" class="form-control">
            </div>
        </div>
    </div><!--row-->


    <div class="row">
        <div class="col-md-2">
            <label>B34 Description</label>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <textarea rows="3" name="description4"  class="form-control" id ="tab4"><?php echo (isset($package['description4']) !="") ? $package['description4']:""; ?></textarea>
            </div>

        </div>

    </div><!--row-->

    <div class="row">
        <div class="col-md-2">
            <label>B35</label>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="tab5" value="<?php echo (isset($package['tab5']) !="") ? $package['tab5']:""; ?>" class="form-control">
            </div>
        </div>
    </div><!--row-->


    <div class="row">
        <div class="col-md-2">
            <label>B35 Description</label>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <textarea rows="3" name="description5" class="form-control" id ="tab5"><?php echo (isset($package['description5']) !="") ? $package['description5']:""; ?></textarea>
            </div>

        </div>

    </div><!--row-->



</div><!--menu6-->

<!---Tabs-->

<div id="menu7" class="tab-pane fade">
    <div class="row">
        <div class="col-md-2">
            <label>Meta description</label>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <textarea name="meta_description" style="width: 453px; height: 65px;"><?php echo (isset($package['meta_description']) !="") ? $package['meta_description']:""; ?></textarea>
            </div>
        </div>
    </div><!--row-->
    <div class="row">
        <div class="col-md-2">
            <label>Meta keywords</label>
        </div>

        <div class="col-md-8">
            <div class="form-group">

                <textarea name="meta_keywords" style="width: 453px; height: 65px;"><?php echo (isset($package['meta_keywords']) !="") ? $package['meta_keywords']:""; ?></textarea>
            </div>
        </div>
    </div><!--row-->

    <div class="row">

        <div class="col-md-2">

            <label>Meta Title</label>

        </div>



        <div class="col-md-8">

            <div class="form-group">



                <textarea name="meta_title" style="width: 453px; height: 65px;" ><?php echo (isset($package['meta_title']) !="") ? $package['meta_title']:""; ?></textarea>

            </div>

        </div>

    </div><!--row-->

</div>




</div>
<div class="row">

    <div class="col-md-2" style="float: right;">

        <div class="form-group">

            <input type="hidden" name="job_id" id="job_id" value="<?php echo (isset($package['job_id']) && $package['job_id'] !="") ? $package['job_id']:"0"; ?>">

            <button type="submit" class="btn btn-primary btn_package" id="btn_package">Save Product</button>
        </div>
    </div>
</div>
</form>



</div>


</div>
</div>
</div>
<!-- End Form Elements -->
</div>
</div>
<script>
    $.validate();

</script>




<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'txt-content'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );


    CKEDITOR.replace( 'txt-content1'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );


    CKEDITOR.replace( 'tab1'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );


    CKEDITOR.replace( 'tab2'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );

    CKEDITOR.replace( 'tab3'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );


    CKEDITOR.replace( 'tab4'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );

    CKEDITOR.replace( 'tab5'  ,{

        filebrowserBrowseUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/python/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/python/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );




</script>

<!-- script to add new tags-->
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
        var package = $('#job_id').val();

        var postData = {
            'term_id' : term,
            'job_id' : package
        };


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/package/rmv_package_tag',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>


<script>

    $('#btn_package').click(function(e)
    {

        var a=0;
        var b =0;
        var c =0

        $("#featured_error").text("");
        $("#banner_error").text("");
        $("#pdf_error").text("");

        var ext1 = $('#bannerimg').val().split('.').pop().toLowerCase();
        var ext2 =  $('#image').val().split('.').pop().toLowerCase();
        var ext3 =  $('#cv').val().split('.').pop().toLowerCase();

        var tourcode = $('#tour_code').val();
        var job_id = $('#job_id').val();



<!--        var postData = {-->
<!--            'code' : tourcode,-->
<!--            'job_id' : job_id-->
<!--        };-->
<!---->
<!---->
<!--        $.ajax({-->
<!--            type: "POST",-->
<!--            url: '--><?php //echo base_url() ?><!--index.php/package/check_tour_code',-->
<!--            dataType: "html",-->
<!---->
<!--            data: postData, // appears as $_GET['id'] @ your backend side-->
<!--            success: function(data) {-->
<!---->
<!--                if(data == "1")-->
<!--                {-->
<!--                    alert("1");-->
<!--                }-->
<!--                else-->
<!--                {-->
<!--                    alert("0");-->
<!--                }-->
<!---->
<!--            }-->
<!---->
<!--        });-->

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

        if(ext2 == "")
        {
            b = 1;
        }
        else
        {
            if($.inArray(ext2, ['gif','png','jpg','jpeg']) == -1)
            {
                b = 0
            }
            else
            {

                b = 1;
            }
        }

        if(ext3 == "")
        {
            c = 1;
        }
        else
        {
            if($.inArray(ext3, ['pdf']) == -1)
            {
                c = 0
            }
            else
            {

                c = 1;
            }
        }


        if(a != "1")
        {

            $("#banner_error").text("Invalid banner Image");
            $("#banner_error").css("color", "red");
            e.preventDefault();
        }
        else if(b != "1")
        {

            $("#featured_error").text("Invalid Featured Image");
            $("#featured_error").css("color", "red");
            e.preventDefault();
        }
        else if(c != "1")
        {

            $("#pdf_error").text("Invalid pdf file");
            $("#pdf_error").css("color", "red");
            e.preventDefault();
        }
        else{

            e.submit;

        }


    });
</script>


