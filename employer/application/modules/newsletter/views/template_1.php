<!DOCTYPE HTML>
<html>
<head>
    <title>Newsletter From <?php echo $setting['site_name']; ?></title>
<style type="text/css">
    *{
        #margin: 0;
        #padding: 0;
    }
    body{
        font-family: sans-serif;
        font-size: 14px;
        line-height: 21px;
    }
    a{
        text-decoration: none;
        color: inherit;
    }
    ul li{
        list-style: none;
    }
    img, iframe, table{
        max-width: 100%;
    }
    .container{
        width: 52%;
        margin: 0 auto;
        background: #f9f9f9;
        padding: 10px;
        border: 1px #d4d4d4 solid;
    }
    .header_area{
        
    }
    .header_area image{
        
    }
    .body_area{
        text-align: justify;
    }
    .body_area h1{
        font-size: 21px;
        color: #0083d2;
        text-align: center;
        border-bottom: 1px #dadbdc solid;
        margin: 0;
        padding-bottom: 10px;
    }
    .body_area p{
        
    }
    .footer_area{
        text-align: center;
        background: #d8d8d8;
        padding: 20px;
        font-size: 13px;
        line-height: 20px;
        color: #1a3b5f;
    }
    .footer_area h2{
        font-size: 15px;
        color: #0083d1;
        text-transform: uppercase;
        font-weight: bold;
    }
    .footer_area p{
        font-size: 13px;
        line-height: 20px;
        color: #1a3b5f;
    }
</style>
</head>
<body>

<div class="container" style="width: 45%; margin: 0 auto; background: #f9f9f9; padding: 10px; border: 1px #d4d4d4 solid;">
    <div class="header_area">
            <img src="<?php echo $logo_src; ?>" class="user-image img-responsive" width="250" alt="Image"/>
    </div>
    <div class="body_area" style="text-align: justify;">
        <h1 style="font-size: 21px; color: #0083d2; text-align: center; border-bottom: 1px #dadbdc solid; margin: 0; padding-bottom: 10px;"><?php echo ucfirst($title); ?></h1>
        <?php echo $description; ?>
    </div>
    <div class="footer_area" style="text-align: center; background: #d8d8d8; padding: 20px; font-size: 13px; line-height: 20px; color: #1a3b5f;">
        <h2 style="font-size: 15px; color: #0083d1; text-transform: uppercase; font-weight: bold;"><?php echo $setting['site_name']; ?></h2>
        <p>
        <?php echo $setting['contact_details']; ?>
        </p>
    </div>
</div>

</body>
</html>