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
<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">General</a>
    </li>

    <li class=""><a href="#settings" data-toggle="tab">Meta Settings</a>
    </li>


</ul>
    <form class="tab_form" method="post" action="<?php echo site_url('site_settings/site_form');?>" enctype="multipart/form-data">
<div class="tab-content">

<div class="tab-pane fade active in" id="home">

        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="admin_name">Site Name <span class="asterisk">*</span>
                    </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="site_name" id="admin_name" size="50" value="<?php echo (isset($setting['site_name']) && $setting['site_name'] !="") ? $setting['site_name']:""; ?>" required="required" autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on"></td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="slogan">Slogan<span class="asterisk">*</span> </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="site_slogan" id="slogan" class="regular-text" required="required"  size="50" value="<?php echo (isset($setting['site_name']) && $setting['site_slogan'] !="") ? $setting['site_slogan']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on"></td>
            </tr>
            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="feedback_email">Website Url<span class="asterisk">*</span> </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="site_url"  value="<?php echo (isset($setting['site_url']) && $setting['site_url'] !="") ? $setting['site_url']:""; ?>" required="required" size="50" autocomplete="off" class="regular-text required" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- www.amritnepali.com) </small>
                </td>

            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="feedback_email">Feedback Email<span class="asterisk">*</span> </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="feedback_email" id="feedback_email" value="<?php echo (isset($setting['feedback_email']) && $setting['feedback_email'] !="") ? $setting['feedback_email']:""; ?>" required="required" size="50" autocomplete="off" class="regular-text required" kl_virtual_keyboard_secure_input="on"></td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="contact_number">Contact Number<span class="asterisk">*</span> </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="contact_number" id="contact_number" value="<?php echo (isset($setting['contact_number']) && $setting['contact_number'] !="") ? $setting['contact_number']:""; ?>" required="required" size="50" autocomplete="off" class="regular-text required" kl_virtual_keyboard_secure_input="on"></td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="whatsapp">WhatsApp<span class="asterisk">*</span> </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;"><input type="text" name="whatsapp" id="whatsapp" value="<?php echo (isset($setting['whatsapp']) && $setting['whatsapp'] !="") ? $setting['whatsapp']:""; ?>" required="required" size="50" autocomplete="off" class="regular-text required" kl_virtual_keyboard_secure_input="on"></td>
            </tr>


            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Skype </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="skype" id="skype_name" size="50" value="<?php echo (isset($setting['skype']) && $setting['skype'] !="") ? $setting['skype']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- amrit.sparsha1) </small>
                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Facebook URL </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="facebook_link"  size="50"  value="<?php echo (isset($setting['facebook_link']) && $setting['facebook_link'] !="") ? $setting['facebook_link']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- https://facebook.com/amritnepalicom) </small>
                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Twitter URL </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="twiter_link"  size="50" value="<?php echo (isset($setting['twiter_link']) && $setting['twiter_link'] !="") ? $setting['twiter_link']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- https://twitter.com/amritnepalicom) </small>
                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>YouTube URL </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="youtube_link"  size="50" value="<?php echo (isset($setting['youtube_link']) && $setting['youtube_link'] !="") ? $setting['youtube_link']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- https://youtube.com/amritnepalicom) </small>
                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Google+ </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="google_plus_link" size="50" value="<?php echo (isset($setting['google_plus_link']) && $setting['google_plus_link'] !="") ? $setting['google_plus_link']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> ( Example- https://plus.google.com/amritnepalicom) </small>
                </td>
            </tr>
            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Linked In </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="linked_in" size="50" value="<?php echo (isset($setting['linked_in']) && $setting['linked_in'] !="") ? $setting['linked_in']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small></small>
                </td>
            </tr>
            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Instagram </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="instagram" size="50" value="<?php echo (isset($setting['instagram']) && $setting['instagram'] !="") ? $setting['instagram']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">
                    <small> </small>
                </td>
            </tr>

            <tr valign="top" class="contact_detail">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row">
                    <label>Contact Details</label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <textarea rows="5" cols="10" name="contact_details" id="contact-detail"><?php echo (isset($setting['contact_details']) && $setting['contact_details'] !="") ? $setting['contact_details']:""; ?></textarea>
                </td>
            </tr>


            </tbody>
        </table>


</div>

<div class="tab-pane fade" id="settings">

        <table class="form-table">

            <tbody><tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_title">Meta Title</label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <input type="text" name="meta_title" id="meta_title" size="28" value="<?php echo (isset($setting['meta_title']) && $setting['meta_title'] !="") ? $setting['meta_title']:""; ?>" autocomplete="off" kl_virtual_keyboard_secure_input="on">

                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_description">Meta Description </label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <textarea name="meta_description" id="meta_description" rows="5" cols="100"><?php echo (isset($setting['meta_description']) && $setting['meta_description'] !="") ? $setting['meta_description']:""; ?></textarea><br>

                </td>
            </tr>

            <tr valign="top">
                <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label for="meta_keyword">Meta Keyword</label></th>
                <td style="background: transparent none repeat scroll 0% 0%;">
                    <textarea name="meta_keywords" id="meta_keywords" rows="5" cols="100"><?php echo (isset($setting['meta_keywords']) && $setting['meta_keywords'] !="") ? $setting['meta_keywords']:""; ?></textarea><br>

                </td>
            </tr>

            </tbody>
        </table>

</div>

    <p class="submit">
        <input type="hidden" name="id" value="<?php echo (isset($setting['id']) && $setting['id'] !="") ? $setting['id']:""; ?>">
        <input type="submit" name="Setting Btn" class="button" value="Save Settings">
    </p>



</div>
    </form>
</div>
</div>


</div>
</div>
<script>
    CKEDITOR.replace( 'contact-detail' );
</script>