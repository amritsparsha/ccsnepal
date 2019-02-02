<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span> <?php echo $content['content_page_title'];?> </span></h2>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $content['content_page_title'];?>
					</li>
				</ul>
				
			</div>
		</div>
	</section>
	
	
<section>
    <div class="container backgroundwhite-color">
    <div class="col-md-12">
    	<?php
            if($content['content_type'] =="Contact")
            {
            ?>
            
            <div class="row" style="margin-top: 15px;">
            <?php
$settings = $this->site_settings_model->get_site_settings();
?>
  <div class="col-md-5 contact-us-region-detail">
    <div class="well">
              <h3>General enquiries:</h3>
			<?php echo $settings['contact_details']; ?>
      
    </div>
    
    <div class="well">
    <h3><u>Emergency Contact</u> </h3>
<br >
<strong>Rajendra Dhamala:</strong> 9851187802
<br />
<strong>Rishi Dhamala:</strong> 98510828483
    	
    </div>
  </div>
  
  <div class="col-md-7 contact-us-form">
    
    <form peak-form-analytics=""  class="v2-search-form has-validation-callback" action="<?php echo site_url('home/feedback');?>" method="post" id="peak-contact-us-form" accept-charset="UTF-8" data-analytic-event="peak_contact_us_enquiry_click">
<div>
<div class="form-group">
  <div class="form-item form-item-peak-contact-us-enquiry-type form-type-select form-group"> 
  <label class="control-label" for="edit-peak-contact-us-enquiry-type">Enquiry Type is a required field <span class="form-required" title="This field is required.">*</span></label>
<select class="form-select required ajax-processed" id="edit-peak-contact-us-enquiry-type" name="enquiry_type">
<option value="">-- Enquiry type *  --</option>
<option value="New Booking">New Booking</option>
<option value="Trip Information">Trip Information</option>
<option value="Existing Booking">Existing Booking</option>
<option value="Subscription">Subscription</option>
<option value="General">General</option>
</select>
</div>

<div class="form-item form-item-peak-contact-us-first-name form-type-textfield form-group"> 
<label class="control-label" for="edit-peak-contact-us-first-name">First Name  <span class="form-required" title="This field is required.">*</span></label>
<input placeholder="First name *" class="form-text required" type="text" id="edit-peak-contact-us-first-name" name="first_name" value="" size="60" maxlength="128">
</div>
<div class="form-item form-item-peak-contact-us-last-name form-type-textfield form-group"> <label class="control-label" for="edit-peak-contact-us-last-name">Last Name <span class="form-required" title="This field is required.">*</span></label>
<input placeholder="Last name *" class=" form-text required" type="text" id="edit-peak-contact-us-last-name" name="last_name" value="" size="60" maxlength="128">
</div>
<div class="form-item form-item-peak-contact-us-email form-type-textfield form-group">
 <label class="control-label" for="edit-peak-contact-us-email">Email <span class="form-required" title="This field is required.">*</span></label>
<input placeholder="Email Address *" class=" form-text required" type="text" id="edit-peak-contact-us-email" name="email" value="" size="60" maxlength="128">
</div>

<div class="form-item form-item-peak-contact-us-contact-number form-type-textfield form-group"> 
<label class="control-label" for="edit-peak-contact-us-contact-number">Contact Number</label>
<input placeholder="Phone number" class=" form-text" type="text" id="edit-peak-contact-us-contact-number" name="contact_number" value="" size="60" maxlength="128">
</div>
<div class="form-item form-item-peak-contact-us-enquiry form-type-textarea form-group"> 
<label class="control-label" for="edit-peak-contact-us-enquiry">Message</label>
<div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
<textarea placeholder="Message" class="form-textarea" id="edit-peak-contact-us-enquiry" name="message" cols="60" rows="5" style="opacity: 1; height: 150px;"></textarea>
<div class="grippie">
</div>
</div>
</div>

<div class="form-item form-item-peak-contact-us-privacy form-type-checkbox checkbox"> 
<label class="control-label" for="edit-peak-contact-us-privacy">
<input type="checkbox" id="edit-peak-contact-us-privacy" name="peak_contact_us_privacy" value="1" class="form-checkbox required">I have read and agree to the <a href="<?php echo base_url(); ?>content/privacy-policy" target="_blank">Privacy Policy</a> <span class="form-required" title="This field is required.">*</span></label>
</div>
<button class="btn-primary btn-block btn form-submit" type="submit" id="edit-submit" name="op" value="Submit enquiry <i class='btn-submit fa fa-chevron-right'></i>">Submit enquiry <i class="btn-submit fa fa-chevron-right"></i></button>


</div>
</div>
</form>
    
      </div>
</div>




            
            
            <?php
            }
            
            ?>
    </div>
    
    
    <?php
            if($content['content_type'] =="Page")
            {
            ?>
            
            <div class="col-md-3 hot-page2-alp-con-left" style="margin-top: 14px;">
                    <!--PART 1 : LEFT LISTINGS-->
                    <div class="hot-page2-alp-con-left-1">
                        <h3>Popular Destinations</h3> </div>
                    <!--PART 2 : LEFT LISTINGS-->
                    <div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
                    <?php

                    $destin_travel1 = $this->db->query("SELECT * FROM igc_content WHERE content_type = 'Destination' AND publish_status = '1' AND delete_status = '0' order by content_id limit 0,99 ");
                    $destins1 = $destin_travel1->result_array();

                    ?>
                        <ul>
                        
                        <?php
                    if(!empty($destins1 )) {
                        
                        foreach ($destins1 as $dest) {
                            
                           
                            ?>
                            <li ><a href="<?php echo  site_url('destination/'.$dest['content_url']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <?php echo $dest['content_page_title'];?></a></li>
                            <?php
                        }
                    }
                    ?>
                            
                        </ul>
                    </div>
                    <!--PART 7 : LEFT LISTINGS-->
                    
                    
                </div>
                <!--END LEFT LISTINGS-->
            <?php
            
            }
            ?>
    
        <div class="col-md-9">
            
            <div class="main-container">
                <?php if(isset($error)) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo $error; ?>.
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($success)) {
                    ?>
                    <div class="alert alert-success alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $success; ?>
                    </div>
                    <?php
                }
                ?>
                <?php if (isset($error)) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo isset($error)?$error:"" ; ?>
                    </div>
                    <?php
                }
                ?>
