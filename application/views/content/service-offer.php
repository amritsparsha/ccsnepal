<section>
    <div class="container backgroundwhite-color">
        <div class="col-md-9">
            <div class="TitreProduit">
                <h2>
                    <?php echo $content['content_page_title'];?></h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i>
                        </a></li>
                    <li>Services</li>
                    <li class="active"><?php echo $content['content_page_title'];?></li>
                </ol>
            </div>
            <div class="main-container">
                <?php if(isset($error)) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo $error; ?>.
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($success)) {
                    ?>
                    <div class="alert alert-success alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $success; ?>
                    </div>
                    <?php
                }
                ?>
                <?php if (isset($error)) {


                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo isset($error)?$error:"" ; ?>
                    </div>
                    <?php
                }
                ?>
                <h3 class="trek-title">
                    <?php echo $content['content_title'];?>
                </h3>
                <?php
                $path = 'uploads/content/';
                if (file_exists($path.$content['featured_img']) && $content['featured_img'] !="")
                {
                    ?>
                    <img src="<?php echo $path.$content['featured_img'];?>" class="img-responsive" >
                    <?php
                }

                ?>

                <p>
                    <?php echo $content['content_body'];?>
                </p>

                <hr class="light">
            </div>

            <?php
            if($content['content_type'] =="Page")
            {
                $content_id= $content['content_id'];
                $tabs = $this->content->get_content_tabs($content_id);
                ?>
                <div class="row">
                    <div class="col-md-12 clear-padding">
                        <div class="inner-accrodance">

                            <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
                                <?php
                                if($tabs['tab1'] !="")
                                {
                                    ?>
                                    <div class="panel panel-default">
                                        <div id="headingOne" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" role="button">
                                                    <?php echo $tabs['tab1'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
                                            <div class="panel-body">
                                                <?php echo $tabs['description1'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab2'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingTwo" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab2'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo">
                                            <div class="panel-body">
                                                <?php echo $tabs['description2'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab3'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseThree" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab3'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseThree">
                                            <div class="panel-body">
                                                <?php echo $tabs['description3'];?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                if($tabs['tab4'] !="")
                                {
                                    ?>

                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseFour" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab4'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseFour">
                                            <div class="panel-body">
                                                <?php echo $tabs['description4'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($tabs['tab5'] !="")
                                {
                                    ?>
                                    <div class="panel panel-default">
                                        <div id="headingThree" role="tab" class="panel-heading accordion_item_title">
                                            <h4 class="panel-title">
                                                <a aria-controls="collapseThree" aria-expanded="false" href="#collapseFive" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed">
                                                    <?php echo $tabs['tab5'];?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseFive">
                                            <div class="panel-body">
                                                <?php echo $tabs['description5'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>


        </div>
        <div class="col-md-3">
            <div class="left-sidebar">
                <ul class="nav nav-sidebar"><?php
                    if(!empty($services_offers)) {
                        
                        foreach ($services_offers as $service) {
                            
                            $active  = ($service['content_url'] ==  $content['content_url'])?"active":"";
                            ?>
                            <li class="<?php echo $active;?>"><a href="<?php echo  site_url('service/'.$service['content_url']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <?php echo $service['content_page_title'];?></a></li>
                            <?php
                        }
                    }
                    ?>

                </ul>

            </div>



        </div>



    </div>


</section>
<script>
    $.validate();
</script>

<script>
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>/index.php/content/captcha',
        dataType: "html",

        //data: postData, // appears as $_GET['id'] @ your backend side
        success: function(data) {

            $('.content_captcha_img').html(data);

        }

    });

    $('#content_captcha_refresh').click(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>/index.php/content/captcha',
            dataType: "html",

            //data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                $('.content_captcha_img').html(data);

            }

        });
    });
</script>