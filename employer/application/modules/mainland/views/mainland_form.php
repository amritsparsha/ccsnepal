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
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo (isset($title) && $title !="") ? $title:""; ?>
            </div>

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">General</a>
                    </li>
                    <li><a href="#meta" data-toggle="tab">Meta</a>
                    </li>

                    <li id="multi_tab"><a href="#settings" data-toggle="tab">Tab</a>
                    </li>
                    <li><a href="#support" data-toggle="tab">Tabs</a>
                    </li>

                </ul>
                <form class="tab_form" method="post" action="" enctype="multipart/form-data">
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="home">

                            <table class="form-table">
                                <tbody>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="admin_name">Title<span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="content_title" id="content_title" size="50" value="<?php echo (isset($content['content_title']) && $content['content_title'] !="") ? $content['content_title']:""; ?>" data-validation="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on"></td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="slogan">Page Title<span class="asterisk">*</span> </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="content_page_title" class="regular-text" data-validation="required"  size="50" value="<?php echo (isset($content['content_page_title']) && $content['content_page_title'] !="") ? $content['content_page_title']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on"></td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="slogan">Page Type<span class="asterisk">*</span> </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        
                                        
                                        
                                     <select name="content_type" class="page_type">

                                       
                                         <option value="Page" <?php echo (isset($content['content_type']) && $content['content_type'] =="Page")?"selected":"";?>>Basic Page</option>
                                         <option value="MainLand" <?php echo (isset($content['content_type']) && $content['content_type'] =="MainLand")?"selected":"";?>>Main Land </option>
                                         <option value="FreeZone" <?php echo (isset($content['content_type']) && $content['content_type'] =="FreeZone")?"selected":"";?>>Free Zone</option>
                                         
                                         
                                         
                                         <option value="BizSetup" <?php echo (isset($content['content_type']) && $content['content_type'] =="BizSetup")?"selected":"";?>>Business Setup</option>

                                     </select>
                                    </td>
                                </tr>

<tr valign="top">
                                   <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service">Link Page </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <select name="freezone_page_type" class="page_type" >
                                            <option value=""> Select </option>
                                            
                                            <?php

                $conetn_se = $this->db->query("SELECT * FROM igc_content WHERE content_type ='ProService' AND delete_status='0' AND publish_status='1'");
                $procontent = $conetn_se->result_array();



                ?>
                
              
                                            <?php
                                            //$content['freezone_page_type']
                                            
                                            foreach ($procontent  as $rows){
                                              ?> 
                                            
                                               
                                             <option value="<?php echo  $rows['content_url'];?>"  <?php echo (isset($content['freezone_page_type']) && $content['freezone_page_type'] == $rows['content_url'])?"selected":"";?> ><?php echo $rows['content_page_title']; ?></option> 
                                              
                                             
                                            <?php    
                                               
                                            }
                                            ?>
                                            
                                            
                                            
                                        </select>
                                        

                                       

                                      
                                    </td> 
                                </tr>





                                <tr valign="top" id="featured_img">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Featured Image</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
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

                                                <span>(Image Dimension 853*405 px)</span>
                                                <input type="file" name="featured_img" id="featuredimg">
                                                <span id="type_error"></span>
                                            </div>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>

                                            <span>(Image Dimension 853*405 px)</span>
                                            <input type="file" name="featured_img"  id="featuredimg">
                                            <span id="type_error"></span>
                                        <?php
                                        }
                                        ?>


                                    </td>
                                </tr>










