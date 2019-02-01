 
<section id="inner-page-search">
    <div class="row top-offer blue-bg">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $detail['package_name']."(". $detail['package_duration'].")";?></h2>

            </div>
        </div>
    </div>


</section>

<section class="content cart-body">
    <div class="container">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>

                <li class="active">Review Detail</li>
            </ol>
            <div class="main-container blog-listing">
                <div class="row blog-post">
                    <!-- First Blog Post -->

                    <h3>
                        <?php echo $detail['review_title'];?>
                    </h3>

                    <hr>
                    <?php
                    $path = 'uploads/package/'.$detail['package_id'].'/';
                    if (file_exists($path.$detail['featuredimg']) && $detail['featuredimg'] !="")
                    {
                        ?>
                        <img src="<?php echo $path.$detail['featuredimg'];?>" class="img-responsive" >
                        <?php
                    }
                    else
                    {
                        ?>
                        <img class="img-responsive" src="img/innerimg.jpg">
                        <?php
                    }
                    ?>
                    <div class="orgs social-share">
                        <ul>

                            <!-- <div class="fb-share-button" data-href="<?php echo site_url('review/detail/'.$detail['review_url']);?>"
                                 data-layout="button_count">
                            </div>


                            <a href="https://twitter.com/share" style="padding-top: 10px;" class="twitter-share-button"{count} data-via="SansuiTrek">Tweet</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            <a href="https://plus.google.com/share?url={<?php echo site_url('review/detail/'.$detail['review_url']);?>}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
                                    src="https://www.gstatic.com/images/icons/gplus-64.png" style="width: 33px;" alt="Share on Google+"/></a> -->

                        </ul>
                    </div>
                    <hr>

                    <?php echo $detail['review_text'];?>



                    <hr>






                </div>





            </div>



        </div>
    </div>

</section>


