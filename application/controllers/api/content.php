<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/content_api_model', 'content');
        header('Content-type:application/json');

    }

    public function nepalInformation()
    {
        $detail =  $this->content->get_content_detail('nepal-information');

        if(!empty($detail))
        {

            $details['title'] =  $detail['content_page_title'];
            $details['body'] =  $detail['content_body'];
            $this->deliver_response("SUCCESS",200, "Nepal Information Found", "Detail", $details);
        }
        else{
            $this->deliver_response("SUCCESS",204, "Nepal Information Detail Not Found", "Detail", NULL);
        }


    }

    public function event()
    {
        $detail =  $this->content->get_content_detail('event');

        if(!empty($detail))
        {

            $details['title'] =  $detail['content_page_title'];
            $details['body'] =  $detail['content_body'];
            $this->deliver_response("SUCCESS",200, "Event Detail Found", "Detail", $details);
        }
        else{
            $this->deliver_response("SUCCESS",204, "Event Detail Not Found", "Detail", NULL);
        }


    }

    public function terms()
    {
        $detail =  $this->content->get_content_detail('terms&conditions');

        if(!empty($detail))
        {

            $details['title'] =  $detail['content_page_title'];
            $details['body'] =  $detail['content_body'];
            $this->deliver_response("SUCCESS",200, "Terms and Conditions Detail Found", "Detail", $details);
        }
        else{
            $this->deliver_response("SUCCESS",204, "Terms and Conditions Detail Not Found", "Detail", NULL);
        }


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
?>