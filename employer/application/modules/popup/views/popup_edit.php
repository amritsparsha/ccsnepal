
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

                <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="home">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title<span class="asterisk">*</span></label>
                                        <input type="text" name="title" value= "<?php echo $records['title']; ?>" data-validation="required" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Link<span class="asterisk">*</span></label>
                                        <input type="text" name="link" data-validation="required" class="form-control" value = "<?php echo $records['link']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    if(isset($records['popup_image']))
                                    {

                                        ?>
                                        <div class="remove_option">

                                            <?php
                                            $path  =  '../uploads/popup/';
                                            ?>
                                            <img src="<?php echo $path. $records['popup_image'];?>" alt="popup_image" style="max-width: 940px; max-height: 360px;">

                                            <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                        </div>
                                        <input type="hidden" name="pre_popupimg" value="" data-validation="required">
                                        <div id="image_input">
                                            <input type="file" class="form-control" name="popup_image" id="popup_image" data-validation="required">
                                            <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.
                                            </p>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <input type="file" class="form-control" name="popup_image" id="popup_image" data-validation="required">
                                        <p id="sig_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Body</label>
                                        <textarea rows="5" cols="10" name="body" id="body"><?php echo (isset($records['body']) && $records['body'] !="") ? $records['body']:""; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Is Active? </label>
                                        <input type="radio" name="publish_status" <?php echo (isset($records['publish_status']) && $records['publish_status'] =="1")?"checked":"";?> class="regular-text" data-validation="required" value="1">Yes
                                        <input type="radio" name="publish_status" <?php echo (isset($records['publish_status']) && $records['publish_status'] =="0")?"checked":"";?> class="regular-text" data-validation="required" value="0">No

                                    </div>
                                </div>
                            </div>
                       

                        </div>
                        <p class="submit"> 
                            <input type="submit" name="submit" id="submit" class="btn btn-danger" value="Save">
                        </p>



                    </div>
                </form>
            </div>
        </div>
       

    </div>
</div>
<script>
    CKEDITOR.replace( 'body'  ,{

        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );


    KEDITOR.replace( 'contact-detail' );
</script>

<script>
    $.validate();
</script>
</body>
</html>




