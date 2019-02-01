<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        header('Content-type:application/json');

    }
    public function index()
    {
      //  $detail =  $this->site_settings_model->get_site_settings();

//        if(!empty($detail))
//        {

            $details['Description'] =  "GoNepal Holiday<br /> Lazimpat, Kathmandu<br /> Nepal<p><strong>GoNepal 
Holiday</strong><br /> PO.Box: 20957 |<br /> Metro Park,<br /> Uttar Dhokha, Lazimpat<br /> 
Kathmandu | Nepal<br /> T: 977-1-4414739/ 4420413 | F: 977-1-4421892 |</p> ";
            $details['longitude'] = "85.31890352803339";
            $details['latitude'] = "27.718349927339663";
            $details['telephoneNumbers'] = "+977-1-4414739 / +977-1-4005043";
            $details['fax'] = "+977-1-4414739";
            $details['email'] = "info@gonepalholiday.com";
            $details['facebookURL'] = "https://facebook.com/gonepalholiday";
            $details['twitterURL'] = "https://twitter.com/gonepalholiday";
            $details['youtubeURL'] = "https://youtube.com/gonepalholiday";
            $details['googlePlusURL'] = "https://plus.google.com/gonepalholiday";
            $details['skypeURL'] = "gonepal";
            //  $details['body'] =  $detail['content_body'];
            $this->deliver_response("SUCCESS",200, "Contact Detail Found", "contactDetails", $details);
//        }
//        else{
//            $this->deliver_response("SUCCESS",204, "Contact Detail Not Found", "contactDetails", NULL);
//        }


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

}