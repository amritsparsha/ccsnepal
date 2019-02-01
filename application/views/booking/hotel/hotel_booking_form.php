<?php
$login_id = $this->session->userdata('customer_id');
?>
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $hotel_name;?></h2>

            </div>
        </div>
    </div>

</section>

<section class="content">
    <div class="container">

        <div class="row">


            <div class="col-md-10">
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
                    <form method="post" name="package_frm" id="package_frm" action="" class="has-validation-callback">

                        <p class="mandatory">Note : Fields marked with <i class="red">*</i> are mandatory.
                        </p>


                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">Hotel Name: </label></div>
                            <div class="col-md-6">

                                <div class="input-group date">
                                    <p> <?php echo $hotel_name;?></p>
                                </div>


                            </div>
                        </div>


                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class=" control-label">Room:</label></div>
                                <div class="col-md-6">

                                    <div class="input-group date">
                                        <p> <?php echo $room_name; ?>( Maximum Pax : <?php echo $max_pax;?>)</p>
                                    </div>


                                </div>
                            </div>


                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">Price: </label></div>
                            <div class="col-md-6">

                                <div class="input-group date">
                                    <p><?php echo $room_price ." ". $currency_code;?></p>
                                </div>


                            </div>
                        </div>



                        <div class="row ">
                            <div class="col-md-4">
                                <label class="control-label">CheckIn : <i class="red">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <input type="text" class="form-control input-md"
                                       value="<?php echo set_value('check_in'); ?>" class="" id="datepicker_arrival"
                                       name="check_in" data-validation="date" data-validation-format="mm/dd/yyyy">

                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <label class="control-label">CheckOut : <i class="red">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <input type="text" class="form-control input-md"
                                       value="<?php echo set_value('checkout'); ?>" class="" id="datepicker_depart"
                                       name="checkout" data-validation="date" data-validation-format="mm/dd/yyyy">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">No of Room : <i class="red">*</i></label></div>
                            <div class="col-md-3 form-group">
                                <select class="form-control input-md" name="no_of_room" id="room">
                                    <?php
                                    for($j=1; $j<=$available_room; $j++)
                                    {


                                        ?>
                                        <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                        <?php
                                    }
                                    ?>

                                </select>


                            </div>
                        </div>

                        <?php
                            if(isset($extra_bed_price) && $extra_bed_price !="") {
                                ?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class=" control-label">No of Extra Bed : <i class="red">*</i></label></div>
                                    <div class="col-md-3 form-group">
                                        <select class="form-control input-md" name="extra_bed_no" id="extra_bed">
                                            <?php
                                            for ($k = 1; $k <= $available_room; $k++) {


                                                ?>
                                                <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>


                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                        <div class="row">
                            <div class="col-md-4">
                                <label class=" control-label">No of Pax : <i class="red">*</i></label></div>
                            <div class="col-md-3 form-group">
                               <select class="form-control input-md" name="pax_no">
                                   <?php
                                   for($i=1; $i<=$max_pax; $i++)
                                   {


                                   ?>
                                   <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                   <?php
                                   }
                                   ?>

                               </select>


                            </div>
                        </div>



                        <?php
                        if ($login_id == "") {
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Title: <i class="red">*</i></label></div>
                                <div class="col-md-6 form-group">

                                    <select class="form-control" name="customer_title" id="selectbasic"
                                            data-validation="required">
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Ms">Ms.</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">First Name: <i class="red">*</i></label></div>
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
                                    <label class=" control-label">Last Name: <i class="red">*</i> </label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="plname" id="plname"
                                           value="<?php echo set_value('plname'); ?>" class="form-control input-md"
                                           data-validation="required length custom" data-validation-length="max100"
                                           data-validation-regexp="^([\w\s]+)$">


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Contact No: <i class="red">*</i></label></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="pcontact" id="phone"
                                           value="<?php echo set_value('pcontact'); ?>"
                                           class="form-control" data-validation="required length alphanumeric"
                                           data-validation-length="max50" data-validation-allowing="-+ " placeholder="">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Email: <i class="red">*</i></label></div>
                                <div class="col-md-6  form-group">
                                    <input type="text" name="pemail" id="email" class="form-control input-md"
                                           value="<?php echo set_value('pemail'); ?>" data-validation="required email">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">Country: <i class="red">*</i></label></div>
                                <div class="col-md-6  form-group">

                                    <input type="text" class="form-control input-md" placeholder="" name="country"
                                           value="<?php echo set_value('country'); ?>" data-validation="country"
                                           id="country-suggestions">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class=" control-label">City: <i class="red">*</i></label></div>
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
                                <label class=" control-label">How do you know about us? <i class="red">*</i></label>
                            </div>
                            <div class="col-md-6 form-group">

                                <select class="required" id="referedby" name="referedby" data-validation="required">
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
                                       data-validation="required"> &nbsp;
                                I agree <a class="terms" id="terms" rel="colorbox"

                                >Term &amp; Conditions.</a>


                            </div>
                        </div>


                        <div class="row form-group">

                            <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                                <input type="hidden" name="room_name" value="<?php echo $room_name;?>">
                                <input type="hidden" name="hotel_name" value="<?php echo $hotel_name;?>">
                                <input type="hidden" name="currency_code" value="<?php echo $currency_code;?>">
                                <input type="hidden" name="customer_id" value="<?php echo (isset($login_id) && $login_id !="")? $login_id:"";?>">
                                <input type="submit" value="Continue" id="booking_submit" name="packagesumbit"
                                       class="subscribe hovereffect text-white">
                            </div>


                        </div>
                    </form>


                </div>

            </div>
        </div>


    </div>


</section>

<script>

    $(document).ready(function () {
        var daysToAdd = 1;
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

<script>
    $('#booking_submit').click(function (e) {

        var room_no  = $('#room').val();
        var extra_bed  = $('#extra_bed').val();
        if(extra_bed > room_no)
        {
            alert("Invalid Extra Bed Number");
            e.preventDefault();
        }
        else {
            e.submit();
        }
    });
</script>

