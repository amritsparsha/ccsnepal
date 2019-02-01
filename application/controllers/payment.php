<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('site_settings_model', 'settings');
        $this->load->model('package_model','package');
        $this->load->model('hotel_model','hotel');
        $this->load->model('crud_model','crud');
        $this->load->library('MyPayPal');


    }

    public function index($cipher)
    {

        $result = $this->package->check_cipher($cipher);

        if($result)
        {
            $payment_status = $result['booking_status'];

            if($payment_status == "accepted")
            {

                if($result['departure_id'] == "0")
                {
                    $data['session'] =  $this->package->booking_package_nomral_detail($result['booking_id']);
                }
                else{
                    $data['session'] =  $this->package->booking_package_fixed_detail($result['booking_id']);
                }



                if($this->input->post())
                {
                    $confirm = $this->input->post('confirm');
                    $booking_code =  $this->input->post('booking_code');


                    if($confirm == "creditcard")
                    {
                     redirect('payment/spg_request/'.$booking_code);
                    }

                    else{

                        redirect('payment/paypal_process/'.$booking_code);
                    }

                }
                $data['title'] = "Rupakot Tours and Travels Checkout";
                $data['code'] = $cipher;
                $this->load->view('header', $data);
                $this->load->view('payment/checkout');
                $this->load->view('footer');

            }
            else{
               // $this->session->set_flashdata('error','Unable to continue Payment Process.');
                redirect('home');
            }


        }
        else{
          redirect('home');
        }



    }


        public function spg_request($booking_code)
    {

        $spg_detail =  $this->crud->get_not_deleted_detail('1', 'publish_status', 'igc_2c2p_setting');



        if(empty($spg_detail))
        {
            redirect('payment/'.$booking_code);
        }

        $booking_detail =  $this->package->booking_package_detail($booking_code);
        if($booking_detail['code'] == "USD")
        {
            $currency_code =  "840";
        }
        else{
            redirect('payment/'.$booking_code);
        }





        $data['version']= $spg_detail['version'];
        $data['merchant_id']= $spg_detail['merchant_id'];
        $data['payment_description']= $spg_detail['version'];
        $data['order_id']= rand();
        $data['pay_category_id']= $spg_detail['pay_category_id'];
        $data['promotion']= $spg_detail['promotion'];
        $data['invoice_no']=  $data['order_id'];
        $data['currency']=  $currency_code;
        $data['amount']= $this->format_price($booking_detail['total_amount']);

        $data['customer_email']= $booking_detail['email'];
        $data['user_defined_1']= $booking_code;
        $data['user_defined_2']= $booking_detail['code'];
        $data['result_url_1']= $spg_detail['client_url'];
        $data['result_url_2']= $spg_detail['merchant_url'];

        $data['request_3ds']= $spg_detail['request_3ds'];
        $data['secretKey']= $spg_detail['secret_key'];

           $data['pg_request_url']= $spg_detail['pg_request_url'];


        $stringToHash = $data['version']. $data['merchant_id'].$data['payment_description']. $data['order_id'].  $data['invoice_no']. $data['currency']. $data['amount']. $data['customer_email']. $data['pay_category_id']. $data['promotion'].$data['user_defined_1']. $data['user_defined_2'].
            $data['result_url_1']. $data['result_url_2']. $data['request_3ds'];
        $hash = strtoupper(hash_hmac('sha1', $stringToHash ,$data['secretKey'], false));

        $data['hash'] =  $hash;





        //configure the atos parameter

        $data['title'] = "Rupakot Tours and Travels Payment ";
        $data['booking_code'] =  $booking_code;
        $this->load->view('header', $data);
        $this->load->view('payment/2c2p_request');
        $this->load->view('footer');


    }

    function format_price($price) {
        $price = (int) ($price * 100);
        return str_pad((string) $price, 12, '0', STR_PAD_LEFT);
    }



    public function spg_client()
    {

        if($this->input->post())
        {
            $insert['payment_status_code'] =  $this->input->post('payment_status');

            $response_data =  $this->crud_model->get_detail($insert['payment_status_code'], 'code_id','igc_2c2p_payment_response_code');


            $data['transaction_msg'] = $response_data['code_message'];

            $data['response_code'] =  $insert['payment_status_code'];



        $data['title'] =  "Transaction Result";

        $this->load->view('header', $data);
        $this->load->view('payment/2c2p_result');
        $this->load->view('footer');

        }
    }

    public function spg_merchant()
    {

        if($this->input->post())
        {

            $amount =  $insert['amount'] =  $this->input->post('amount');

            $insert['version'] =  $this->input->post('version');
            $insert['amount'] =  ($amount/100);
            $insert['transaction_datetime'] =  $this->input->post('transaction_datetime');
            $insert['merchant_id'] =  $this->input->post('merchant_id');
            $insert['currency'] =  $this->input->post('user_defined_2');
            $insert['booking_code'] =  $this->input->post('user_defined_1');
            $insert['invoice_no'] =  $this->input->post('invoice_no');
            $insert['transaction_ref'] =  $this->input->post('transaction_ref');
            $insert['approval_code'] =  $this->input->post('approval_code');
            $insert['payment_channel'] =  $this->input->post('payment_channel');
            $insert['payment_status_code'] =  $this->input->post('payment_status');
            $insert['channel_response_code'] =  $this->input->post('channel_response_code');
            $insert['masked_pan'] =  $this->input->post('masked_pan');
            $insert['request_timestamp'] =  $this->input->post('request_timestamp');


            //get booking data

            $booked_type =  $this->package->get_booked_package_type($insert['booking_code']);

            if($booked_type['departure_id'] == "0" && $booked_type['package_type'] =="Normal")
            {
                $booking_data =  $this->package->booking_package_detail($insert['booking_code']);
            }
            else{
                $booking_data =  $this->package->booking_package_fixed_detail($booked_type['booking_id']);
            }


            $response_data =  $this->crud_model->get_detail($insert['payment_status_code'], 'code_id','igc_2c2p_payment_response_code');

            $insert['payment_status'] =  $response_data['code_message'];

            $payment_data['payment_amount']= $insert['amount'] ;
            $payment_data['package_name']= $booking_data['package_name'] ;
            $payment_data['first_name']= $booking_data['first_name'] ;
            $payment_data['reference_no']= $booking_data['reference_no']  ;
            $payment_data['payment_mean_type']=  "2c2p" ;
            $payment_data['transaction_date_time']=  $insert['transaction_datetime'] ;
            $payment_data['payment_status']= $response_data['code_message'];
            $payment_data['email'] =  $booking_data['email'];


            //code to send payment email

            $this->payment_success_email($payment_data);

            $transaction_detail =  $this->crud->get_detail($insert['booking_code'] ,'booking_code', 'igc_2c2p_transaction');


            if(empty($transaction_detail))
            {
                $this->crud->insert($insert,'igc_2c2p_transaction');
            }

            if($insert['payment_status_code'] == "000")
            {
                $updates['payment_status'] = "completed";
                $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
            }
            else{
                $updates['payment_status'] = $response_data['response_msg'];
                $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
            }




        }
    }




    public function atos_request($booking_code)
    {

        $atos =  $this->crud->get_atos_setting();
        //putenv("TZ=Asia/Calcutta");		//Set time zone
        //
        //$PGRequestURL = 'https://payment-webinit.sips-atos.com/paymentInit';	//	FOR LIVE ENVIRONMENT
        //$PGRequestURL = 'https://payment-webinit.simu.sips-atos.com/paymentServlet';	//	FOR TEST ENVIORNMENT

        $PGRequestURL =  $atos['request_url'];
        $PGReturnURL = base_url().'index.php/payment/atos_response';

            //	TO BE USED FOR REDIRECTING BACK TO MERCHANT DOMAIN AFTER PROCESSING PAYMENT REQUEST

        $MerchantID =	$atos['merchant_id'];
        $PGSecretKey= $atos['secret_key'];


        //$MerchantID =	'221058400160001';  //INR
        //$PGSecretKey = 's0WfuS4hFH-11xNcYXghol_GvvY0lfAjAgRM5qmZGxo';

        //$MerchantID = '221058400170001';  //US $
        //$PGSecretKey = 'cknuGmSIFS68cdh6f10BpjUzWdePmJ56v1zOa5OSub4';


        $PGKeyVersion = '1';
       // $CurrencyCode = '356';  //INR
        //$CurrencyCode = '840';  //AMERICAN DOLLAR

        $PGResponseCodes = array('00'=> 'Transaction success, authorization accepted.',
            '02'=> 'Please phone the bank because the authorization limit on the card has been exceeded',
            '03'=> 'Invalid merchant contract','05'=> 'Do not honor, authorization refused',
            '12'=> 'Invalid transaction, check the parameters sent in the request.',
            '14'=> 'Invalid card number or invalid Card Security Code or Card (for Mastercard) or invalid Card Verification Value (for Visa)',
            '17'=> 'Cancellation of payment by the end user',
            '24'=> 'Invalid status.',
            '25'=> 'Transaction not found in database',
            '30'=> 'Invalid format','34'=> 'Fraud suspicion',
            '40'=> 'Operation not allowed to this merchant',
            '60'=> 'Pending transaction',
            '63'=> 'Security breach detected, transaction stopped.',
            '75'=> 'The number of attempts to enter the card number has been exceeded (Three tries exhausted)',
            '90'=> 'Acquirer server temporarily unavailable',
            '94'=> 'Duplicate transaction. (transaction reference already reserved)',
            '97'=> 'Request time-out; transaction refused',
            '99'=> 'Payment page temporarily unavailable');


        $booking_detail =  $this->package->get_booking_amount_currency($booking_code);


        if($booking_detail['code'] == "USD")
        {
            $currency_code =  "840";
        }
        if ($booking_detail['code'] == "INR")
        {
            $currency_code =  "356";
        }


        //configure the atos parameter


        $total_amount =  $booking_detail['total_amount']*100;
        $transactionReference =  md5(rand());

        $data['PGData'] = 'amount='.$total_amount.
            '|currencyCode='.$currency_code.
            '|merchantId='.$MerchantID.
            '|normalReturnUrl='.$PGReturnURL.
            '|transactionReference='.$transactionReference.
            '|keyVersion='.$PGKeyVersion.
            '|orderId='.$booking_code.
            '|customerLanguage=en';


        $data['PGMessageSeal'] = hash('sha256', utf8_encode($data['PGData'].$PGSecretKey));
        $data['PGRequestURL'] = $PGRequestURL;


        $data['title'] = "IRupakot Tours and Travels Payment ";
        $data['booking_code'] =  $booking_code;
        $this->load->view('header', $data);
        $this->load->view('payment/atos_request');
        $this->load->view('footer');


    }


    //function to atos response

    public function atos_response()
    {
        if($this->input->post())
        {


            $result  =  explode("|", $this->input->post('Data'));

            for ($i = 0; $i <= sizeof($result) - 1; $i++) {

                $a = $result[$i];
                $temp = explode("=", $a);

                $key = $temp[0];
                $val = $temp[1];
                if ($key === "amount") {

                   $amount =  $val;

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

                    $MaskedPan =$val;

                }
                if ($key === "paymentMeanBrand") {

                    $PaymentMeanBrand = $val;

                }
                if ($key === "paymentMeanType") {

                    $PaymentMeanType= $val;

                }
                if ($key === "responseCode") {

                    $ResponseCode = $val;

                }
            }


            $booking_detail  =  $this->crud->get_detail($orderId,'booking_code', 'igc_package_booking');

            if(empty($booking_detail))
            {
                redirect('home');
            }

            $transaction_data =  $this->crud->get_detail($transactionReference,'transactionReference','igc_package_atos_transaction');
            if(!empty($transaction_data))
            {
                redirect('home');
            }
            $insert['amount'] =  (isset($amount))? $amount/100:"";
            $insert['captureMode'] =  (isset($captureMode))? $captureMode:"";
            $insert['currencyCode'] =  (isset($CurrencyCode))? $CurrencyCode:"";
            $insert['merchantId'] =  (isset($merchantId))? $merchantId:"";
            $insert['orderId'] =  (isset($orderId))? $orderId:"";
            $insert['transactionDateTime'] =  (isset($transactionDateTime))? date("Y-m-d:H:i:s", strtotime($transactionDateTime)):"";
            $insert['transactionReference'] =  (isset($transactionReference))? $transactionReference:"";
            $insert['keyVersion'] =  (isset($KeyVersion))? $KeyVersion:"";
            $insert['authorisationId'] =  (isset($AuthorisationId))? $AuthorisationId:"";
            $insert['maskedPan'] =  (isset($MaskedPan))? $MaskedPan:"";
            $insert['paymentMeanBrand'] =  (isset($PaymentMeanBrand))? $PaymentMeanBrand:"";
            $insert['paymentMeanType'] =  (isset($PaymentMeanType))? $PaymentMeanType:"";
            $insert['responseCode'] =  (isset($ResponseCode))? $ResponseCode:"";
            $insert['booking_code'] =  (isset($orderId))? $orderId:"0000";
            $insert['created'] = date('Y-m-d:H:i:s');
            $insert['delete_status'] = "0";


            //get booking data

            $booked_type =  $this->package->get_booked_package_type($orderId);

            if($booked_type['departure_id'] == "0" && $booked_type['package_type'] =="Normal")
            {
                $booking_data =  $this->package->booking_package_detail($orderId);
            }
            else{
                $booking_data =  $this->package->booking_package_fixed_detail($booked_type['booking_id']);
            }


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


            $this->crud->insert($insert,'igc_package_atos_transaction');

             if($insert['responseCode'] == "0")
             {
                 $updates['payment_status'] = "completed";
                 $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
             }
            else{
                $updates['payment_status'] = $response_data['response_msg'];
                $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_package_booking');
            }


            $data['transaction_msg'] = $response_data['response_msg'];

            $data['response_code'] =  $insert['responseCode'];

        }

        $data['title'] =  "Transaction Result";

        $this->load->view('header', $data);
        $this->load->view('payment/atos_result');
        $this->load->view('footer');

    }


    public function paypal_process($booking_code)
    {

        $booked_type =  $this->package->get_booked_package_type($booking_code);

        if($booked_type['departure_id'] == "0" && $booked_type['package_type'] =="Normal")
        {
            $booking_detail =  $this->package->get_booking_data($booking_code);
        }
        else{
            $booking_detail =  $this->package->booking_package_fixed_detail($booked_type['booking_id']);
        }


        $currency_code =  $booking_detail['code'];

        //configuration for paypal

        $paypal =  $this->crud->get_paypal_setting();


        $PayPalReturnURL = base_url() . 'index.php/payment/paypal_transaction'; //Point to process.php page
        $PayPalCancelURL = base_url() . 'index.php/payment/paypal_cancel';//Cancel URL if user

        $PayPalModes = $paypal['paypal_mode']; // sandbox or live
        $PayPalApiUsername =  $paypal['api_username']; //PayPal API Username
        $PayPalApiPassword =  $paypal['api_password']; //Paypal API password
        $PayPalApiSignature =  $paypal['api_signature']; //Paypal API Signature
        $PayPalCurrencyCode =  $paypal['currency_code']; //Paypal Currency Code

        $PayPalMode = ($PayPalModes == 'sandbox') ? '.sandbox' : '';

        $ItemName = $booking_detail['package_name']; //Item Name
        $ItemPrice = $booking_detail['total_amount']; //Item Price
        $ItemNumber = $booking_code; //Item Number
        $ItemTotalPrice = $ItemPrice; //(Item Price x Quantity = Total) Get total amount of product;

        //Other important variables like tax, shipping cost
        $TotalTaxAmount = 0.00;  //Sum of tax for all items in this order.
        $HandalingCost = 0.00;  //Handling cost for this order.
        $InsuranceCost = 0.00;  //shipping insurance cost for this order.
        $ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number.
        $ShippinCost = 0.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

        //Grand total including all tax, insurance, shipping cost and discount
        $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount);

        //Parameters for SetExpressCheckout, which will be sent to PayPal
        $padata = '&METHOD=SetExpressCheckout' .
            '&RETURNURL=' . urlencode($PayPalReturnURL) .
            '&CANCELURL=' . urlencode($PayPalCancelURL) .
            '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

            '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
            '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
            '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .



            '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping

            '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
            '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
            '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
            '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
            '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
            '&LOGOIMG=https://www.rupakottravels.com/themes/images/logos/navbar-logo.png' . //site logo
            '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
            '&ALLOWNOTE=1';

        ############# set session variable we need later for "DoExpressCheckoutPayment" #######

        $session['item_name'] = $ItemName;
        $session['item_price'] = $ItemPrice;
        $session['item_number'] = $ItemNumber;
        $session['item_total_price'] = $ItemTotalPrice;
        $session['item_tax_amount'] = $TotalTaxAmount;
        $session['grand_total'] = $GrandTotal;

       // $this->session->set_userdata('paypal_payment_session', $session);


            //We need to execute the "SetExpressCheckOut" method to obtain paypal token
        $paypal = new MyPayPal();
        $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

