
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo (isset($title) && $title !="") ? $title:""; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>tasks" >Deals</a> </li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                if ($this->session->flashdata('success') != "") {
                    ?>
                    <div class="alert alert-success alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>.
                    </div>
                    <?php
                }
                ?>
                <?php if ($this->session->flashdata('error') != "") {

                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" name="title" placeholder="Title"   data-validation="required" value="<?php echo (isset($tasks['title']) && $tasks['title'] !="") ? $tasks['title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>

                                            <div class="col-sm-6">
                                                <select name="contact_id" class="form-control">
                                                    <option>Choose Contact</option>
                                                    <option value="001">Non-Contact</option>
                                                    <?php

                                                    $cnts   = "SELECT * FROM igc_contact WHERE  delete_status='0'";

                                                    $stnt = $this->db->query($cnts);
                                                    $ascont= $stnt->result_array();



                                                    foreach ( $ascont as $cont){

                                                        ?>
                                                        <option value="<?php echo  $cont['contact_id'] ?>" <?php echo (isset($tasks['contact_id']) && $tasks['contact_id'] ==$cont['contact_id'])?"selected":"";?>><?php echo $cont['company_name']; ?> (<?php echo $cont['full_name']; ?>)  </option>
                                                    <?php } ?>


                                                </select>






                                            </div>

                                    </div>
                                    <!--/span-->

                                    </div>
                                </div>

              

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                        

                                            <div class="col-sm-6">
                                                <input type="date" name="assign_date" placeholder="Assign Date"   data-validation="required" value="<?php echo (isset($tasks['assign_date']) && $tasks['assign_date'] !="") ? $tasks['assign_date']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>



                                             <div class="col-sm-6">
                                                <input type="date" name="end_date" placeholder="End Date"   data-validation="required" value="<?php echo (isset($tasks['end_date']) && $tasks['end_date'] !="") ? $tasks['end_date']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>



                                        </div>
                                        

                                    </div>
                                </div>



                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                        

                                            <div class="col-sm-6">
                                                <select name="task_type" class="form-control">
                                                    <option>Priority</option>
                                                    <option value="0" <?php echo (isset($tasks['task_type']) && $tasks['task_type'] =="0")?"selected":"";?>>Urgent</option>
                                                    <option value="1" <?php echo (isset($tasks['task_type']) && $tasks['task_type'] =="1")?"selected":"";?>>Medium</option>
                                                    <option value="2"  <?php echo (isset($tasks['task_type']) && $tasks['task_type'] =="2")?"selected":"";?>>Normal</option>

                                                </select>

                                            </div>



                                             <div class="col-sm-6">
                                                 <div class="multiselect">
                                                     <div class="selectBox" onclick="showCheckboxes()">
                                                         <select class="form-control" >
                                                             <option>Assign To</option>
                                                         </select>
                                                         <div class="overSelect"></div>
                                                     </div>
                                                     <div id="checkboxes" name="assign_to[]">
                                                         <?php

                                                         $cuser   = "SELECT * FROM igc_users WHERE  delete_status='0'";

                                                         $stu = $this->db->query($cuser);
                                                         $amus= $stu->result_array();



                                                         foreach ( $amus as $cuse){

                                                             ?>
                                                             <label for="one">
                                                                 <input type="checkbox" name="assign_to[]"   value="<?php echo  $cuse['user_id'] ?>" <?php echo (isset($tasks['assign_to']) && $tasks['assign_to'] ==$cuse['assign_to'])?"checked":"";?> id="one<?php echo  $cuse['user_id'] ?>" /><?php echo  $cuse['username'] ?> (<?php echo  $cuse['email'] ?>)</label>



                                                         <?php } ?>




                                                     </div>
                                                 </div>

<script type="text/javascript">
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
                                                 <style>


                                                     .selectBox {
                                                         position: relative;
                                                     }



                                                     .overSelect {
                                                         position: absolute;
                                                         left: 0;
                                                         right: 0;
                                                         top: 0;
                                                         bottom: 0;
                                                     }

                                                     #checkboxes {
                                                         display: none;
                                                         border: 1px #dadada solid;
                                                     }

                                                     #checkboxes label {
                                                         display: block;
                                                     }

                                                     #checkboxes label:hover {
                                                         background-color: #1e90ff;
                                                     }
                                                 </style>






                                               <!--  <input type="text" name="assign_to[]" placeholder="Assign To"   data-validation="required" value="<?php echo (isset($tasks['assign_to']) && $tasks['assign_to'] !="") ? $tasks['assign_to']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on"> -->
                                            </div>



