<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_api extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('package_model','package');
    }

    public function send_request()
    {
        if($this->input->post())
        {
            $settings = $this->package->get_igcpay_settings();
          $paymentKey = $this->input->post('paymentKey');
            header('Content-type:application/json');
            $record = json_decode(file_get_contents($settings['response_url'].'/'.$paymentKey), TRUE);


            $payment_status = $record['paymentStatus'];

            if($payment_status !="")
            {
                $hash_code = $record['refOrderNo'];
                $booking = $this->package->get_booking_id($hash_code);
                $booking_id = $booking['booking_id'];

                //code to update booking status

                $update['booking_status'] = 'completed';
                $update['updated'] = $record['transactionDate'];
                $this->package->update_booking_status($booking_id, $update);

                //code to insert the payment data
                $insert['transaction_amount'] = $record['pricePaid'];
                $insert['merchant_key'] = $record['merchantKey'];
                $insert['hash_code'] = $record['refOrderNo'];
                $insert['transaction_id'] = $record['invoiceNo'];
                $insert['transaction_status'] = $record['paymentStatus'];
                $insert['transaction_date'] = $record['transactionDate'];
                $insert['booking_id'] = $booking_id;

                $result =  $this->db->insert('igc_package_transaction', $insert);
                if($result)
                {
                    http_response_code(200);
                }
                else{
                    http_response_code(500);


                }


            }
            else{
                http_response_code(500);
            }
        }
        else{
            http_response_code(404);
        }
    }



}