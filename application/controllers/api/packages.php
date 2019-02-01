<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/package_api_model', 'package');
        header('Content-type:application/json');

    }

    public function index()
    {
        $categories = $this->package->get_categories();

        if (!empty($categories)) {
            foreach ($categories as $key => $value) {
                $category[$key]['categoryName'] = $value['category_name'];
                $category[$key]['categoryImageUrl'] = base_url() . 'uploads/package_category/' . $value['featured_img'];
                $category[$key]['categoryDetailUrl'] = base_url() . 'index.php/api/packages/details/' . $value['category_url'];
            }

            $data = $category;

            $this->deliver_response(200, "Package Categories Found", $data);
        } else {
            $this->deliver_response(204, "Package Categories Not Found", NULL);
        }
    }

    public function details($slug)
    {


        $packages = $this->package->get_related_packages($slug);

        if (!empty($packages)) {
            foreach ($packages as $key => $value) {
                $package[$key]['packageName'] = $value['package_name'];
                $package[$key]['packageDuration'] = $value['package_duration'];
                $package[$key]['rating'] = $value['rating'];
                $package[$key]['price'] = $value['pprice'];
                $package[$key]['symbol'] = $value['symbol'];
                $package[$key]['code'] = $value['code'];
                $package[$key]['packageDetailURL'] = base_url() . 'index.php/api/packages/detail/' . $value['package_url'];
                $package[$key]['packageImageURL'] = base_url() . 'uploads/package/' . $value['package_id'] . '/' . $value['packageimg'];
            }

            $data = $package;

            $this->deliver_response(200, "Packages Found", $data);
        } else {
            $this->deliver_response(204, "Packages  Not Found", NULL);
        }
    }


    //function to get package detail

    public function detail($slug)
    {
        $detail = $this->package->get_package_detail($slug);
        

        if (!empty($detail)) {

            $accommodations = $this->package->get_accommodations($detail['package_id']);

            $currencies =  $this->crud_model->get_all('igc_currency_setting');

            foreach ($accommodations as $key => $value) {
                $accommodation[$key]['accommodationId'] = $value['accommodation_id'];
                $accommodation[$key]['name'] = $value['name'];
                $accommodation[$key]['currencyId'] = $value['currency_id'];
                $accommodation[$key]['code'] = $value['code'];
                $accommodation[$key]['price'] = $value['pprice'];

            }

            $accommodation_data = $accommodation;



            foreach ($currencies as $keys => $values) {
                $currency[$keys]['currencyID'] = $values['currency_id'];
                $currency[$keys]['code'] = $values['code'];


            }

            $currency_data = $currency;


            $package['package_id'] = $detail['package_id'];
            $package['name'] = $detail['package_name'];

            $package['tourcode'] = $detail['tourcode'];
            $package['duration'] = $detail['package_duration'];
            $package['rating'] = $detail['rating'];
            $package['description'] = $detail['description'];
            $package['short_description'] = $detail['summary'];


            $tab1['tabName']= $detail['tab1'];
            $tab1['tabDescription']= $detail['description1'];
            $tab2['tabName']= $detail['tab2'];
            $tab2['tabDescription']= $detail['description2'];
            $tab3['tabName']= $detail['tab3'];
            $tab3['tabDescription']= $detail['description3'];
            $tab4['tabName']= $detail['tab4'];
            $tab4['tabDescription']= $detail['description4'];
            $tab5['tabName']= $detail['tab5'];
            $tab5['tabDescription']= $detail['description5'];



            $attach['featuredImageURL']= base_url().'uploads/package/'.$detail['package_id'].'/'.$detail['featuredimg'];
            $attach['packageImageURL']= base_url().'uploads/package/'.$detail['package_id'].'/'.$detail['packageimg'];
            $attach['bookingURL'] = base_url() . 'index.php/api/packages/booking';

            $dyamictab1 =  array($tab1);
            $dyamictab2 = array($tab2);
            $dyamictab3 = array($tab3);
            $dyamictab4 = array($tab4);
            $dyamictab5 = array($tab5);

            $tab =  array_merge($dyamictab1, $dyamictab2, $dyamictab3, $dyamictab4, $dyamictab5);

           // $booking['bookingURL']= base_url() . 'index.php/api/packages/booking';

            $packages['overview'] = array($package);
            $packages['dynamicTab'] = $tab;
            $packages['attachments'] = array($attach);
            $packages['currency']= $currency_data;
            $packages['accommodation'] = $accommodation_data;



            $this->deliver_response(200, "Packages Detail Found", $packages);

        } else {
            $this->deliver_response(204, "Package Detail  Not Found", NULL);
        }

    }


    public function booking()
    {

        $appResponse = json_decode(file_get_contents('php://input'), TRUE);
        if($appResponse)
        {
            $packageDetails = $appResponse['package'];
           ///  $this->deliver_response(200, "Testing Success", "hotel", $packageDetails);
            if(!empty($packageDetails))
            {
             // Getting posted values.
                $insert['package_id'] = $packageDetails['id'];
                $insert['arrival_date'] = $packageDetails['arrival'];
                $insert['depart_date'] = $packageDetails['departure'];
                $insert['accommodation_id'] = $packageDetails['accomodationId'];
                $insert['currency_id']  = $packageDetails['currencyId'];
                $insert['amount'] = $packageDetails['price'];
                $insert['total_amount'] = $packageDetails['price'];
                $insert['no_of_person'] = $packageDetails['passenger']['total'];
                $insert['adult'] = $packageDetails['passenger']['adult'];
                $insert['child'] = $packageDetails['passenger']['child'];
                $insert['infant'] = $packageDetails['passenger']['infant'];
                $insert['trip_type'] = $packageDetails['tripType']['name'];
                $insert['booking_status'] = "accepted";
                $insert['created'] =  date('Y-m-d:H:i:s');
                $insert['delete_status'] = "0";
                $insert['reference_no'] =  rand();
                $insert['booking_code'] =  md5(rand());
                $insert['book_from'] =  "Mobile";
                $insert['departure_id'] =  "0";
                $insert['package_type'] =  "Normal";
                $insert['referedby'] = $packageDetails['referredBy']['name'];

                // Fetching contact information.
                $customer['customer_title'] = $packageDetails['customer_title'];
                $customer['first_name']  = $packageDetails['contactInfo']['firstName'];
                $customer['middle_name']  = $packageDetails['contactInfo']['middleName'];
                $customer['last_name']  = $packageDetails['contactInfo']['lastName'];
                $customer['contact_no']  = $packageDetails['contactInfo']['contactNumber'];
                $customer['email']  = $packageDetails['contactInfo']['email'];
                $customer['passport_no']  = $packageDetails['contactInfo']['passportNumber'];
                $customer['country']  = $packageDetails['contactInfo']['countryName'];
                $customer['customer_type'] = "guest";
                $customer['active_status'] = "N";

                $customer_insert  = $this->crud_model->insert_return_id($customer, 'igc_site_users');
                if($customer_insert)
                {
                    $insert['customer_id'] =  $customer_insert;
                    $result =  $this->crud_model->insert_return_id($insert, 'igc_package_booking');
                    if($result)
                    {

                        $booking_detail =  $this->package->get_booking_amount_currency($insert['booking_code']);

                        if($booking_detail['code'] == "USD")
                        {
                            $currency_code =  "840";
                        }
                        if ($booking_detail['code'] == "INR")
                        {
                            $currency_code =  "356";
                        }
                        $mail_status = $this->send_booked_mail($insert['booking_code']);
                       if($mail_status == TRUE)
                       {
                        $mail_result = " and email has been sent";
                       }
                        else{
                            $mail_result = " and unable to send email";
                        }


                        $atos_data =  $this->crud_model->get_atos_setting();
                        $result_data['bookingId'] =  $result;
                        $result_data['bookingCode'] =  $insert['booking_code'];
                        $result_data['pgRequestURL '] = $atos_data['request_url'];
                        $result_data['merchantID'] = $atos_data['merchant_id'];
                        $result_data['pgSecretKey'] = $atos_data['secret_key'];
                        $result_data['pgReturnURL'] =  base_url().'index.php/api/response/atos_response';
                        $result_data['pgKeyVersion'] = $atos_data['key_version'];
                        $result_data['currencyCode'] = $currency_code;
                        $result_data['customerLang'] = "en";
                        
                        $result_data['paypalReturnURL'] =  base_url().'index.php/api/packages/paypal_payment';
                        
                        $this->deliver_response("success", "Package Successfully Booked" .$mail_result, $result_data);

                    }
                    else{
                        $this->deliver_response(500, "Booking Unsuccessful", "Null");

                    }
                }
                else{
                    $this->deliver_response(500, "Booking Unsuccessful", "Null");

                }


               // $this->deliver_response("success", "Testing Success", $booking_detail);

            }
            else{
                $this->deliver_response(204, "Empty Booking Details", "Null");
            }

        }

        else
        {
            $this->deliver_response(400, "Bad Request", "Null");
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
                $booking_data =  $this->package->booking_package_detail($payment_data['booking_code']);
                $email_data['payment_amount']= $payment_data['payment_amount'] ;
                $email_data['package_name']=  $payment_data['item_name'] ;
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
                $result =  $this->crud_model->insert($payment_data,'igc_package_paypal_transaction');
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


    public function deliver_response($status, $status_message, $data)
    {
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['records'] = $data;

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


        $booked_data =  $this->package->booking_package_detail($booking_code);


        $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.incentiveholidays.com/photo-contest.html');
        

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Incentive Booking Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    <div style="margin:0 0 10px"> <img alt="Incentive Holidays" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p align="center">New booking has been placed by '.$booked_data['customer_title']."."." ".$booked_data['first_name'].'</p>
    <h3 align="center">Your Booking Details</h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tr>
            <td style="border-bottom:1px solid #eee">Reference Number</td>
            <td style="border-bottom:1px solid #eee"> '.$booked_data['reference_no'].'</td>
        </tr>
        <tbody>
        <tr>
            <th style="background:#eee" colspan="2">Pax Details</th>
        </tr>
        <tr>
            <td width="28%" style="border-bottom:1px solid #eee">Full Name</td>
            <td width="72%" style="border-bottom:1px solid #eee"> '.$booked_data['first_name']." ".$booked_data['middle_name'] ." ". $booked_data['last_name'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Email</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['email'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Phone No.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['contact_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Country.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['country'] .'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #eee">City.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['city'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Passport No.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['passport_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Trip Type.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['trip_type'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Additional Info.</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['additional_info'] .'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Package Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Package Name</td>
            <td style="border-bottom:1px solid #eee">'. $booked_data['package_name'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Package Type</td>
            <td style="border-bottom:1px solid #eee">'. $booked_data['package_type'] .'</td>
        </tr>
        
        <tr>
            <td style="border-bottom:1px solid #eee">Package Duration</td>
            <td style="border-bottom:1px solid #eee">'. $booked_data['package_duration'] .'</td>
        </tr>
       

        <tr>
            <td style="border-bottom:1px solid #eee">Accommodation</td>
            <td style="border-bottom:1px solid #eee">'. $booked_data['name'] .'</td>
        </tr>
     

        <tr>
            <td style="border-bottom:1px solid #eee">Arrival Date : </td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['arrival_date'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Departure Date : </td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['depart_date'].'</td>
        </tr>

            
        <tr>
            <td style="border-bottom:1px solid #eee">Total Pax</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['no_of_person'] .'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #eee">Adult</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['adult'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Children</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['child'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Infant</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['infant'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Extra Facility(that you request)</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['extra_facility'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Referred By</td>
            <td style="border-bottom:1px solid #eee">'.$booked_data['referedby'].'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Payment Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #eee">Package Amount</td>
            <td style="border-bottom:1px solid #eee"> '.$booked_data['total_amount']." ". $booked_data['code'].'</td>
        </tr>
        <tr>
            <th style="background:#eee" colspan="2">Note</th>
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

        $mail->Subject    = "Thank you for booking your package with ".$site_settings['site_name'];


        $mail->MsgHTML($body);


        $address = $booked_data['email'];

        $mail->AddAddress($address, $server['send_from_name']);

        foreach($admin_mails as $bcc)
        {
            $mail->AddBCC($bcc['email'], $bcc['full_name']);
        }

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
    <title>'.$site_settings['site_name'].' Package Payment</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
   
      <div style="margin:0 0 10px"> <img alt="Incentive Holidays" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$payment_data['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #eee">Package Name:</td>
            <td style="border-bottom:1px solid #eee"> '.$payment_data['package_name'].'</td>
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

        $mail->Subject    = $site_settings['site_name']."Package Payment";


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
