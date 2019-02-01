

<section class="product-details">
     <div class="container">
     <div class="item active">
                                <?php
                                $path = 'uploads/hotel/';
                                ?>
                                <img src="<?php echo $path.$detail['featuredimg'];?>"
                                     alt="hotel Banner" class="pkg_banner">
                                
                            </div>
         <div class="col-md-12 price-detail">
             <div class="row">
             
                 <div class="col-md-6">
                     <div class="TitreProduit">
                         <h2> <?php echo $detail['name']; ?></h2>
                         <ol class="breadcrumb">
                             <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i>
                             </a></li>
                             <li><a href="<?php echo site_url('hotel') ?>">Hotel</a></li>
                             <li class="active"><?php echo $detail['name']; ?></li>
                         </ol>
                     </div>

                 </div>
                 <div class="col-md-2 review-star">
                     <div class="rate-star ">
                         <div class="inner-rate">
                             <div class="rating-box"> <i class="fa fa-users"></i>
                                 <?php
                                            $total= $detail['rating'];
                                            $remaining = 5 - $total;
                                            for($i=0; $i<$total; $i++)
                                            {
                                                echo '<i class="fa fa-star"></i>';
                                            }
                                            for($j=0; $j<$remaining; $j++)
                                            {

                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                            ?>                    </div>
                         </div>
                     </div>

                     <a href="#">write a review</a>
                 </div>
                 <div class="col-md-2">
                     <div class="asset_links pull-right">
<span>
    Tell A Friend
</span>


                         <a href="#" >
                             <img src="themes/images/icons/share.PNG" class="img-responsive">
                         </a>

                     </div>
                 </div>
                

             </div>

         </div>


     </div>


<section>
    <div class="container">

        <div class="package-details" >

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Features</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Location</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Gallery</a></li>

                <?php if (!empty($detail['tab1'])){?>
                <li role="presentation"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><?php echo $detail['tab1']?></a></li>
                <?php
                }?>
                 <?php if (!empty($detail['tab2'])){?>
                <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><?php echo $detail['tab2']?></a></li>
                <?php
                }?>
                 <?php if (!empty($detail['tab3'])){?>
                <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><?php echo $detail['tab3']?></a></li>
                <?php
                }?>
                 <?php if (!empty($detail['tab4'])){?>
                <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><?php echo $detail['tab4']?></a></li>
                <?php
                }?>
                 <?php if (!empty($detail['tab5'])){?>
                <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"><?php echo $detail['tab5']?></a></li>
                <?php
                }?>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                <?php
                foreach($category as $row){
                    if($detail['category']!="" && ($detail['category'] == $row['id'])){
                    ?>
                    <h4><?php
                        echo $row['name'];?>
                        </h4>
                        <?php
                    }
                    }
                ?>
                <?php echo $detail['description']; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
               
                <ul id="features">
                                    <div>
                                    <ul id="mainfeature">  <?php foreach($features_name as $row){ ?>                                                                            
                                    <li class="maintitle">
                                    <?php
                                     $features_id = $row['id'];

                                     $link = $this->hotel->get_hotel_feature($hotel_id, $features_id);
                                        if(isset($link) && (!empty($link))){
                                        echo $row['features_name'];
                                        }
                                     ?>                                          
                                    <ul> 
                                        <?php 
                                    $child_name = $this->hotel->get_child($features_id);
                                    if(!empty($child_name)){
                                     foreach ($child_name as $key) {
                                     ?>
                                    <li>
                                    <?php
                                     $feature_id = $key['id'];
                                    $link = $this->hotel->get_hotel_feature($hotel_id, $feature_id);
                                    if(isset($link) && (!empty($link))){
                                        echo $key['features_name'];
                                    }
                                          
                                    }           
                                    ?></li>                
                                </ul>

                                </li> 
                                    <?php
                                           }
                                           }
                                           ?>       
                                        </ul>

                                    </div>                            
                                </ul>

                            


                </div>

                <div role="tabpanel" class="tab-pane" id="messages">
              <div id="myMap"></div>


        </div>

        <div role="tabpanel" class="tab-pane" id="settings">
                <ul class="gallery_fancy">
                <?php
                        if(! empty($albums)) {

                        $j=0;
                        foreach ($albums as $rows) {
                            $actives = ($j == 0) ? "active" : "";
                            $path  =  'uploads/album/'.$rows['path_id'].'/';
                            ?>
                        <li><a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo $path.$rows['name'];?>"><img src="<?php echo $path.$rows['name'];?>" alt=""/></a></li>

                        <?php
                            $j++;
                        }
                        }
                        ?>
                </ul>
                
        </div>


                            <?php
                    if((!empty($detail['tab1'])) && (!empty($detail['description1']))){
                ?>
                <div role="tabpanel" class="tab-pane" id="tab1">
                    <div><?php echo $detail['description1']; ?></div>
                </div>
                <?php
                }
                ?>
                <?php
                    if((!empty($detail['tab2'])) && (!empty($detail['description2']))){
                ?>
                <div role="tabpanel" class="tab-pane" id="tab2">
                    <div><?php echo $detail['description3']; ?></div>
                </div>
                <?php
                }
                ?>
                <?php
                    if((!empty($detail['tab3'])) && (!empty($detail['description3']))){
                ?>
                <div role="tabpanel" class="tab-pane" id="tab3">
                    <div><?php echo $detail['description3']; ?></div>
                </div>
                <?php
                }
                ?>
                <?php
                    if((!empty($detail['tab4'])) && (!empty($detail['description4']))){
                ?>
                <div role="tabpanel" class="tab-pane" id="tab4">
                    <div><?php echo $detail['description4']; ?></div>
                </div>
                <?php
                }
                ?>
                <?php
                    if((!empty($detail['tab1'])) && (!empty($detail['description1']))){
                ?>
                <div role="tabpanel" class="tab-pane" id="tab1">
                    <div><?php echo $detail['description1']; ?></div>
                </div>
                <?php
                }
                ?>
                </div>

</section>


 </section>


 <section>
        <div class="container" id="#booknow">
            <?php if(validation_errors()) {


                ?>
                <div class="alert alert-danger alert_box">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                            class="fa fa-times"></i></a>
                    <?php echo validation_errors() ?>
                </div>
                <?php
            }
            ?>

            <table class="table table-striped table-bordered text-center">
                <thead>

                <tr>
                    <th><h4>Room Types</h4></th>
                    <th><h4>PAX</h4></th>
                    <th><h4>Rate per room per night</h4></th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php

                    if(!empty($rooms)){
                        foreach($rooms as $rows){
                         if(!empty($currency)){
                            foreach($currency as $cur){ 
                            if($cur['currency_id']!="" && ($cur['currency_id'] == $rows['currency_id'])){
                                $code = $cur['code']; 
                            }
                            }
                          }
                          
                            if($rows['available_room']>0){
                ?>

                            <form method="post" action="">
                      <tr>

                    <td> <span class="title"><a class="roomdetail" href="#" data-toggle="modal" data-target="#myModal<?php echo $rows['hotelroom_id']; ?>">
                    <?php
                        echo $rows['name'];
                    ?>
                    </a></span>
                <?php
                $path  =  'uploads/room/';
                ?>
                        <span class="image"><a class="roomdetail" href="#" data-toggle="modal" data-target="#myModal<?php echo $rows['hotelroom_id']; ?>"><img src="<?php echo base_url().$path.$rows['room_image']; ?>"></a></span>
                        <span class="rinfo"><a href="#" data-toggle="modal" data-target="#myModal<?php echo $rows['hotelroom_id']; ?>">Room info</a></span><br>
                        <a href="javascript:void(0)" class="extra"><?php if($rows['extra_bed_price']){?> Do you need extra bed? <?php } else{ echo ""; } ?></a><br>
                        <span class="bed_price">
                            <input type="checkbox" name="extra_bed_price" value="<?php echo $rows['extra_bed_price'];?>"><?php echo $code; ?>&nbsp;<?php echo $rows['extra_bed_price'];?><span>

                        </td>
                    <td>

                        <span class="infoimg"><a href="#" class="roomdetail" data-toggle="modal" data-target="#myModal<?php echo $rows['hotelroom_id']; ?>"><img src="themes/images/icons/question-24.png"/></a></span>

                        <?php
                            $i=$rows['pax'];


                        ?>
                        <span class="pax"><?php for($j=0; $j<$i; $j++){ ?><a href="javascript:void(0)" class="masterTooltip" title="Max <?php echo $i; ?> Adult(s). Please check (?) for more information." ><img src="themes/images/icons/max.png"></a>
                        <?php
                        }
                        if((isset($rows['extra_bed_price'])) && ($rows['extra_bed_price'] !=""))
                        {
                        ?>

                        <sup class="masterTooltip" title="Max <?php echo $i; ?> Adult(s). Extra room or extra bed is required for additional pax."> + </sup><?php
                        } ?>
                        </span>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal<?php echo $rows['hotelroom_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       
                                        <h4 class="modal-title text-left" id="myModalLabel">
                                        <?php
                                            echo $rows['name'];
                                        ?></h4>
                                     
                                    </div>

                                    <div class="modal-body">
                                   <div class="col-md-4 ">
                                          <img src="<?php echo $path.$rows['room_image']; ?>">
                                          <span class: "title">Bed(s): </span><?php
                                             echo $rows['beds']; 
                                                ?><br>
                                            <span class: "title">Views: </span><?php
                                             echo $rows['views']; 
                                                ?>

                                      </div>
                                   

                                        <div class="col-md-8">
                                            <p>
                                            <h4>Description</h4>
                                            <?php
                                                echo $rows['description'];
                                            ?>
                                               

                                            </p>
                                          <p>
                                          <h4> Features </h4>

                                           <?php 
                                    $hotelroom_id = $rows['hotelroom_id'];
                                   ?>
                            <ul>

                                     <?php foreach ($features as $row) {                            
                                    $feature_name = $row['features_name'];
                                    $feature_id = $row['id'];
                                      
                                       $child_name = $this->hotel->get_child($feature_id);
                                    foreach ($child_name as $key) {  
                                        $child_id = $key['id'];
                                        
                                ?>
                                  <li>
                                    <?php
                                     $feature_id = $key['id'];
                                   $room_features = $this->hotel->get_room_feature($hotelroom_id, $child_id);
                                    if(isset($room_features) && (!empty($room_features))){
                                        echo $key['features_name'];
                                    }
                                          
                                    }           
                                    ?>
                                    </li>
                                    <?php
                                           }
                                         
                                           ?>       
                                      
                                    </ul>

                                        </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </td>
                    <td><span class="price"><?php echo $code; ?>&nbsp;<?php echo $rows['price']; ?></span>
                        <p class="hoteltax"><a class="fancybox" href="#inline1">Hotel Tax 24.3% included</a></p>
                        <div id="inline1" style="width:400px;display: none;">
                            <p>
                               On hotel bookings, all hotels in Nepal levy a service charge of 10% service charge and addintional 13% Government Tax; sum total of 24.3% which is added to all accomodation bills throughout Nepal.
                            </p>
                        </div>

                        <p class="roombookingcondition">
                    <span class=""><a href="javascript:void(0)" class="masterTooltip" title="<?php if($rows['bookingfront'] == 'Y'){ echo $rows['bookingdescription']; }?>">Booking Condition</a></span><br>

                            <span class=""><a href="javascript:void(0)" class="masterTooltip" title="<?php if($rows['freecancelfront'] == 'Y'){ echo $rows['freecancellation']; }?>">Free Cancellation</span>
                        </p></td>
                    <td>
                        <input type="hidden" name="hotel_id" value="<?php echo $detail['id'];?>">
                        <input type="hidden" name="hotel_room_id" value="<?php echo $rows['hotelroom_id'];?>">
                        <input type="hidden" name="currency_id" value="<?php echo $rows['currency_id'];?>">
                        <input type="hidden" name="max_pax" value="<?php echo $rows['pax'];?>">
                        <input type="hidden" name="room_price" value="<?php echo $rows['price'];?>">
                        <input type="hidden" name="discount_price" value="<?php if($rows['isdiscount'] == 'Y'){ echo $rows['dprice']; }?>">
                        <input type="hidden" name="available_room" value="<?php echo $rows['available_room'];?>">
                        <button type="submit" class="btn btn-primary btn-wid-100 search-now-banner">
                        Book Now</button></td>
                </tr>
                            </form>
                <?php
                }
                }
            }
                ?>
                
                </tbody>
            </table>


        </div>

    </section>


 <style>
     #myMap {
         height: 350px;
         width: 680px;
     }
 </style>
 
<!-- <script type="text/javascript">-->
<!--     var map;-->
<!--     var marker;-->
<!--     var myLatlng = new google.maps.LatLng(27.7201726,85.3212952);-->
<!--     var geocoder = new google.maps.Geocoder();-->
<!--     var infowindow = new google.maps.InfoWindow();-->
<!--     function initialize(){-->
<!--         var mapOptions = {-->
<!--             zoom: 18,-->
<!--             center: myLatlng,-->
<!--             mapTypeId: google.maps.MapTypeId.ROADMAP-->
<!--         };-->
<!---->
<!--         map = new google.maps.Map(document.getElementById("myMap"), mapOptions);-->
<!---->
<!--         marker = new google.maps.Marker({-->
<!--             map: map,-->
<!--             position: myLatlng,-->
<!--             draggable: true-->
<!--         });-->
<!---->
<!--         geocoder.geocode({'latLng': myLatlng }, function(results, status) {-->
<!--             if (status == google.maps.GeocoderStatus.OK) {-->
<!--                 if (results[0]) {-->
<!--                     $('#latitude,#longitude').show();-->
<!--                     $('#address').val(results[0].formatted_address);-->
<!--                     $('#latitude').val(marker.getPosition().lat());-->
<!--                     $('#longitude').val(marker.getPosition().lng());-->
<!--                     infowindow.setContent(results[0].formatted_address);-->
<!--                     infowindow.open(map, marker);-->
<!--                 }-->
<!--             }-->
<!--         });-->
<!---->
<!--         google.maps.event.addListener(marker, 'dragend', function() {-->
<!---->
<!--             geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {-->
<!--                 if (status == google.maps.GeocoderStatus.OK) {-->
<!--                     if (results[0]) {-->
<!--                         $('#address').val(results[0].formatted_address);-->
<!--                         $('#latitude').val(marker.getPosition().lat());-->
<!--                         $('#longitude').val(marker.getPosition().lng());-->
<!--                         infowindow.setContent(results[0].formatted_address);-->
<!--                         infowindow.open(map, marker);-->
<!--                     }-->
<!--                 }-->
<!--             });-->
<!--         });-->
<!---->
<!--     }-->
<!--     google.maps.event.addDomListener(window, 'load', initialize);-->
<!-- </script>-->


<script>
    $(document).ready(function(){
        $(".bed_price").hide();
        $(".extra").click(function(){

            $(".bed_price").toggle("slow");
        });
    });

</script>

 <script type="text/javascript">
        $(document).ready(function() {

            $('.fancybox').fancybox();

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons : {}
                },

                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });



        });
    </script>



