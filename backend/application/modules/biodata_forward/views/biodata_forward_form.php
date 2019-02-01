
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
                                            <div class="col-md-12">
                                                <label for="joblevel">Employer</label>
                                                <select name="bf_employer" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                                    <option value="">----employer----</option>
                                                    <?php foreach ($employers as $key => $emps): ?>
                                                        <option value="<?php echo $emps['come_id']; ?>" <?php echo(isset($bd_forward['bf_employer']) && $bd_forward['bf_employer']==$emps['come_id'])?"selected":""; ?>>
                                                            <?php echo $emps['company_employers']; ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="joblevel">Biodata:</label>
                                                <select name="bf_biodata[]" multiple id="public-methods" data-validation="required" autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on" width="500px;">
                                                    <?php
                                                        foreach ($biodatas as $key => $biodata): ?>
                                                        <option value="<?php echo $biodata['biodata_id']; ?>" <?php echo(isset($bd_forward['bf_biodata']) && strpos($bd_forward['bf_biodata'],$biodata['biodata_id'])!==false)?"selected":""; ?>>
                                                            <?php echo $biodata['name']; ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="category_details">Details</label>
                                                <textarea rows="5" cols="10" name="bf_detail" id="bf_detail">
                                                    <?php echo (isset($bd_forward['bf_detail']) && $bd_forward['bf_detail'] !="") ? $bd_forward['bf_detail']:""; ?>
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="PageType">Send Status<span class="asterisk">*</span></label>
                                            <select name="publish_status" class="publish_status form-control">
                                                <option value="1"  <?php echo (isset($bd_forward['publish_status']) && $bd_forward['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                                <option value="0"  <?php echo (isset($bd_forward['publish_status']) && $bd_forward['publish_status'] =="0")?"selected":"";?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" name="biodata_forward_id" value="<?php echo (isset($bd_forward['biodata_forward_id']) && $bd_forward['biodata_forward_id'] !="") ? $bd_forward['biodata_forward_id']:""; ?>">
                                                <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                    </div>
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
    CKEDITOR.replace( 'bf_detail',{
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

