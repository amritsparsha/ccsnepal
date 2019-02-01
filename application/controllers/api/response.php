<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Response extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/package_api_model', 'package');
        $this->load->model('api/hotel_api_model', 'hotel');


    }

    //function to atos response

    public function atos_response()
    {
        if ($this->input->post()) {

            $result = explode("|", $this->input->post('Data'));

            for ($i = 0; $i <= sizeof($result) - 1; $i++) {

                $a = $result[$i];
                $temp = explode("=", $a);

                $key = $temp[0];
                $val = $temp[1];
                if ($key === "amount") {

                    $amount = $val;

                }
                if ($key === "captureMode") {

                    $captureMode = $val;


                }
                if ($key === "currencyCode") {

                    $CurrencyCode = $val;

                }
                if ($key === "merchantId") {

                    $merchantId = $val;

                }
                if ($key === "orderId") {

                    $orderId = $val;
                }
                if ($key === "transactionDateTime") {

                    $transactionDateTime = $val;

                }
                if ($key === "transactionReference") {

                    $transactionReference = $val;

                } elseif ($key === "keyVersion") {

                    $KeyVersion = $val;

                }
                if ($key === "authorisationId") {

                    $AuthorisationId = $val;


                }
                if ($key === "maskedPan") {

                    $MaskedPan = $val;

                }
                if ($key === "paymentMeanBrand") {

                    $PaymentMeanBrand = $val;

                }
                if ($key === "paymentMeanType") {

                    $PaymentMeanType = $val;

                }
                if ($key === "responseCode") {

                    $ResponseCode = $val;

                }
            }


            $booking_detail = $this->crud_model->get_detail($orderId, 'booking_code', 'igc_package_booking');


            $insert['amount'] =  (isset($amount))? $amount/100:"";
            $insert['captureMode'] = (isset($captureMode)) ? $captureMode : "";
            $insert['currencyCode'] = (isset($CurrencyCode)) ? $CurrencyCode : "";
            $insert['merchantId'] = (isset($merchantId)) ? $merchantId : "";
            $insert['orderId'] = (isset($orderId)) ? $orderId : "";
            $insert['transactionDateTime'] = (isset($transactionDateTime)) ? date("Y-m-d:H:i:s", strtotime($transactionDateTime)) : "";
            $insert['transactionReference'] = (isset($transactionReference)) ? $transactionReference : "";
            $insert['keyVersion'] = (isset($KeyVersion)) ? $KeyVersion : "";
            $insert['authorisationId'] = (isset($AuthorisationId)) ? $AuthorisationId : "";
            $insert['maskedPan'] = (isset($MaskedPan)) ? $MaskedPan : "";
            $insert['paymentMeanBrand'] = (isset($PaymentMeanBrand)) ? $PaymentMeanBrand : "";
            $insert['paymentMeanType'] = (isset($PaymentMeanType)) ? $PaymentMeanType : "";
            $insert['responseCode'] = (isset($ResponseCode)) ? $ResponseCode : "";
            $insert['booking_code'] = (isset($orderId)) ? $orderId : "0000";
            $insert['created'] = date('Y-m-d:H:i:s');
            $insert['delete_status'] = "0";
            
            $result = $this->crud_model->insert($insert, 'igc_package_atos_transaction');

            //get booking data

            $booking_data =  $this->package->booking_package_detail($orderId);
            $response_data =  $this->crud_model->get_detail($insert['responseCode'], 'response_id','igc_transaction_response_code');


            $payment_data['payment_amount']= $insert['amount'] ;
            $payment_data['package_name']= $booking_data['package_name'] ;
            $payment_data['first_name']= $booking_data['first_name'] ;
            $payment_data['reference_no']= $booking_data['reference_no']  ;
            $payment_data['payment_mean_type']=  $insert['paymentMeanType'] ;
            $payment_data['transaction_date_time']=  $insert['transactionDateTime'] ;
            $payment_data['payment_status']= $response_data['response_msg'];
            $payment_data['email'] =  $booking_data['email'];


            //code to send payment email

            $this->payment_success_email($payment_data);


            if($insert['responseCode'] == "0")
            {
                $updates['payment_status'] = "completed";
                $this->crud_model->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
            }
            else{
                $updates['payment_status'] = $response_data['response_msg'];
                $this->crud_model->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
            }

            $data['transaction_msg'] = $response_data['response_msg'];

            $data['response_code'] = $insert['responseCode'];


        }


        $data['title'] = "Transaction Result";
        $this->load->view('api/atos_result', $data);


    }


    //function to send payment success email

    public function payment_success_email($payment_data)
    {

        $this->load->library('encrypt');

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->site_settings_model->get_mail_info();

        $password = $this->encrypt->decode($server['password']);

        $email = $payment_data['email'];

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
        <tr>
            <td colspan="2" style="background:#EEE; text-align:left;"><br />
                IGC Technology<br />
                Tel:<strong>+977-01-4005043/4005044</strong><br />
                <a href="http://igctech.com.np/" target="_blank" style="color:#46216F; text-decoration:underline;">www.igctech.com.np</a></td>
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

        $mail->Subject    = $site_settings['site_name']." Booking Payment";


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



    //function to hotel atos response

    public function hotel_atos_response()
    {
        if ($this->input->post()) {

            $result = explode("|", $this->input->post('Data'));

            for ($i = 0; $i <= sizeof($result) - 1; $i++) {

                $a = $result[$i];
                $temp = explode("=", $a);

                $key = $temp[0];
                $val = $temp[1];
                if ($key === "amount") {

                    $amount = $val;

                }
                if ($key === "captureMode") {

                    $captureMode = $val;


                }
                if ($key === "currencyCode") {

                    $CurrencyCode = $val;

                }
                if ($key === "merchantId") {

                    $merchantId = $val;

                }
                if ($key === "orderId") {

                    $orderId = $val;
                }
                if ($key === "transactionDateTime") {

                    $transactionDateTime = $val;

                }
                if ($key === "transactionReference") {

                    $transactionReference = $val;

                } elseif ($key === "keyVersion") {

                    $KeyVersion = $val;

                }
                if ($key === "authorisationId") {

                    $AuthorisationId = $val;


                }
                if ($key === "maskedPan") {

                    $MaskedPan = $val;

                }
                if ($key === "paymentMeanBrand") {

                    $PaymentMeanBrand = $val;

                }
                if ($key === "paymentMeanType") {

                    $PaymentMeanType = $val;

                }
                if ($key === "responseCode") {

                    $ResponseCode = $val;

                }
            }


           // $booking_detail = $this->crud_model->get_detail($orderId, 'booking_code', 'igc_package_booking');


            $insert['amount'] =  (isset($amount))? $amount/100:"";
            $insert['captureMode'] = (isset($captureMode)) ? $captureMode : "";
            $insert['currencyCode'] = (isset($CurrencyCode)) ? $CurrencyCode : "";
            $insert['merchantId'] = (isset($merchantId)) ? $merchantId : "";
            $insert['orderId'] = (isset($orderId)) ? $orderId : "";
            $insert['transactionDateTime'] = (isset($transactionDateTime)) ? date("Y-m-d:H:i:s", strtotime($transactionDateTime)) : "";
            $insert['transactionReference'] = (isset($transactionReference)) ? $transactionReference : "";
            $insert['keyVersion'] = (isset($KeyVersion)) ? $KeyVersion : "";
            $insert['authorisationId'] = (isset($AuthorisationId)) ? $AuthorisationId : "";
            $insert['maskedPan'] = (isset($MaskedPan)) ? $MaskedPan : "";
            $insert['paymentMeanBrand'] = (isset($PaymentMeanBrand)) ? $PaymentMeanBrand : "";
            $insert['paymentMeanType'] = (isset($PaymentMeanType)) ? $PaymentMeanType : "";
            $insert['responseCode'] = (isset($ResponseCode)) ? $ResponseCode : "";
            $insert['booking_code'] = (isset($orderId)) ? $orderId : "0000";
            $insert['created'] = date('Y-m-d:H:i:s');
            $insert['delete_status'] = "0";


            //get booking data


            $booking_data =  $this->hotel->get_hotel_booked_detail($orderId);
            $hotel_detail  = $this->hotel->get_hotel_booked_data($booking_data['hotel_id'], $booking_data['hotel_room_id']);

            $response_data =  $this->crud_model->get_detail($insert['responseCode'], 'response_id','igc_transaction_response_code');


            $payment_data['payment_amount']= $insert['amount'] ;
            $payment_data['hotel_name']= $hotel_detail['hotel_name'] ;
            $payment_data['room_name']= $hotel_detail['room_name'] ;
            $payment_data['first_name']= $booking_data['first_name'] ;
            $payment_data['reference_no']= $booking_data['reference_no']  ;
            $payment_data['payment_mean_type']=  $insert['paymentMeanType'] ;
            $payment_data['transaction_date_time']=  $insert['transactionDateTime'] ;
            $payment_data['payment_status']= $response_data['response_msg'];
            $payment_data['email'] =  $booking_data['email'];


            //code to send payment email

           $this->hotel_payment_success_email($payment_data);

            $this->crud_model->insert($insert,'igc_hotel_atos_transaction');

            if($insert['responseCode'] == "0")
            {
                $updates['payment_status'] = "completed";
                $this->crud_model->update($insert['booking_code'], 'booking_code', $updates, 'igc_hotel_booking');
            }
            else{
                $updates['payment_status'] = $response_data['response_msg'];
                $this->crud_model->update($insert['booking_code'], 'booking_code', $updates, 'igc_hotel_booking');
            }

            $data['transaction_msg'] = $response_data['response_msg'];

            $data['response_code'] = $insert['responseCode'];


        }


        $data['title'] = "Transaction Result";
        $this->load->view('api/atos_result', $data);


    }


    //function to send payment success email

    public function hotel_payment_success_email($payment_data)
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