<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('hotel_model','hotel');
        $this->load->model('crud_model','crud');
        $this->load->model('login_model', 'login');
    }

    public  $table = "igc_hotel";

    public  $redirect = "hotel";

    public function index()
    {

        $data['hotel'] = $this->hotel->get_detail('igc_hotel');
        $data['currency'] = $this->crud->get_all('igc_currency_setting');
        $data['country'] = $this->hotel->get_country();
        $data['category'] = $this->hotel->get_hotel_category();
        $this->load->view('header', $data);
        $this->load->view('hotel/hotel_list');
        $this->load->view('footer');
    }

    public function detail($slug){


        $this->load->library('form_validation');

        if($this->input->post())
        {

            $this->form_validation->set_rules('hotel_id', 'Hotel', 'required');
            $this->form_validation->set_rules('hotel_room_id', 'Hotel Room', 'required');
            $this->form_validation->set_rules('currency_id', 'Currency Type', 'required');
            $this->form_validation->set_rules('max_pax', 'Maximum Person', 'required');
            $this->form_validation->set_rules('room_price', 'Room Price', 'required');
            $this->form_validation->set_rules('available_room', 'Availble Room', 'required');

            if($this->form_validation->run()) {

                $hotel_session['available_room'] = $this->input->post('available_room');
                if($hotel_session['available_room'] ==0 || $hotel_session['available_room'] <0)
                {
                    redirect('hotel');
                }
                $hotel_session['hotel_id'] = $this->input->post('hotel_id');
                $hotel_session['hotel_room_id'] = $this->input->post('hotel_room_id');
                $hotel_session['currency_id'] = $this->input->post('currency_id');
                $hotel_session['max_pax'] = $this->input->post('max_pax');
                $hotel_session['room_price'] = $this->input->post('room_price');
                $hotel_session['discount_price'] = $this->input->post('discount_price');
                $hotel_session['extra_bed_price'] = $this->input->post('extra_bed_price');
                $this->session->set_userdata('hotel_booking',$hotel_session);
                redirect('hotel/booking');
            }




        }

        $detail= $this->crud->get_active_not_deleted_details($slug, 'slug', 'igc_hotel');
        if(empty($detail)) {
            redirect('hotel');
        }
        $hotel_id = $detail['id'];
        $data['hotel_id'] = $detail['id'];
        $data['albums'] = $this->hotel->get_hotel_albums_images($hotel_id);
        $data['category'] = $this->crud->get_all('igc_hotel_setting');
        $data['features'] = $this->crud->get_not_deleted('igc_features_setting');
        $data['hotel_features'] = $this->crud->get_all('hotel_features');
        $data['features_name'] = $this->hotel->get_features_name();
        $room_detail = $this->crud->get_detail($hotel_id, 'hotel_id', 'igc_hotel_room');


        $data['rooms'] = $this->crud->get_active_not_delete_records($hotel_id, 'hotel_id', 'igc_hotel_room');

        $data['room_setting'] = $this->crud->get_all('igc_room_setting');
        $data['currency'] = $this->crud->get_all('igc_currency_setting');


        $data['detail'] = $detail;

        $data['styles'] =  array('themes/css/fancy-box/jquery.fancybox.css?v=2.1.5');
        $data['scripts'] =  array('themes/js/fancy-box/jquery-1.10.1.min','themes/js/fancy-box/jquery.mousewheel-3.0.6.pack','themes/css/fancy-box/jquery.fancybox.js?v=2.1.5');

        $this->load->view('header', $data);
        $this->load->view('hotel/hotel_detail');
        $this->load->view('footer');

    }


    public function search()
    {

        if($this->input->post())
        {
            // print_r($this->input->post());
            // exit;
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $rating = $this->input->post('rating');
            $price_from = $this->input->post('price_from');
            $price_to = $this->input->post('price_to');
            $term = clean($this->input->post('term'));

            $data['hotel']= $this->hotel->get_search_hotels($country, $city, $rating, $price_from, $price_to);

            $data['currency'] = $this->crud->get_all('igc_currency_setting');
            $data['sub_title'] =  "Search Result"." ";
            $data['menu']="";
            $this->load->view('header', $data);
            $this->load->view('hotel/search_list');
            $this->load->view('footer');

        }
    }

    //code for booking

    public function booking()
    {
        //check booking session
        $hotel_session = $this->session->userdata('hotel_booking');



        if($hotel_session == "")
        {
            redirect('home');
        }
        $this->load->helper('date');
        $this->load->library('form_validation');

        if($this->input->post()) {

//            print_r($this->input->post());
//            exit();

            $this->form_validation->set_rules('check_in', 'Check In', 'trim|required');
            $this->form_validation->set_rules('checkout', 'CheckOut', 'required');
            $this->form_validation->set_rules('no_of_room', 'No of Room', 'trim|required');
            $this->form_validation->set_rules('pax_no', 'No of Room', 'trim|required');
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

            if ($this->form_validation->run()) {

                    if(isset($hotel_session['extra_bed_price']) && $hotel_session['extra_bed_price'] !="")
                    {
                       $extra_bed_no =  $this->input->post('extra_bed_no');
                    }
                    else{
                        $extra_bed_no = "0";
                    }
                    $customer_id = $this->input->post('customer_id');
                    $no_of_room =  $this->input->post('no_of_room');
                    if($no_of_room > $hotel_session['available_room'])
                    {
                        redirect('hotel/booking');
                    }
                    $insert['check_in'] = date("Y-m-d", strtotime($this->input->post('check_in')));
                    $insert['checkout'] = date("Y-m-d", strtotime($this->input->post('checkout')));

                     $date1 =  strtotime($insert['check_in']);
                     $date2 =  strtotime($insert['checkout']);

                     $difference =  $date2 - $date1;

                     $days =  $difference/ (24 * 60 * 60);

                    $total_extra_bed_price =  $extra_bed_no * $hotel_session['extra_bed_price'] * $days;
                    $total_room_price = $no_of_room * $hotel_session['room_price'] * $days;
                    $total_amount = $total_room_price +  $total_extra_bed_price;

                    $insert['no_of_room'] = $no_of_room;
                    $insert['total_amount'] = $total_amount;
                    $insert['pax_no'] = $this->input->post('pax_no');
                    $insert['extra_bed_no'] =  $extra_bed_no;
                    $insert['no_of_nights'] =  $days;
                    $insert['hotel_name'] = $this->input->post('hotel_name');
                    $insert['currency_code'] = $this->input->post('currency_code');
                    $insert['room_name'] = $this->input->post('room_name');


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



                    }
                    else {
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
                    $insert['hotel_id'] = $hotel_session['hotel_id'];
                    $insert['hotel_room_id'] = $hotel_session['hotel_room_id'];
                    $insert['currency_id'] = $hotel_session['currency_id'];
                    $insert['room_price'] = $hotel_session['room_price'];
                    $insert['discount_price'] = $hotel_session['discount_price'];
                    $insert['extra_bed_price'] = $hotel_session['extra_bed_price'];
                    $insert['max_pax'] = $hotel_session['max_pax'];



//                print_r($insert);
//                exit();


                    $this->session->set_userdata('hotel_final_booking_data', $insert);

                    if ($customer_id == "") {
                        redirect('hotel/booking_option');
                    } else {
                        redirect('hotel/booking_confirm/' . $customer_id);
                    }





            }
        }


        $hotel_detail = $this->crud->get_detail($hotel_session['hotel_id'], 'id', 'igc_hotel');
        $room_detail = $this->hotel->get_hotel_room_detail($hotel_session['hotel_id'],$hotel_session['hotel_room_id']);
        $currency = $this->crud->get_detail($hotel_session['currency_id'],'currency_id','igc_currency_setting');
        $data['title'] = $hotel_detail['name'];
        $data['hotel_name'] = $hotel_detail['name'];;
        $data['meta_title'] = $hotel_detail['meta_description'];
        $data['meta_description'] = $hotel_detail['meta_description'];
        $data['meta_keywords'] = $hotel_detail['meta_keywords'];
        $data['room_price'] = $hotel_session['room_price'];
        $data['currency_code']= $currency['code'];
        $data['hotel_id'] = $hotel_session['hotel_id'];
        $data['room_name'] =  $room_detail['name'];
        $data['max_pax'] =  $hotel_session['max_pax'];
        $data['available_room'] =  $hotel_session['available_room'];
        $data['extra_bed_price']  = $hotel_session['extra_bed_price'];

        //code to load extra script in header
        $data['styles'] =  array('themes/css/jquery-ui');

        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator','themes/js/jquery-ui.min');
        $data['menu']="";
        $data['customer_id'] =  $this->session->userdata('customer_id');
        $this->load->view('header', $data);
        $this->load->view('booking/hotel/hotel_booking_form');
        $this->load->view('footer');
    }


    public function booking_option()
    {
        if($this->session->userdata('customer_id') !="")
        {
            redirect('hotel/booking_confirm/'.$this->session->userdata('customer_id'));
        }

        $this->check_booking_session();

        $session = $this->session->userdata('hotel_final_booking_data');

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

                }
                else {

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
                        redirect('hotel/booking_confirm/' . $result);
                    } else {
                        redirect('booking/booking_option');
                    }


                }
            }

        }
        $data['title'] = "Hotel Booking Option";
        $data['name'] = $session['hotel_name'];
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
        $session = $this->session->userdata('hotel_final_booking_data');
        if($this->input->post())
        {
            $this->form_validation->set_rules('password', 'Password','required');


            if ($this->form_validation->run()) {


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
                    redirect('hotel/booking_confirm/' . $result);
                } else {
                    redirect('booking/booking_option');
                }
            }


        }


        $data['name'] = $session['hotel_name'];
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
        $data['menu']="";
        $this->load->view('header', $data);
        $this->load->view('booking/register_form');
        $this->load->view('footer');
    }



    public function booking_confirm($customer_id)
    {

        $this->load->library('form_validation');

        $session = $this->session->userdata('hotel_final_booking_data');

        if($this->input->post())
        {
            $this->form_validation->set_rules('confirm', 'Booking Confirm','required');


            if ($this->form_validation->run()) {
                // print_r($this->input->post());
                // exit;
                $insert['customer_id'] = $this->input->post('customer_id');
                $confirm = $this->input->post('confirm');
                if ($customer_id != $insert['customer_id']) {
                    redirect('hotel/booking_confirm/' . $customer_id);
                }


                $insert['hotel_id'] = $session['hotel_id'];
                $insert['hotel_room_id'] = $session['hotel_room_id'];
                $insert['check_in'] = $session['check_in'];
                $insert['check_out'] = $session['checkout'];
                $insert['total_amount'] = $session['total_amount'];
                $insert['currency_id'] = $session['currency_id'];
                $insert['no_of_room'] = $session['no_of_room'];
                $insert['extra_bed_no'] = $session['extra_bed_no'];
                $insert['no_of_nights'] = $session['no_of_nights'];
                $insert['max_pax'] = $session['max_pax'];
                $insert['pax_no'] = $session['pax_no'];
                $insert['additional_info'] = $session['additional_info'];
                $insert['referedby'] = $session['referedby'];
                $insert['created'] = $session['created'];
                $insert['delete_status'] = $session['delete_status'];
                $insert['reference_no'] = rand();
                $insert['booking_code'] =  md5(rand());
                $insert['book_from'] =  "Web";

                //package info

                $pinfo['hotel_name'] = $session['hotel_name'];
                $pinfo['room_name'] = $session['room_name'];
                $pinfo['currency'] =  $session['currency_code'];
                $pinfo['reference_no'] = $insert['reference_no'];



                if ($confirm == "yes") {

                    $insert['booking_status'] = "accepted ";



                    $result = $this->crud->insert($insert,'igc_hotel_booking');


                    if ($result) {

                        $available_room =  $this->hotel->get_hotel_booked_data($insert['hotel_id'], $insert['hotel_room_id']);

                        $room_update['available_room'] =  $available_room['available_room'] - $insert['no_of_room'];

                        $this->hotel->update_hotel_room($insert['hotel_id'], $insert['hotel_room_id'] , $room_update);


                        //code to email

                        $receiver_address = $session['email'];

                        $this->send_mail($receiver_address, $pinfo);


                        //unset the session of booking
                        $this->session->unset_userdata('hotel_booking');
                        $this->session->unset_userdata('hotel_final_booking_data');


                        $hash_code = $insert['booking_code'];


                        $message['token'] = md5(rand());
                        $message['booking_code'] =  $hash_code;
                        $message['message'] = "Your Booking is Successful.Please check your email.";
                        $message['status'] = "success";
                        $this->session->set_userdata('hotel_booking_result', $message);
                        redirect('hotel/booking_result/' . $message['token']);
                    }


                    else {

                        //unset the session of booking
                        $this->session->unset_userdata('hotel_booking');
                        $this->session->unset_userdata('hotel_final_booking_data');


                        $message['token'] = md5(rand());
                        $message['message'] = "Unsuccessful booking because of internal problem .Please try again Later.";
                        $message['status'] = "error";
                        $message['booking_code'] =  $insert['booking_code'];
                        redirect('hotel/booking_result/' . $message['token']);
                    }
                }
                else {
                    $insert['booking_status'] = "cancelled";
                    $result = $this->crud->insert($insert, 'igc_hotel_booking');

                    //unset the session of booking
                    $this->session->unset_userdata('hotel_booking');
                    $this->session->unset_userdata('hotel_final_booking_data');

                    if ($result) {
                        $message['token'] = md5(rand());
                        $message['status'] = "error";
                        $message['booking_code'] = "01546sdasd";
                        $message['message'] = "You have cancel your booking.Thank You.";
                        $this->session->set_userdata('hotel_booking_result', $message);
                        redirect('hotel/booking_result/' . $message['token']);
                    } else {
                        $message['token'] = md5(rand());
                        $message['status'] = "error";
                        $message['booking_code'] = "01546sdasd";
                        $message['message'] = "You have cancel your booking.Thank You.";
                        $this->session->set_userdata('hotel_booking_result', $message);
                        redirect('hotel/booking_result/' . $message['token']);
                    }
                }

            }


        }
        $this->check_booking_session();
        $data['customer_id']= $customer_id;
        $data['menu']="";
        $data['customer_detail'] =  $this->crud->get_detail($customer_id,'customer_id','igc_site_users');

        $data['session'] =  $session;

//        print_r($session);
//        exit();

        $data['title'] = "Hotel Booking Confirm";
        $this->load->view('header', $data);
        $this->load->view('booking/hotel/hotel_booking_confirm');
        $this->load->view('footer');
    }

    public function booking_result($token)
    {


        $session = $this->session->userdata('hotel_booking_result');
        if($token != $session['token'])
        {
            $this->session->unset_userdata('hotel_booking_result');
            $data['message_title'] = "";
            $data['message'] = "Bad Request !";
        }
        else{
            $data['message_title'] = "Booking Result";
            $data['message'] = $session['message'];
            $data['booking_code'] = $session['booking_code'];
            $data['status'] = $session['status'];
            $this->session->unset_userdata('hotel_booking_result');
        }


        $data['menu']="";
        $data['title'] = "Hotel Booking Message";
        $this->load->view('header', $data);
        $this->load->view('booking/hotel/booking_result');
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

        $session = $this->session->userdata('hotel_final_booking_data');

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rupakot Tours and Travels Hotel Booking Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    <div style="margin:0 0 10px"> <img alt="Rupakot Tours and Travels" src="'.site_url().'themes/images/logos/navbar-logo.png"> </div>
    <p align="center">New booking has been placed by '.$session['customer_title']."."." ".$session['first_name'].'</p>
    <h3 align="center">Your Booking Details</h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tr>
            <td style="border-bottom:1px solid #800000">Reference Number</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['reference_no'].'</td>
        </tr>
        <tbody>
        <tr>
            <th style="background:#800000" colspan="2">Pax Details</th>
        </tr>
        <tr>
            <td width="28%" style="border-bottom:1px solid #800000">Full Name</td>
            <td width="72%" style="border-bottom:1px solid #800000"> '.$session['first_name']." ".$session['middle_name'] ." ". $session['last_name'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Email</td>
            <td style="border-bottom:1px solid #800000">'.$session['email'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Phone No.</td>
            <td style="border-bottom:1px solid #800000">'.$session['contact_no'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Country.</td>
            <td style="border-bottom:1px solid #800000">'.$session['country'] .'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #800000">City.</td>
            <td style="border-bottom:1px solid #800000">'.$session['city'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Passport No.</td>
            <td style="border-bottom:1px solid #800000">'.$session['passport_no'].'</td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #800000">Additional Info.</td>
            <td style="border-bottom:1px solid #800000">'.$session['additional_info'] .'</td>
        </tr>
        <tr>
            <th style="background:#800000" colspan="2">Hotel  Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Hotel Name</td>
            <td style="border-bottom:1px solid #800000">'. $pinfo['hotel_name'] .'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Room</td>
            <td style="border-bottom:1px solid #800000">'. $session['room_name'] .'</td>
        </tr>


        <tr>
            <td style="border-bottom:1px solid #800000">Check In Date : </td>
            <td style="border-bottom:1px solid #800000">'.$session['check_in'].'</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Check Out Date : </td>
            <td style="border-bottom:1px solid #800000">'.$session['checkout'].'</td>
        </tr>


        <tr>
            <td style="border-bottom:1px solid #800000">No of Room</td>
            <td style="border-bottom:1px solid #800000">'.$session['no_of_room'] .'</td>
        </tr>
          <tr>
            <td style="border-bottom:1px solid #800000">No of Nights</td>
            <td style="border-bottom:1px solid #800000">'.$session['no_of_nights'] .'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">No of Extra Beds</td>
            <td style="border-bottom:1px solid #800000">'.$session['extra_bed_no'] .'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Pax No Per Room</td>
            <td style="border-bottom:1px solid #800000">'.$session['pax_no'].'</td>
        </tr>


        <tr>
            <td style="border-bottom:1px solid #800000">Referred By</td>
            <td style="border-bottom:1px solid #800000">'.$session['referedby'].'</td>
        </tr>
        <tr>
            <th style="background:#800000" colspan="2">Payment Details</th>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #800000">Total Amount</td>
            <td style="border-bottom:1px solid #800000"> '.$session['total_amount']." ". $session['currency_code'].'</td>
        </tr>
        <tr>
            <th style="background:#800000" colspan="2">Note</th>
        </tr>
         <tr>
            <td colspan = "4" style="border-bottom:1px solid #800000">(If you are the registered customer you can login and can view your booking status. )</td>
        </tr>

        <tr>
            <td colspan="2" style="background:#800000; text-align:left;">Thanks and Regards,<br />
                Rupakot Tours and Travels<br />
                Tel:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
        </tr>
        <tr>
            <td colspan="2" style="background:#800000; text-align:left;"><br />
                Rupakot Tours and Travels<br />
                Tel:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="http://www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
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

        $mail->Subject    = $site_settings['site_name']." Hotel Booking";


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

        $server_url = base_url().'index.php/payment/hotel/'.$hash_code;

        $result = $this->crud->get_detail($hash_code, 'booking_code', 'igc_hotel_booking');

        $customer_detail =  $this->crud->get_detail($result['customer_id'], 'customer_id','igc_site_users');

        $email = $customer_detail['email'];

        $this->load->library('mailer');

        $mail  = new PHPMailer();

        //$body = file_get_contents('https://www.rupakottravels.com/photo-contest.html');


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Hotel Booking Payment Link</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">

     <div style="margin:0 0 10px"> <img alt="Rupakot Tours and Travels" src="'.$site_settings['site_url'].'themes/images/logos/navbar-logo.png"> </div>
    <p>Dear '.$customer_detail['first_name'].'</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
         <tr>
            <td style="border-bottom:1px solid #800000">Reference Number:</td>
            <td style="border-bottom:1px solid #800000"> '.$result['reference_no'].'</td>
        </tr>
        <tr>
           <p>
          In order to procced the payment for your booking please click the payment Link. '.'<a href="'.$server_url.'">'.$server_url.'</a>'.'</p>
        </tr>


        <tr>
            <td colspan="2" style="background:#800000; text-align:left;">Thanks and Regards,<br />
                Rupakot Tours and Travels<br />
                Tel:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
        </tr>
        <tr>
            <td colspan="2" style="background:#800000; text-align:left;"><br />
                Rupakot Tours and Travels<br />
                Tel:<strong>+977 -1-4440671, 4440672</strong><br />
                <a href="http://www.rupakottravels.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.rupakottravels.com</a></td>
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

        $mail->Subject    = $site_settings['site_name']." Hotel Booking Payment Link";


        $mail->MsgHTML($body);

        $address = $email;

        $mail->AddAddress($address, $site_settings['site_name']);

        if(!$mail->Send())
        {

            $data['message']= "Unable to Send Payment Link Email.Please Check Your Internet Connection";
            $data['status'] = "error";
            $data['title'] = "Payment Process Result";
            $this->load->view('header', $data);
            $this->load->view('booking/hotel/booking_result');
            $this->load->view('footer');

        }

        else{

            redirect('home');
        }


    }

    public function check_booking_session()
    {
        if($this->session->userdata('hotel_final_booking_data') == "")
        {
            redirect('hotel/booking');
        }
    }

}