<tr valign="top" id="freezone_img">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Free Zone Background</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <?php
                                        if(isset($content['freezone_img']))
                                        {

                                            ?>
                                            <div class="remove_option">

                                                <?php
                                                $path  =  '../uploads/content/';
                                                ?>
                                                <img src="<?php echo $path. $content['freezone_img'];?>" alt="freezone_image" style="max-width: 940px; max-height: 360px;">

                                               
                                            </div>
                                            <input type="hidden" name="pre_freezoneimg" value="<?php echo $content['freezone_img']; ?>">
                                            <div id="image_input">

                                              
                                                <input type="file" name="freezone_img" id="freezoneimg">
                                                <span id="type_error"></span>
                                            </div>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>

                                          
                                            <input type="file" name="freezone_img"  id="freezoneimg">
                                            <span id="type_error"></span>
                                        <?php
                                        }
                                        ?>


                                    </td>
                                </tr>













                                <tr valign="top" class="contact_detail">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row">
                                        <label>Content Details</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea rows="5" cols="10" name="content_body" id="content_body"><?php echo (isset($content['content_body']) && $content['content_body'] !="") ? $content['content_body']:""; ?></textarea>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Show On Menu<span class="asterisk">*</span> </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%; padding: 6px 0 0 0;">
                                        <input type="radio" name="show_on_menu" <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="T")?"checked":"";?> class="regular-text" data-validation="required" value="T">Top
                                        <input type="radio" name="show_on_menu" <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="Y")?"checked":"";?> class="regular-text" data-validation="required" value="Y">Footer
                                        <input type="radio" name="show_on_menu" <?php echo (isset($content['show_on_menu']) && $content['show_on_menu'] =="N")?"checked":"";?> class="regular-text" data-validation="required" value="N">Non
                                    </td>
                                </tr>


                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Published<span class="asterisk">*</span> </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%; padding: 6px 0 0 0;">

                                        <input type="radio" name="publish_status" <?php echo (isset($content['publish_status']) && $content['publish_status'] =="1")?"checked":"";?> class="regular-text" data-validation="required" value="1">Active
                                     <input type="radio" name="publish_status" <?php echo (isset($content['publish_status']) && $content['publish_status'] =="0")?"checked":"";?> class="regular-text" data-validation="required" value="0">Inactive
                                    </td>
                                </tr>

                                

                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane fade" id="meta">

                            <table class="form-table">

                                <tbody>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_description">Meta Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="meta_description" id="meta_description"  rows="5" cols="100"><?php echo (isset($content['meta_description']) && $content['meta_description'] !="") ? $content['meta_description']:""; ?></textarea><br>

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_keywords">Meta Keywords </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="meta_keywords"  rows="5" cols="100"><?php echo (isset($content['meta_keywords']) && $content['meta_keywords'] !="") ? $content['meta_keywords']:""; ?></textarea><br>

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_title">Meta Title</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="meta_title"  rows="5" cols="100"><?php echo (isset($content['meta_title']) && $content['meta_title'] !="") ? $content['meta_title']:""; ?></textarea><br>

                                    </td>
                                </tr>



                                </tbody>
                            </table>

                        </div>


                        <div class="tab-pane fade" id="support">

                            <table class="form-table">

                                <tbody>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service">Tab </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">

                                        <input type="text" name="about_service" id="about_service" size="50" value="<?php echo (isset($content['about_service']) && $content['about_service'] !="") ? $content['about_service']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

                                        <br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service_desc">Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">

                                        <textarea name="about_service_desc" id="about_service_desc"  rows="5" cols="100"><?php echo (isset($content['about_service_desc']) && $content['about_service_desc'] !="") ? $content['about_service_desc']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                   <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service">Link Page </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <select name="about_service_link" class="form-control">
                                            <option value=""> Select </option>
                                            <?php

                $conetn_se = $this->db->query("SELECT * FROM igc_content WHERE delete_status ='0'");
                $procontent = $conetn_se->result_array();



                ?>
                                            <?php
                                            
                                            foreach ($procontent  as $rows){
                                              ?>  
                                                
                                             <option value="<?php echo  $rows['content_url'];?>" <?php echo (isset($rows['about_service_link']) && $rows['about_service_link'] !="") ? $rows['about_service_link']:""; ?>><?php echo $rows['content_page_title']; ?></option> 
                                              
                                            <?php    
                                               
                                            }
                                            ?>
                                            
                                            
                                            
                                        </select>
                                        

                                       

                                      
                                    </td> 
                                </tr>




                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_choose">Tab </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="about_choose" id="about_choose" size="50" value="<?php echo (isset($content['about_choose']) && $content['about_choose'] !="") ? $content['about_choose']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">


                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_choose_desc">Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="about_choose_desc" id="about_choose_desc"  rows="5" cols="100"><?php echo (isset($content['about_choose_desc']) && $content['about_choose_desc'] !="") ? $content['about_choose_desc']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                   <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service">Link Page </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <select name="about_choose_link" class="form-control">
                                            <option value=""> Select </option>
                                            <?php

                $conetn_se = $this->db->query("SELECT * FROM igc_content WHERE delete_status ='0'");
                $procontent = $conetn_se->result_array();



                ?>
                                            <?php
                                            
                                            foreach ($procontent  as $rows){
                                              ?>  
                                                
                                             <option value="<?php echo  $rows['content_url'];?>" <?php echo (isset($rows['about_choose_link']) && $rows['about_choose_link'] !="") ? $rows['about_choose_link']:""; ?>><?php echo $rows['content_page_title']; ?></option> 
                                              
                                            <?php    
                                               
                                            }
                                            ?>
                                            
                                            
                                            
                                        </select>
                                        

                                       

                                      
                                    </td> 
                                </tr>
                                
                                
                                

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_support">Tab</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="about_support" id="about_support" size="50" value="<?php echo (isset($content['about_support']) && $content['about_support'] !="") ? $content['about_support']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">


                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_support_desc">Description</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="about_support_desc" id="about_support_desc"  rows="5" cols="100"><?php echo (isset($content['about_support_desc']) && $content['about_support_desc'] !="") ? $content['about_support_desc']:""; ?></textarea><br>

                                    </td>
                                </tr>

