<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>invoice" >invoice</a> </li>
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
                        <div class="container">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> # </th>
                                                <th class="text-center"> Description </th>
                                                <th class="text-center"> Qty </th>
                                                <th class="text-center"> Unit Price </th>
                                                
                                                <th class="text-center"> Amount </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id='addr0'>
                                                <td value="1" name="addr">1</td>
                                                <td><input type="text" name="desc" placeholder='Description' class="form-control dscription" /></td>
                                                <td><input type="number" name="qty[]" placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                                                <td><input type="number" name="price[]" placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                                
                                                <td><input type="number" name="total[]" placeholder='0.00' class="form-control total" readonly/></td>
                                            </tr>

                                            <tr id='addr0'>
                                                 <td value="2" name="addr">2</td>
                                                <td><input type="text" name="desc" placeholder='Description' class="form-control dscription" /></td>
                                                <td><input type="number" name="qty[]" placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                                                <td><input type="number" name="price[]" placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                                
                                                <td><input type="number" name="total[]" placeholder='0.00' class="form-control total" readonly/></td>
                                            </tr>


                                        <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="offset-md-8 col-md-4">
                                <table class="table table-bordered table-hover" id="tab_logic_total">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">Sub Total</th>
                                            <td class="text-center"><input type="number" name="sub_total" placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Discount </th>
                                            <td class="text-center">
                                                <input type="number" name="discount" id="discount" placeholder='0.00' class="form-control"  />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Amount After Discount</th>
                                            <td class="text-center"><input type="number" name="a_discount" id="a_discount" placeholder='0.00' class="form-control"  readonly/></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Tax</th>
                                            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                                <input type="number" name="tax" class="form-control" name="tax" id="tax" placeholder="0">
                                                <div class="input-group-addon">%</div>
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Tax Amount</th>
                                            <td class="text-center"><input type="number" name="tax_amount" id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Grand Total</th>
                                            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <style>
                    #tab_logic .form-control[readonly],#tab_logic_total .form-control[readonly] {
                    border: 0;
                    background: transparent;
                    box-shadow: none;
                    padding: 0 10px;
                    font-size: 15px;
                    }
                    </style>


<script type="text/javascript">
    $(document).ready(function(){

        option_list('addr0');

        var i=1;
        $("#add_row").click(function(){b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            option_list('addr'+i);
            i++;
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
            calc();
        });

        $(".product").on('change',function(){
            option_checker(this)
        });


        $('#tab_logic tbody').on('keyup change',function(){
            calc();
        });
        $('#tax').on('keyup change',function(){
            calc_total();
        });

    });

    function option_checker(id)
    {
        var myOption=$(id).val();
        var s =0;
        $('#tab_logic tbody tr select').each(function(index, element){
            var myselect = $(this).val();
            if(myselect==myOption){
                s += 1;
            }
        });
        if(s>1){
            alert(myOption+' as been added already try new..')
        }
    }

    function option_list(id)
    {
        el='#'+id;
        var myArray = ["Product 1", "Product 2", "Product 3", "Product 4"];
        var collect = '<option value="">Select</option>';
        for(var i = 0; i<myArray.length;i++){
            collect += '<option value="'+myArray[i]+'">'+myArray[i]+'</option>';
        }
        $(el+" select").html(collect);
    }

    function calc()
    {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();

            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            $(this).find('.total').val(qty*price);

            calc_total();
        });
    }

    function calc_total()
    {
        total=0;
        $('.total').each(function() {
            total += parseInt($(this).val());
        });
        $('#sub_total').val(total.toFixed(2));

       
       dp=total-$('#discount').val();

       $('#a_discount').val(dp.toFixed(2));

       
        tax_sum=dp/100*$('#tax').val();

        $('#tax_amount').val(tax_sum.toFixed(2));
        $('#total_amount').val((tax_sum+dp).toFixed(2));
    }
</script>




                </div>
            </div>
        



<div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" name="invoices_id" value="<?php echo (isset($tasks['invoices_id']) && $tasks['invoices_id'] !="") ? $tasks['invoices_id']:""; ?>">
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




<script>
    $.validate();
</script>
<script>
    CKEDITOR.replace( 'invoice_detail',{
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


