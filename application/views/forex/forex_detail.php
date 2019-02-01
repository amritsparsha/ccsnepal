<section class="search-pg">
    <div class="hero-container bg-black">
        <div class="container">
            <div class="col-md-12 hero-header"> <h1 class="stronger">Forex Exchange</h1>
               </div>

        </div>
    </div>

</section>

<section class="inner-details">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="TitreProduit">

                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i>
                            </a></li>

                        <li class="active">Forex </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <form method="post" action="">
                <label>
                    Forex Date
                </label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           value="" class="" id="datepicker_arrival"
                           name="date" data-validation="date" data-validation-format="mm/dd/yyyy">
                    </div>


      <span class="input-group-btn">
<button type="submit" class="btn btn-app-download btn-primary" >Search</button>

    SEARCH
      </span>
                </form>
                </div><!-- /input-group -->



        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>
                    Forex rates as on <?php echo date_convert(date($forex_date)) ;?></h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Currency Code</th>
                            <th>Unit</th>
                            <th>Buying Rate</th>
                            <th>Selling Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($records)) {
                            foreach ($records as $row) {
                                ?>
                                <tr>
                                <th scope="row"><?php echo $row['currency'];?> </th >
                                <td> <?php echo $row['currency_code'];?></td >
                                <td> <?php echo $row['unit'];?></td >
                                <td> <?php echo $row['buying_rate'];?></td >
                                <td> <?php echo $row['selling_rate'];?></td >
                            </tr >
                            <?php
                                    }
                        }
                        else
                        {
                            ?>
                            <tr>

                                <td colspan="5">No Records</td>
                            </tr>

                       <?php
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

    <script>
    $(function() {
       
        $( "#datepicker_arrival" ).datepicker();
    });

</script>

<script>
    $.validate();
</script>