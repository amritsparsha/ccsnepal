<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $hotel_detail['hotel_name'];?> Payment Step 1</h2>

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
            <div class="col-md-4">
                <form method="post" name="package_frm" id="package_frm" action="">

                    <p>
                        <label>Proceed for payment through</label>

                    </p>
                    <p>
                        <img src="themes/images/icons/paypal.png">



                        <input type="radio" name="confirm" value="paypal" required="required">

                    </p>
                    <p>
                        <img src="themes/images/icons/creditcard.png">
                        <input type="radio" name="confirm" value="creditcard" required="required">

                    </p>




                    <div class="row form-group">

                        <div class="col-md-5 col-md-offset-4 col-sm-5 col-xs-12 clear-padding">
                            <input type="hidden" name="booking_code" value="<?php echo $code;?>">
                            <button type="submit" class="subscribe hovereffect text-white">Continue Payment</button>
                        </div>


                    </div>
                </form>
            </div>

            <div class="col-md-8">

                <div class="book_con">

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Hotel Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p> <?php echo $hotel_detail['hotel_name'];?></p>

                            </div>


                        </div>
                    </div>


                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">Room: </label></div>
                            <div class="col-md-6">

                                <div class="input-group date">
                                    <p><?php echo $hotel_detail['room_name'];?></p>
                                </div>


                            </div>
                        </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Total Amount: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['total_amount']." ".  $detail['code'];?></p>
                            </div>


                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No of Room: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['no_of_room'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No of Nights  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $detail['no_of_nights'];?></p>
                            </div>

                        </div>
                    </div>


                    <?php
                    if(isset($detail['extra_bed_no']) && $detail['extra_bed_no'] !="") {
                        ?>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">No of Nights : </label></div>
                            <div class="col-md-3">

                                <div class="input-group date">
                                    <p><?php echo $detail['extra_bed_no']; ?></p>
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Check In : </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['check_in'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Check Out : </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['check_out'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">No. of PAX  : </label> </div>
                        <div class="col-md-3">

                            <div class="input-group date">
                                <p><?php echo $detail['pax_no'];?></p>
                            </div>

                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">First Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['first_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Middle Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['middle_name'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Last Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['last_name'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Contact No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['contact_no'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Email: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['email'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Country: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['country'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">City: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['city'];?></p>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Passport No: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['passport_no'];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Additional Info: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['additional_info'];?></p>
                            </div>

                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">How do you know about us? </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $detail['referedby'];?></p>
                            </div>


                        </div>
                    </div>






                </div>

            </div></div>


    </div>


</section>