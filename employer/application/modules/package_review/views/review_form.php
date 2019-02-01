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
                <?php echo (isset($title) && $title != "") ? $title : ""; ?>
            </div>

            <div class="panel-body">

                <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="home">

                            <table class="form-table">
                                <tbody>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Review BY
                                            <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="review_by" data-validation-allowing="float"
                                               data-validation="required"
                                               value="<?php echo (isset($detail['review_by']) && $detail['review_by'] != "") ? $detail['review_by'] : ""; ?>"
                                               autocomplete="off" class="regular-text form-control required valid"
                                               kl_virtual_keyboard_secure_input="on"></td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Designation<span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="review_title" data-validation-allowing="float"
                                                data-validation="required"
                                               value="<?php echo (isset($detail['review_title']) && $detail['review_title'] != "") ? $detail['review_title'] : ""; ?>"
                                               autocomplete="off" class="regular-text form-control required valid"
                                               kl_virtual_keyboard_secure_input="on"></td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Company <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="review_company" data-validation-allowing="float"
                                               data-validation="required"
                                               value="<?php echo (isset($detail['review_company']) && $detail['review_company'] != "") ? $detail['review_company'] : ""; ?>"
                                               autocomplete="off" class="regular-text form-control required valid"
                                               kl_virtual_keyboard_secure_input="on"></td>
                                </tr>


                                <tr valign="top" id="featured_img">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Review Image</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <?php
                                        $path  =  '../uploads/slider/';
                                        if(isset($detail['slider_image']) && file_exists($path.$detail['slider_image']))
                                        {

                                            ?>
                                            <div class="remove_option">


                                                <img src="<?php echo $path. $detail['slider_image'];?>"  style="max-width: 940px; max-height: 360px;">

                                                <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                            </div>
                                            <input type="hidden" name="pre_slider_image" value="<?php echo $detail['slider_image']; ?>">
                                            <div id="image_input">
                                                <input type="file" class="form-control" name="slider_image" id="slider_image">(Image Dimension 102*102 px)
                                                <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
                                                <p id="sig_error2" style="display:none; color:#FF0000;">Max file size should be 20.</p>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>

                                            <span>(Image Dimension 102*102 px)</span>
                                            <input type="file" class="form-control" name="slider_image"  id="slider_image">
                                            <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
                                            <p id="sig_error2" style="display:none; color:#FF0000;">Max file size should be 20MB.</p>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                </tr>






                                <tr valign="top">

                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Content
                                            <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <br />
                                        <textarea name="review_text" id="review"><?php echo (isset($detail['review_text']) && $detail['review_text'] != "") ? $detail['review_text'] : ""; ?></textarea>
                                    </td>
                                </tr>


                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Status <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%; padding-top: 10px;">
                                        <input type="radio" name="publish_status" <?php echo (isset($detail['publish_status']) && $detail['publish_status'] == "1") ?"checked":""; ?> value="1"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Active
                                        <input type="radio" name="publish_status" <?php echo (isset($detail['publish_status']) && $detail['publish_status'] == "0") ?"checked":""; ?> value="0"  data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">Inactive
                                     </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>


                        <p class="submit">
                            <input type="hidden" name="review_id"
                                   value="<?php echo (isset($detail['review_id']) && $detail['review_id'] != "") ? $detail['review_id'] : ""; ?>">
                            <input type="submit" name="Setting Btn" class="button" value="Save">
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'review',{
    filebrowserUploadUrl: "/secure-tech/themes/plugins/ckeditor/imgupload.php/",//http://localhost/phpwork/test/ckFileUpload.php
    filebrowserWindowWidth  : 800,
    filebrowserWindowHeight : 500
});

</script>