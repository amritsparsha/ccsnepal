<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('package_model','package');
        $this->load->model('crud_model', 'crud');
        $this->load->model('content_model','content'); 
        $this->load->model('site_settings_model','site_settings');
        $this->load->model('news_model','news');
        $this->load->model('career_resources_model','career_resources');
        $this->load->model('loksewa_resources_model','loksewa_resources');



    }
    

    public function search_ajax()
    {
        $search = $this->input->post('search');
        if($search != '')
        {           
            $data=$this->crud->search($search);

            $output='';

            foreach ($data as $key => $value) 
            {
                $output .= '<li class="list-group-item"><a href="'.site_url('jobs/'.$value['job_id']).'" target="_blank">'.$value['job_title'].'</a></li>';
            }

            echo $output; 
        }
    }

    public function index()
    {

        $data['scripts'] = array('form_validator','validate');
         

        $data['inbound_categories'] = $this->package->get_show_front('RP',0,6);
        $data['outbound_categories'] = $this->package->get_show_front('OB',0,99); 
        $data['other_categories'] = $this->package->get_show_front('OTH',0,3);
        $data['special_packages'] = $this->package->get_package_info('special', '0', '6');
        $data['adventures'] =  $this->package->get_adventure_front(0, 8);
        $data['forex_detail'] = $this->crud->get_forex(date('Y-m-d'), 0, 4);
        $data['tour_fixed_departure'] = $this->package->show_front_departures('tour','0','4');
        $data['trek_fixed_departure'] = $this->package->show_front_departures('trek','0','4');
        $data['services_offers']= $this->content->get_service_offer_list('0','10');
        $data['emagazine'] = $this->content->get_emagazine();
        $data['sliders'] = $this->crud->get_active_records('igc_slider');

        //datas
        $data['recent_jobs'] = $this->crud->get_where_order_limit('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC",9);
        $data['comp_categories'] =$this->crud->get_where('tbl_company_category',array('delete_status'=>0,'publish_status'=>1));
        $data['location_jobs']=$this->crud->get_job_location();
        $data['latest_news']=$this->news->get_latest_news(3);
        $data['latest_resources']=$this->career_resources->get_latest_resources(3);
        $data['latest_loksewa']=$this->loksewa_resources->get_latest_resources(3);

        $popup = $this->crud->get_popup();
        if(!empty($popup)){
            $data['popup'] = $popup;
            $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator','themes/js/fancy-box/jquery-1.10.1.min','themes/js/fancy-box/jquery.mousewheel-3.0.6.pack','themes/css/fancy-box/jquery.fancybox.js?v=2.1.5');
            $data['styles'] =  array('themes/css/fancy-box/jquery.fancybox.css?v=2.1.5');

        }else{
            $data['popup'] = $popup;
           $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');

        }

        $data['menu'] = "home";
        $data['auto'] = $this->crud->get_all('igc_destination');
        $data['auto'] = $this->crud->get_all('igc_regions');


        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function get_jobs_location_wise()
    {
         $jobs = $this->crud->get_where_order('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC");
         $location=array();
         foreach ($jobs as $key => $job) 
         {
            $place=strtolower($job['job_location']);

            if(!array_key_exists($place,$location))
            {
                 $location[$place]=$job;
            }
            else
            {
                $location[$place]['child'][]=$job;
            }
         }
         return $location;
       //  $time=microtime();
       // foreach ($location as $key => $value) 
       // {
       //      echo $value['job_id']."=>".$value['job_location']."=>".$value['job_title']."<br/>";
       //      if(is_array($value['child']))
       //      {
       //          foreach ($value['child'] as $key => $val) 
       //          {
       //              echo "Child=====>".$val['job_id']."=>".$val['job_location']."=>".$val['job_title']."<br/>";
       //          }
       //      }    
       // }
    }

    public function Getdestination(){
        $keyword=$this->input->post('keyword');
        $data=$this->crud->Getdestination($keyword);

            echo(json_encode($data));

    }

    public function Getregion(){
        $keyword=$this->input->post('keyword');
        $data=$this->crud->Getregion($keyword);

            echo(json_encode($data));

    }

    public function categories($slug)
    {

            $data['categories'] = $this->crud->get_active_not_delete_records($slug,'category_code', 'igc_package_category');
            $data['menu'] = "";
            $this->load->view('header', $data);
            $this->load->view('package/all_categories');
            $this->load->view('footer');


    }

//    public function captcha_setting()
//    {
//        $this->load->helper('captcha');
//
//        $values = array(
//            'word' => '',
//            'word_length' => 4,
//            'img_path' => 'img/captcha/',
//            'img_url' => base_url() .'img/captcha/',
//            'font_path' => base_url() . 'system/fonts/texb.ttf',
//
//            'img_width' => '175',
//            'img_height' => 55,
//            'expiration' => 3600
//        );
//        $data = create_captcha($values);
//
//
//        $this->session->set_userdata('captcha', $data);
//
//        echo $data['image'];
//
//    }



public function feedback()
    {
        $this->load->library('form_validation');
        if($this->input->post()) {
            
            $this->form_validation->set_rules('enquiry_type', 'Enquiry Type', 'trim');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
	    $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim');
            $this->form_validation->set_rules('message', 'Message', 'trim');
            if ($this->form_validation->run()) {


                $enquiry_type = $this->input->post('enquiry_type');
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $email = $this->input->post('email');
                $contact_number = $this->input->post('contact_number');
                $message= $this->input->post('message');
                
                
                $insert['enquiry_type'] = $enquiry_type;
                $insert['first_name'] = $first_name;
                $insert['last_name'] = $last_name;
                $insert['email'] = $email;
                $insert['contact_number'] = $contact_number;
                $insert['message'] = $message;
                
                $insert['created'] = date('Y-m-d:H:i:s');
                
                $insert['delete_status'] = '0';
                $result = $this->crud->insert($insert, 'igc_quick_contact_message');
                if ($result) {
                    
                   $feedback_email = $this->input->post('email');
                   $feedback_email_admin = "rupakotholidays@gmail.com";

                        // print_r($feedback_email);
                        // exit();

//                      $mail_send = $this->send_mail($feedback_email);
                        $this->feed_mail($feedback_email);

                        $this->admin_feed_mail($feedback_email_admin);
                    
                    $this->session->set_flashdata('success', 'Your feedback successfully send.');
                    redirect('home');
                } else {
                    $this->session->set_flashdata('error', 'Unable to send in feedback ');
                    redirect('home');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Invalid Email.');
                redirect('home');
            }
        }
    }
    
    
    
    public function feed_mail($feedback_email)
    {
        $this->load->library('encrypt');

        $site_settings = $this->site_settings->get_site_settings();

        $server = $this->site_settings->get_mail_info();

        $password = $this->encrypt->decode($server['password']);



        $admin_mails = $this->site_settings->get_admin_mails('Booking');


        $this->load->library('mailer');

        $mail  = new PHPMailer();

        

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Feedback Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    <div style="margin:0 0 10px"> <img alt="" src="'.base_url().'theme/img/logo.png"> </div>
    <p align="center">Congratulations !! Feedback Successfully Submitted</p>
    <p align="center">Our Customer Support Team will contact to you soon. Thank you very much to giving feedback to us.</p>
    <h3 align="center">Your Feedback Details </h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <p>Dear, '.$this->input->post('first_name').'</p>
        <p><strong>First Name:</strong>  '.$this->input->post('first_name').'</p>
        <p><strong>Last NAme:</strong>  '.$this->input->post('last_name').'</p>
        <p><strong>Enquiry Type:</strong> '.$this->input->post('enquiry_type').'</p>
        <p><strong>Email:</strong> '.$this->input->post('email').'</p>
        <p><strong>Contact Number:</strong> '.$this->input->post('cotact_number').'</p>
              
         
        
        <tr>
            <td>
            
             <p><h3>Message:</h3> '.$this->input->post('message').'</p>
           
            </td>
        </tr>
        <tr>
            
            
            
      <td colspan="2" style="background:#EEE; text-align:left;">
            
Thanking you<br />
 '.$site_settings['contact_details'].'</td>
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

        $mail->Subject    = "New feedback to ".$site_settings['site_name'];


        $mail->MsgHTML($body);


        $address = $feedback_email;

        $mail->AddAddress($address, $server['send_from_name']);
//        print_r( $mail);
//        exit();
        // foreach($admin_mails as $bcc)
        // {
        //     $mail->AddBCC($bcc['email'], $bcc['full_name']);
        // }

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
    
    
    
     public function admin_feed_mail($feedback_email_admin)
    {
        $this->load->library('encrypt');

        $site_settings = $this->site_settings->get_site_settings();

        $server = $this->site_settings->get_mail_info();

        $password = $this->encrypt->decode($server['password']);



        $admin_mails = $this->site_settings->get_admin_mails('Booking');


        $this->load->library('mailer');

        $mail  = new PHPMailer();

        

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Feedback Confirmation</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    
   
    <h3 align="center">New Feedback Details </h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
         <p>Dear, '.$this->input->post('first_name').'</p>
        <p><strong>First Name:</strong>  '.$this->input->post('first_name').'</p>
        <p><strong>Last NAme:</strong>  '.$this->input->post('last_name').'</p>
        <p><strong>Enquiry Type:</strong> '.$this->input->post('enquiry_type').'</p>
        <p><strong>Email:</strong> '.$this->input->post('email').'</p>
        <p><strong>Contact Number:</strong> '.$this->input->post('cotact_number').'</p>
              
         
        
        <tr>
            <td>
            
             <p><h3>Message:</h3> '.$this->input->post('message').'</p>
           
            </td>
        </tr>
        <tr>
        

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

        $mail->Subject    = "New Feedback feedback to ".$site_settings['site_name'];


        $mail->MsgHTML($body);


        $address = $feedback_email_admin;

        $mail->AddAddress($address, $server['send_from_name']);
//        print_r( $mail);
//        exit();
        // foreach($admin_mails as $bcc)
        // {
        //     $mail->AddBCC($bcc['email'], $bcc['full_name']);
        // }

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

    




















    public function subscribe()
    {
        $this->load->library('form_validation');
        if($this->input->post()) {


            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

            if ($this->form_validation->run()) {


                $email = $this->input->post('email');

                $check_email = $this->crud->get_not_deleted_detail($email, 'email', 'igc_subscribe_users');

                if (!empty($check_email)) {
                    $this->session->set_flashdata('error', 'Email already exist.');
                    redirect('home');
                } else {
                    $insert['email'] = $email;
                    $insert['created'] = date('Y-m-d:H:i:s');
                    $insert['active_status'] = '0';
                    $insert['delete_status'] = '0';
                    $result = $this->crud->insert($insert, 'igc_subscribe_users');
                    if ($result) {
                        $this->session->set_flashdata('success', 'You are successfully registered in Subscribe Users.');
                        redirect('home');
                    } else {
                        $this->session->set_flashdata('error', 'Unable to registered in Subscribe Users');
                        redirect('home');
                    }
                }
            }
            else{
                $this->session->set_flashdata('error', 'Invalid Email.');
                redirect('home');
            }
        }
    }

    //function to send Quick Contact email

//    public function send_contact_mail($pinfo)
//    {
//        $this->load->library('encrypt');
//
//        $site_settings = $this->settings->get_site_settings();
//        $server = $this->package->get_mail_info();
//
//        $password = $this->encrypt->decode($server['password']);
//
//        $admin_mails = $this->package->get_admin_mails('Quick Contact');
//
//
//        $this->load->library('mailer');
//
//        $mail  = new PHPMailer();
//
//        $body = '<!DOCTYPE HTML>
//<html>
//<head>
//    <meta charset="utf-8">
//    <title>SansuiTrek Booking Confirmation</title>
//</head>
//
//<body>
//<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
//    <div style="margin:0 0 10px"> <img alt="SansuiTrek" src="'.base_url().'img/logo.png"> </div>
//
//    <h3 align="center">'.$site_settings['site_name'].' Quick Contact Details</h3>
//    <table width="100%" cellspacing="0" cellpadding="5" border="0">
//        <tr>
//            <td style="border-bottom:1px solid #800000">Email</td>
//            <td style="border-bottom:1px solid #800000"> '.$pinfo['email'].'</td>
//        </tr>
//        <tbody>
//
//
//        <tr>
//            <td style="border-bottom:1px solid #800000">Subject</td>
//            <td style="border-bottom:1px solid #800000">'.$pinfo['subject'].'</td>
//        </tr>
//
//        <tr>
//            <th style="background:#800000" colspan="2">Message</th>
//        </tr>
//         <tr>
//            <td colspan = "4" style="border-bottom:1px solid #800000">'.$pinfo['message'].'</td>
//        </tr>
//
//        <tr>
//            <td colspan="2" style="background:#800000; text-align:left;">Thanks and Regards,<br />
//                SunsuiTrek<br />
//                Tel:<strong>+977-1-4414739 / 4005043/44</strong><br />
//                <a href="http://sansuitrek.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.sansuitrek.com</a></td>
//        </tr>
//        <tr>
//            <td colspan="2" style="background:#800000; text-align:left;"><br />
//                IGC Technology<br />
//                Tel:<strong>+977-01-4437892</strong><br />
//                <a href="http://igctech.com.np/" target="_blank" style="color:#46216F; text-decoration:underline;">www.igctech.com.np</a></td>
//        </tr>
//
//
//        </tbody>
//    </table>
//</div>
//</body>
//</html>' ;
//
//
//
//
//
//        if($server['smtp_connect'] == "true")
//        {
//            $mail->IsSMTP(); // telling the class to use SMTP
//        }
//        // $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
//
//        $mail->SMTPAuth   = true;                  // enable SMTP authentication
//
//        $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier
//
//        $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server
//
//        $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server
//
//        $mail->Username   = $server['username'];  // GMAIL username
//
//        $mail->Password   = $password;          // GMAIL password
//
//        $mail->SetFrom($server['send_from_email'], $server['send_from_name']);
//
//        $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);
//
//        $mail->Subject    = $site_settings['site_name']." Quick Contact";
//
//
//        $mail->MsgHTML($body);
//
//
//        foreach($admin_mails as $address)
//        {
//        $mail->AddAddress($address['email'], $server['send_from_name']);
//
//        }
//
//
//
//        $mail->Send();
//
//    }
//




}
?>
