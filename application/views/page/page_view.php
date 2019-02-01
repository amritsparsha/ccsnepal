<section class="blank"></section>
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $content['content_page_title'];?></h2>

            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="">Home</a></li>
                <li class="active"><?php echo $content['content_title'];?></li>
            </ol>
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
                        <strong>Success !</strong> <?php echo $success; ?>.
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
                <?php
                if($content['content_type'] =="Article")
                {

                    $content_id = $content['content_id'];
                    $comments = $this->content->get_content_comments($content_id);
                    $tags = $this->content->get_content_tags($content_id);
                    $total_cmt = sizeof($comments);


                    ?>

                    <div class="blog_info">
                        <span class="blog_posttype blog_slider text-center"> <i class="fa fa-picture-o"></i>
                       </span>
                        <div class="blog_info_block">
                            <span class="date"><i class="fa fa-calendar  "></i> &nbsp; <?php echo date("F j, Y, g:i a", strtotime($content['created']));?></span>
                            <span class="comments"><i class="fa fa-comment  "></i> &nbsp; <?php echo $total_cmt;?> comments</span>
                        <span class="blog_tags">Tags: <?php foreach ($tags as $tag){ ?><a rel="tag" href="#" style="padding-left: 5px;"><?php echo $tag['term_name'];?>,</a><?php }?>

                        </span>
                        </div>
                    </div>
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
            <?php
            if($content['content_type'] =="Article")
            {
                ?>

                <div class="leavecomment-blog">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <input type="text" name="sender_name" placeholder="Full Name" data-validation="required" class="form-control" kl_virtual_keyboard_secure_input="on">
                        </div>
                        <div class="form-group">
                            <input type="email" name="sender_email" placeholder="Email Address" data-validation="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" name="message" class="form-control" rows="3" data-validation="required"></textarea>
                        </div>
                        <div class="row form-group"><div class="col-md-3 clear-padding">
                                <input type="hidden" name="content_id" value="<?php echo $content_id;?>">
                                <button class="subscribe" type="submit">Submit</button>
                            </div> </div>
                    </form>
                    <hr>
                    <?php
                    foreach($comments as $row)
                    {
                        ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $row['sender_name'];?>
                                    <small><?php echo date("F j, Y, g:i a", strtotime($row['comment_date']));?></small>
                                </h4>
                                <?php echo $row['message'];?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
                <?php

            }
            ?>

        </div>



    </div>


</section>
<script>
    $.validate();
</script>