<script src="templates/assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="templates/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="templates/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="templates/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="templates/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="templates/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>



<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>




                                        </div>
                                        

                                    </div>
                                </div>



 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                        




                                             <div class="col-sm-6">



                                                 <select name="tasks_status" class="form-control">
                                                     <option>Task Status</option>
                                                     <option value="0" <?php echo (isset($tasks['todo_status']) && $tasks['todo_status'] =="0")?"selected":"";?>>Not Started On</option>
                                                     <option value="1"  <?php echo (isset($tasks['todo_status']) && $tasks['todo_status'] =="1")?"selected":"";?>>Working On</option>
                                                     <option value="2"  <?php echo (isset($tasks['todo_status']) && $tasks['todo_status'] =="2")?"selected":"";?>>Completed On</option>

                                                 </select>

                                             </div>



                                        </div>
                                        

                                    </div>
                                </div>








                <!--                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-danger row">

                                            <div class="col-md-12">
                                                <?php
                                                if(isset($tasks['featured_img']))
                                                {

                                                    ?>
                                                    <div class="remove_option">

                                                        <?php
                                                        $path  =  '../uploads/taskss/';
                                                        ?>
                                                        <img src="<?php echo $path. $tasks['featured_img'];?>" alt="featured_image" style="width: 10%;">

                                                        <span class="btn btn-info remove_btn" id="btn_remove">Remove</span>
                                                    </div>
                                                    <input type="hidden" name="pre_featuredimg" value="<?php echo $tasks['featured_img']; ?>">
                                                    <div id="image_input">

                                                        <span>(Company logo or profile picture)</span>
                                                        <input type="file" name="featured_img" class="form-control" id="featuredimg">
                                                        <span id="type_error"></span>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>

                                                    <span>(Company logo or profile picture)</span>
                                                    <input type="file" name="featured_img" class="form-control"  id="featuredimg">
                                                    <span id="type_error"></span>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                    </div>
                               </div>

                            </div> -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label class="control-label">Details</label>
                                                <textarea rows="5" cols="10" name="tasks_detail" id="tasks_detail"><?php echo (isset($tasks['tasks_detail']) && $tasks['tasks_detail'] !="") ? $tasks['tasks_detail']:""; ?></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>
                                </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" name="tasks_id" value="<?php echo (isset($tasks['tasks_id']) && $tasks['tasks_id'] !="") ? $tasks['tasks_id']:""; ?>">
                                                <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $.validate();
</script>
<script>
    CKEDITOR.replace( 'tasks_detail',{
    filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",
    filebrowserWindowWidth  : 800,
    filebrowserWindowHeight : 500
});

</script>
<script>
    $('.add-tag').click(function(){
        var value = $(this).attr("id");
        $('#new_tags').val($('#new_tags').val() + value);
    });
</script>
<!-- script to remove tags-->
<script>
    $('.remtag').click(function(){

        var term = $(this).attr("id");
        var content = $('#content_id').val();

        var postData = {
            'term_id' : term,
            'content_id' : content
        };


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/rmv_content_tag',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>
<script>
    $(document).ready(function(e){

        var  value = $('.page_type').val();

        if(value == "Page")
        {

            $('#multi_tab').show();

        }

        else
        {

            $('#multi_tab').hide();


        }

        $('.page_type').change(function(){
            var  value = $('.page_type').val();
            if(value == "Page")
            {

                $('#multi_tab').show();

            }
            else
            {

                $('#multi_tab').hide();


            }
        })
    })
</script>

<script>

    $('#save_content').click(function(e)
    {

        $("#type_error").text("");
        var a=0;

        var ext1 =  $('#featuredimg').val().split('.').pop().toLowerCase();


        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
            {
                a = 0
            }
            else
            {

                a = 1;
            }
        }

        if(a != "1")
        {
            $("#type_error").text("Invalid Featured Image");
            $("#type_error").css("color", "red");

            e.preventDefault();
        }

        else{

            e.submit;

        }



    });
</script>


