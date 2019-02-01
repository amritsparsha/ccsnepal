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

                            <table class="form-table">
                                <tbody>


                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Job Title <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="news_title" data-validation="required"  size="50" data-validation="number required" value="<?php echo (isset($detail['news_title']) && $detail['news_title'] !="") ? $detail['news_title']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">
                                           
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Job Location <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="job_location" data-validation="required"  size="50" data-validation="number required" value="<?php echo (isset($detail['job_location']) && $detail['job_location'] !="") ? $detail['job_location']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>No. of Vacancy <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="no_of_vacancy" data-validation="required"  size="50" data-validation="number required" value="<?php echo (isset($detail['no_of_vacancy']) && $detail['no_of_vacancy'] !="") ? $detail['no_of_vacancy']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Basic Salary <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="text" name="basic_salary" data-validation="required"  size="50" data-validation="number required" value="<?php echo (isset($detail['basic_salary']) && $detail['basic_salary'] !="") ? $detail['basic_salary']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>





                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Job Description <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                       <textarea name="news_content" id="news"><?php echo (isset($detail['news_content']) && $detail['news_content'] !="") ? $detail['news_content']:""; ?></textarea>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Responsibility <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="meta_description" id="responsibility" data-validation="required" rows="4" cols="120"><?php echo (isset($detail['meta_description']) && $detail['meta_description'] !="") ? $detail['meta_description']:""; ?></textarea>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Job Requirement <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <textarea name="meta_keywords" id="requirement" data-validation="required" rows="4" cols="120"><?php echo (isset($detail['meta_keywords']) && $detail['meta_keywords'] !="") ? $detail['meta_keywords']:""; ?></textarea>
                                    </td>
                                </tr>
           
                                <tr valign="top">

                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>More Information <span class="asterisk">*</span>

                                        </label></th>

                                    <td style="background: transparent none repeat scroll 0% 0%;">

                                        <textarea name="meta_title" id="moreinfo" data-validation="required" rows="4" cols="120"><?php echo (isset($detail['meta_title']) && $detail['meta_title'] !="") ? $detail['meta_title']:""; ?></textarea>

                                    </td>

                                </tr>
                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Published Date <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="date" name="publish_date" data-validation="required"  size="50" data-validation="date required" value="<?php echo (isset($detail['publish_date']) && $detail['publish_date'] !="") ? $detail['publish_date']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th style="background: transparent none repeat scroll 0% 0%;" scope="row"><label>Expiry Date <span class="asterisk">*</span>
                                        </label></th>
                                    <td style="background: transparent none repeat scroll 0% 0%;">
                                        <input type="date" name="expire_date" data-validation="required"  size="50" data-validation="date required" value="<?php echo (isset($detail['expire_date']) && $detail['expire_date'] !="") ? $detail['expire_date']:""; ?>"  autocomplete="off" class="regular-text required valid" kl_virtual_keyboard_secure_input="on">

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
                            <input type="hidden" name="news_id" value="<?php echo (isset($detail['news_id']) && $detail['news_id'] !="") ? $detail['news_id']:""; ?>">
                            <input type="submit" name="Setting Btn" id="btn_news" class="button" value="Save">
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
    CKEDITOR.replace( 'news' );
    CKEDITOR.replace( 'responsibility' );
    CKEDITOR.replace( 'requirement' );
    CKEDITOR.replace( 'moreinfo' );
</script>
<script>
    $('#btn_news').click(function(e)
    {


        var b =0;



        var ext2 =  $('#featuredimg').val().split('.').pop().toLowerCase();



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


       if(b != "1")
        {
            alert('Invalid Featured Image');
            e.preventDefault();
        }

        else{

            e.submit;

        }


    });
</script>