//        print_r($httpParsedResponseAr);
//        exit();

        //Respond according to message we receive from Paypal
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            $session['token'] =  str_replace('%','-',$httpParsedResponseAr["TOKEN"]);
            $this->session->set_userdata('paypal_session', $session);

            //Redirect user to PayPal store with Token received.
            $paypalurl = 'https://www' . $PayPalMode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
            header('Location: ' . $paypalurl);

        }
        else {
            //Show error message
//            echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
//            echo '<pre>';
//            print_r($httpParsedResponseAr);
//            echo '</pre>';


            $data['title'] =  "Paypal Payment Process Result";
            $data['payment_status']  =  "error";
            $data['result_message'] =   urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);

            $this->load->view('header', $data);
            $this->load->view('payment/paypal_result');
            $this->load->view('footer');
        }






    }

    public function paypal_transaction()
    {


        $paypal =  $this->crud->get_paypal_setting();

        $PayPalModes = $paypal['paypal_mode']; // sandbox or live
        $PayPalApiUsername =  $paypal['api_username']; //PayPal API Username
        $PayPalApiPassword =  $paypal['api_password']; //Paypal API password
        $PayPalApiSignature =  $paypal['api_signature']; //Paypal API Signature
        $PayPalCurrencyCode =  $paypal['currency_code']; //Paypal Currency Code

        $PayPalMode = ($PayPalModes == 'sandbox') ? '.sandbox' : '';

    //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
  if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
    //we will be using these two variables to execute the "DoExpressCheckoutPayment"
    //Note: we haven't received any payment yet.

    $token = $_GET["token"];



   $payer_id = $_GET["PayerID"];


   $paypal_session_data =  $this->session->userdata('paypal_session');
      if(empty($paypal_session_data))
      {
          redirect('home');
      }


      $transaction_data =  $this->crud->get_detail($token,'token','igc_package_paypal_transaction');
      if(!empty($transaction_data))
      {
          redirect('home');
      }


    //get session variables

//$GrandTotal = $this->session->userdata('GrandTotal');


    $ItemName =  $paypal_session_data['item_name'] ;
    $ItemPrice =  $paypal_session_data['item_price'] ;
    $ItemNumber =  $paypal_session_data['item_number'] ;
    $ItemTotalPrice = $paypal_session_data['item_total_price'] ;
    $TotalTaxAmount =  $paypal_session_data['item_tax_amount'] ;
    $GrandTotal =  $paypal_session_data['grand_total'] ;


//            echo $ItemName;
//            exit();

$padata = '&TOKEN=' . urlencode($token) .
'&PAYERID=' . urlencode($payer_id) .
'&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

    //set item info here, otherwise we won't see product details later
'&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
'&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
    //  '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
'&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
    //  '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .

    /*
    //Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
    '&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
    '&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
    '&L_PAYMENTREQUEST_0_DESC1=Description text'.
    '&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
    '&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
    */

'&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
'&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
'&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
'&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

    //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
$paypal = new MyPayPal();
$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    //Check if everything went ok..
if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
{

//echo '<h2>Success</h2>';
//echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

    $transaction_id =  urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);



    //print_r($httpParsedResponseAr);
    //exit();

    $pinsert['payment_status'] = $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"];

    if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
    {
        $data['payment_status'] = "success";
        $pinsert['payment_message'] = "Payment Received! Your product will be sent to you very soon!";
        $data['result_message'] = $pinsert['payment_message'] ;

    }
    elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
    {

        $pinsert['payment_message'] = "Transaction Complete, but payment is still pending!";
        $data['payment_status'] = "pending";
        $data['result_message'] = "Transaction Complete, but payment is still pending!.
    You need to manually authorize this payment in your" . '<a target="_new" href="http://www.paypal.com">' . "Paypal Account" . '</a>';

    }
    else{
        $pinsert['payment_message'] = urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);
        $data['payment_status'] = "undefined";
        $data['result_message']  =  $pinsert['payment_message'];

    }





    // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
    // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
    $padata = 	'&TOKEN='.urlencode($token);
    $paypal= new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
    {

        //$token_records = $this->crud_model->get_detail($this->input->get('token'), 'token', 'igc_paypal_session');
        $pinsert['transaction_id'] = $transaction_id;
        $pinsert['payer_id'] = $this->input->get('PayerID');
        $pinsert['payment_id '] = urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_TRANSACTIONID']);
        $pinsert['payment_amount'] = urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_AMT']);
        $pinsert['payer_email'] = urldecode($httpParsedResponseAr['EMAIL']);
        $pinsert['token'] = $this->input->get('token');
        $pinsert['item_name'] = urldecode($httpParsedResponseAr['L_PAYMENTREQUEST_0_NAME0']);
        $pinsert['booking_code'] = urldecode($httpParsedResponseAr['L_PAYMENTREQUEST_0_NUMBER0']);
        $pinsert['currency_code']  = urldecode($httpParsedResponseAr["CURRENCYCODE"]);
        $pinsert['delete_status'] = "0";
        $pinsert['payment_through'] = "Web";
        $pinsert['created'] =  date('Y-m-d:H:i:s');


      //  print_r($pinsert);
     //   exit();

            $this->crud_model->insert($pinsert, 'igc_package_paypal_transaction');

        //get booking data

           // $booking_data =  $this->package->booking_package_detail($pinsert['booking_code']);
        $booked_type =  $this->package->get_booked_package_type($pinsert['booking_code']);

        if($booked_type['departure_id'] == "0" && $booked_type['package_type'] =="Normal")
        {
            $booking_data =  $this->package->booking_package_detail($pinsert['booking_code']);
        }
        else{
            $booking_data =  $this->package->booking_package_fixed_detail($booked_type['booking_id']);
        }


            $payment_data['payment_amount']=  $pinsert['payment_amount'] ;
            $payment_data['package_name']= $booking_data['package_name'] ;
            $payment_data['first_name']= $booking_data['first_name'] ;
            $payment_data['reference_no']= $booking_data['reference_no']  ;
            $payment_data['payment_mean_type']=  "PayPal" ;
            $payment_data['transaction_date_time']= $pinsert['created'] ;
            $payment_data['payment_status']= $pinsert['payment_status'];
            $payment_data['email'] =  $booking_data['email'];

          //code to send payment email

          $this->payment_success_email($payment_data);


        if($data['payment_status'] == "success")
            {
                $booking_status['payment_status'] = "Completed";
                $this->crud_model->update($pinsert['booking_code'],'booking_code', $booking_status, 'igc_package_booking');
            }
           else{


               $booking_status['payment_status'] = $pinsert['payment_status'];
               $this->crud_model->update($pinsert['booking_code'],'booking_code', $booking_status, 'igc_package_booking');
           }


        //unset paypal session

        $this->session->unset_userdata('paypal_session');



            $data['title'] = "Paypal Payment Result";
            $data['payment_status'] = "success";
            $data['result_message'] = $pinsert['payment_message'];




    }

}


