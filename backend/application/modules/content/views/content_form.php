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
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item"> 
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <span class="hidden-sm-up"></span> 
                                            <span class="hidden-xs-down">General</span>
                                        </a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-toggle="tab" href="#meta" role="tab">
                                            <span class="hidden-sm-up"></span> 
                                            <span class="hidden-xs-down">Meta</span>
                                        </a> 
                                    </li>
                                    <li class="nav-item" id="multi_tab"> 
                                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                                            <span class="hidden-sm-up"></span> 
                                            <span class="hidden-xs-down">Tab</span>
                                        </a> 
                                    </li>  
                                </ul>
<form method="post" action="" enctype="multipart/form-data">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- general-home -->
                <div class="tab-pane active" id="home" role="tabpanel">
                    <!-- forms -->
                    <div class="p-20">
                        <!--  -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_title">Title<span class="asterisk">*</span></label>
                                        <input type="text" name="content_title" id="content_title" size="50" data-validation="required" value="<?php echo (isset($content['content_title']) && $content['content_title'] !="") ? $content['content_title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_page_title">Page Title<span class="asterisk">*</span></label>
                                        <input type="text" name="content_page_title" id="content_page_title" size="50" data-validation="required" value="<?php echo (isset($content['content_page_title']) && $content['content_page_title'] !="") ? $content['content_page_title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_type">Page Type<span class="asterisk">*</span></label>
                                        <select name="content_type" id="content_type" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <option value="Page" <?php echo (isset($content['content_type']) && $content['content_type'] =="Page")?"selected":"";?>>Basic Page</option>
                                            <option value="Article"  <?php echo (isset($content['content_type']) && $content['content_type'] =="Article")?"selected":"";?>>Article</option>
                                            <option value="About"  <?php echo (isset($content['content_type']) && $content['content_type'] =="About")?"selected":"";?>>About</option>
                                            <option value="Contact"  <?php echo (isset($content['content_type']) && $content['content_type'] =="Contact")?"selected":"";?>>Contact</option>
                                            <!--  -->
                                            <option value="latest_news"  <?php echo (isset($content['content_type']) && $content['content_type'] =="latest_news")?"selected":"";?>>Latest News</option>
                                            <option value="career_resources"  <?php echo (isset($content['content_type']) && $content['content_type'] =="career_resources")?"selected":"";?>>Career Resources</option>
                                            <option value="loksewa_resources"  <?php echo (isset($content['content_type']) && $content['content_type'] =="loksewa_resources")?"selected":"";?>>Loksewa Resources</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_ext_url">Content External Url</label>
                                        <input type="text" name="content_ext_url" id="content_ext_url" size="50" data-validation="required" value="<?php echo (isset($content['content_ext_url']) && $content['content_ext_url'] !="") ? $content['content_ext_url']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_title">Featured Image<span class="asterisk">*</span></label>
                                        <?php
                                            if(isset($content['featured_img']))
                                            {
                                        ?>
                                            <div class="remove_option">
                                        <?php
                                            $path  =  '../uploads/content/';
                                        ?>
                                                <img src="<?php echo $path. $content['featured_img'];?>" alt="featured_image" style="max-width: 940px; max-height: 360px;">

                                                <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                            </div>
                                            <input type="hidden" name="pre_featuredimg" value="<?php echo $content['featured_img']; ?>">
                                            <div id="image_input">
                                                <!-- <span>(Image Dimension 853*405 px)</span> -->
                                                <input type="file" name="featured_img" id="featuredimg" class="regular-text form-control required valid" >
                                                <span id="type_error"></span>
                                            </div>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <!-- <span>(Image Dimension 853*405 px)</span> -->
                                            <input type="file" name="featured_img"  id="featuredimg" class="regular-text form-control required valid" >
                                            <span id="type_error"></span>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content_body">Content Details<span class="asterisk">*</span></label>
                                        <textarea name="content_body" id="content_body" size="50" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['content_body']) && $content['content_body'] !="") ? $content['content_body']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="show_on_menu">Show On Menu<span class="asterisk">*</span></label>
                                        <select name="show_on_menu" id="show_on_menu" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <option value="T" <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="T")?"selected":"";?>>Top</option>
                                            <option value="F"  <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="F")?"selected":"";?>>Footer</option>
                                            <option value="N"  <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="N")?"selected":"";?>>None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="publish_status">Publish Status<span class="asterisk">*</span></label>
                                        <select name="publish_status" id="publish_status" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <option value="1" <?php echo (isset($content['publish_status']) && $content['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                            <option value="0"  <?php echo (isset($content['publish_status']) && $content['publish_status'] =="0")?"selected":"";?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    <!-- end of forms -->
                </div>
                <!-- meta -->
                <div class="tab-pane  p-20" id="meta" role="tabpanel">
                    <!-- forms -->
                    <div class="p-20">
                        <!--  -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="meta_title">Meta Title<span class="asterisk">*</span></label>
                                        <input type="text" name="meta_title" id="meta_title" size="50" data-validation="required" value="<?php echo (isset($content['meta_title']) && $content['meta_title'] !="") ? $content['meta_title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="meta_keywords">Meta Keywords<span class="asterisk">*</span></label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" size="50" data-validation="required" value="<?php echo (isset($content['meta_keywords']) && $content['meta_keywords'] !="") ? $content['meta_keywords']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="meta_description">Meta Description<span class="asterisk">*</span></label>
                                        <textarea name="meta_description" id="meta_description" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['meta_description']) && $content['meta_description'] !="") ? $content['meta_description']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    <!-- end of forms -->
                </div>
                <!-- tab-settings -->
                <div class="tab-pane p-20" id="settings" role="tabpanel">
                    <!-- forms -->
                    <div class="p-20">
                        <!--  -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab1">Tab Name</label>
                                        <input type="text" name="tab1" id="tab1" size="50" value="<?php echo (isset($content['tab1']) && $content['tab1'] !="") ? $content['tab1']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab_description1">Tab Description</label>
                                         <textarea name="tab_description1" id="tab_description1" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['tab_description1']) && $content['tab_description1'] !="") ? $content['tab_description1']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab2">Tab Name</label>
                                        <input type="text" name="tab2" id="tab2" size="50" value="<?php echo (isset($content['tab2']) && $content['tab2'] !="") ? $content['tab2']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab_description2">Tab Description</label>
                                         <textarea name="tab_description2" id="tab_description2" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['tab_description2']) && $content['tab_description1'] !="") ? $content['tab_description2']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab3">Tab Name</label>
                                        <input type="text" name="tab3" id="tab3" size="50" value="<?php echo (isset($content['tab3']) && $content['tab3'] !="") ? $content['tab3']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab_description3">Tab Description</label>
                                         <textarea name="tab_description3" id="tab_description3" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['tab_description3']) && $content['tab_description3'] !="") ? $content['tab_description3']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab4">Tab Name</label>
                                        <input type="text" name="tab4" id="tab4" size="50" value="<?php echo (isset($content['tab4']) && $content['tab4'] !="") ? $content['tab4']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab_description4">Tab Description</label>
                                         <textarea name="tab_description4" id="tab_description4" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['tab_description4']) && $content['tab_description4'] !="") ? $content['tab_description4']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab5">Tab Name</label>
                                        <input type="text" name="tab5" id="tab5" size="50" value="<?php echo (isset($content['tab5']) && $content['tab5'] !="") ? $content['tab5']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="tab_description5">Tab Description</label>
                                         <textarea name="tab_description5" id="tab_description5" size="50" data-validation="required"   autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            <?php echo (isset($content['tab_description5']) && $content['tab_description5'] !="") ? $content['tab_description5']:""; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    <!-- end of forms -->
                </div>
            <!-- end of tab-settings-->
                <p class="submit">
                    <input type="hidden" name="content_id" id="content_id" value="<?php echo (isset($content['content_id']) && $content['content_id'] !="") ? $content['content_id']:""; ?>">
                    <input type="submit" name="Setting Btn" class="btn btn-success" id="save_content" value="Save Settings">
                </p>
                                </div>
            <!--end of tab panel contents  -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
<script>
    CKEDITOR.replace( 'content_body',{
        filebrowserUploadUrl: "/secure-tech/themes/plugins/ckeditor/imgupload.php/",
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500
    });
    CKEDITOR.replace( 'meta_description',{
        filebrowserUploadUrl: "/secure-tech/themes/plugins/ckeditor/imgupload.php/",
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500
    });

    <?php 
        for($i=1;$i<=5;$i++)
        {
    ?>
       CKEDITOR.replace( 'tab_description'+ <?php echo $i; ?> +'',{
            filebrowserUploadUrl: "/secure-tech/themes/plugins/ckeditor/imgupload.php/",
            filebrowserWindowWidth  : 800,
            filebrowserWindowHeight : 500
        }); 
    <?php
        }
    ?>

</script>
<script>
    $(document).ready(function(e){

        var  value = $('#content_type').val();
        if(value == "Page" || value == "About" || value == "Contact" || value == "Article")
        {
            $('#multi_tab').show();
        }
        else
        {
            $('#multi_tab').hide();
        }

        $('#content_type').change(function(){
            var  value = $('#content_type').val();
            if(value == "Page" || value == "About" || value == "Contact" || value == "Article")
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