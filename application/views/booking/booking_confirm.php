<?php

$this->load->view('search_nav');

?>
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">


            <div class="col-sm-12">
                <?php if (validation_errors()) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <?php echo validation_errors() ?>.
                    </div>
                    <?php
                }
                ?>
                <h3><?php echo $package_name;?>  Booking</h3>

                <div class="book_con">

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Package Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p> <?php echo $package_name;?> ... ( <?php echo $package_duration;?>)</p>
                            </div>


                        </div>
                    </div>


                    

                    

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Trip Type: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['trip_type'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Arrival : </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['arrival_date'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Departure : </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['depart_date'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No. of PAX  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['no_of_person'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Adult  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['adult'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Child : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['child'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Infant : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['infant'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">First Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['first_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Middle Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['middle_name'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Last Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['last_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Contact No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['contact_no'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Email: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['email'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Country: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['country'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">City: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['city'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Passport No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $customer_detail['passport_no'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Additional Info: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['additional_info'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Extra Facility: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['extra_facility'];?></p>
                            </div>

                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">How do you know about us? </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['referedby'];?></p>
                            </div>


                        </div>
                    </div>




                    <form method="post" name="package_frm" id="package_frm" action="">

                        <p>
                            <label>Are you sure to book this Package?</label>
                            <input type="radio" name="confirm" value="yes" required="required"> Yes
                            <input type="radio" name="confirm" value="no" required="required"> No
                        </p>

                        <div class="row form-group">

                            <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                                <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
                                <input type="hidden" name="package_name" value="<?php echo $package_name;?>">
                                <input type="hidden" name="package_duration" value="<?php echo $package_duration;?>">
                                <input type="hidden" name="accommodation" value="<?php echo $accommodation;?>">
                                <input type="hidden" name="currency" value="<?php echo $currency;?>">
                                <button type="submit" class="subscribe btn btn-success hovereffect text-white">Continue Booking</button>
                            </div>


                        </div>
                    </form>

                </div>
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
                        <?php echo $package_name;?>     </h3>
                </div>


            </div>


        </div>
        <div class="row">

            <div class="col-md-9">





            </div></div>


    </div>

</section>