else {


    $data['title'] =  "Paypal Payment Result";
    $data['payment_status']  =  "error";
    $data['result_message'] =   urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);



//    echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
//    echo '<pre>';
//    print_r($httpParsedResponseAr);
//    echo '</pre>';
}



      //load result page


      $this->load->view('header', $data);
      $this->load->view('payment/paypal_result');
      $this->load->view('footer');



        }


    }



    //paypal cancel url

    public function paypal_cancel()
    {
        $data['title'] =  "Paypal Payment Process Result";
        $data['payment_status']  =  "error";
        $data['result_message'] =   "Your payment process has been cancelled";
        $this->load->view('header', $data);
        $this->load->view('payment/paypal_result');
        $this->load->view('footer');
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

        //$body = file_get_contents('https://www.rupakottravels.com/photo-contest.html');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Package Payment</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">

     <div style="margin:0 0 10px"> <img alt="Rupakot Tours and Travels" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$payment_data['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #800000">Package Name:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['package_name'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Reference Number:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['reference_no'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Payment Mean Type:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_mean_type'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Payment Amount:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_amount'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Transaction Date Time:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['transaction_date_time'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Payment Status:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_status'].'</td>
        </tr>

        <tr>
            <td colspan="2" style="background:#800000; text-align:left;">Thanks and Regards,<br />
                Rupakot Tours and Travels Team<br />
                Contact Number:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
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

        $mail->Subject    = $site_settings['site_name']." Package Payment";


        $mail->MsgHTML($body);

        $address = $payment_data['email'];

        $mail->AddAddress($address, $site_settings['site_name']);

        if($mail->Send())
        {
            return TRUE;

        }

        else{

           return FALSE;
        }


    }




    //payment section  for hotel

    public function hotel($cipher)
    {

        $result = $this->hotel->get_hotel_booked_detail($cipher);

        if($result)
        {
            $payment_status = $result['booking_status'];

            if($payment_status == "accepted")
            {

                if($this->input->post())
                {
                    $confirm = $this->input->post('confirm');
                    $booking_code =  $this->input->post('booking_code');


                    if($confirm == "creditcard")
                    {
                        redirect('payment/atos_request_hotel/'.$booking_code);
                    }
                    else{

                        redirect('payment/paypal_process_hotel/'.$booking_code);
                    }

                }

                $data['hotel_detail'] = $this->hotel->get_hotel_booked_data($result['hotel_id'], $result['hotel_room_id']);
                $data['title'] = "Rupakot Tours and Travels Checkout";
                $data['code'] = $cipher;
                $data['detail']=  $result;
                $this->load->view('header', $data);
                $this->load->view('payment/hotel_checkout');
                $this->load->view('footer');

            }
            else{
                // $this->session->set_flashdata('error','Unable to continue Payment Process.');
                redirect('home');
            }


        }
        else{
            redirect('home');
        }



    }



    public function atos_request_hotel($booking_code)
    {
        //putenv("TZ=Asia/Calcutta");		//Set time zone
        //
        //$PGRequestURL = 'https://payment-webinit.sips-atos.com/paymentInit';	//	FOR LIVE ENVIRONMENT
        $PGRequestURL = 'https://payment-webinit.simu.sips-atos.com/paymentServlet';	//	FOR TEST ENVIORNMENT

        $PGReturnURL = base_url().'index.php/payment/atos_response_hotel';

        //	TO BE USED FOR REDIRECTING BACK TO MERCHANT DOMAIN AFTER PROCESSING PAYMENT REQUEST

        $MerchantID =	"002020000000001";
        $PGSecretKey="002020000000001_KEY1";


        //$MerchantID =	'221058400160001';  //INR
        //$PGSecretKey = 's0WfuS4hFH-11xNcYXghol_GvvY0lfAjAgRM5qmZGxo';

        //$MerchantID = '221058400170001';  //US $
        //$PGSecretKey = 'cknuGmSIFS68cdh6f10BpjUzWdePmJ56v1zOa5OSub4';


        $PGKeyVersion = '1';
        // $CurrencyCode = '356';  //INR
        //$CurrencyCode = '840';  //AMERICAN DOLLAR

        $PGResponseCodes = array('00'=> 'Transaction success, authorization accepted.',
            '02'=> 'Please phone the bank because the authorization limit on the card has been exceeded',
            '03'=> 'Invalid merchant contract','05'=> 'Do not honor, authorization refused',
            '12'=> 'Invalid transaction, check the parameters sent in the request.',
            '14'=> 'Invalid card number or invalid Card Security Code or Card (for Mastercard) or invalid Card Verification Value (for Visa)',
            '17'=> 'Cancellation of payment by the end user',
            '24'=> 'Invalid status.',
            '25'=> 'Transaction not found in database',
            '30'=> 'Invalid format','34'=> 'Fraud suspicion',
            '40'=> 'Operation not allowed to this merchant',
            '60'=> 'Pending transaction',
            '63'=> 'Security breach detected, transaction stopped.',
            '75'=> 'The number of attempts to enter the card number has been exceeded (Three tries exhausted)',
            '90'=> 'Acquirer server temporarily unavailable',
            '94'=> 'Duplicate transaction. (transaction reference already reserved)',
            '97'=> 'Request time-out; transaction refused',
            '99'=> 'Payment page temporarily unavailable');


        $booking_detail =  $this->crud_model->get_detail($booking_code,'booking_code', 'igc_hotel_booking');

        $currency_detail =  $this->crud_model->get_detail($booking_detail['currency_id'], 'currency_id','igc_currency_setting');


        if($currency_detail['code'] == "USD")
        {
            $currency_code =  "840";
        }
        if ($currency_detail['code'] == "INR")
        {
            $currency_code =  "356";
        }


        //configure the atos parameter


        $total_amount =  $booking_detail['total_amount']*100;
        $transactionReference =  md5(rand());

        $data['PGData'] = 'amount='.$total_amount.
            '|currencyCode='.$currency_code.
            '|merchantId='.$MerchantID.
            '|normalReturnUrl='.$PGReturnURL.
            '|transactionReference='.$transactionReference.
            '|keyVersion='.$PGKeyVersion.
            '|orderId='.$booking_code.
            '|customerLanguage=en';


        $data['PGMessageSeal'] = hash('sha256', utf8_encode($data['PGData'].$PGSecretKey));
        $data['PGRequestURL'] = $PGRequestURL;


        $data['title'] = "Rupakot Tours and Travels Hotel Booking Payment ";
        $data['booking_code'] =  $booking_code;
        $this->load->view('header', $data);
        $this->load->view('payment/hotel_atos_request');
        $this->load->view('footer');


    }


    //function to atos response

    public function atos_response_hotel()
    {
        if($this->input->post())
        {

            $result  =  explode("|", $this->input->post('Data'));

            for ($i = 0; $i <= sizeof($result) - 1; $i++) {

                $a = $result[$i];
                $temp = explode("=", $a);

                $key = $temp[0];
                $val = $temp[1];
                if ($key === "amount") {

                    $amount =  $val;

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

                    $MaskedPan =$val;

                }
                if ($key === "paymentMeanBrand") {

                    $PaymentMeanBrand = $val;

                }
                if ($key === "paymentMeanType") {

                    $PaymentMeanType= $val;

                }
                if ($key === "responseCode") {

                    $ResponseCode = $val;

                }
            }


            $booking_detail  =  $this->crud->get_detail($orderId,'booking_code', 'igc_hotel_booking');

            if(empty($booking_detail))
            {
                redirect('home');
            }


            $insert['amount'] =  (isset($amount))? $amount/100:"";
            $insert['captureMode'] =  (isset($captureMode))? $captureMode:"";
            $insert['currencyCode'] =  (isset($CurrencyCode))? $CurrencyCode:"";
            $insert['merchantId'] =  (isset($merchantId))? $merchantId:"";
            $insert['orderId'] =  (isset($orderId))? $orderId:"";
            $insert['transactionDateTime'] =  (isset($transactionDateTime))? date("Y-m-d:H:i:s", strtotime($transactionDateTime)):"";
            $insert['transactionReference'] =  (isset($transactionReference))? $transactionReference:"";
            $insert['keyVersion'] =  (isset($KeyVersion))? $KeyVersion:"";
            $insert['authorisationId'] =  (isset($AuthorisationId))? $AuthorisationId:"";
            $insert['maskedPan'] =  (isset($MaskedPan))? $MaskedPan:"";
            $insert['paymentMeanBrand'] =  (isset($PaymentMeanBrand))? $PaymentMeanBrand:"";
            $insert['paymentMeanType'] =  (isset($PaymentMeanType))? $PaymentMeanType:"";
            $insert['responseCode'] =  (isset($ResponseCode))? $ResponseCode:"";
            $insert['booking_code'] =  (isset($orderId))? $orderId:"0000";
            $insert['created'] = date('Y-m-d:H:i:s');
            $insert['delete_status'] = "0";


            //get booking data
            $booking_data =  $this->hotel->get_hotel_booked_detail($orderId, 'booking_code', 'igc_hotel_booking');

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


            $this->crud->insert($insert,'igc_hotel_atos_transaction');

            if($insert['responseCode'] == "0")
            {
                $updates['payment_status'] = "completed";
                $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_hotel_booking');
            }
            else{
                $updates['payment_status'] = $response_data['response_msg'];
                $this->crud->update($insert['booking_code'], 'booking_code', $updates, 'igc_hotel_booking');
            }


            $data['transaction_msg'] = $response_data['response_msg'];

            $data['response_code'] =  $insert['responseCode'];

        }

        $data['title'] =  "Hotel Transaction Result";

        $this->load->view('header', $data);
        $this->load->view('payment/atos_result');
        $this->load->view('footer');

    }






    //paypal for hotel

    public function paypal_process_hotel($booking_code)
    {



        $booking_data =  $this->hotel->get_hotel_booked_detail($booking_code, 'booking_code', 'igc_hotel_booking');

        $hotel_detail  = $this->hotel->get_hotel_booked_data($booking_data['hotel_id'], $booking_data['hotel_room_id']);


        $currency_code =  $booking_data['code'];

        //configuration for paypal

        $PayPalReturnURL = base_url() . 'index.php/payment/hotel_paypal_transaction'; //Point to process.php page
        $PayPalCancelURL = base_url() . 'index.php/payment/cancel';//Cancel URL if user

        $PayPalMode = 'sandbox'; // sandbox or live
        $PayPalApiUsername = 'ashokidreams-facilitator_api1.gmail.com'; //PayPal API Username
        $PayPalApiPassword = '1394784202'; //Paypal API password
        $PayPalApiSignature = 'Awhnt9CoNMsReOUtYSeGU.CCnPMoA1b4WIyGdaXXEIkgeFJYZ2WPGAtf'; //Paypal API Signature
        $PayPalCurrencyCode = $currency_code; //Paypal Currency Code

        $paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : 'live';

        $ItemName = $hotel_detail['hotel_name']; //Item Name
        $ItemPrice = $booking_data['total_amount']; //Item Price
        $ItemNumber = $booking_code; //Item Number
        $ItemTotalPrice = $ItemPrice; //(Item Price x Quantity = Total) Get total amount of product;

        //Other important variables like tax, shipping cost
        $TotalTaxAmount = 0.00;  //Sum of tax for all items in this order.
        $HandalingCost = 0.00;  //Handling cost for this order.
        $InsuranceCost = 0.00;  //shipping insurance cost for this order.
        $ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number.
        $ShippinCost = 0.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

        //Grand total including all tax, insurance, shipping cost and discount
        $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount);

        //Parameters for SetExpressCheckout, which will be sent to PayPal
        $padata = '&METHOD=SetExpressCheckout' .
            '&RETURNURL=' . urlencode($PayPalReturnURL) .
            '&CANCELURL=' . urlencode($PayPalCancelURL) .
            '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

            '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
            '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
            '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .



            '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping

            '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
            '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
            '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
            '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
            '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
            '&LOGOIMG=https://www.rupakottravels.com/assets/upload/images/config/logo.png' . //site logo
            '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
            '&ALLOWNOTE=1';

        ############# set session variable we need later for "DoExpressCheckoutPayment" #######

        $session['item_name'] = $ItemName;
        $session['item_price'] = $ItemPrice;
        $session['item_number'] = $ItemNumber;
        $session['item_total_price'] = $ItemTotalPrice;
        $session['item_tax_amount'] = $TotalTaxAmount;
        $session['grand_total'] = $GrandTotal;

        $this->session->set_userdata('paypal_payment_session', $session);


        //We need to execute the "SetExpressCheckOut" method to obtain paypal token
        $paypal = new MyPayPal();
        $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        //Respond according to message we receive from Paypal
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            //Redirect user to PayPal store with Token received.
            $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
            header('Location: ' . $paypalurl);

        }
        else {
            //Show error message
//            echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
//            echo '<pre>';
//            print_r($httpParsedResponseAr);
//            echo '</pre>';


            $data['title'] =  "Paypal Payment Process Result";
            $data['payment_status']  =  "error";
            $data['result_message'] =   urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'<pre>'
                .$httpParsedResponseAr
                .'</pre>';

            $this->load->view('header', $data);
            $this->load->view('payment/paypal_result');
            $this->load->view('footer');
        }






    }

    public function hotel_paypal_transaction()
    {
        $PayPalMode = 'sandbox'; // sandbox or live


        $PayPalApiUsername = 'ashokidreams-facilitator_api1.gmail.com'; //PayPal API Username
        $PayPalApiPassword = '1394784202'; //Paypal API password
        $PayPalApiSignature = 'Awhnt9CoNMsReOUtYSeGU.CCnPMoA1b4WIyGdaXXEIkgeFJYZ2WPGAtf'; //Paypal API Signature
        $PayPalCurrencyCode = 'USD'; //Paypal Currency Code

        $paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : 'live';

        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.

            $token = $_GET["token"];
            $payer_id = $_GET["PayerID"];


            $paypal_session_data =  $this->session->userdata('paypal_payment_session');
            $token_data['token'] =  $token;
            $token_data['payer_id'] =  $payer_id;

            $insert_data  = array_merge($paypal_session_data, $token_data);

            $this->crud_model->insert($insert_data,'igc_paypal_session');


            //get session variables

//$GrandTotal = $this->session->userdata('GrandTotal');


            $ItemName =  $paypal_session_data['item_name'] ;
            $ItemPrice =  $paypal_session_data['item_price'] ;
            $ItemNumber =  $paypal_session_data['item_number'] ;
            $ItemTotalPrice = $paypal_session_data['item_total_price'] ;
            $TotalTaxAmount =  $paypal_session_data['item_tax_amount'] ;
            $GrandTotal =  $paypal_session_data['grand_total'] ;


//            echo $ItemName;
//            exit();

            $padata = '&TOKEN=' . urlencode($token) .
                '&PAYERID=' . urlencode($payer_id) .
                '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

                //set item info here, otherwise we won't see product details later
                '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
                '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
                //  '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
                '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
                //  '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .

                /*
                //Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
                '&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
                '&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
                '&L_PAYMENTREQUEST_0_DESC1=Description text'.
                '&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
                '&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
                */

                '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
            {

//echo '<h2>Success</h2>';
//echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

                $transaction_id =  urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);



                //print_r($httpParsedResponseAr);
                //exit();

                $pinsert['payment_status'] = $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"];

                if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
                {
                    $data['payment_status'] = "success";
                    $pinsert['payment_message'] = "Payment Received! Your product will be sent to you very soon!";
                    $data['result_message'] = $pinsert['payment_message'] ;

                }
                elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
                {

                    $pinsert['payment_message'] = "Transaction Complete, but payment is still pending!";
                    $data['payment_status'] = "pending";
                    $data['result_message'] = "Transaction Complete, but payment is still pending!.
    You need to manually authorize this payment in your" . '<a target="_new" href="http://www.paypal.com">' . "Paypal Account" . '</a>';

                }
                else{
                    $pinsert['payment_message'] = urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);
                    $data['payment_status'] = "undefined";
                    $data['result_message']  =  $pinsert['payment_message'];

                }





                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata = 	'&TOKEN='.urlencode($token);
                $paypal= new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

                if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
                {

                    //$token_records = $this->crud_model->get_detail($this->input->get('token'), 'token', 'igc_paypal_session');
                    $pinsert['transaction_id'] = $transaction_id;
                    $pinsert['payer_id'] = $this->input->get('PayerID');
                    $pinsert['payment_id '] = urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_TRANSACTIONID']);
                    $pinsert['payment_amount'] = urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_AMT']);
                    $pinsert['payer_email'] = urldecode($httpParsedResponseAr['EMAIL']);
                    $pinsert['token'] = $this->input->get('token');
                    $pinsert['item_name'] = urldecode($httpParsedResponseAr['L_PAYMENTREQUEST_0_NAME0']);
                    $pinsert['booking_code'] = urldecode($httpParsedResponseAr['L_PAYMENTREQUEST_0_NUMBER0']);
                    $pinsert['currency_code']  = urldecode($httpParsedResponseAr["CURRENCYCODE"]);
                    $pinsert['delete_status'] = "0";
                    $pinsert['payment_through'] = "Web";
                    $pinsert['created'] =  date('Y-m-d:H:i:s');


                    //  print_r($pinsert);
                    //   exit();

                    $this->crud_model->insert($pinsert, 'igc_hotel_paypal_transaction');

                    //get booking data

                    // $booking_data =  $this->package->booking_package_detail($pinsert['booking_code']);
                  //  $booked_type =  $this->package->get_booked_package_type($pinsert['booking_code']);

                    $booking_data =  $this->hotel->get_hotel_booked_detail($pinsert['booking_code']);
                    $hotel_detail  = $this->hotel->get_hotel_booked_data($booking_data['hotel_id'], $booking_data['hotel_room_id']);



                    $payment_data['payment_amount']=  $pinsert['payment_amount'] ;
                    $payment_data['hotel_name']= $hotel_detail['hotel_name'] ;
                    $payment_data['room_name']= $hotel_detail['room_name'] ;
                    $payment_data['first_name']= $booking_data['first_name'] ;
                    $payment_data['reference_no']= $booking_data['reference_no']  ;
                    $payment_data['payment_mean_type']=  "PayPal" ;
                    $payment_data['transaction_date_time']= $pinsert['created'] ;
                    $payment_data['payment_status']= $pinsert['payment_status'];
                    $payment_data['email'] =  $booking_data['email'];

                    //code to send payment email

                    $this->hotel_payment_success_email($payment_data);


                    if($data['payment_status'] == "success")
                    {
                        $booking_status['payment_status'] = "Completed";
                        $this->crud_model->update($pinsert['booking_code'],'booking_code', $booking_status, 'igc_hotel_booking');
                    }
                    else{


                        $booking_status['payment_status'] = $pinsert['payment_status'];
                        $this->crud_model->update($pinsert['booking_code'],'booking_code', $booking_status, 'igc_hotel_booking');
                    }



                    $data['title'] = "Paypal Payment Result";
                    $data['payment_status'] = "success";
                    $data['result_message'] = $pinsert['payment_message'];




                }

            }


            else {


                $data['title'] =  "Paypal Payment Result";
                $data['payment_status']  =  "error";
                $data['result_message'] =   urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);