<!--                <h3 class="trek-title">-->
<!--                    --><?php //echo $content['content_title'];?>
<!--                </h3>-->
                <?php
                $path = 'uploads/content/';
                if (file_exists($path.$content['featured_img']) && $content['featured_img'] !="")
                {
                    ?>
                    <img src="<?php echo $path.$content['featured_img'];?>" class="img-responsive" >
                    <?php
                }

                ?>
                <?php
                if($content['content_type'] =="Article")
                {

                    $content_id = $content['content_id'];
                    $comments = $this->content->get_content_comments($content_id);
                    $tags = $this->content->get_content_tags($content_id);
                    $total_cmt = sizeof($comments);


                    ?>

                    <div class="blog_info">
                        <span class="blog_posttype blog_slider text-center"> <i class="fa fa-picture-o"></i>
                       </span>
                        <div class="blog_info_block">
                            <span class="date"><i class="fa fa-calendar  "></i> &nbsp; <?php echo date("F j, Y, g:i a", strtotime($content['created']));?></span>
                            <span class="comments"><i class="fa fa-comment  "></i> &nbsp; <?php echo $total_cmt;?> comments</span>
                        <span class="blog_tags">Tags: <?php foreach ($tags as $tag){ ?><a rel="tag" href="#" style="padding-left: 5px;"><?php echo $tag['term_name'];?>,</a><?php }?>

                        </span>
                        </div>
                    </div>
                <p>
                    <?php echo $content['content_body'];?>
                </p>

                <hr class="light">
                    <?php

                }
                ?>
            </div>
            
            
            
            
            
            
            

            <?php
            if($content['content_type'] =="Page")
            {
                $content_id= $content['content_id'];
                $tabs = $this->content->get_content_tabs($content_id);
                ?>
                <div class="row">
                    <div class="col-md-12 clear-padding">
                        <div class="inner-accrodance">

                            <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
                                <?php
                                if($tabs['tab1'] !="")
                                {
                                    ?>
                                    <div class="panel panel-default">
                                        <div id="headingOne" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" role="button">
                                                    <?php echo $tabs['tab1'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
                                            <div class="panel-body">
                                                <?php echo $tabs['description1'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab2'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingTwo" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab2'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo">
                                            <div class="panel-body">
                                                <?php echo $tabs['description2'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab3'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseThree" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab3'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseThree">
                                            <div class="panel-body">
                                                <?php echo $tabs['description3'];?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                if($tabs['tab4'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseFour" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab4'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseFour">
                                            <div class="panel-body">
                                                <?php echo $tabs['description4'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab5'] !="")
                                {
                                    ?>
                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseFive" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab5'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseFive">
                                            <div class="panel-body">
                                                <?php echo $tabs['description5'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
            <?php
            if($content['content_type'] =="Article")
            {
                ?>

                <div class="leavecomment-blog">
                    <?php if (validation_errors()) {


                        ?>
                        <div class="alert alert-danger alert_box">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                            <?php echo validation_errors()?>
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
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <input type="text" name="sender_name" placeholder="Full Name" value="<?php echo set_value('sender_name');?>" data-validation="required length custom" data-validation-length="max100" data-validation-regexp="^([\w\s]+)$" class="form-control" kl_virtual_keyboard_secure_input="on">
                        </div>
                        <div class="form-group">
                            <input type="text" name="sender_email"  id="email" placeholder="Email Address"  value="<?php echo set_value('sender_email');?>" data-validation="required email" class="form-control">

                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" name="message"  id="blog_comment" class="form-control" rows="3" data-validation="required length custom" data-validation-length="max1500" data-validation-regexp="^([\w\s,:=.?']+)$"><?php echo set_value('message');?></textarea>
                            <div id="blog_count"></div>
                        </div>
                        <div class="form-group">
                            <p><b>Please Enter Captcha</b></p>
                            <span class="content_captcha_img captcha-word"></span>
                            <span style="cursor: pointer;" id="content_captcha_refresh"><i class="fa fa-refresh" style="font-size: 24px;"></i></span>

                        </div>
                        <div class="form-group">
                            <input type="text" name="captcha_code"  placeholder="Captcha Code Here.." data-validation="required length custom" data-validation-length="max10" data-validation-regexp="^([\w\s]+)$" class="form-control">
                        </div>
                        <div class="row form-group"><div class="col-md-3 clear-padding">
                                <input type="hidden" name="content_id" value="<?php echo $content['content_id'];?>">
                                <input type="hidden" name="content_url" value="<?php echo $content['content_url'];?>">
                                <button class="subscribe" type="submit">Submit</button>
                            </div> </div>
                    </form>
                    <hr>
                    <?php
                    foreach($comments as $row)
                    {
                        ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="themes/images/icons/commenter.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $row['sender_name'];?>
                                    <small><?php echo date("F j, Y, g:i a", strtotime($row['comment_date']));?></small>
                                </h4>
                                <?php echo $row['message'];?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
                <?php

            }
            ?>
        </div>
		
    



    </div>


</section>
<script>
    $.validate();
</script>

<script>
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>index.php/content/captcha',
        dataType: "html",

        //data: postData, // appears as $_GET['id'] @ your backend side
        success: function(data) {

            $('.content_captcha_img').html(data);

        }

    });

    $('#content_captcha_refresh').click(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/captcha',
            dataType: "html",

            //data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                $('.content_captcha_img').html(data);

            }

        });
    });
</script>