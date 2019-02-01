<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/content_api_model', 'content');
        header('Content-type:application/json');

    }

    public function index()
    {
        $detail =  $this->content->get_about_us();

      if(!empty($detail)) {
      

          $tabs=  $this->crud_model->get_detail_rows($detail['content_id'], 'content_id', 'igc_content_tabs');
          $details['title'] =  $detail['content_page_title'];
          $details['body'] =  $detail['content_body'];
//          if(!empty($tabs))
//          {
//
//                  $tab[$tb]['tab'] =  $tabs['tab1']
//
//          }
//          else{
//              $tab =  $tabs;
//          }

        //  $details['tabs'] =  $tab;
          $this->deliver_response("SUCCESS",200, "About Us Detail", "aboutus", $details);
      }
        else{
            $this->deliver_response("ERROR",204, "About Us Detail  Not Found", "aboutus", NULL);
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