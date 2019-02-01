<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('package_model','package');
        $this->load->model('crud_model', 'crud');
        $this->load->model('content_model','content');


    }

    public function index()
    {

        $data['scripts'] = array('form_validator','validate');

        $data['inbound_categories'] = $this->package->get_show_front('IH',0,6);
        $data['outbound_categories'] = $this->package->get_show_front('OB',0,4);
        $data['other_categories'] = $this->package->get_show_front('OTH',0,3);
        $data['special_packages'] = $this->package->get_package_info('special', '0', '8');
        $data['adventures'] =  $this->package->get_adventure_front(0, 4);
        $data['forex_detail'] = $this->crud->get_forex(date('Y-m-d'), 0, 4);
        $data['tour_fixed_departure'] = $this->package->show_front_departures('tour','0','4');
        $data['trek_fixed_departure'] = $this->package->show_front_departures('trek','0','4');
        $data['services_offers']= $this->content->get_service_offer_list('0','10');
        $data['emagazine'] = $this->content->get_emagazine();

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

    public function all($slug)
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
