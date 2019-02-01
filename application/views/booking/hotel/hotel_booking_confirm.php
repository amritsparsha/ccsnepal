<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $session['hotel_name'];?>  Booking</h2>

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
                        <?php echo $session['hotel_name'];?>     </h3>
                </div>


            </div>


        </div>
        <div class="row">

            <div class="col-md-9">

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

                <div class="book_con">

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Hotel Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p> <?php echo $session['hotel_name'];?></p>
                            </div>


                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Room Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p> <?php echo $session['room_name'];?> </p>
                            </div>


                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Total Amount: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['total_amount']." ".  $session['currency_code'];?></p>
                            </div>


                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Check In: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['check_in'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">CheckOut Date : </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['checkout'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No. of room  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['no_of_room'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No. of Nights  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['no_of_nights'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No. of Extra Bed  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $session['extra_bed_no'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">First Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['first_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Middle Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['middle_name'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Last Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['last_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Contact No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['contact_no'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Email: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['email'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Country: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['country'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">City: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['city'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Passport No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['passport_no'];?></p>
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
                                <button type="submit" class="subscribe hovereffect text-white">Continue Booking</button>
                            </div>


                        </div>
                    </form>

                </div>

            </div></div>


    </div>

</section>