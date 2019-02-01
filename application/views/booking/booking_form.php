<?php

$this->load->view('search_nav');

?>


<?php
$login_id = $this->session->userdata('customer_id');
?>
<section id="inner-page-search">

        <div class="container">
           <div  class="row">
               <div class="section-title">

                   <h2><?php echo $package_name;?></h2>

               </div>
           </div>
        </div>


</section>

<section class="content">
    <div class="container">
        <div class="row">

            <div class="col-md-9 ">

                <div class="main-container">

                    <h3 class="trek-title">
                    </h3>
                </div>


            </div>


        </div>
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

                <div class="book_con book-form">
                    <form method="post" name="package_frm" id="package_frm" action="" class="v2-search-form has-validation-callback">

                        <p class="mandatory">Note : Fields marked with <i class="reds">*</i> are mandatory.
                        </p>


                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">Package Name: </label></div>
                            <div class="col-md-6">

                                <div class="input-group date">
                                   <?php echo $package_name;?> ... ( <?php echo $package_duration ;?>)
                                </div>


                            </div>
                        </div>

                        

                        

                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">Trip Type <i class="reds">*</i> : </label></div>
                            <div class="col-md-6 form-group">

                                <select name="trip_type" id="ptriptype">
                                    <option value="private">Private</option>
                                    <option value="group">Group Join</option>
                                </select>

                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <label class="control-label">Arrival : <i class="reds">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <input type="text" class="form-control input-md"
                                       value="<?php echo set_value('arrival'); ?>" class="" id="datepicker_arrival"
                                       name="arrival" data-validation="date" data-validation-format="mm/dd/yyyy">

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <label class="control-label">Depart : <i class="reds">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <input type="text" class="form-control input-md"
                                       value="<?php echo set_value('depart'); ?>" class="" id="datepicker_depart"
                                       name="depart" data-validation="date" data-validation-format="mm/dd/yyyy">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">No. of PAX : <i class="reds">*</i></label></div>
                            <div class="col-md-3 form-group">
                                <input type="text" input-md"
                                       value="<?php echo set_value('ppax'); ?>" class="date booking required" id="ppax"
                                       name="ppax" data-validation="number" data-validation-allowing="range[1;50]">


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6 form-group">

                                <div class="row clear-padding">


                                    <div class="col-md-4 clear-padding"><label class="main">
                                            <span>Adults(12 +)</span>
                                            <select name="padult" id="padult" >
                                                <?php
                                                for ($i = 1; $i < 30; $i++) {

                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </label></div>
                                    <div class="col-md-4 clear-padding"><label class="main">
                                            <span>Child(2-12)</span>
                                            <select name="pchild" id="pchild" >
                                                <?php
                                                for ($i = 0; $i < 30; $i++) {

                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </label></div>
                                    <div class="col-md-4 clear-padding"><label class="main">
                                            <span>Infants(0-2)</span>
                                            <select name="pinfant" id="pinfant" >
                                                <?php
                                                for ($i = 0; $i < 30; $i++) {

                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </label></div>

                                </div>

                            </div>
                        </div>
                        <?php
                        if ($login_id == "") {
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Title: <i class="reds">*</i></label></div>
                                <div class="col-md-6 form-group">

                                    <select  name="customer_title" id="selectbasic"
                                            data-validation="required">
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Ms">Ms.</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">First Name: <i class="reds">*</i></label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="pfname" id="pfname"
                                           value="<?php echo set_value('pfname'); ?>" class="form-control input-md"
                                           data-validation="required length custom" data-validation-length="max100"
                                           data-validation-regexp="^([\w\s]+)$">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Middle Name: </label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="pmname" id="pmname"
                                           value="<?php echo set_value('pmname'); ?>" class="form-control input-md"
                                           data-validation="length custom" data-validation-optional="true"
                                           data-validation-length="max100" data-validation-regexp="^([\w\s]+)$">


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Last Name: <i class="reds">*</i> </label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="plname" id="plname"
                                           value="<?php echo set_value('plname'); ?>" class="form-control input-md"
                                           data-validation="required length custom" data-validation-length="max100"
                                           data-validation-regexp="^([\w\s]+)$">


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Contact No: <i class="reds">*</i></label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="pcontact" id="phone"
                                           value="<?php echo set_value('pcontact'); ?>"
                                           class="form-control" data-validation="required length alphanumeric"
                                           data-validation-length="max50" data-validation-allowing="-+ " placeholder="">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Email: <i class="reds">*</i></label></div>
                                <div class="col-md-6  form-group">
                                    <input type="text" name="pemail" id="email" class="form-control input-md"
                                           value="<?php echo set_value('pemail'); ?>" data-validation="required email">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Country: <i class="reds">*</i></label></div>
                                <div class="col-md-6  form-group">

                                    <input type="text" class="form-control input-md" placeholder="" name="country"
                                           value="<?php echo set_value('country'); ?>" data-validation="country"
                                           id="country-suggestions">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">City: <i class="reds">*</i></label></div>
                                <div class="col-md-6  form-group">

                                    <input type="text" class="form-control input-md" placeholder="" name="city"
                                           value="<?php echo set_value('city'); ?>"
                                           data-validation="required length custom" data-validation-length="max150"
                                           data-validation-regexp="^([\w\s]+)$">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Passport No: </label></div>
                                <div class="col-md-6  form-group">

                                    <input type="text" class="form-control input-md" data-validation="length custom"
                                           data-validation-optional="true" data-validation-length="max90"
                                           data-validation-regexp="^([\w\s]+)$" placeholder="" name="passportno" value="<?php echo set_value('passportno');?>">

                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">Additional Info: </label></div>
                            <div class="col-md-6 form-group">

                                <textarea name="pinfo" id="textarea" class="form-control"
                                          data-validation="length custom" data-validation-optional="true"
                                          data-validation-length="max600"
                                          data-validation-regexp="^([\w\s,:=.?']+)$"><?php echo set_value('pinfo'); ?></textarea>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">Extra Facility: </label></div>
                            <div class="col-md-6 form-group">

                                <textarea name="extra_facility" id="textarea" class="form-control"
                                          data-validation="length custom" data-validation-optional="true"
                                          data-validation-length="max600"
                                          data-validation-regexp="^([\w\s,:=.?']+)$"><?php echo set_value('extra_facility'); ?></textarea>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">How do you know about us? <i class="reds">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <select  id="referedby" name="referedby" data-validation="required">
                                    <option value="Previous Client">Previous Client</option>
                                    <option value="Internet Search">Internet Search</option>
                                    <option value="Trip Advisor">Trip Advisor</option>
                                    <option value="Guide Books">Guide Books</option>
                                    <option value="Others">Others</option>
                                </select>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6 form-group">

                                <input type="checkbox" title="I agree Term &amp; Conditions"
                                       class="required checkbox pull-left" value="Y" id="tc" name="tc"
                                       data-validation="required"> &nbsp; &nbsp; &nbsp; &nbsp;
                                I agree <a class="terms" id="terms" rel="colorbox"
                                           href="http://rupakottravels.com/index.php/content/terms-&-conditions-4"
                                           target="_blank">Term &amp; Conditions.</a>


                            </div>
                        </div>


                        <div class="row form-group">

                            <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                                <input type="hidden" name="package_id" value="<?php echo $package_id;?>">
                                <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
                                <input type="submit" value="Continue" id="booking_submit" name="packagesumbit"
                                       class="subscribe btn btn-success hovereffect text-white">
                            </div>


                        </div>
                    </form>


                </div>

            </div>
        </div>


    </div>


</section>
<script type="text/javascript">
    //script to check the person number
    $(document).ready(function () {


        $('#booking_submit').click(function (e) {


            var pax = parseInt($("#ppax").val());
            var adult = parseInt($('#padult').val());
            var infant = parseInt($('#pinfant').val());
            var child = parseInt($('#pchild').val());
            var total = (adult + infant + child);

            if (pax == total) {
                email_validate(e);

            }
            else {
                e.preventDefault();
                alert('Error : Number of Pax should be total number of Adult,Child & Infant.');

            }
        });

    });
</script>

<script>

    $(document).ready(function () {
        var daysToAdd = 3;
        $("#datepicker_arrival").datepicker({
            minDate: 0,
            showButtonPanel: true,
            onSelect: function (selected) {
                var dtMax = new Date(selected);
                dtMax.setDate(dtMax.getDate() + daysToAdd);
                var dd = dtMax.getDate();
                var mm = dtMax.getMonth() + 1;
                var y = dtMax.getFullYear();
                var dtFormatted = mm + '/' + dd + '/' + y;
                $("#datepicker_depart").datepicker("option", "minDate", dtFormatted);
            }
        });
        //var dateToday = new Date();
        $("#datepicker_depart").datepicker({
            minDate: 0,
            showButtonPanel: true,
            onSelect: function (selected) {
                var dtMax = new Date(selected);
                dtMax.setDate(dtMax.getDate() - daysToAdd);
                var dd = dtMax.getDate();
                var mm = dtMax.getMonth() + 1;
                var y = dtMax.getFullYear();
                var dtFormatted = mm + '/' + dd + '/' + y;
                $("#datepicker_depart").datepicker("option", "minDate", dtFormatted)
            }
        });
    });


    $('.alpha').bind('keyup blur', function () {
            var node = $(this);
            node.val(node.val().replace(/[^a-z]/g, ''));
        }
    );
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

        window.applyValidation(true, '#package_frm', 'top');




    })(jQuery, window);
</script>
