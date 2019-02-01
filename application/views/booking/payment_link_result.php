<!--<section class="blank"></section>-->
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2>Payment Process Result</h2>

            </div>
        </div>
    </div>
</section>
<section class="content"><div class="container">

        <?php

        if($status == "error") {
            ?>


            <div class="row">
                <div class="col-md-7 col-md-offset-2 errormsg text-center">

                    <h1><?php echo $status; ?> !!!</h1>

                    <p><?php echo $message; ?></p>

                    <img src="themes/images/error.png">
                    <a href="#" class="btn btn-primary">Back To Home</a>


                </div>

            </div>
            <?php
        }
        ?>



</section>


