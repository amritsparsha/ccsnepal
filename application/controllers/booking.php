<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('crud_model','crud');
        $this->load->model('login_model', 'login');
        $this->load->model('package_model','package');

    }

   public function index()
   {

       //check booking session
       $session_data = $this->session->userdata('booking_data');

       $package_id = $session_data['package_id'];

       if($session_data == "")
       {
           redirect('home');
       }

       $this->load->library('form_validation');

       if($this->input->post()) {

           $this->form_validation->set_rules('trip_type', 'Trip Type', 'trim|required');
           $this->form_validation->set_rules('arrival', 'Arrival', 'required');
           $this->form_validation->set_rules('depart', 'Depart', 'required');
           $this->form_validation->set_rules('ppax', 'Pax', 'trim|required|callback_check_available['.$session_data['departure_id'].']');
           $this->form_validation->set_rules('padult', 'Adult Pax', 'trim|required');
           $this->form_validation->set_rules('customer_title', 'Customer Title', 'trim');
           $this->form_validation->set_rules('pfname', 'First Name', 'trim');
           $this->form_validation->set_rules('pmname', 'Middle Name','trim');
           $this->form_validation->set_rules('plname', 'Last Name', 'trim');
           $this->form_validation->set_rules('pcontact', 'Contact Number', 'trim');
           $this->form_validation->set_rules('pemail', 'Email Address', 'trim|valid_email');
           $this->form_validation->set_rules('country', 'Country Name', 'trim');
           $this->form_validation->set_rules('city', 'City', 'trim');
           $this->form_validation->set_rules('passportno', 'trim|Passport No');
           $this->form_validation->set_rules('pinfo', 'Personal Info','trim');
           $this->form_validation->set_rules('extra_facility', 'Extra Facility','trim');
           $this->form_validation->set_rules('package_id', 'Package Info', 'required');

           if ($this->form_validation->run()) {


               $insert['package_id'] = $this->input->post('package_id');
               $customer_id = $this->input->post('customer_id');


               if ($insert['package_id'] != $session_data['package_id']) {
                   redirect('package/detail/' . $insert['package_id']);
               } else {
                   $total_per = $this->input->post('ppax');
                   $total_amount = ($total_per * $session_data['amount']);
                   $insert['no_of_person'] = $total_per;
                   $insert['trip_type'] = $this->input->post('trip_type');
                   $insert['arrival_date'] = date("Y-m-d", strtotime($this->input->post('arrival')));
                   $insert['depart_date'] = date("Y-m-d",strtotime($this->input->post('depart')));
                   $insert['adult'] = $this->input->post('padult');
                   $insert['child'] = $this->input->post('pchild');
                   $insert['infant'] = $this->input->post('pinfant');


                   if ($customer_id != "") {

                       $customer = $this->crud->get_detail($customer_id, 'customer_id', 'igc_site_users');
                       $insert['first_name'] = $customer['first_name'];
                       $insert['middle_name'] = $customer['middle_name'];
                       $insert['last_name'] = $customer['last_name'];
                       $insert['contact_no'] = $customer['contact_no'];
                       $insert['email'] = $customer['email'];
                       $insert['customer_title'] = $customer['customer_title'];
                       $insert['passport_no'] = $customer['passport_no'];
                       $insert['country'] = $customer['country'];
                       $insert['city'] = $customer['city'];


                   } else {
                       $insert['first_name'] = $this->input->post('pfname');
                       $insert['middle_name'] = $this->input->post('pmname');
                       $insert['last_name'] = $this->input->post('plname');
                       $insert['contact_no'] = $this->input->post('pcontact');
                       $insert['email'] = $this->input->post('pemail');
                       $insert['customer_title'] = $this->input->post('customer_title');
                       $insert['passport_no'] = $this->input->post('passportno');
                       $insert['country'] = $this->input->post('country');
                       $insert['city'] = $this->input->post('city');
                   }


                   $insert['additional_info'] = $this->input->post('pinfo');
                   $insert['referedby'] = $this->input->post('referedby');
                   $insert['created'] = date('Y-m-d:H:i:s');
                   $insert['delete_status'] = "0";
                   $insert['accommodation_id'] = $session_data['accommodation_id'];
                   $insert['departure_id'] = $session_data['departure_id'];
                   $insert['currency_id'] = $session_data['currency_id'];
                   $insert['package_type'] = $session_data['package_type'];
                   $insert['amount'] = $total_amount;
                   $insert['total_amount'] = $total_amount;
                   $insert['extra_facility'] =$this->input->post('extra_facility');


                   $this->session->set_userdata('final_booking_data', $insert);

                   if ($customer_id == "") {
                       redirect('booking/booking_option');
                   } else {
                       redirect('booking/booking_confirm/' . $customer_id);
                   }


               }


           }
       }


       $package = $this->crud->get_detail($package_id, 'package_id', 'igc_package');

       $accommodation = $this->crud->get_detail($session_data['accommodation_id'], 'accommodation_id', 'igc_accommodation_setting');
       $currency = $this->crud->get_detail($session_data['currency_id'],'currency_id','igc_currency_setting');
       $data['title'] = $package['package_name'];
       $data['package_name'] = $package['package_name'];
       $data['package_duration'] = $package['package_duration'];
       $data['meta_title'] = $package['meta_title'];
       $data['meta_description'] = $package['meta_description'];
       $data['meta_keywords'] = $package['meta_keywords'];
       $data['amount'] = $session_data['amount'];
       $data['accommodation_type']= (isset($accommodation['name']) && $accommodation['name'] !="")?$accommodation['name']:"";
       $data['currency_type']= $currency['code'];
       $data['package_id'] = $session_data['package_id'];
       $data['customer_id'] =  $this->session->userdata('customer_id');

       //code to load extra script in header
       $data['styles'] =  array('themes/css/jquery-ui');

       $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator','themes/js/jquery-ui.min');
       $data['menu']="";

       $this->load->view('header', $data);
       $this->load->view('booking/booking_form');
       $this->load->view('footer');
   }

    public function booking_option()
    {
        if($this->session->userdata('customer_id') !="")
        {
            redirect('booking/booking_confirm/'.$this->session->userdata('customer_id'));
        }

        $this->check_booking_session();

        $session = $this->session->userdata('final_booking_data');

        $package = $this->crud->get_detail($session['package_id'],'package_id','igc_package');

        $this->load->library('form_validation');

        if($this->input->post())
        {

            $this->form_validation->set_rules('booking_type', 'Booking Type','required');


            if ($this->form_validation->run()) {

                $booking_type = $this->input->post('booking_type');
                if ($booking_type == "register") {
                    $session = $this->session->userdata('final_booking_data');
                    $email = $session['email'];
                    $email_exist = $this->login->check_email_exist($email);
                    if (!empty($email_exist)) {

                        $data['error']= "Email Already exist. Unable to create new register.";

                    } else {
                        redirect('booking/register');
                    }

                } else {

                    $insert['customer_type'] = "guest";
                    $insert['email'] = $session['email'];
                    $insert['first_name'] = $session['first_name'];
                    $insert['middle_name'] = $session['middle_name'];
                    $insert['last_name'] = $session['last_name'];
                    $insert['customer_title'] = $session['customer_title'];
                    $insert['country'] = $session['country'];
                    $insert['city'] = $session['city'];
                    $insert['contact_no'] = $session['contact_no'];
                    $insert['passport_no'] = $session['passport_no'];
                    $insert['created'] = date('Y-m-d:H:i:s');
                    $result = $this->crud->insert_return_id($insert, 'igc_site_users');
                    if ($result) {
                        redirect('booking/booking_confirm/' . $result);
                    } else {
                        redirect('booking/booking_option');
                    }


                }
            }

        }
        $data['title'] = "Package Booking Option";
        $data['name'] = $package['package_name'];
        $data['menu']="";
        $this->load->view('header', $data);
        $this->load->view('booking/booking_option');
        $this->load->view('footer');

    }


    //function to register customer
    public function register()
    {

        $this->check_booking_session();
        $this->load->library('form_validation');
        if($this->input->post())
        {
            $this->form_validation->set_rules('password', 'Password','required');


            if ($this->form_validation->run()) {
                $session = $this->session->userdata('final_booking_data');

                $insert['password'] = md5($this->input->post('password'));
                $insert['customer_type'] = "register";
                $insert['email'] = $session['email'];
                $insert['first_name'] = $session['first_name'];
                $insert['middle_name'] = $session['middle_name'];
                $insert['last_name'] = $session['last_name'];
                $insert['customer_title'] = $session['customer_title'];
                $insert['country'] = $session['country'];
                $insert['city'] = $session['city'];
                $insert['contact_no'] = $session['contact_no'];
                $insert['passport_no'] = $session['passport_no'];
                $insert['created'] = date('Y-m-d:H:i:s');
                $insert['active_status'] ="Y";
                $insert['activation_code'] = md5(rand());
                $result = $this->crud->insert_return_id($insert, 'igc_site_users');
                if ($result) {
                    redirect('booking/booking_confirm/' . $result);
                } else {
                    redirect('booking/booking_option');
                }
            }


        }

        $session = $this->session->userdata('final_booking_data');
        $package = $this->crud->get_detail($session['package_id'],'package_id','igc_package');
        $data['name'] = $package['package_name'];
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
        $data['menu']="";
        $this->load->view('header', $data);
        $this->load->view('booking/register_form');
        $this->load->view('footer');
    }



    public function booking_confirm($customer_id)
    {

        $this->load->library('form_validation');

        if($this->input->post())
        {
            $this->form_validation->set_rules('confirm', 'Booking Confirm','required');


            if ($this->form_validation->run()) {
                // print_r($this->input->post());
                // exit;
                $insert['customer_id'] = $this->input->post('customer_id');
                $confirm = $this->input->post('confirm');
                if ($customer_id != $insert['customer_id']) {
                    redirect('booking/booking_confirm/' . $customer_id);
                }

                $session = $this->session->userdata('final_booking_data');
                $insert['package_id'] = $session['package_id'];
                $insert['accommodation_id'] = ($session['accommodation_id'] !="0")? $session['accommodation_id']:"0";
                $insert['departure_id'] = ($session['departure_id'] !="0")? $session['departure_id']:"0";
                $insert['package_type'] = $session['package_type'];
                $insert['currency_id'] = $session['currency_id'];
                $insert['amount'] = $session['amount'];
                $insert['total_amount'] = $session['total_amount'];
                $insert['trip_type'] = $session['trip_type'];
                $insert['arrival_date'] = $session['arrival_date'];
                $insert['depart_date'] = $session['depart_date'];
                $insert['no_of_person'] = $session['no_of_person'];
                $insert['adult'] = $session['adult'];
                $insert['child'] = $session['child'];
                $insert['infant'] = $session['infant'];
                $insert['additional_info'] = $session['additional_info'];
                $insert['extra_facility'] = $session['extra_facility'];
                $insert['referedby'] = $session['referedby'];
                $insert['created'] = $session['created'];
                $insert['delete_status'] = $session['delete_status'];
                $insert['reference_no'] = rand();
                $insert['booking_code'] =  md5(rand());
                $insert['book_from'] =  "Web";

                //package info

                $pinfo['package_name'] = $this->input->post('package_name');
                $pinfo['package_duration'] = $this->input->post('package_duration');
                $pinfo['accommodation'] = $this->input->post('accommodation');
                $pinfo['currency'] = $this->input->post('currency');
                $pinfo['reference_no'] = $insert['reference_no'];



                if ($confirm == "yes") {

                    $insert['booking_status'] = "accepted ";



                    $result = $this->crud->insert($insert,'igc_package_booking');


                    if ($result) {

                        if($insert['departure_id'] !="0")
                        {
                            $departure_detail =  $this->crud->get_detail($insert['departure_id'],'departure_id','igc_package_departure');
                            $total_no =  $departure_detail['available_no'];
                            $update['available_no'] = $total_no - $insert['no_of_person'];
                            $this->crud->update($insert['departure_id'],'departure_id', $update, 'igc_package_departure');
                        }

                        //code to email
                        $session_data = $this->session->userdata('final_booking_data');

                        $receiver_address = $session_data['email'];

                        $this->send_mail($receiver_address, $pinfo);


                        //unset the session of booking
                        $this->session->unset_userdata('booking_data');
                        $this->session->unset_userdata('final_booking_data');


                        $hash_code = $insert['booking_code'];


                        $message['token'] = md5(rand());
                        $message['booking_code'] =  $hash_code;
                        $message['message'] = "Your Booking is Successful.Please check your email.";
                        $message['status'] = "success";
                        $this->session->set_userdata('booking_result', $message);
                        redirect('booking/booking_result/' . $message['token']);
                    }


                    else {

                        //unset the session of booking
                        $this->session->unset_userdata('booking_data');
                        $this->session->unset_userdata('final_booking_data');


                        $message['token'] = md5(rand());
                        $message['message'] = "Unsuccessful booking because of internal problem .Please try again Later.";
                        $message['status'] = "error";
                        $message['booking_code'] =  $insert['booking_code'];
                        redirect('booking/booking_result/' . $message['token']);
                    }
                } else {
                    $insert['booking_status'] = "cancelled";
                    $result = $this->crud->insert($insert, 'igc_package_booking');

                    //unset the session of booking
                    $this->session->unset_userdata('booking_data');
                    $this->session->unset_userdata('final_booking_data');

                    if ($result) {
                        $message['token'] = md5(rand());
                        $message['status'] = "error";
                        $message['booking_code'] = "01546sdasd";
                        $message['message'] = "You have cancel your booking.Thank You.";
                        $this->session->set_userdata('booking_result', $message);
                        redirect('booking/booking_result/' . $message['token']);
                    } else {
                        $message['token'] = md5(rand());
                        $message['status'] = "error";
                        $message['booking_code'] = "01546sdasd";
                        $message['message'] = "You have cancel your booking.Thank You.";
                        $this->session->set_userdata('booking_result', $message);
                        redirect('booking/booking_result/' . $message['token']);
                    }
                }

            }


        }
        $this->check_booking_session();
        $sess_data = $this->session->userdata('final_booking_data');
        $package = $this->crud->get_detail($sess_data['package_id'],'package_id','igc_package');
        $accommodation = $this->crud->get_detail($sess_data['accommodation_id'],'accommodation_id','igc_accommodation_setting');
        $currency = $this->crud->get_detail($sess_data['currency_id'],'currency_id',' igc_currency_setting');
        $data['package_name'] = $package['package_name'];
        $data['package_duration'] = $package['package_duration'];
        $data['accommodation']= (isset($accommodation['name']) && $accommodation['name'] !="")?$accommodation['name']:"N/A";
        $data['currency'] = $currency['code'];
        $data['customer_id']= $customer_id;
        $data['menu']="";
        $data['customer_detail'] =  $this->crud->get_detail($customer_id,'customer_id','igc_site_users');

        $data['session'] =  $this->session->userdata('final_booking_data');
        $data['title'] = "Package Booking Confirm";
        $this->load->view('header', $data);
        $this->load->view('booking/booking_confirm');
        $this->load->view('footer');
    }


    public function check_booking_session()
    {
        if($this->session->userdata('final_booking_data') == "")
        {
            redirect('booking');
        }
    }

    public function booking_result($token)
    {


       $session = $this->session->userdata('booking_result');
        if($token != $session['token'])
        {
            $this->session->unset_userdata('booking_result');
            $data['message_title'] = "";
            $data['message'] = "Bad Request !";
            $data['status'] = "error";
        }
        else{
            $data['message_title'] = "Booking Result";
            $data['message'] = $session['message'];
            $data['booking_code'] = $session['booking_code'];
            $data['status'] = $session['status'];
            //$this->session->unset_userdata('booking_result');
        }


        $data['menu']="";
        $data['title'] = "Package Booking Message";
        $this->load->view('header', $data);
        $this->load->view('booking/booking_result');
        $this->load->view('footer');
    }





    //function to send booking email

    public function send_mail($email, $pinfo)
    {
        $this->load->library('encrypt');

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->site_settings_model->get_mail_info();

        $password = $this->encrypt->decode($server['password']);



        $admin_mails = $this->site_settings_model->get_admin_mails('Booking');


         $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.rupakottravels.com/photo-contest.html');

        $session = $this->session->userdata('final_booking_data');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rupakot Tous and Travels Booking Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff;">
    <div style="margin:0 0 10px"> <img alt="Rupakot Tous and Travels" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p align="center">New booking has been placed by '.$session['customer_title']."."." ".$session['first_name'].'</p>
    <h3 align="center">Your Booking Details</h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tr>
            <td style="border-bottom:1px solid #841212">Reference Number</td>
            <td style="border-bottom:1px solid #841212"> '.$pinfo['reference_no'].'</td>
        </tr>
        <tbody>
        <tr>
            <th style="background:#841212; color: #ffffff;" colspan="2">Passenger Details</th>
        </tr>
        <tr>
            <td width="28%" style="border-bottom:1px solid #841212">Full Name</td>
            <td width="72%" style="border-bottom:1px solid #841212"> '.$session['first_name']." ".$session['middle_name'] ." ". $session['last_name'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Email</td>
            <td style="border-bottom:1px solid #841212">'.$session['email'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Phone No.</td>
            <td style="border-bottom:1px solid #841212">'.$session['contact_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Country.</td>
            <td style="border-bottom:1px solid #841212">'.$session['country'] .'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #841212">City.</td>
            <td style="border-bottom:1px solid #841212">'.$session['city'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Passport No.</td>
            <td style="border-bottom:1px solid #841212">'.$session['passport_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Trip Type.</td>
            <td style="border-bottom:1px solid #841212">'.$session['trip_type'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Additional Info.</td>
            <td style="border-bottom:1px solid #841212">'.$session['additional_info'] .'</td>
        </tr>
        <tr>
            <th style="background:#841212; color: #ffffff;" colspan="2">Package Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Package Name</td>
            <td style="border-bottom:1px solid #841212">'. $pinfo['package_name'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Package Type</td>
            <td style="border-bottom:1px solid #841212">'. $session['package_type'] .'</td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #841212">Package Duration</td>
            <td style="border-bottom:1px solid #841212">'. $pinfo['package_duration'] .'</td>
        </tr>


        


        <tr>
            <td style="border-bottom:1px solid #841212">Arrival Date : </td>
            <td style="border-bottom:1px solid #841212">'.$session['arrival_date'].'</td>
        </tr>

         <tr>
            <td style="border-bottom:1px solid #841212">Deprature Date : </td>
            <td style="border-bottom:1px solid #841212">'.$session['depart_date'].'</td>
        </tr>


        <tr>
            <td style="border-bottom:1px solid #841212">Total Pax</td>
            <td style="border-bottom:1px solid #841212">'.$session['no_of_person'] .'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #841212">Adult</td>
            <td style="border-bottom:1px solid #841212">'.$session['adult'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Children</td>
            <td style="border-bottom:1px solid #841212">'.$session['child'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Infant</td>
            <td style="border-bottom:1px solid #841212">'.$session['infant'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Extra Facility(that you request)</td>
            <td style="border-bottom:1px solid #841212">'.$session['extra_facility'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #841212">Referred By</td>
            <td style="border-bottom:1px solid #841212">'.$session['referedby'].'</td>
        </tr>
        
        <tr>
            <th style="background:#841212; color: #ffffff;" colspan="2">Note</th>
        </tr>
         <tr>
            <td colspan = "4" style="border-bottom:1px solid #841212">(If you are already a registered customer you can login and view your booking status. )</td>
        </tr>

        <tr>
            <td colspan="2" style="background:#841212; text-align:left; color: #ffffff;">Thanks and Regards,<br />
                Rupakot Holidays Team<br />
                Contact Number:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="www.rupakotholidays.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakotholidays.com</a></td>
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


        $address = $email;

        $mail->AddAddress($address, $server['send_from_name']);

        foreach($admin_mails as $bcc)
        {
            $mail->AddBCC($bcc['email'], $bcc['full_name']);
        }

        $mail->send();




//     if($mail->Send())
//     {
//         echo "success";
//         exit;
//     }
//        else{
//            echo "Mailer Error: " . $mail->ErrorInfo;
//            exit;
//        }

    }


    //function to send booking accepted email

    public function send_payment_link_mail($hash_code)
    {

        $this->load->library('encrypt');

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->site_settings_model->get_mail_info();

        $password = $this->encrypt->decode($server['password']);

        $server_url = base_url().'index.php/payment/index/'.$hash_code;

        $result = $this->package->check_cipher($hash_code);

        $customer_detail =  $this->crud->get_detail($result['customer_id'], 'customer_id','igc_site_users');

        $email = $customer_detail['email'];

        $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.rupakottravels.com/photo-contest.html');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Booking Payment Link</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">

  <div style="margin:0 0 10px"> <img alt="Rupakot Tous and Travels" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$customer_detail['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #800000">Reference Number:</td>
            <td style="border-bottom:1px solid #800000"> '.$result['reference_no'].'</td>
        </tr>
        <tr>
           <p>
          In order to proceed the payment for your booking please click the payment Link. '.'<a href="'.$server_url.'">'.$server_url.'</a>'.'</p>
        </tr>


        <tr>
            <td colspan="2" style="background:#800000; text-align:left; color: #ffffff;">Thanks and Regards,<br />
                Rupakot Tous and Travels Team<br />
                Contact Number:<strong>+977-01-4437892</strong><br />
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

        $mail->Subject    = $site_settings['site_name']." Booking Payment Link";


        $mail->MsgHTML($body);

        $address = $email;

        $mail->AddAddress($address, $site_settings['site_name']);

        if(!$mail->Send())
        {

            $data['message']= "Unable to Send Payment Link Email.Please Check Your Internet Connection";
            $data['status'] = "error";
            $data['title'] = "Payment Process Result";
            $this->load->view('header', $data);
            $this->load->view('booking/booking_result');
            $this->load->view('footer');

        }

        else{

          redirect('home');
        }


    }


public function check_available($str, $departure_id)
{
   if($departure_id !="0")
   {
     $departure_detail =  $this->crud->get_detail($departure_id,'departure_id','igc_package_departure');
       if($str > $departure_detail['available_no'])
       {
           $this->form_validation->set_message('check_available', 'Booking can be available for '. $departure_detail['available_no']. ' pax only');
           return FALSE;
       }
       else{
           return TRUE;
       }
   }
    else
    {
        return TRUE;
    }
}





}
?>