<tr valign="top">
                                   <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="about_service">Link Page </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <select name="about_support_link" class="form-control">
                                            <option value=""> Select </option>
                                            <?php

                $conetn_se = $this->db->query("SELECT * FROM igc_content WHERE delete_status ='0'");
                $procontent = $conetn_se->result_array();



                ?>
                                            <?php
                                            
                                            foreach ($procontent  as $rows){
                                              ?>  
                                                
                                             <option value="<?php echo  $rows['content_url'];?>" <?php echo (isset($rows['about_support_link']) && $rows['about_support_link'] !="") ? $rows['about_support_link']:""; ?>><?php echo $rows['content_page_title']; ?></option> 
                                              
                                            <?php    
                                               
                                            }
                                            ?>
                                            
                                            
                                            
                                        </select>
                                        

                                       

                                      
                                    </td> 
                                </tr>


                                </tbody>
                            </table>

                        </div>


                        <div class="tab-pane fade" id="settings">

                            <table class="form-table">

                                <tbody>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab1"  size="28" value="<?php echo (isset($content['tab1']) && $content['tab1'] !="") ? $content['tab1']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description1" id="tab-body" rows="5" cols="100"><?php echo (isset($content['description1']) && $content['description1'] !="") ? $content['description1']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab2"  size="28" value="<?php echo (isset($content['tab2']) && $content['tab2'] !="") ? $content['tab2']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description2" id="tab-body2" rows="5" cols="100"><?php echo (isset($content['description2']) && $content['description2'] !="") ? $content['description2']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab3"  size="28" value="<?php echo (isset($content['tab3']) && $content['tab3'] !="") ? $content['tab3']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description3" id="tab-body3" rows="5" cols="100"><?php echo (isset($content['description3']) && $content['description3'] !="") ? $content['description3']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab4"  size="28" value="<?php echo (isset($content['tab4']) && $content['tab4'] !="") ? $content['tab4']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description4" id="tab-body4" rows="5" cols="100"><?php echo (isset($content['description4']) && $content['description4'] !="") ? $content['description4']:""; ?></textarea><br>

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab5"  size="28" value="<?php echo (isset($content['tab5']) && $content['tab5'] !="") ? $content['tab5']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description5" id="tab-body5" rows="5" cols="100"><?php echo (isset($content['description5']) && $content['description5'] !="") ? $content['description5']:""; ?></textarea><br>

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Tab Name</label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="tab6"  size="28" value="<?php echo (isset($content['tab6']) && $content['tab6'] !="") ? $content['tab6']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Description </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="description6" id="tab-body6" rows="5" cols="100"><?php echo (isset($content['description6']) && $content['description6'] !="") ? $content['description6']:""; ?></textarea><br>

                                    </td>
                                </tr>



                                </tbody>
                            </table>

                        </div>

                        <p class="submit">
                            <input type="hidden" name="content_id" id="content_id" value="<?php echo (isset($content['content_id']) && $content['content_id'] !="") ? $content['content_id']:""; ?>">
                            <input type="submit" name="Setting Btn" class="button" id="save_content" value="Save Settings">
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
    CKEDITOR.replace( 'content_body'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );

    CKEDITOR.replace( 'tab-body'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );

    CKEDITOR.replace( 'tab-body2'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/dubaisetup/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    CKEDITOR.replace( 'tab-body3'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );CKEDITOR.replace( 'tab-body4'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    CKEDITOR.replace( 'tab-body5'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    CKEDITOR.replace( 'tab-body6'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    
    
    
     CKEDITOR.replace( 'about_service_desc'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    
     CKEDITOR.replace( 'about_choose_desc'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


    } );
    
     CKEDITOR.replace( 'about_support_desc'  ,{

        filebrowserBrowseUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/demo/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/demo/filemanager/dialog.php?type=1&editor=ckeditor&fldr='


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

        if (value == "Page") {

            $('#multi_tab').show();
        }
        else if(value == "About") {
            $('#multi_tab').hide();
        }
        else if(value == "Services") {
            $('#multi_tab').show();
        }
        else if(value == "Article") {
            $('#multi_tab').show();
        }
        else if(value == "Contact"){
            $('#multi_tab').show();
        }
        else {
            $('#multi_tab').hide();
        }

        $('.page_type').change(function(){
            var  value = $('.page_type').val();
            if (value == "Page") {

                $('#multi_tab').show();
            }
            else if(value == "About") {
                $('#multi_tab').hide();
            }
            else if(value == "Services") {
                $('#multi_tab').show();
            }
            else if(value == "Article") {
                $('#multi_tab').show();
            }
            else if(value == "Contact"){
                $('#multi_tab').hide();
            }
            else {
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

<script>

    $('#save_content').click(function(e)
    {

        $("#type_error").text("");
        var a=0;

        var ext2 =  $('#freezoneimg').val().split('.').pop().toLowerCase();

        
        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext2, ['gif','png','jpg','jpeg']) == -1)
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
            $("#type_error").text("Invalid Free Zone Image");
            $("#type_error").css("color", "red");

            e.preventDefault();
        }

        else{

            e.submit;

        }



    });
</script>