//    echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
//    echo '<pre>';
//    print_r($httpParsedResponseAr);
//    echo '</pre>';
            }



            //load result page


            $this->load->view('header', $data);
            $this->load->view('payment/paypal_result');
            $this->load->view('footer');



        }


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

        //$body = file_get_contents('https://www.rupakottravels.com/photo-contest.html');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Package Payment</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">

    <div style="margin:0 0 10px"> <img alt="Rupakot Tours and Travels" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$payment_data['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #800000">Hotel Name:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['hotel_name'].'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #800000">Hotel Name:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['room_name'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Reference Number:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['reference_no'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Payment Mean Type:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_mean_type'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Payment Amount:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_amount'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Transaction Date Time:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['transaction_date_time'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Payment Status:</td>
            <td style="border-bottom:1px solid #800000"> '.$payment_data['payment_status'].'</td>
        </tr>

        <tr>
            <td colspan="2" style="background:#800000; text-align:left;">Thanks and Regards,<br />
                Rupakot Tours and Travels Team<br />
                Contact Number:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
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

        $mail->Subject    = $site_settings['site_name']."Hotel Package Payment";


        $mail->MsgHTML($body);

        $address = $payment_data['email'];

        $mail->AddAddress($address, $site_settings['site_name']);

        if($mail->Send())
        {
            return TRUE;

        }

        else{

            return FALSE;
        }


    }







}
