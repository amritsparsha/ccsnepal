<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $session['package_name'];?> Payment Step 1</h2>

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
            <div class="payment-wrapper">
            <form method="post" name="package_frm" id="package_frm" action="">

              <h3>
                    Proceed for payment through 

                    </h3>
                  <p>Please select a payment method.</p>
                    <ul>
                    <li>
                      



                        <input type="radio" name="confirm" value="paypal" required="required">   <img src="themes/images/icons/paypal.png">

                    </li>
                      
                   <li>
                        
                        <input type="radio" name="confirm" value="creditcard" required="required"> <img src="themes/images/icons/creditcard.png">

                    </li>
                    </ul>




                    <div class="row form-group">

                        <div class="col-md-7 col-md-offset-2  col-sm-5 col-xs-12 clear-padding"> 
                        <input type="hidden" name="booking_code" value="<?php echo $code;?>">
                            <button type="submit" class="subscribe hovereffect text-white">Continue Payment</button>
                        </div>


                    </div>
                </form>
            </div>
            
            
                
            </div>

            <div class="col-md-8">

                <div class="book_con">

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Package Name: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p> <?php echo $session['package_name'];?> ... ( <?php echo $session['package_duration'];?>)</p>

                            </div>


                        </div>
                    </div>
                    <?php

                    if(isset($session['name'])) {
                        ?>

                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class=" control-label">Accomodation: </label></div>
                            <div class="col-md-6">

                                <div class="input-group date">
                                    <p><?php echo $session['name']; ?></p>
                                </div>


                            </div>
                        </div>
                        <?php

                    }
                    ?>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Package Amount: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['amount']." ".  $session['code'];?></p>
                            </div>


                        </div>
                    </div>

                    <?php
                    $updated = $session['edited_amount'];
                    if($updated !="")
                    {
                        $calculation_type = $session['calculation_type'];
                        if($calculation_type == "+")
                        {
                            ?>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class=" control-label">Extra Charge: </label> </div>
                                <div class="col-md-6">

                                    <div class="input-group date">
                                        <p><?php echo $session['edited_amount']." ".  $session['code'];?></p>
                                    </div>


                                </div>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class=" control-label">Discount Amount: </label> </div>
                                <div class="col-md-6">

                                    <div class="input-group date">
                                        <p><?php echo $session['edited_amount']." ".  $session['code'];?></p>
                                    </div>


                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class=" control-label">Total Amount: </label> </div>
                        <div class="col-md-6">

                            <div class="input-group date">
                                <p><?php echo $session['total_amount']." ".  $session['code'];?></p>
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






                </div>

            </div></div>


    </div>


</section>