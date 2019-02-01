<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trek_quote extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('site_settings_model', 'settings');
        $this->load->model('crud_model','crud');
        $this->load->model('package_model','package');

    }

    public  $table = "igc_trek_quote";
    public $field_name = "quote_id";
    public  $redirect = "trek_quote";


    public function quote()
    {
        if($this->input->post())
        {
           // print_r($this->input->post());
           // exit;
            $insert['region'] = $this->input->post('region');
            $insert['start_date'] = date("Y-m-d",strtotime($this->input->post('start_date')));
            $insert['end_date'] = date("Y-m-d",strtotime($this->input->post('end_date')));
            $insert['full_name'] = $this->input->post('full_name');
            $insert['email'] = $this->input->post('email');
            $insert['country'] = $this->input->post('country');
            $insert['adult']= ($this->input->post('adult') !="")?"Yes":"No";
            $insert['child']= ($this->input->post('child') !="")?"Yes":"No";
            $insert['infant']= ($this->input->post('infant') !="")?"Yes":"No";
            $insert['total_pax'] = $this->input->post('total_pax');
            $insert['created']= date('Y-m-d:H:i:s');
            $insert['delete_status']= "0";

            $result = $this->crud->insert($insert,$this->table);
            if($result)
            {
             $this->send_trip_quote_mail($insert);
             $data['success'] = "Your Trek Quote has been Send Successfully.";
            }
            else{
                $data['error'] = "Unable to send your trek Quote. Please Try Again.";
            }


            $data['title'] = "Trek Quote Result";
            $data['menu'] = "";
            $this->load->view('header', $data);
            $this->load->view('trek_quote');
            $this->load->view('footer');




        }

    }

    //function to send Trek Quote email

    public function send_trip_quote_mail($pinfo)
    {
        $this->load->library('encrypt');

        $site_settings = $this->settings->get_site_settings();
        $server = $this->package->get_mail_info();

        $password = $this->encrypt->decode($server['password']);

        $admin_mails = $this->package->get_admin_mails('Trek Quote');


        $this->load->library('mailer');

        $mail  = new PHPMailer();

        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rupakot Tours and Travels Trip Plan</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    <div style="margin:0 0 10px"> <img alt="Rupakot Tours and Travels" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>

    <h3 align="center">'.$site_settings['site_name'].' Trip Quote Details</h3>
    <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tr>
            <td style="border-bottom:1px solid #800000">Region</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['region'].'</td>
        </tr>
        <tbody>

         <tr>
            <td style="border-bottom:1px solid #800000">Trip Start Date</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['start_date'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Trip End date</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['end_date'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Total Pax</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['total_pax'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Adult</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['adult'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Child</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['child'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Infant</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['infant'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Full Name</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['full_name'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Email</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['email'].'</td>
        </tr>
         <tr>
            <td style="border-bottom:1px solid #800000">Country</td>
            <td style="border-bottom:1px solid #800000"> '.$pinfo['country'].'</td>
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
        // $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier

        $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server

        $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server

        $mail->Username   = $server['username'];  // GMAIL username

        $mail->Password   = $password;          // GMAIL password

        $mail->SetFrom($server['send_from_email'], $server['send_from_name']);

        $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);

        $mail->Subject    = $site_settings['site_name']." Trek Quote";


        $mail->MsgHTML($body);


        foreach($admin_mails as $address)
        {
            $mail->AddAddress($address['email'], $server['send_from_name']);

        }



        $mail->Send();

    }
}
