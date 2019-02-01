<?php 
	$this->load->view('search_nav');
?>

<section class="search-pg">
    <div class="hero-container bg-black">
        <div class="container">
            <div class="col-md-12 hero-header"> <h1 class="stronger">Plan Your Holiday Trip
                </h1>
            </div>

        </div>
    </div>

</section>
<section class="inner-details">
    <div class="container backgroundwhite-color">

        <div class="row">

            <div class="col-md-12">
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
                <?php
                if ($this->session->flashdata('error') != "") {
                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>



                <form class="inner-form v2-search-form has-validation-callback" method="post" action="" name="plan" id="plan">
                    <p><strong>Note:</strong> Fields marked with <i class="reds">*</i> are mandatory</p>
                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Country <i class="reds">*</i></label></div>
                        <div class="col-md-6"> <select name="country"  id="sel1">
                                <option>NEPAL</option>

                            </select></div>


                    </div>





                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Destination <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <div class="row">
                                <?php
                                $destination =  $this->crud_model->get_all('igc_destination');
                                foreach ($destination as $row) {
                                    ?>
                                    <div class="col-md-4 checkbox ">
                                        <label>
                                            <input type="checkbox" name="destination[]" value="<?php echo $row['destination_id'];?>"> <?php echo $row['destination'];?>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>



                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Trip Type <i class="reds">*</i></label></div>
                        <div class="col-md-6"> <select  name="trip_type" id="sel1">
                                <option value="Private">Private</option>
                                <option value="Group">Group</option>

                            </select>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Trip Start <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <input type="text" name="start_date"  id="trip_start_date" value="<?php echo set_value('start_date');?>" data-validation="date" data-validation-format="mm/dd/yyyy">
                        </div>


                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Trip End <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <input type="text"  name="end_date"  id="trip_end_date" value="<?php echo set_value('end_date');?>" data-validation="date" data-validation-format="mm/dd/yyyy">
                        </div>


                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Price Range <i class="reds">*</i></label></div>
                        <div class="col-md-6">  <input type="text" name="price_range"  value="<?php echo set_value('price_range');?>" id="exampleInputPassword1" placeholder="Price Range"></div>


                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">  </div>
                        <div class="col-md-2">
                            <label>Adults(12+)</label>
                            <select id="sel1" name="adult">
                                <?php
                                for($i=1; $i<30; $i++)
                                {

                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                            </select>  </div>
                        <div class="col-md-2"> <label>Child(2-12)</label><select name="child"  id="sel1">
                                <?php
                                for($i=0; $i<30; $i++)
                                {

                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                            </select>  </div>
                        <div class="col-md-2"> <label>Infants(0-2)</label>
                            <select name="infant"  id="sel1">
                                <?php
                                for($i=0; $i<30; $i++)
                                {

                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                            </select>  </div>
                    </div>





                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Full Name <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <input type="text" name="full_name" id="pfname" value="<?php echo set_value('full_name');?>"  class=" input-md" data-validation="required length custom" data-validation-length="max100" data-validation-regexp="^([\w\s]+)$">

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Contact No <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <input type="text" name="pcontact" id="phone" value="<?php echo set_value('pcontact');?>"
                                    data-validation="required length alphanumeric" data-validation-length="max50"   data-validation-allowing="-+ " placeholder="" >

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">  <label for="country">Email <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                            <input type="text" name="email" id="email" class="input-md"  value="<?php echo set_value('email');?>" data-validation="required email">

                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-2">  <label for="country">Please Enter Captcha <i class="reds">*</i></label></div>
                        <div class="col-md-6">
                        <span class="holiday_captcha_img captcha-word"></span>
                        <span style="cursor: pointer;" id="holiday_captcha_refresh"><i class="fa fa-refresh" style="font-size: 24px;"></i></span>
                            </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"> </div>
                        <div class="col-md-6">
                        <input type="text" name="captcha_code"  placeholder="Captcha Code Here.." data-validation="required length custom" value="<?php echo set_value('captcha_code');?>" data-validation-length="max10" data-validation-regexp="^([\w\s]+)$" >
                            </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2"> </div>
                        <div class="col-md-6">   <button type="submit" class="btn btn-app-download btn-primary">Submit</button>
                            </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<script>
   // $.validate();
</script>
<script>
    $(document).ready(function () {
        var daysToAdd = 3;
        $("#trip_start_date").datepicker({
            minDate: 0,
            showButtonPanel: true,
            onSelect: function (selected) {
                var dtMax = new Date(selected);
                dtMax.setDate(dtMax.getDate() + daysToAdd);
                var dd = dtMax.getDate();
                var mm = dtMax.getMonth() + 1;
                var y = dtMax.getFullYear();
                var dtFormatted = mm + '/'+ dd + '/'+ y;

                $("#trip_end_date").datepicker("option", "minDate", dtFormatted);
            }
        });

        $("#trip_end_date").datepicker({
            minDate: 0,
            showButtonPanel: true,
            onSelect: function (selected) {
                var dtMax = new Date(selected);
                dtMax.setDate(dtMax.getDate() - daysToAdd);
                var dd = dtMax.getDate();
                var mm = dtMax.getMonth() + 1;
                var y = dtMax.getFullYear();
                var dtFormatted = mm + '/'+ dd + '/'+ y;
                $("#trip_start_date").datepicker("option", "minDate", dtFormatted)
            }
        });
    });
</script>
<script>
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>index.php/content/plan_captcha_setting',
        dataType: "html",

        //data: postData, // appears as $_GET['id'] @ your backend side
        success: function(data) {

            $('.holiday_captcha_img').html(data);

        }

    });

    $('#holiday_captcha_refresh').click(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/plan_captcha_setting',
            dataType: "html",

            //data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                $('.holiday_captcha_img').html(data);

            }

        });
    });
</script>

<script>
    (function($, window) {
        // Add a new validator
        $.formUtils.addValidator({
            name : 'even_number',
            validatorFunction : function(value, $el, config, language, $form) {
                return parseInt(value, 10) % 2 === 0;
            }

        });

        window.applyValidation = function(validateOnBlur, forms, messagePosition, xtraModule) {
            $.validate({

                lang : 'en',
                //sanitizeAll : 'trim', // only used on form C
                // borderColorOnError : 'purple',
                modules : 'security, sanitize, location, sweden, file,' +
                ' uk, brazil' +( xtraModule ? ','+xtraModule:''),
                onModulesLoaded: function() {
                    $('#country-suggestions').suggestCountry();

                    $('#password').displayPasswordStrength();
                },
                onValidate : function($f) {

                    console.log('about to validate form '+$f.attr('id'));

                    var $callbackInput = $('#callback');
                    if( $callbackInput.val() == 1 ) {
                        return {
                            element : $callbackInput,
                            message : 'This validation was made in a callback'
                        };
                    }
                }

            });
        };

        $('#text-area').restrictLength($('#max-len'));

        window.applyValidation(true, '#plan', 'top');





    })(jQuery, window);
</script>


