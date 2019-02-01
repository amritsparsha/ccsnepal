<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/package_api_model', 'package');
        $this->load->model('api/hotel_api_model', 'hotel');
        header('Content-type:application/json');

    }

    public function index()
    {
        $hotels =  $this->hotel->get_hotel_list();

        if (!empty($hotels)) {
            foreach ($hotels as $key => $value) {
                $hotel[$key]['id'] = $value['id'];
                $hotel[$key]['name'] = $value['name'];
                $hotel[$key]['slug'] = $value['slug'];
                $hotel[$key]['startingprice'] = $value['startingprice'];
                $hotel[$key]['created'] = $value['created'];
                $hotel[$key]['updated'] = $value['updated'];
                $hotel[$key]['rating'] = $value['rating'];
                $hotel[$key]['currencycode'] = $value['code'];
                $hotel[$key]['hotelDetailURL'] = base_url() . 'index.php/api/hotel/detail/'. $value['slug'];
                $hotel[$key]['hotelImageURL'] = base_url() . 'uploads/hotel/'. $value['hotelimg'];
            }

            $data = $hotel;

            $this->deliver_response("SUCCESS",200, "Hotels Found", "hotel", $data);
        } else {
            $this->deliver_response("SUCCESS", 204, "Hotels Records Not Found", "hotel",  NULL);
        }
    }



    //function to get hotel detail

    public function detail($slug)
    {
        $detail = $this->hotel->get_hotel_detail($slug);

        //print_r($detail);
       // exit();


        if (!empty($detail)) {

            $overview['id'] = $detail['id'];
            $overview['name'] = $detail['name'];
            $overview['startingprice'] = $detail['startingprice'];
            $overview['description'] = $detail['description'];
            $overview['rating'] = $detail['rating'];
            $overview['currencyCode'] = $detail['code'];
            $overview['currencySymbol'] = $detail['symbol'];
            $overview['country'] = $detail['country_name'];
            $overview['hotelImageURL'] = base_url() . 'uploads/hotel/'. $detail['hotelimg'];
                
            $tab1['tab']['tabName']= $detail['tab1'];
            $tab1['tab']['tabContent']= $detail['description1'];
            $tab2['tab']['tabName']= $detail['tab2'];
            $tab2['tab']['tabContent']= $detail['description2'];
            $tab3['tab']['tabName']= $detail['tab3'];
            $tab3['tab']['tabContent']= $detail['description3'];
            $tab4['tab']['tabName']= $detail['tab4'];
            $tab4['tab']['tabContent']= $detail['description4'];
            $tab5['tab']['tabName']= $detail['tab5'];
            $tab5['tab']['tabContent']= $detail['description5'];
            
            
            $dyamictab1 =  array($tab1);
            $dyamictab2 = array($tab2);
            $dyamictab3 = array($tab3);
            $dyamictab4 = array($tab4);
            $dyamictab5= array($tab5);

            $tab =  array_merge($dyamictab1, $dyamictab2, $dyamictab3, $dyamictab4, $dyamictab5);


            //code for hotel features

            $parent_features = $this->hotel->get_parent_features($detail['id']);

            //print_r($parent_features);exit();

           /// print_r($parent_features);
            //exit();

        //    $feature['']


            if(!empty($parent_features))
            {
                foreach ($parent_features as $keys => $rows)
                {

                    $parent[$keys]['feature']['name'] =  $rows['features_name'];
                    $childfeatures = $this->hotel->get_child_features($rows['id']);
                    foreach ($childfeatures as $key=> $value)
                    {
                        $child[$key]=  $value['features_name'];
                    }
                    $parent[$keys]['feature']['content']['item'] =  $child;


                }

            }
            else{

                $parent =  $parent_features;

            }




            //code to attpend latitude

            $location['longitude'] = $detail['longitude'];
            $location['latitude'] = $detail['latitude'];


            //rooms

            $rooms =  $this->hotel->hotel_rooms($detail['id']);

            if(!empty($rooms))
            {
              foreach ($rooms as $ke => $val)
                {
                    
                    $hotel_rooms[$ke]['room']['id'] =  $val['hotelroom_id'];
                    $hotel_rooms[$ke]['room']['name'] =  $val['name'];
                    $hotel_rooms[$ke]['room']['slug'] =  $val['slug'];
                    $hotel_rooms[$ke]['room']['available_room'] =  $val['available_room'];
                    $hotel_rooms[$ke]['room']['pax'] =  $val['pax'];
                    $hotel_rooms[$ke]['room']['discountedPrice'] =  $val['dprice'];
                    $hotel_rooms[$ke]['room']['currencyCode'] =  $val['code'];
                    $hotel_rooms[$ke]['room']['currencySymbol'] =  $val['symbol'];
                    $hotel_rooms[$ke]['room']['roomDetails'] =   base_url() . 'index.php/api/hotel/room/'. $detail['id'].'/'. $val['hotelroom_id'];
                    $hotel_rooms[$ke]['room']['imageURL'] = base_url() . 'uploads/room/'. $val['room_image'];

                }
            }
            else{

                $hotel_rooms =$rooms;

            }
            
            
            $galleries =  $this->hotel->get_hotel_albums_images($detail['id']);


            if(! empty($galleries))
            {
               foreach ($galleries as $key => $gal)
               {
                   $gallery[$key]['imageCaption'] =  $gal['caption'];
                   $gallery[$key]['imageURL'] = base_url() . 'uploads/album/'. $gal['path_id'].'/'.$gal['name'];
               }
              
            }
            else{
                $gallery =  $galleries;
            }


            $hotel['overview'] = array($overview);
            $hotel['tabs'] = $tab;
            $hotel['features'] =  $parent;
            $hotel['location'] =  $location;
            $hotel['rooms'] =  $hotel_rooms;
            $hotel['galleries'] =  $gallery;
//            $packages['attachments'] = array($attach);
//            $packages['currency']= $currency_data;
//            $packages['accommodation'] = $accommodation_data;



            $this->deliver_response("SUCCESS", 200,"Hotel Detail Found",  "hotel", $hotel);

        }
        else {
            $this->deliver_response("ERROR",204, "Hotel Detail  Not Found", "hotel", NULL);
        }

    }


    //function for room detail

    public function room($hotel_id, $hotel_room_id)
    {
        $detail = $this->hotel->get_room_detail($hotel_id, $hotel_room_id);
//
//        print_r($detail);
//        exit();


        if (!empty($detail)) {

            $overview['id'] = $detail['hotelroom_id'];
            $overview['name'] = $detail['name'];
            $overview['slug'] = $detail['name'];
            $overview['available_room'] = $detail['available_room'];
            $overview['price'] = $detail['price'];
            $overview['discountedPrice'] = $detail['dprice'];
            $overview['currencyId'] = $detail['currency_id'];
            $overview['currencyCode'] = $detail['code'];
            $overview['currencySymbol'] = $detail['symbol'];
            $overview['roomSize'] = $detail['roomsize'];
            $overview['bedDescription'] = $detail['beds'];
            $overview['pax'] = $detail['pax'];
            $overview['roomView'] = $detail['views'];
            $overview['extraBedPrice'] = $detail['extra_bed_price'];
            $overview['infant'] = $detail['infant'];
            $overview['infantDescription'] = $detail['infantdesc'];
            $overview['child'] = $detail['child'];
            $overview['childDescription'] = $detail['childdesc'];
            $overview['extraBedsDescription'] = $detail['extrabeds'];
            $overview['description'] = $detail['description'];
            $overview['imageURL'] =  base_url() . 'uploads/room/'.$detail['room_image'];
            $overview['bookingURL'] =   base_url() . 'index.php/api/hotel/booking';

            $room['overview'] = array($overview);

            $this->deliver_response("SUCCESS", 200,"Room Detail Found", "room", $room);

        }
        else{

            $this->deliver_response("ERROR",204, "Room Detail  Not Found", "room", NULL);
        }
    }

    public function booking()
    {

        $appResponse = json_decode(file_get_contents('php://input'), TRUE);
        if($appResponse)
        {
            $hotelDetails = $appResponse['hotel'];
            ///$this->deliver_response("success", 200, "Testing Success", "test", $hotelDetails);

            if(!empty($hotelDetails))
            {

                // Getting posted values.
                $insert['hotel_id'] = $hotelDetails['hotelId'];
                $insert['hotel_room_id'] = $hotelDetails['roomId'];
                $insert['check_in'] = $hotelDetails['checkIn'];
                $insert['check_out'] = $hotelDetails['checkOut'];
                $insert['currency_id']  = $hotelDetails['currencyId'];
                $insert['max_pax'] = $hotelDetails['max_pax'];
                $insert['total_amount'] = $hotelDetails['totalPrice'];
                $insert['room_price'] = $hotelDetails['roomPrice'];
                $insert['extra_bed_price'] = $hotelDetails['extraBedPrice'];
                $insert['no_of_room'] = $hotelDetails['noOfRooms'];
                $insert['pax_no'] = $hotelDetails['num_pax'];
                $insert['extra_bed_no'] = $hotelDetails['extraBed'];
                $insert['no_of_nights'] = $hotelDetails['nightNo'];
                $insert['booking_status'] = "accepted";
                $insert['created'] =  date('Y-m-d:H:i:s');
                $insert['delete_status'] = "0";
                $insert['reference_no'] =  rand();
                $insert['booking_code'] =  md5(rand());
                $insert['book_from'] =  "Mobile";


                // Fetching contact information.
                $customer['customer_title'] = $hotelDetails['contactInfo']['titleName'];
                $customer['first_name']  = $hotelDetails['contactInfo']['firstName'];
                $customer['middle_name']  = $hotelDetails['contactInfo']['middleName'];
                $customer['last_name']  = $hotelDetails['contactInfo']['lastName'];
                $customer['contact_no']  = $hotelDetails['contactInfo']['contactNumber'];
                $customer['email']  = $hotelDetails['contactInfo']['email'];
                $customer['passport_no']  = $hotelDetails['contactInfo']['passportNumber'];
                $customer['country']  = $hotelDetails['contactInfo']['countryName'];
                $customer['customer_type'] = "guest";
                $customer['active_status'] = "N";

                $customer_insert  = $this->crud_model->insert_return_id($customer, 'igc_site_users');
                if($customer_insert)
                {
                    $insert['customer_id'] =  $customer_insert;
                    $result =  $this->crud_model->insert_return_id($insert, 'igc_hotel_booking');
                    if($result)
                    {

                        $available_room =  $this->hotel->get_hotel_booked_data($insert['hotel_id'], $insert['hotel_room_id']);

                        $room_update['available_room'] =  $available_room['available_room'] - $insert['no_of_room'];

                        $this->hotel->update_hotel_room($insert['hotel_id'], $insert['hotel_room_id'] , $room_update);


                        $booking_detail =  $this->hotel->get_hotel_booked_detail($insert['booking_code']);

                        if($booking_detail['code'] == "USD")
                        {
                            $currency_code =  "840";
                        }
                        if ($booking_detail['code'] == "INR")
                        {
                            $currency_code =  "356";
                        }


                        if($this->send_booked_mail($insert['booking_code']) == TRUE)
                        {
                            $mail_result = " and email has been sent";
                        }
                        else{
                            $mail_result = " and unable to send email";
                        }


                      //  $mail_result = " and unable to send email";

                        $atos_data =  $this->crud_model->get_atos_setting();
                        $result_data['bookingId'] =  $result;
                        $result_data['bookingCode'] =  $insert['booking_code'];
                        $result_data['pgRequestURL '] = $atos_data['request_url'];
                        $result_data['merchantID'] = $atos_data['merchant_id'];
                        $result_data['pgSecretKey'] = $atos_data['secret_key'];
                        $result_data['pgReturnURL'] =  base_url().'index.php/api/response/hotel_atos_response';
                        $result_data['pgKeyVersion'] = $atos_data['key_version'];
                        $result_data['currencyCode'] = $currency_code;
                        $result_data['customerLang'] = "en";
                        $result_data['paypalReturnURL'] =  base_url().'index.php/api/hotel/paypal_payment';

                        $this->deliver_response("SUCCESS", 200, "Hotel Successfully Booked". $mail_result, "hotel", $result_data);

                    }
                    else{
                        $this->deliver_response("ERROR", 500,  "Booking Unsuccessful","hotel", "Null");

                    }
                }
                else{
                    $this->deliver_response("ERROR", 500,  "Booking Unsuccessful", "hotel", "Null");

                }


//                $this->deliver_response("success", 200, "Testing Success", "hotel", $insert);

            }
            else{
                $this->deliver_response("ERROR", 204, "Empty Booking Details", "hotel", "Null");
            }

        }

        else
        {
            $this->deliver_response("ERROR", 400, "Bad Request","hotel", "Null");
        }

    }


    public function paypal_payment()
    {
        $appResponse = json_decode(file_get_contents('php://input'), TRUE);
        if ($appResponse) {
            $paymentDetails = $appResponse['payment'];

            if (!empty($paymentDetails))
            {
                $payment_data['transaction_id']=  $paymentDetails['transactionId'];
                $payment_data['payment_status']=  $paymentDetails['status'];
                $payment_data['booking_code']=  $paymentDetails['booking_code'];
                $payment_data['currency_code']=  $paymentDetails['currency_code'];
                $payment_data['created']=  date('Y-m-d:H:i:s');
                $payment_data['payment_amount']=  $paymentDetails['price'];
                /// $payment_data['payer_email']=  $paymentDetails['payer_email'];
                $payment_data['item_name']=  $paymentDetails['name'];
                $payment_data['payment_through']=  $paymentDetails['payment_through'];
                $payment_data['payment_message']=  $paymentDetails['message'];
                $payment_data['delete_status'] = "0";

                //$this->deliver_response("test", "Test data", $payment_data);

                $booking_data =  $this->hotel->get_hotel_booked_detail($payment_data['booking_code']);
                $hotel_detail  = $this->hotel->get_hotel_booked_data($booking_data['hotel_id'], $booking_data['hotel_room_id']);


                $email_data['payment_amount']= $payment_data['payment_amount'] ;
                $email_data['hotel_name']=  $payment_data['item_name'] ;
                $email_data['room_name']=  $hotel_detail['room_name'] ;
                $email_data['first_name']= $booking_data['first_name'] ;
                $email_data['reference_no']= $booking_data['reference_no']  ;
                $email_data['payment_mean_type']=  "Paypal" ;
                $email_data['transaction_date_time']= $payment_data['created'] ;
                $email_data['payment_status']= $payment_data['payment_status'];
                $email_data['email'] =  $booking_data['email'];

                //code to send payment mail

                if($this->payment_success_email($email_data) == TRUE)
                {
                    $email_result =  " and email has been sent.";
                }
                else{
                    $email_result =  " and unable to send email.";
                }

               // $email_result =  " and unable to send email.";

                $result =  $this->crud_model->insert($payment_data,'igc_hotel_paypal_transaction');
                if($result)
                {


                    $this->deliver_payment_response("success", "Successfully kept the payment detail".$email_result);
                }
                else{
                    $this->deliver_payment_response(500, "Error ! Unable to kept the payment detail");
                }

            }
            else {
                $this->deliver_payment_response(204, "Empty Payments Details");
            }
        }
        else
        {
            $this->deliver_payment_response(400, "Bad Request");
        }
    }


    public function deliver_response($status, $status_code, $status_message, $array_name, $data)
    {
        $response['status'] = $status;
        $response['status_code'] = $status_code;
        $response['status_message'] = $status_message;
        $response[$array_name] = $data;

        $json_response = json_encode($response);
        echo $json_response;
    }

    public function deliver_payment_response($status, $status_message)
    {
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $json_response = json_encode($response);
        echo $json_response;
    }




    //function to send booking email

    public function send_booked_mail($booking_code)
    {
        $this->load->library('encrypt');

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->site_settings_model->get_mail_info();

        $password = $this->encrypt->decode($server['password']);



        $admin_mails = $this->site_settings_model->get_admin_mails('Booking');


        $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.incentiveholidays.com/photo-contest.html');

        $booking_data =  $this->hotel->get_hotel_booked_detail($booking_code);
        $hotel_detail  = $this->hotel->get_hotel_booked_data($booking_data['hotel_id'], $booking_data['hotel_room_id']);

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Incentive Holidays Hotel Booking Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
     <div style="margin:0 0 10px"> <img alt="Incentive Holidays" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p align="center">New booking has been placed by '.$booking_data['customer_title']."."." ".$booking_data['first_name'].'</p>
    <h3 align="center">Your Booking Details</h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tr>
            <td style="border-bottom:1px solid #eee">Reference Number</td>
            <td style="border-bottom:1px solid #eee"> '.$booking_data['reference_no'].'</td>
        </tr>
        <tbody>
        <tr>
            <th style="background:#eee" colspan="2">Pax Details</th>
        </tr>
        <tr>
            <td width="28%" style="border-bottom:1px solid #eee">Full Name</td>
            <td width="72%" style="border-bottom:1px solid #eee"> '.$booking_data['first_name']." ".$booking_data['middle_name'] ." ". $booking_data['last_name'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Email</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['email'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Phone No.</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['contact_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Country.</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['country'] .'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #eee">City.</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['city'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Passport No.</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['passport_no'].'</td>
        </tr>
       
        <tr>
            <td style="border-bottom:1px solid #eee">Additional Info.</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['additional_info'] .'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Hotel  Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Hotel Name</td>
            <td style="border-bottom:1px solid #eee">'. $hotel_detail['hotel_name'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Room</td>
            <td style="border-bottom:1px solid #eee">'. $hotel_detail['room_name'] .'</td>
        </tr>
        

        <tr>
            <td style="border-bottom:1px solid #eee">Check In Date : </td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['check_in'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Check Out Date : </td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['check_out'].'</td>
        </tr>

            
        <tr>
            <td style="border-bottom:1px solid #eee">No of Room</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['no_of_room'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">No of Extra Bed </td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['extra_bed_no'] .'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Pax No Per Room</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['pax_no'].'</td>
        </tr>
      
       
        <tr>
            <td style="border-bottom:1px solid #eee">Referred By</td>
            <td style="border-bottom:1px solid #eee">'.$booking_data['referedby'].'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Payment Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Total Amount</td>
            <td style="border-bottom:1px solid #eee"> '.$booking_data['total_amount']." ". $booking_data['currency_code'].'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Note</th>
        </tr>
         <tr>
            <td colspan = "4" style="border-bottom:1px solid #eee">(If you are the registered customer you can login and can view your booking status. )</td>
        </tr>

        <tr>
            <td colspan="2" style="background:#EEE; text-align:left;">Thanks and Regards,<br />
                Incentive Holidays<br />
                Tel:<strong>+977-1-4414739 / 4005043</strong><br />
                <a href="www.incentiveholidays.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.incentiveholidays.com</a></td>
        </tr>
       
        </tbody>
    </table>
</div>
</body>
</html>' ;



        // echo $body;
        // exit();


        if($server['smtp_connect'] == "true")
        {
            $mail->IsSMTP(); // telling the class to use SMTP
        }
        // $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier

        $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server

        $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server

        $mail->Username   = $server['username'];  // GMAIL username

        $mail->Password   = $password;          // GMAIL password

        $mail->SetFrom($server['send_from_email'], $server['send_from_name']);

        $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);

        $mail->Subject    = "Thank you for booking your Hotel with ".$site_settings['site_name'];


        $mail->MsgHTML($body);


        $address = $booking_data['email'];

        $mail->AddAddress($address, $server['send_from_name']);

        foreach($admin_mails as $bcc)
        {
            $mail->AddBCC($bcc['email'], $bcc['full_name']);
        }

        $mail->send();




     if($mail->Send())
     {
         return TRUE;
     }
        else{
            return FALSE;
        }


    }



    //function to send payment success email

    public function payment_success_email($payment_data)
    {

        $this->load->library('encrypt');

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->site_settings_model->get_mail_info();

        $password = $this->encrypt->decode($server['password']);

        $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.incentiveholidays.com/photo-contest.html');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Hotel Payment</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
   
     <div style="margin:0 0 10px"> <img alt="Incentive Holidays" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$payment_data['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #eee">Hotel Name:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['hotel_name'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Room Name:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['room_name'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Reference Number:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['reference_no'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Payment Mean Type:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['payment_mean_type'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Payment Amount:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['payment_amount'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Transaction Date Time:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['transaction_date_time'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Payment Status:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['payment_status'].'</td>
        </tr>
         
        <tr>
            <td colspan="2" style="background:#EEE; text-align:left;">Thanks and Regards,<br />
                Incentive Holidays<br />
                Tel:<strong>+977-1-4414739 / 4005043</strong><br />
                <a href="www.incentiveholidays.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.incentiveholidays.com</a></td>
        </tr>
        
        </tbody>
    </table>
</div>
</body>
</html>' ;

        if($server['smtp_connect'] == "true")
        {
            $mail->IsSMTP(); // telling the class to use SMTP
        }

        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier

        $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server

        $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server

        $mail->Username   = $server['username'];  // GMAIL username

        $mail->Password   = $password;          // GMAIL password

        $mail->SetFrom($server['send_from_email'], $server['send_from_name']);

        $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);

        $mail->Subject    = $site_settings['site_name']."Hotel Payment";


        $mail->MsgHTML($body);

        $address = $payment_data['email'];

        $mail->AddAddress($address, $site_settings['site_name']);

        if(!$mail->Send())
        {
            return TRUE;

        }

        else{

            return FALSE;
        }


    }


}
